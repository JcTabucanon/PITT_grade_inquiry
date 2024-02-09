<?php
   require_once '../dbConnection/db.php';
// Start the session
session_start(); 

// Check if the login user session variable is set
if (!isset($_SESSION['$CURRENT_USERID']) && !isset($_SESSION['CURRENT_FNAME'])) {
    header("Location: ../views/login_form.php"); // redirects to the login page
    exit;
  }