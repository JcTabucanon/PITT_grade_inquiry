<?php
  if (empty($_GET['COURSE'])){
    $_GET['COURSE'] = '';
  }
  if (empty($_GET['YLEVEL'])){
    $_GET['YLEVEL'] = '';
  }
  if (empty($_GET['SEMESTER'])){
    $_GET['SEMESTER'] = '';
  }
  if (empty($_GET['AY'])){
    $_GET['AY'] = '';
  }


     $sql = "SELECT * from LISTING WHERE SROLE='INSTRUCTOR'";
     $result=mysqli_query($conn,$sql);
      if($result){
        while($row=mysqli_fetch_assoc($result)){
          $INSTRUCTOR_ID=$row['SCHOOL_ID'];
          $FIRSTNAME=$row['FIRSTNAME'];
          $MI=$row['MI'];
          $LASTNAME=$row['LASTNAME'];
          $GENDER=$row['GENDER'];
          $fname = $FIRSTNAME." ".$MI." ".$LASTNAME;
          echo '
          <tr class="tr-rows">
              
              <td>'.$INSTRUCTOR_ID.'</td>
              <td>'.$fname.'</td>
              <td>'.$GENDER.'</td>
              
                <td style="text-align: center;">
                  <a href="addCurriculum.php?selected='.$INSTRUCTOR_ID.'&COURSE='.$_GET['COURSE'].'&YLEVEL='.$_GET['YLEVEL'].'&SEMESTER='.$_GET['SEMESTER'].'&AY='.$_GET['AY'].'" class="text-light"><button class="btn">Add</button></a>
                </td>
          </tr>';
          
        }
      }
