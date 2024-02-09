<?php
include_once '../dbConnection/db.php';
$SY = '';
$get_ID = $_GET['ID']; // Updated to 'id' (lowercase) to match the URL parameter
$sql = "SELECT * FROM GRADE WHERE SCHOOL_ID = '$get_ID'";
$result = mysqli_query($conn, $sql);
$studentData = [
    'FIRSTNAME' => "",
    'MI' => "",
    'LASTNAME' => "",
    'COURSE' => "",
    'YLEVEL' => "",
    'STUDENT_STATUS' => "",
];

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $SY = $row['SY'];

    $studentData['YLEVEL'] = $row['YLEVEL'];
    $studentData['SEMESTER'] = $row['SEMESTER'];
    $studentData['FIRSTNAME'] = $row['FIRSTNAME'];
    $studentData['LASTNAME'] = $row['LASTNAME'];
    $studentData['MI'] = $row['MI'];
    $studentData['COURSE'] = $row['COURSE'];
    $studentData['INSTRUCTOR'] = $row['INSTRUCTOR_NAME'];

    $ylevelMapping = [
        1 => 'FIRST YEAR',
        2 => 'SECOND YEAR',
        3 => 'THIRD YEAR',
        4 => 'FOURTH YEAR',
    ];

    $semesterMapping = [
        '1st' => 'FIRST SEMESTER',
        '2nd' => 'SECOND SEMESTER',
    ];

    if (isset($ylevelMapping[$studentData['YLEVEL']])) {
        $studentData['YLEVEL'] = $ylevelMapping[$studentData['YLEVEL']];
    }

    if (isset($semesterMapping[$studentData['SEMESTER']])) {
        $studentData['SEMESTER'] = $semesterMapping[$studentData['SEMESTER']];
    }
} else {
    // Fetch data from the LISTING table based on SCHOOL_ID
    $listingSql = "SELECT * FROM LISTING WHERE SCHOOL_ID = '$get_ID'";
    $listingResult = mysqli_query($conn, $listingSql);
    if ($listingResult && mysqli_num_rows($listingResult) > 0) {
        $listingRow = mysqli_fetch_assoc($listingResult);
        $studentData['FIRSTNAME'] = $listingRow['FIRSTNAME'];
        $studentData['MI'] = $listingRow['MI'];
        $studentData['LASTNAME'] = $listingRow['LASTNAME'];
        $studentData['COURSE'] = $listingRow['COURSE'];
        $studentData['STUDENT_STATUS'] = isset($listingRow['STUDENT_STATUS']) ? $listingRow['STUDENT_STATUS'] : 'Irregular';
    }
}

extract($studentData); // Extract the array elements into separate variables
?>

<link rel="stylesheet" href="assets/home.css">
<link rel="stylesheet" href="assets/viewcurriculum.css">


<div class="top">
<div class="heading">
    <img src="pitlogo.png" alt="Logo" class="logo-left">
    <img src="CHED-LOGO_orig.png" alt="Logo" class="logo-right">
    <div class="heading-text">
        <p>Republic&nbsp;of&nbsp;the&nbsp;Philippines</p>
        <p class="h-1">PALOMPON&nbsp;INSTITUTE&nbsp;OF&nbsp;TECHNOLOGY&nbsp;TABANGO</p>
        <p>Tabango,&nbsp;Leyte</p>
        <p class="h-1">OFFICE&nbsp;OF&nbsp;THE&nbsp;REGISTRAR</p>
        <p class="h-1">CHECK&nbsp;LIST</p>

        <p class="h-2">
            <?php
            if ($COURSE == 'BSIT') {
                echo 'Bachelor of Science in Information Technology';
            } elseif ($COURSE == 'BSED') {
                echo 'Bachelor of Secondary Education';
            } else {
                echo $COURSE;
            }
            ?>
        </p>
        <p class="effective-t"><?php echo $SY; ?></p>
    </div>
</div>
</div>
<style>
    .name{
        margin-top: 50px;
    }
</style>
<div class="name">
    <div>

        <span>STUDENT NAME: <strong><?php echo $FIRSTNAME . ", " . $LASTNAME; ?></strong></span><br>
        </span>
    </div>
    <?php
    function getYearLevelText($level)
    {
        switch ($level) {
            case 1:
                return "First Year";
            case 2:
                return "Second Year";
            case 3:
                return "Third Year";
            case 4:
                return "Fourth Year";
            default:
                return "Unknown Year Level";
        }
    }
    ?>


</div>
    <?php

    include_once 'grade_table.php';

    // include_once 'units_table.php'; // Pass $SY and $SEMESTER as parameters
    // include_once 'gwa_table.php'; // Pass $SY and $SEMESTER as parameters
    ?>
    <?php if ($_SESSION['CURRENT_SROLE'] == "REGISTRAR") { ?>

        <button class="btn btn-primary" onclick="printTable()">Print Grade</button>
    <?php } else { ?>
    <?php } ?>
    <style>
        @media print {
            .print-button {
                display: none;
            }
            .btn{
                display: none;

            }
        }
       
    </style>
    <script>
        function printTable() {
            window.print();
        }
    </script>

    <style>
        td {
            text-align: center;
            vertical-align: middle;
            height: 10px !important;
        } 

        input[type="text"] {
            height: 20px;
            border: 1px solid #333;
            width: 35vw;
        }
      
    </style>