<?php
	// Initialize the session
	session_start();

	// Check if the user is already logged in, if yes then redirect to the Welcome page
	if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
		header("location: index.php");
		exit;
	}

	// Include config file
	require_once "includes/config.php";
	
	require_once "includes/helpers.php";

	// Define variables and initialize with empty values
	$username = $password = "";
	$username_err = $password_err = "";

	// Processing from data when form is submitted
	if($_SERVER["REQUEST_METHOD"] == "POST") {

		// Check if username is empty
		$input_username = trim($_POST["username"]);
		if (empty($input_username)) {
			$username_err = "Please enter your username.";
		} else {
			$username = $input_username;
		}

		// Check if password is empty
		$input_password = trim($_POST["password"]);
		if (empty($input_password)) {
			$password_err = "Please enter your password.";
		} else {
			$password = $input_password;
		}

		// Validate if password is empty
		if (empty($username_err) && empty($password_err)) {
			// Prepare a select statement
			$sql = "SELECT id, username, password FROM tbl_login WHERE username = ?";

			if($stmt = $dbConn->prepare($sql)) {
				// Bind variables to the prepared statemetn as parameters
				$stmt->bind_param("s", $param_username);

				// Set parameters
				$param_username = $username;

				// Attempt to execute the prepared statement
				if($stmt->execute()) {
					// Store result
					$stmt->store_result();

					// Check if username exists, if yes then verify password
					if ($stmt->num_rows == 1) {
						// Bind result variables
						$stmt->bind_result($id, $username, $hashed_password);
						if ($stmt->fetch()) {
							if (password_verify($password, $hashed_password)) {
								// Password is correct, so start a new session
								session_start();

								// Store data in session variables
								$_SESSION["loggedin"] = true;
								$_SESSION["id"] = $id;
								$_SESSION["username"] = $username;

								// Redirect user to welcome page
								header("location: index.php");
							} else {
								// Display an error message if password is not valid.
								$password_err = "The password you entered was not valid.";
							}
						}
					} else {
						// Display an error message if username doesn't exist.
						$username_err = "The account with this username cannot be found.";
					}
 				} else {
 					echo "Opps! Something went wrong in executing SQL. Please try again later.";
 				}

 				 // Close statement
 				$stmt->close();
			}
		}
		// Close database connection
		$dbConn->close();
	}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Admin Login</title>
	<link rel="stylesheet" href="<?=base_url_admin()?>css/utils.css">
	<link rel='shortcut icon' type='image/x-icon' href='<?=base_url_admin()?>image/favicon.ico' />
</head>
<body>
  <div class="body"></div>
		<div class="grad"></div>
		<div class="header">
			<div>Admin<span>Login</span></div>
		</div>
		<br>
		<div class="login">
			<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
				<div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
					<input type="text" name="username" class="form-control" value="<?php echo $username; ?>" placeholder="Username"><br>
					<span class="help-block"><?php echo $username_err; ?></span>
				</div>
				<div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
					<input type="password" name="password" class="form-control" value="<?php echo $password; ?>" placeholder="Password"><br>
					<span class="help-block"><?php echo $password_err; ?></span>
				</div>
				<div class="form-group">
					<input type="submit" name="submit" class="btn btn-primary" value="Login">
				</div>
			</form>
				
		</div>
</body>
</html>