<?php
$count = 0;
$INSTRUCTOR_ID = $_SESSION['CURRENT_USERID'];

// query database for user

if (isset($_POST['searchSubject'])) {
  $COURSE = $_POST['COURSE'];
  $YLEVEL = $_POST['YLEVEL'];
  $SEMESTER = $_POST['SEMESTER'];
  $SY = $_POST['AY'];
  if ($COURSE == 'All' && $YLEVEL == 'All' && $SEMESTER == 'All' && $SY == 'All') {
    // Code for when all conditions are 'All'
    myCourses($COURSE, $YLEVEL, $SEMESTER, $SY, 'All');
  } elseif ($COURSE == 'All' && $YLEVEL == 'All' && $SEMESTER == 'All' && $SY != 'All') {
    // Code for when only $SY is not 'All'
    myCourses($COURSE, $YLEVEL, $SEMESTER, $SY, 'Search');
  } elseif ($COURSE == 'All' && $YLEVEL == 'All' && $SEMESTER != 'All' && $SY == 'All') {
    // Code for when only $SEMESTER is not 'All'
    myCourses($COURSE, $YLEVEL, $SEMESTER, $SY, 'Search');
  } elseif ($COURSE == 'All' && $YLEVEL == 'All' && $SEMESTER != 'All' && $SY != 'All') {
    // Code for when $SEMESTER and $SY are not 'All'
    myCourses($COURSE, $YLEVEL, $SEMESTER, $SY, 'Search');
  } elseif ($COURSE == 'All' && $YLEVEL != 'All' && $SEMESTER == 'All' && $SY == 'All') {
    // Code for when only $YLEVEL is not 'All'
    myCourses($COURSE, $YLEVEL, $SEMESTER, $SY, 'Search');
  } elseif ($COURSE == 'All' && $YLEVEL != 'All' && $SEMESTER == 'All' && $SY != 'All') {
    // Code for when $YLEVEL and $SY are not 'All'
    myCourses($COURSE, $YLEVEL, $SEMESTER, $SY, 'Search');
  } elseif ($COURSE == 'All' && $YLEVEL != 'All' && $SEMESTER != 'All' && $SY == 'All') {
    // Code for when $YLEVEL and $SEMESTER are not 'All'
    myCourses($COURSE, $YLEVEL, $SEMESTER, $SY, 'Search');
  } elseif ($COURSE == 'All' && $YLEVEL != 'All' && $SEMESTER != 'All' && $SY != 'All') {
    // Code for when $YLEVEL, $SEMESTER, and $SY are not 'All'
    myCourses($COURSE, $YLEVEL, $SEMESTER, $SY, 'Search');
  } elseif ($COURSE != 'All' && $YLEVEL == 'All' && $SEMESTER == 'All' && $SY == 'All') {
    // Code for when only $COURSE is not 'All'
    myCourses($COURSE, $YLEVEL, $SEMESTER, $SY, 'Search');
  } elseif ($COURSE != 'All' && $YLEVEL == 'All' && $SEMESTER == 'All' && $SY != 'All') {
    // Code for when $COURSE and $SY are not 'All'
    myCourses($COURSE, $YLEVEL, $SEMESTER, $SY, 'Search');
  } elseif ($COURSE != 'All' && $YLEVEL == 'All' && $SEMESTER != 'All' && $SY == 'All') {
    // Code for when $COURSE and $SEMESTER are not 'All'
    myCourses($COURSE, $YLEVEL, $SEMESTER, $SY, 'Search');
  } elseif ($COURSE != 'All' && $YLEVEL == 'All' && $SEMESTER != 'All' && $SY != 'All') {
    // Code for when $COURSE, $SEMESTER, and $SY are not 'All'
    myCourses($COURSE, $YLEVEL, $SEMESTER, $SY, 'Search');
  } elseif ($COURSE != 'All' && $YLEVEL != 'All' && $SEMESTER == 'All' && $SY == 'All') {
    // Code for when $COURSE and $YLEVEL are not 'All'
    myCourses($COURSE, $YLEVEL, $SEMESTER, $SY, 'Search');
  } elseif ($COURSE != 'All' && $YLEVEL != 'All' && $SEMESTER == 'All' && $SY != 'All') {
    // Code for when $COURSE, $YLEVEL, and $SY are not 'All'
    myCourses($COURSE, $YLEVEL, $SEMESTER, $SY, 'Search');
  } elseif ($COURSE != 'All' && $YLEVEL != 'All' && $SEMESTER != 'All' && $SY == 'All') {
    // Code for when $COURSE, $YLEVEL, and $SEMESTER are not 'All'
    myCourses($COURSE, $YLEVEL, $SEMESTER, $SY, 'Search');
  } else {
      // Code for when none of the conditions match
  }

  $remember = 1;
} elseif(!empty($_GET['COURSE']) && !empty($_GET['YLEVEL']) && !empty($_GET['SEMESTER']) && !empty($_GET['SY'])) {
  $COURSE = $_GET['COURSE'];
  $YLEVEL = $_GET['YLEVEL'];
  $SEMESTER = $_GET['SEMESTER'];
  $SY = $_GET['AY'];
  myCourses($COURSE, $YLEVEL, $SEMESTER, $SY, 'SEARCH');

}else{
  $COURSE = "";
  $YLEVEL = ""; 
  $SEMESTER = "";
  $SY = "";
  myCourses($COURSE, $YLEVEL, $SEMESTER, $SY, 'All');

}

function myCourses($COURSE, $YLEVEL, $SEMESTER, $SY, $TYPE) {
$INSTRUCTOR_ID = $_SESSION['CURRENT_USERID'];

  include '../dbConnection/db.php';
  $count = 0;
 if ($TYPE == 'All'){
  $grade_query = mysqli_query($conn, "SELECT * FROM GRADE WHERE INSTRUCTOR_ID='$INSTRUCTOR_ID'");
 }elseif($TYPE='Search'){
  $grade_query = mysqli_query($conn, "SELECT * FROM GRADE WHERE INSTRUCTOR_ID='$INSTRUCTOR_ID' AND COURSE='$COURSE' AND YLEVEL='$YLEVEL' AND SEMESTER = '$SEMESTER' AND SY='$SY'");
 }
 $printed_words = array();
  while ($row = mysqli_fetch_array($grade_query)) {

    if (empty($row['COURSE'])) {$row['COURSE'] = 'N/A';}
    if (empty($row['YLEVEL'])) {$row['YLEVEL'] = 'N/A';}
    if (empty($row['COURSE_CODE'])) {$row['COURSE_CODE'] = 'N/A';}
    if (empty($row['DESCRIPTIVE_TITLE'])) {$row['DESCRIPTIVE_TITLE'] = 'N/A';}
    if (empty($row['SY'])) {$row['SY'] = 'N/A';}
    if (empty($row['SEMESTER'])) {$row['SEMESTER'] = 'N/A';}
    if (empty($row['DEPARTMENT'])) {$row['DEPARTMENT'] = 'N/A';}
    if (empty($row['LEC'])) {$row['LEC'] = 0;}
    if (empty($row['LAB'])) {$row['LAB'] = 0;}

    if(!empty($row['SUBMITTED'])){$BTN_SHOW = $row['SUBMITTED'];}
    else{$BTN_SHOW = 0;}

    $COURSE = $row['COURSE'];
    $YLEVEL = $row['YLEVEL'];
    $COURSE_CODE = $row['COURSE_CODE'];
    $DESCRIPTIVE_TITLE = $row['DESCRIPTIVE_TITLE'];
    $SY = $row['SY'];
    $SEMESTER = $row['SEMESTER'];
    $DEPARTMENT = $row['DEPARTMENT'];
    $TOTAL_UNITS = $row['LEC'] + $row['LAB'];
    $NOT_TWICE = $COURSE.$YLEVEL.$COURSE_CODE.$SEMESTER.$SY;
    if(!in_array($NOT_TWICE,$printed_words)){
      $count++; 
      echo '
      <tr>
        <td>'.$count.'</td>
        <td class="COURSE">'.$COURSE.'</td>
        <td>'.$YLEVEL.'</td>
        <td class="COURSE_CODE">'.$COURSE_CODE.'</td>
        <td class="DESCRIPTIVE_TITLE">'.$DESCRIPTIVE_TITLE.'</td>
        <td>'.$SY.'</td>
        <td>'.$SEMESTER.'</td>
        <td>'.$DEPARTMENT.'</td>
        <td>
        <div class="btn-con">
        <a rel="tooltip" title="View Grade" id="<?php echo $ID; ?>" href="../views/view_grade_instructor.php?DEPARTMENT='.$DEPARTMENT.'&TOTAL_UNITS='.$TOTAL_UNITS.'&INSTRUCTOR_ID='.$INSTRUCTOR_ID.'&COURSE='.$COURSE.'&COURSE_CODE='.$COURSE_CODE.'&DESCRIPTIVE_TITLE='.$DESCRIPTIVE_TITLE.'&YLEVEL='.$YLEVEL.'&SEMESTER='.$SEMESTER.'&SY='.$SY.'&BTN_SHOW='.$BTN_SHOW.'">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16"> <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/> <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/> </svg>
        </a>
        </div>
        </td>
      </tr>
      ';
      $printed_words[] = $NOT_TWICE;
    }
    

  }
}
