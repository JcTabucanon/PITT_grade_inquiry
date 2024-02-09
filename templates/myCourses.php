<?php
     function headache($COURSE,$YLEVEL,$SEMESTER,$AY){
          include_once '../dbConnection/db.php';
          $user_id = $_SESSION['$CURRENT_USERID'];
          $sql = "SELECT * from CURRICULUM WHERE ADVISER_ID = '$user_id' AND COURSE = '$COURSE' AND YLEVEL = '$YLEVEL' AND SEMESTER = '$SEMESTER' AND SY = '$AY'";
          $result = mysqli_query($conn, $sql);
          if(mysqli_num_rows($result) > 0) {
              return $hide = 'display:none;';
          }
     }