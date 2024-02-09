<div id="updateModal" class="updateModal">
     <div class="modal-content">
     <span class="close_modal_edit">
     <div class="close-info">
          <label for="">Update account info</label>
          </div>
          <button>
               &times;
          </button>
     </span>
          <div class="modal-content-wrapper">
               <!-- Update part-->
               <form method="POST" action="" class="form-update-can">
                    <div class="update-can">
                         <div class="fname">
                              <input type="text" name="FIRSTNAME" placeholder="FIRSTNAME" value="<?php echo $FIRSTNAME;?>" required>
                         </div>
                         <div class="lname">
                              <input type="text" name="LASTNAME"  placeholder="LASTNAME" value="<?php echo $LASTNAME;?>" required>
                         </div>
                         <div class="mi">
                              <input type="text" name="mi" placeholder="M.I" value="<?php echo $MI;?>" required>
                         </div>
                    </div>
                    <div class="update-can">
                         <div class="c">
                              <input class="email" type="email" name="email" placeholder="example@sample.com" value="" >
                         </div>
                    </div>
                    <div class="update-can">
                         <div class="c">
                              <input class="password" type="password" placeholder="Password" name="password" required>
                         </div>
                    </div>
                    <div class="update-can">
                         <div class="c">
                              <input class="c-password" type="password" placeholder="Confirm password" name="confirm_password" required>
                         </div>
                    </div>                                   
                    <input class="btn_update" type="submit" name="submit" value="Update Account">

               <!-- Update part-->

               </form>
          </div>
     </div>
</div>
<?php
// Check if the form is submitted
if(isset($_POST['submit'])) {
    // Get the form values
    $firstname = $_POST['FIRSTNAME'];
    $lastname = $_POST['LASTNAME'];
    $mi = $_POST['mi'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];
    
    // Validate and process the form data
    if($password == $confirmPassword) {
        // Passwords match, proceed with the update
        $CURRENT_USERID = $_SESSION['CURRENT_USERID'];
        require_once '../dbConnection/db.php';

        // Update the user record in the database
        $sql = "UPDATE USERS SET FIRSTNAME = '$firstname', LASTNAME = '$lastname', MI = '$mi', USERNAME = '$email', PASSWORD = '$password' WHERE USER_ID = '$CURRENT_USERID'";
        $result = mysqli_query($conn, $sql);

        if($result) {
            // Update successful
          //   echo "Update successful!";
        } else {
            // Update failed
          //   echo "Update failed!";
        }
    } else {
        // Passwords do not match, display an error message
     //    echo "Passwords do not match!";
    }
}
?>