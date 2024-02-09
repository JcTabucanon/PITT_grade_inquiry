<?php
session_start();    

session_destroy(); // destroys all data registered to the session
header("Location: ../views/login_form.php"); // redirects to the login page
exit;
?>