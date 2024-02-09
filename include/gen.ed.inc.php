<?php
$count = 0;
$INSTRUCTOR_ID = $_SESSION['CURRENT_USERID'];

// query database for user

if (isset($_POST['searchSubject'])) {
  $COURSE = $_POST['COURSE'];
  $YLEVEL = $_POST['YLEVEL'];
  $SEMESTER = $_POST['SEMESTER'];
  $SY = $_POST['AY'];
  if($COURSE=='All' && $YLEVEL=='All' && $SEMESTER=='All' && $SY='All'){
    $COURSE = "";
    $YLEVEL = ""; 
    $SEMESTER = "";
    $SY = "";
    viewSubject($COURSE, $YLEVEL, $SEMESTER, $SY, 'ALL');
  }else{
    viewSubject($COURSE, $YLEVEL, $SEMESTER, $SY, 'SEARCH');
  }
  $remember = 1;
} elseif(!empty($_GET['COURSE']) && !empty($_GET['YLEVEL']) && !empty($_GET['SEMESTER']) && !empty($_GET['SY'])) {
  $COURSE = $_GET['COURSE'];
  $YLEVEL = $_GET['YLEVEL'];
  $SEMESTER = $_GET['SEMESTER'];
  $SY = $_GET['SY'];
  viewSubject($COURSE, $YLEVEL, $SEMESTER, $SY, 'SEARCH');

}else{
  $COURSE = "";
  $YLEVEL = ""; 
  $SEMESTER = "";
  $SY = "";
  viewSubject($COURSE, $YLEVEL, $SEMESTER, $SY, 'ALL');

}

function viewSubject($COURSE, $YLEVEL, $SEMESTER, $SY, $TYPE) {
$INSTRUCTOR_ID = $_SESSION['CURRENT_USERID'];

  include '../dbConnection/db.php';
  $count = 0;
 if ($TYPE == 'SEARCH'){
  $grade_query = mysqli_query($conn, "SELECT * FROM CURRICULUM WHERE DEPARTMENT='GEN. ED'");
 }elseif($TYPE='ALL'){
  $grade_query = mysqli_query($conn, "SELECT * FROM CURRICULUM WHERE DEPARTMENT='GEN. ED'");
 }

 if (mysqli_num_rows($grade_query) > 0) {
     $printed_words = array();

     while ($row = mysqli_fetch_assoc($grade_query)) {
         $COURSE = trim($row['COURSE']);
         $EFFECTIVE_YEAR = trim($row['EFFECTIVE_YEAR']);
         $DEPARTMENT = trim($row['DEPARTMENT']);
         $PROGRAM_ADVISER = trim($row['PROGRAM_ADVISER']);
         $ADVISER_ID = trim($row['ADVISER_ID']);
         $COMPARE = $COURSE. $SY. $DEPARTMENT. $PROGRAM_ADVISER;
         if (!in_array($COMPARE, $printed_words)) {
             $printed_words[] = $COMPARE;
             $count++; 
             if (empty($row['YLEVEL'])) {
               $row['YLEVEL'] = 'N/A';
             }
             if (empty($row['DEPARTMENT'])) {
               $row['DEPARTMENT'] = 'N/A';
             }
             echo '
             <tr>
               <td>'.$count.'</td>
               <td>'.$COURSE.'</td>
               <td>'.$EFFECTIVE_YEAR.'</td>
               <td>'.$DEPARTMENT.'</td>
               <td>'.$PROGRAM_ADVISER.'</td>
               <td class="btn-con">
               <a rel="tooltip" title="View Grade" id="<?php echo $ID; ?>" href="../views/viewcurriculum.php?COURSE='.$COURSE.'&EFFECTIVE_YEAR='.$EFFECTIVE_YEAR.'&DEPARTMENT='.$DEPARTMENT.'&ADVISER_ID='.$ADVISER_ID.'&PROGRAM_ADVISER='.$PROGRAM_ADVISER.'">
               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder-symlink" viewBox="0 0 16 16"> <path d="m11.798 8.271-3.182 1.97c-.27.166-.616-.036-.616-.372V9.1s-2.571-.3-4 2.4c.571-4.8 3.143-4.8 4-4.8v-.769c0-.336.346-.538.616-.371l3.182 1.969c.27.166.27.576 0 .742z"/> <path d="m.5 3 .04.87a1.99 1.99 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14h10.348a2 2 0 0 0 1.991-1.819l.637-7A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2zm.694 2.09A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09l-.636 7a1 1 0 0 1-.996.91H2.826a1 1 0 0 1-.995-.91l-.637-7zM6.172 2a1 1 0 0 1 .707.293L7.586 3H2.19c-.24 0-.47.042-.683.12L1.5 2.98a1 1 0 0 1 1-.98h3.672z"/> </svg>
               View&nbsp;Curriculum
               </a>
               </td>
             </tr>
             ';
         }
     }
 }
}
