<?php
// start session for authentication
session_start(); 

if($_SERVER["REQUEST_METHOD"] == "POST") {
   // connect to database
   require_once '../dbConnection/db.php';

   // get input values
   $USERNAME = mysqli_real_escape_string($conn,$_POST['USERNAME']);
   $PASSWORD = mysqli_real_escape_string($conn,$_POST['PASSWORD']);

   // query database for user
   $sql = "SELECT * FROM USERS WHERE USERNAME = '$USERNAME' and PASSWORD = '$PASSWORD'";
   $result = mysqli_query($conn,$sql);
   $count = mysqli_num_rows($result);

   if($count == 1) {

      while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
         $ID=$row['ID'];
         $USERNAME=$row['USERNAME'];
         $SROLE=$row['SROLE'];
         $USER_ID=$row['USER_ID'];
         $FIRSTNAME=$row['FIRSTNAME'];
         $LASTNAME=$row['LASTNAME'];
         $MI=$row['MI'];
         $_SESSION['CURRENT_USERID'] = $USER_ID;
         $_SESSION['USERNAME'] = $USERNAME;
         $_SESSION['CURRENT_FNAME'] = $FIRSTNAME;
         $_SESSION['CURRENT_LNAME'] = $LASTNAME;
         $_SESSION['CURRENT_MI'] = $MI;
         $_SESSION['CURRENT_SROLE'] = $SROLE;

         if ($SROLE == "REGISTRAR" || $SROLE == "ADMIN") {
            header("location: ../admin/");
            exit();
            }
         elseif($SROLE == "INSTRUCTOR"){
            header("location: home.php");
            exit();
         }
         elseif($SROLE == "STUDENT"){
            header("location: ../student/view/homepage.php");
            exit();
         }
      }
      $count = mysqli_num_rows($result);
      
      // if user is found, start session and redirect to instructor dashboard
     
   } else {
      $error_message = "Invalid username or password. Please try again.";
   }
   mysqli_close($conn);
}
