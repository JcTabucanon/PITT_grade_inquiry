<?php
include_once '../dbConnection/db.php';
// Check if the form has been submitted
if (isset($_POST['submit'])) {
  // Get the values from the form
  $id = $_POST['id'];

  $sql = "SELECT * from CURRICULUM where ID='$id'";
     $result=mysqli_query($conn,$sql);
      if($result){
        while($row=mysqli_fetch_assoc($result)){
          $COURSE=$row['COURSE'];
          $YLEVEL=$row['YLEVEL'];
          $SEMESTER=$row['SEMESTER'];
          $AY=$row['SY'];
        }
      }

  $COURSE_code = $_POST['course_code'];
  $descriptive_title = $_POST['descriptive_title'];
  $instructor_name = $_POST['instructor_name'];
  $lec = $_POST['lec'];
  $lab = $_POST['lab'];
  $total_units = $lab + $lec;

  // Perform the update query
  // Replace table_name and column_names with your own values
  $query = "UPDATE CURRICULUM SET 
            COURSE_CODE = '$COURSE_code', 
            DESCRIPTIVE_TITLE = '$descriptive_title', 
            INSTRUCTOR_NAME = '$instructor_name', 
            LEC = '$lec', 
            LAB = '$lab', 
            TOTAL_UNITS = '$total_units' 
            WHERE ID = $id";
  // Execute the query
  // Replace $conn with your own database connection variable
  if (mysqli_query($conn, $query)) {
    // Redirect to the previous page with a success message
    header("Location: ../views/viewcurriculum.php?COURSE=$COURSE&YLEVEL=$YLEVEL&SEMESTER=$SEMESTER&AY=$AY"); 
    mysqli_close($conn);
    exit();
  } else {
    // Redirect to the previous page with an error message
    header("Location: ../views/viewcurriculum.php?message=update_error");
    exit();
  }
} else {
  // If the form has not been submitted, redirect to the previous page
  header("Location: ../views/viewcurriculum.php");
  exit();
}
