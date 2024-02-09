<?php
$count = 0;

if (isset($_POST['searchSubject'])) {
  $COURSE = $_POST['COURSE'];
  $YLEVEL = $_POST['YLEVEL'];
  $SEMESTER = $_POST['SEMESTER'];
  $SY = $_POST['AY'];
  if ($COURSE == 'All' && $YLEVEL == 'All' && $SEMESTER == 'All' && $SY == 'All') {
    $COURSE = "";
    $YLEVEL = "";
    $SEMESTER = "";
    $SY = "";
    viewSubject($COURSE, $YLEVEL, $SEMESTER, $SY, 'ALL');
  } else {
    viewSubject($COURSE, $YLEVEL, $SEMESTER, $SY, 'SEARCH');
  }
  $remember = 1;
} elseif (!empty($_GET['COURSE']) && !empty($_GET['YLEVEL']) && !empty($_GET['SEMESTER']) && !empty($_GET['EFFECTIVE_YEAR'])) {
  $COURSE = $_GET['COURSE'];
  $YLEVEL = $_GET['YLEVEL'];
  $SEMESTER = $_GET['SEMESTER'];
  $SY = $_GET['EFFECTIVE_YEAR'];
  viewSubject($COURSE, $YLEVEL, $SEMESTER, $SY, 'SEARCH');
} else {
  $COURSE = "";
  $YLEVEL = "";
  $SEMESTER = "";
  $SY = "";
  viewSubject($COURSE, $YLEVEL, $SEMESTER, $SY, 'ALL');
}

function viewSubject($COURSE, $YLEVEL, $SEMESTER, $SY, $TYPE)
{
  include '../dbConnection/db.php';
  $count = 0;

  if ($TYPE == 'SEARCH') {
    $grade_query = mysqli_query($conn, "SELECT * FROM CURRICULUM WHERE DEPARTMENT='TECHNOLOGY'");
  } elseif ($TYPE == 'ALL') {
    $grade_query = mysqli_query($conn, "SELECT * FROM CURRICULUM WHERE DEPARTMENT='TECHNOLOGY'");
  }

  if (mysqli_num_rows($grade_query) > 0) {
    $printed_courses = array();

    while ($row = mysqli_fetch_assoc($grade_query)) {
      $course = trim($row['COURSE']);
      $SY = trim($row['EFFECTIVE_YEAR']);
      $DEPARTMENT = trim($row['DEPARTMENT']);
      $PROGRAM_ADVISER = trim($row['PROGRAM_ADVISER']);
      $ADVISER_ID = trim($row['ADVISER_ID']);
      $COMPARE = $course . $SY . $DEPARTMENT . $PROGRAM_ADVISER;
      $count++;
      if (empty($row['YLEVEL'])) {
        $row['YLEVEL'] = 'N/A';
      }
      if (empty($row['DEPARTMENT'])) {
        $row['DEPARTMENT'] = 'N/A';
      }

      if (!isset($printed_courses[$course])) {
        $printed_courses[$course] = array(
          'count' => $count,
          'EFFECTIVE_YEAR' => $SY,
          'DEPARTMENT' => $DEPARTMENT,
          'PROGRAM_ADVISER' => $PROGRAM_ADVISER,
          'ADVISER_ID' => $ADVISER_ID
        );
      } else {
        $printed_courses[$course]['count']++;
      }
    }

    foreach ($printed_courses as $course => $data) {
      echo '
        <tr>
          <td>' . $data['count'] . '</td>
          <td>' . $course . '</td>
          <td>' . $data['EFFECTIVE_YEAR'] . '</td>
          <td>' . $data['DEPARTMENT'] . '</td>
          <td>' . $data['PROGRAM_ADVISER'] . '</td>
          <td class="btn-con">
            <a rel="tooltip" id=" <?php echo $ID; ?> " href="?page=curriculum/viewcurriculum&COURSE=' . $course . '&EFFECTIVE_YEAR=' . $data['EFFECTIVE_YEAR'] . '&DEPARTMENT=' . $data['DEPARTMENT'] . '&ADVISER_ID=' . $data['ADVISER_ID'] . '&PROGRAM_ADVISER=' . $data['PROGRAM_ADVISER'] . '" style="width: 100%; margin: 0; height: 40px; padding-left: 10px; padding-right: 10px; font-size: 15px;" title="View Grade">
              View&nbsp;Curriculum
            </a>
          </td>
        </tr>
      ';
    }
  }
}

?>
