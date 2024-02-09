<?php

require_once('../../config.php');

$getSchoolID = $_GET['SCHOOL_ID'];
$sql = "SELECT * FROM GRADE WHERE SCHOOL_ID = '{$getSchoolID}'";
$result = mysqli_query($conn, $sql);

$firstName = "";
$middleInitial = "";
$lastName = "";
$course = "";
$yearLevel = "";
$studentStatus = "";

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $yearLevel = $row['YLEVEL'];
    $semester = $row['SEMESTER'];
    $firstName = $row['FIRSTNAME'];
    $lastName = $row['LASTNAME'];
    $middleInitial = $row['MI'];
    $studentStatus = $row['STUDENT_STATUS'];
    $course = $row['COURSE'];

} else {
    // Fetch data from the LISTING table based on SCHOOL_ID
    $listingSql = "SELECT * FROM LISTING WHERE SCHOOL_ID = '{$getSchoolID}'";
    $listingResult = mysqli_query($conn, $listingSql);
    if ($listingResult && mysqli_num_rows($listingResult) > 0) {
        $listingRow = mysqli_fetch_assoc($listingResult);
        $firstName = $listingRow['FIRSTNAME'];
        $middleInitial = $listingRow['MI'];
        $lastName = $listingRow['LASTNAME'];
        $course = $listingRow['COURSE'];
        $studentStatus = $listingRow['STUDENT_STATUS'];

    }
}

?>
<div class="container">
    <div class="logo_pit"></div>
    <div class="margin-top">
        <div class="row">
            <div class="span">
                <div class="name">
                    <span>STUDENT NUMBER: <strong><?php echo $getSchoolID; ?></strong></span>
                    <span>STUDENT NAME: <strong><?php echo $firstName . " " . $middleInitial . " " . $lastName; ?></strong></span>
                    <span>COURSE: <strong><?php echo $course; ?></strong></span>
                    <span id="print_right">
                        <span><?php echo $yearLevel; ?></span>
                        <span>Status: <strong><?php echo $studentStatus; ?></strong></span>
                    </span>
                </div>
                <hr>
                <?php include('grade_option.php'); ?>
                <hr>
            </div>
            <div class="span2">
                <div id="add">

            </div>
        </div>
        <?php
        // units_table.php
        if (isset($SY) && isset($semester)) {
            // Use $SY and $semester as needed
            // ...
        } else {
            // Handle case when $SY and/or $semester are not defined
            // ...
        }
        ?>
    </div>
</div>
</div>
<style>
    td {
        text-align: center;
        vertical-align: middle;
    }

    input[type="text"] {
        height: 20px;
        border: 1px solid #333;
        width: 35vw;
    }
</style>
<div class="registrar">
    <p>Jhobert Himang</p>
    <p>Registrar</p>
</div>
