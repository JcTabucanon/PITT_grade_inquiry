<?php
require_once '../dbConnection/db.php';
// session_start();

// Check if the login user session variable is set
if (!isset($_SESSION['CURRENT_USERID']) && !isset($_SESSION['CURRENT_FNAME'])) {
    header("Location: ../views/login_form.php"); // Redirects to the login page
    exit;
}

// Check whether the session variable CURRENT_USERID is present or not
if (!isset($_SESSION['CURRENT_USERID'])) {
    header("location: ../views/login_form.php");
    exit();
}

$CURRENT_USERID = $_SESSION['CURRENT_USERID'];

$query = mysqli_query($conn, "SELECT * FROM users WHERE USER_ID = '$CURRENT_USERID'") or die(mysqli_error($conn));
$row = mysqli_fetch_array($query);

