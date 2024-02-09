<?php
$connection = mysqli_connect('localhost', 'root', '', 'PITGRADING-SYSTEM');
if (!$connection) {
    die('Database connection error: ' . mysqli_connect_error());
}

mysqli_select_db($connection, 'PITGRADING-SYSTEM') or die(mysqli_error($connection));

?>