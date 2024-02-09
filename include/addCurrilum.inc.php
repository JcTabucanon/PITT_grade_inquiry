<?php
// Database connection
include_once '../dbConnection/db.php';
// session_start();
$totalUnits = 0;
$SEMESTER = '';
// Check if form is submitted
if (isset($_POST['submit-manual'])) {
    // Get user input
    $COURSE = $_POST['COURSE'];
    $YLEVEL = $_POST['YLEVEL'];
    $COURSE_CODE = $_POST['COURSE_CODE'];
    $DESCRIPTIVE_TITLE = $_POST['DESCRIPTIVE_TITLE'];
    $LEC = $_POST['LEC'];
    $LAB = $_POST['LAB'];
    $EFFECTIVE_YEAR = $_POST['EFFECTIVE_YEAR'];
    $PRE_REQUISITE = $_POST['PRE_REQUISITE'];
    $ADVISER_ID = $_SESSION['CURRENT_USERID'];
    $PROGRAM_ADVISER = $_SESSION['CURRENT_FNAME'].' '.$_SESSION['CURRENT_LNAME'].' '.$_SESSION['CURRENT_MI'];
    // Query to insert curriculum data
    $query = "INSERT INTO `CURRICULUM`(`COURSE`, `YLEVEL`, `COURSE_CODE`, `DESCRIPTIVE_TITLE`, `LEC`, `LAB`, `EFFECTIVE_YEAR`, `SEMESTER`, `PRE_REQUISITE`, `ADVISER_ID`, `PROGRAM_ADVISER`) VALUES ('$COURSE','$YLEVEL','$COURSE_CODE','$DESCRIPTIVE_TITLE','$LEC','$LAB','$EFFECTIVE_YEAR','$SEMESTER','$PRE_REQUISITE','$ADVISER_ID','$PROGRAM_ADVISER')";

    $result = mysqli_query($conn, $query);
    if ($result) {
        // Display success message using custom alert
        echo "<script>
            var successAlert = document.createElement('div');
            successAlert.innerHTML = 'Curriculum added successfully.';
            successAlert.className = 'alert success';
            document.body.appendChild(successAlert);
            setTimeout(function() {
                successAlert.style.display = 'none';
            }, 3000); // Hide the alert after 3 seconds
        </script>";
        
    } else {
        // Display failure message using custom alert
        echo "<script>
            var failureAlert = document.createElement('div');
            failureAlert.innerHTML = 'Failed to create curriculum.';
            failureAlert.className = 'alert failure';
            document.body.appendChild(failureAlert);
            setTimeout(function() {
                failureAlert.style.display = 'none';
            }, 3000); // Hide the alert after 3 seconds
        </script>";
    }
    // Close database connection
}