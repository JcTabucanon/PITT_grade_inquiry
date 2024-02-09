<?php
require_once '../dbConnection/db.php';
// Check if the form is submitted
if (isset($_POST['SaveGrade'])) {
  $count = $_POST['COUNT'];
  $DEPARTMENT = $_POST['DEPARTMENT'];
  $TOTAL_UNITS = $_POST['TOTAL_UNITS'];
  $DESCRIPTIVE_TITLE = $_POST['DESCRIPTIVE_TITLE'];
  $checkbox = $_POST['checkbox'];
  if($checkbox != 1){
    $checkbox = '0';
  }
  $i = 0;
  while($count!=$i){
    $ID = $_POST['STUDENT_ID'];
    $SEM = $_POST['SEMESTER'];
    $AY = $_POST['SY'];
    $INS_ID = $_POST['INSTRUCTOR_ID'];

    $MAJOR = $_POST['COURSE'];
    $LEVEL = $_POST['YLEVEL'];
    $COURSE_CODEE = $_POST['COURSE_CODE'];
    $MID_TERMM = $_POST['MID_TERM'];
    $FINAL_TERMM = $_POST['FINAL_TERM'];
    $GEN_AVEE = $_POST['GEN_AVE'];
    $i +=1;
    $STUDENT_ID = $ID[$i];
    $SEMESTER = $SEM[$i];
    $SY = $AY[$i];
    $INSTRUCTOR_ID = $INS_ID[$i];

    $COURSE = $MAJOR[$i];
    $YLEVEL = $LEVEL[$i];
    $COURSE_CODE = $COURSE_CODEE[$i];
    $MID_TERM = $MID_TERMM[$i];
    $FINAL_TERM = $FINAL_TERMM[$i];
    $GEN_AVE = $GEN_AVEE[$i];

    if ($GEN_AVE >= 1.0 && $GEN_AVE <= 3.2) {
        $REMARKS = "Passed";
    } elseif ($GEN_AVE >= 3.3 && $GEN_AVE <= 4.2) {
        $ave = 4.0;
        $REMARKS = "Conditional";
    } elseif ($GEN_AVE >= 4.3 && $GEN_AVE <= 5.0) {
        $GEN_AVE = 5.0;
        $REMARKS = "Failed";
    } else {
        $REMARKS = "";
    }

    $query = "UPDATE GRADE SET 
        MID_TERM = '$MID_TERM', 
        FINAL_TERM = '$FINAL_TERM', 
        GEN_AVE = '$GEN_AVE', 
        REMARKS = '$REMARKS',
        SUBMITTED = '$checkbox' 
        WHERE 
        SCHOOL_ID = '$STUDENT_ID' AND 
        COURSE = '$COURSE' AND 
        COURSE_CODE = '$COURSE_CODE' AND 
        SY = '$SY' AND 
        YLEVEL = '$YLEVEL' AND 
        INSTRUCTOR_ID = '$INSTRUCTOR_ID'";
    $result = mysqli_query($conn, $query);
  }
  // Redirect to the previous page with a success message
  header("Location:../views/view_grade_instructor.php?DEPARTMENT=$DEPARTMENT&TOTAL_UNITS=$TOTAL_UNITS&INSTRUCTOR_ID=$INSTRUCTOR_ID&COURSE=$COURSE&COURSE_CODE=$COURSE_CODE&DESCRIPTIVE_TITLE=$DESCRIPTIVE_TITLE&YLEVEL=$YLEVEL&SEMESTER=$SEMESTER&SY=$SY&BTN_SHOW=$checkbox"); 
  mysqli_close($conn);
}