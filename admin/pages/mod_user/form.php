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
      } else {
         $firstname = $input_firstname;
      }
   }
?>
<section class="section">
   <div class="section-body">
      <div class="row">
         <div class="col-12">
            <div class="card">
               <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="needs-validation" novalidate="">
                  <div class="card-header">
                     <h4>Create New User Form!</h4>
                  </div>
                  <div class="card-body">
                     <div class="form-row">
                        <div class="form-group col-md-6">
                           <label for="firstname">Firstname</label>
                           <input type="text" class="form-control" id="firstname" placeholder="Firstname" required="">
                           <div class="invalid-feedback">
                              What's your name?
                           </div>
                        </div>
                        <div class="form-group col-md-6">
                           <label for="lastname">Lastname</label>
                           <input type="text" class="form-control" id="lastname" placeholder="Lastname">
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