<?php
if (isset($_POST['search'])) {
    $INSTRUCTOR_ID = $_SESSION['CURRENT_USERID'];
    $COURSE = $_POST['COURSE'];
    $COURSE_CODE = $_POST['COURSE_CODE'];
    $YLEVEL = $_POST['YLEVEL'];
    $SEMESTER = $_POST['SEMESTER'];
    $SY = $_POST['AY'];
    viewGrade($INSTRUCTOR_ID, $COURSE, $COURSE_CODE, $YLEVEL, $SEMESTER, $SY);
}elseif(!empty($_GET['INSTRUCTOR_ID']) && !empty($_GET['COURSE']) && !EMPTY($_GET['COURSE_CODE']) && !empty($_GET['YLEVEL']) && !empty($_GET['SEMESTER']) && !empty($_GET['SY'])){
  $INSTRUCTOR_ID = $_GET['INSTRUCTOR_ID'];
  $COURSE = $_GET['COURSE'];
  $COURSE_CODE = $_GET['COURSE_CODE'];
  $YLEVEL = $_GET['YLEVEL'];
  $SEMESTER = $_GET['SEMESTER'];
  $SY = $_GET['SY'];
  viewGrade($INSTRUCTOR_ID, $COURSE, $COURSE_CODE, $YLEVEL, $SEMESTER, $SY);
}
  function viewGrade($INSTRUCTOR_ID, $COURSE, $COURSE_CODE, $YLEVEL, $SEMESTER, $SY){
    $count = 0;
    include '../dbConnection/db.php';
    $sql = "SELECT * FROM GRADE WHERE COURSE='$COURSE' AND INSTRUCTOR_ID='$INSTRUCTOR_ID' AND COURSE_CODE='$COURSE_CODE' AND YLEVEL='$YLEVEL' AND SEMESTER='$SEMESTER' AND SY='$SY'";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $count +=1;
        $COURSE = $row['COURSE'];
        $SY = $row['SY'];
        $COURSE_CODE = $row['COURSE_CODE'];
        $DESCRIPTIVE_TITLE = $row['DESCRIPTIVE_TITLE'];
        $YLEVEL = $row['YLEVEL'];
        $SEMESTER = $row['SEMESTER'];
        $FIRSTNAME = $row['FIRSTNAME'];
        $LASTNAME = $row['LASTNAME'];
        $MI = $row['MI'];
        $ID = $row['SCHOOL_ID'];
        if (empty($row['MID_TERM'])) {
          $row['MID_TERM'] = '';
        }
        if (empty($row['FINAL_TERM'])) {
          $row['FINAL_TERM'] = '';
        }
        if(!empty($row['SUBMITTED'])){
          $VIEW_EDIT = $row['SUBMITTED'];
        }else{
          $VIEW_EDIT = 0;
        }
        $MID_TERM = $row['MID_TERM'];
        $FINAL_TERM = $row['FINAL_TERM'];
        $COURSE_CODE = $row['COURSE_CODE'];
        $DESCRIPTIVE_TITLE = $row['DESCRIPTIVE_TITLE'];
        $GEN_AVE = $row['GEN_AVE'];
  
        $avg = $GEN_AVE;
  
        if ($avg >= 1.0 && $avg <= 3.2) {
          $REMARKS = "Passed";
        } else if ($avg >= 3.3 && $avg <= 4.2) {
          $REMARKS = "Conditional";
        } else if ($avg >= 4.3 && $avg <= 5.0) {
          $REMARKS = "Failed";
        } else {
          $REMARKS = "";
        }
        echo '<tr>
          <td>'.$count.'</td>
          <input type="hidden" name="STUDENT_ID['.$count.']" value="'.$ID.'">
          <input type="hidden" name="SEMESTER['.$count.']" value="'.$SEMESTER.'">
          <input type="hidden" name="SY['.$count.']" value="'.$SY.'">
          <input type="hidden" name="INSTRUCTOR_ID['.$count.']" value="'.$INSTRUCTOR_ID.'">

          <td class="grade-name">'.$FIRSTNAME.' '. $MI. ' '. $LASTNAME.'</td>
          <input type="hidden" name="COURSE['.$count.']" value="'.$COURSE.'">
          
          <input type="hidden" name="YLEVEL['.$count.']" value="'.$YLEVEL.'">

          <input type="hidden" name="COURSE_CODE['.$count.']" value="'.$COURSE_CODE.'">
          ';
          if($VIEW_EDIT == 1){
            echo '
            <input hidden name="MID_TERM['.$count.']" id="MID_TERM'.$ID.'" value="'.$MID_TERM.'" class="midTerm" oninput="computeFinalGrade('.$ID.')">
            <input hidden name="FINAL_TERM['.$count.']" type="text" id="FINAL_TERM'.$ID.'" value="'.$FINAL_TERM.'" class="midTerm" oninput="computeFinalGrade('.$ID.')">
            <input hidden name="GEN_AVE['.$count.']" type="disabled" id="GEN_AVE'.$ID.'" value="'.$GEN_AVE.'" class="midTerm remarks" oninput="computeFinalGrade('.$ID.')">
            <td>'.$MID_TERM.'</td>
            <td>'.$FINAL_TERM.'</div></td>
            <td>'.$GEN_AVE.'</td>
            ';
          }elseif($VIEW_EDIT == 0){
            echo '
            <td class="flex"><div class="cent"><input name="MID_TERM['.$count.']" type="text" id="MID_TERM'.$ID.'" value="'.$MID_TERM.'" class="midTerm" oninput="computeFinalGrade('.$ID.')" ></div></td>
            <td class="flex"><div class="cent"><input name="FINAL_TERM['.$count.']" type="text" id="FINAL_TERM'.$ID.'" value="'.$FINAL_TERM.'" class="midTerm" oninput="computeFinalGrade('.$ID.')"></div></td>
            <td class="flex"><div class="cent"><input name="GEN_AVE['.$count.']" type="disabled" id="GEN_AVE'.$ID.'" value="'.$GEN_AVE.'" class="midTerm remarks" oninput="computeFinalGrade('.$ID.')"></div></td>
            ';
        }
          
        echo '
          
          <td name="REMARKS['.$count.']" value="'.$REMARKS.'" class="avg">'.$REMARKS.'</td>
          </tr>';

        }
        echo '
          <input type="hidden" name="COUNT" value="'.$count.'">
        ';
      }
  }
?>
<script>
    function computeFinalGrade(ID) {
        var MID_TERM = parseFloat(document.getElementById("MID_TERM" + ID).value);
        var FINAL_TERM = parseFloat(document.getElementById("FINAL_TERM" + ID).value);
        var ave = ((MID_TERM + FINAL_TERM) / 2).toFixed(1);
        document.getElementById("GEN_AVE" + ID).value = ave;
    }
    computeFinalGrade();

    function getGrade(avg) {
        if (avg >= 1.0 && avg <= 3.2) {
            return "Passed";
        } else if (avg >= 3.3 && avg <= 4.2) {
            return "Conditional";
        } else if (avg >= 4.3 && avg <= 5.0) {
            return "Failed";
        } else {
            return "";
        }
    }
</script>









