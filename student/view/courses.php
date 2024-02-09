<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student's Curriculum</title>
  <link rel="stylesheet" href="../../src/css/tailwind.css">
  <link rel="stylesheet" href="../assets/scrollbar.css">
  <link rel="stylesheet" href="../assets/course.css">
 
</head>

<body>
<?php include_once '../template/navigation.php'; ?>
  <?php include_once '../template/navbar.php'; ?>
  <main>
    <?php
    include_once '../dbConnection/db.php';
    $SY = '';
    $get_ID = $_SESSION['CURRENT_USERID']; // Updated to 'id' (lowercase) to match the URL parameter
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

    <div class="top">
      <div class="heading">
        <img src="pitlogo.png" alt="Logo" class="logo-left">
        <img src="CHED-LOGO_orig.png" alt="Logo" class="logo-right">
        <div class="heading-text">
          <p class="h-1">Republic&nbsp;of&nbsp;the&nbsp;Philippines</p>
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
      ?>
    </div>

    <!-- <button class="btn btn-primary" onclick="printTable()">Print Grade</button>
    <style>
      @media print {
        table {
          border: 1px soolid black;
          color: black;
        }

        .print-button {
          display: none;
        }

        table {
          width: 99vw;
        }

        .btn {
          display: none;

        }

        nav {
          display: none;
        }

        title {
          display: none
        }

        .footer {
          display: none;
        }
      }
    </style>
    <script>
      function printTable() {
        window.print();
      }
    </script> -->

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

      body {
        width: 100vw !important;
        margin: 0;
        padding-right: 0 important;
      }
    </style>

  </main>
</body>

</html>