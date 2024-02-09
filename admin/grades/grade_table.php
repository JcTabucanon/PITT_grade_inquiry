<link rel="stylesheet" href="../assets/modal.css">
<?php
$get_ID = $_GET['ID'] ?? '';
include_once 'dbConnection/db.php';

$sql = "SELECT * FROM listing l JOIN grade g ON l.SCHOOL_ID = g.SCHOOL_ID WHERE l.SCHOOL_ID = '$get_ID'";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

    while ($row = mysqli_fetch_assoc($result)) {
        $SY = $row['SY'];
        $COURSE = $row['COURSE'];
        $YLEVEL = $row['YLEVEL'];
        $SEMESTER = $row['SEMESTER'];
        $FIRSTNAME = $row['FIRSTNAME'];
        $LASTNAME = $row['LASTNAME'];
        $MI = $row['MI'];
        $ID = $row['ID'];
        $MID_TERM = $row['MID_TERM'];
        $FINAL_TERM = $row['FINAL_TERM'];
        $COURSE_CODE = $row['COURSE_CODE'];
        $DESCRIPTIVE_TITLE = $row['DESCRIPTIVE_TITLE'];
        $GEN_AVE = $row['GEN_AVE'];

        $MID_TERM = empty($MID_TERM) ? 'No Data' : $MID_TERM;
        $FINAL_TERM = empty($FINAL_TERM) ? 'No Data' : $FINAL_TERM;

        $avg = $GEN_AVE;
        $remarks = '';

        if ($avg >= 1.0 && $avg <= 3.2) {
            $remarks = 'Passed';
        } else if ($avg >= 3.3 && $avg <= 4.2) {
            $remarks = 'Conditional';
        } else if ($avg >= 4.3 && $avg <= 5.0) {
            $remarks = 'Failed';
        }
    }
        ?>

      

<style>
    input[type="text"] {
        height: 40px !important;
        border: 2px solid #333;
        width: 100% !important;
    }
    
</style>

<table cellpadding="0" cellspacing="0" style="border:0;" class="table table-bordered" id="example">
  <thead>

    <tr>
    <th width="50" hidden>NO</th>
      <th width="150">SUBJECT CODE</th>
      <th width="300">DESCRIPTIVE TITLE</th>
      <th>MID</th>
      <th>FINAL</th>
      <th >RATING</th>
      <th>LEC</th>
      <th>LAB</th>
      <th width="150">PRE-REQUISITES</th>
      <th>REMARKS</th>
      <?php if ($_SESSION['CURRENT_SROLE'] == "ADMIN") { ?>
      <th class="act">ACTION</th>
      <?php } ?>
    </tr>
  </thead>
  
  <tbody>
    <?php include "includes/grade.inc.php" ?>
  </tbody>
 
</table>


