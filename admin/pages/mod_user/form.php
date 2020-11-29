<?php
   /* include config file */
   require_once "includes/config.php";

   /* Define variables and initialize with empty values */
   $firstname = $lastname = $username = $password = $confirm_password = "";
   $firstname_err = $lastname_err = $username_err = $password_err = $confirm_password_err = "";

   /* Processing form data when form is submitted. */
   if ($_SERVER["REQUEST_METHOD"] == "POST") {

      // Validate Firstname
      $input_firstname = trim($_POST["firstname"]);
      if (empty($input_firstname)) {
         $firstname_err = "Please enter your first name.";
      } elseif(!filter_var($input_firstname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
         $firstname_err = "Please enter a valid firstname.";
         } 
      else {
         $firstname = $input_firstname;
      }

      // Validate Lastname
      $input_lastname = trim($_POST["lastname"]);
      if (empty($input_lastname)) {
         $lastname_err = "Please enter your lastname name.";
      } elseif(!filter_var($input_lastname, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
         $lastname_err = "Please enter a valid lastname.";
         } 
      else {
         $lastname = $input_lastname;
      }
   }
?>
<section class="section">
   <div class="section-body">
      <div class="row"> 
         <div class="col-12">
            <div class="card">
               <form action="" method="post">
                  <div class="card-header">
                     <h4>Create New User Form!</h4>
                  </div>
                  <div class="card-body">
                     <div class="form-row">
                        <div class="form-group <?php echo (!empty($firstname_err)) ? 'has-error' : ''; ?> col-md-6">
                           <label for="firstname">Firstname</label>
                           <input type="text" class="form-control" name="firstname" value = "<?php echo $firstname; ?>" placeholder="Firstname">
                           <div class="help-block"><?php echo $firstname_err; ?></div>
                        </div>
                        <div class="form-group <?php echo (!empty($lastname_err)) ? 'has-error' : ''; ?> col-md-6">
                           <label for="lastname">Lastname</label>
                           <input type="text" class="form-control" name="lastname" value="<?php echo $lastname; ?>" placeholder="Lastname">
                           <div class="help-block"><?php echo $lastname_err; ?> </div>
                        </div>
                     </div>

                     <div class="form-row">
                        <div class="form-group col-md-6">
                           <label for="username">Username</label>
                           <input type="text" class="form-control" id="username" placeholder="Username">
                        </div>
                        <div class="form-group col-md-6">
                           <label for="contactno">Contact No</label>
                           <input type="text" class="form-control" id="contactno" placeholder="Contact No">
                        </div>
                     </div>

                     <div class="form-row">
                        <div class="form-group col-md-6">
                           <label for="email">Email</label>
                           <input type="email" class="form-control" id="email" placeholder="Email">
                        </div>
                        <div class="form-group col-md-3">
                           <label for="password">Password</label>
                           <input type="password" class="form-control" id="password" placeholder="Password">
                        </div>
                        <div class="form-group col-md-3">
                           <label for="confirm_password">Confirm Password</label>
                           <input type="password" class="form-control" id="confirm_password" placeholder="Confirm Password">
                        </div>
                     </div>

                     <div class="form-group">
                        <label for="inputAddress">Address</label>
                        <input type="text" class="form-control" id="inputAddress" placeholder="Enter your full address.">
                     </div>

                     <div class="form-row">
                        <div class="form-group col-md-6">
                           <label for="gender">Gender</label> <br>
                           <input type="radio" id="male" name="male"> Male
                           <input type="radio" id="male" name="male"> Female
                           <input type="radio" id="male" name="male"> Others
                        </div>
                        <div class="form-group col-md-6">
                           <label>Date Picker</label>
                           <input type="text" class="form-control datepicker">
                        </div>
                     </div>

                     <div class="form-group">
                        <label for="details">Content</label><br>
                        <textarea class="summernote-simple"></textarea>
                     </div>
                  </div>

                  <div class="card-footer">
                     <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</section>