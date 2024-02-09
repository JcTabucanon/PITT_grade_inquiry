<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="../stylesheet/homepage.css">
     <link rel="stylesheet" href="../stylesheet/top-nav.css">
     <link rel="stylesheet" href="../stylesheet/footer.css">
     <link rel="stylesheet" href="../stylesheet/sideBar.css">
     <link rel="stylesheet" href="../modal/stylesheet/uploadprofile.css">
     <link rel="stylesheet" href="../modal/stylesheet/update_accountMod.css">
     <title>Home</title>
  
</head>
<body>
     <?php 
          include_once '../templates/sideBar.php';
          // session_start();
     ?>
     <?php 
          $CURRENT_USERID = $_SESSION['CURRENT_USERID'];
          require_once '../dbConnection/db.php';


          $sql = "SELECT * FROM USERS WHERE USER_ID = '$CURRENT_USERID'";
          $result = mysqli_query($conn, $sql);
          while($row=mysqli_fetch_assoc($result)){
               $USERNAME = $row['USERNAME'];
               $FIRSTNAME = $row['FIRSTNAME'];    
               $MI = $row['MI'];
               $LASTNAME = $row['LASTNAME'];
               $TYPE = $row['SROLE'];
          }
          $sqlCurrentSY='SELECT * FROM ACADEMIC_YEAR WHERE ID=1';
          $result = mysqli_query($conn, $sqlCurrentSY);
          while($sqlCurrentSYrow=mysqli_fetch_assoc($result)){
               $CURRENT_SY = $sqlCurrentSYrow['CURRENT_SY'];
               $CURRENT_SEM = $sqlCurrentSYrow['CURRENT_SEM'];
          }

     ?>
     <?php include '../templates/nav.php';?>
     <div class="wrapper">
          <div class="margin_wrapper">


               <div class="can">
                    <div class="welcome">
                         <div class="wel-left">
                         <p>Welcome&nbsp;back,&nbsp;Professor&nbsp;<?php echo $_SESSION['CURRENT_LNAME'];?></p>
                         <p class="welcome-txt">Your grade sheet and courses base on the current academic year and semester.</p>
                         </div>
                         <div class="wel-right">
                              <button id="openModal_edit">
                                   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16"> <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"/> </svg>
                                        Update&nbsp;Account
                                   </button>
                              <?php include_once '../modal/html/update_popup.php'; ?>
                         </div>
                       
                    </div>
                    <div class="line"></div>
                    <div class="dashboard">
                         <h3>Dashbord</h3>
                    </div>
                    <div class="card-con">
                    <div class="grade_sheet">
                         <p class="con-text">Grade&nbsp;sheet</p>
                         <p class="con-num"><?php
                             include '../dbConnection/db.php';
                             $count = 0;
                         
                             $grade_query = mysqli_query($conn, "SELECT * FROM GRADE WHERE INSTRUCTOR_ID='$CURRENT_USERID' AND SEMESTER = '$CURRENT_SEM' AND SY='$CURRENT_SY'");
                              $printed_words = array();
                             while ($row = mysqli_fetch_array($grade_query)) {
                           
                               if (empty($row['COURSE'])) {$row['COURSE'] = 'N/A';}
                               if (empty($row['YLEVEL'])) {$row['YLEVEL'] = 'N/A';}
                               if (empty($row['COURSE_CODE'])) {$row['COURSE_CODE'] = 'N/A';}
                               if (empty($row['SY'])) {$row['SY'] = 'N/A';}
                               if (empty($row['SEMESTER'])) {$row['SEMESTER'] = 'N/A';}
                               if (empty($row['DEPARTMENT'])) {$row['DEPARTMENT'] = 'N/A';}
                           
                               $COURSE = $row['COURSE'];
                               $YLEVEL = $row['YLEVEL'];
                               $COURSE_CODE = $row['COURSE_CODE'];
                               $DESCRIPTIVE_TITLE = $row['DESCRIPTIVE_TITLE'];
                               $SY = $row['SY'];
                               $SEMESTER = $row['SEMESTER'];
                               $DEPARTMENT = $row['DEPARTMENT'];
                               $NOT_TWICE = $COURSE.$YLEVEL.$COURSE_CODE.$SEMESTER.$SY.$DEPARTMENT;
                               if(!in_array($NOT_TWICE,$printed_words)){
                                 $count +=1; 
                                 $printed_words[] = $NOT_TWICE;
                               }
                              }
                              echo $count;
                         ?><i>Total</i></p>
                    </div>

                    <div class="grade_sheet">
                         <p class="con-text">My&nbsp;course</p>
                         <p class="con-num"><?php
                             include '../dbConnection/db.php';
                             $count = 0;
                         
                             $grade_query = mysqli_query($conn, "SELECT * FROM GRADE WHERE INSTRUCTOR_ID='$CURRENT_USERID' AND SEMESTER = '$CURRENT_SEM' AND SY='$CURRENT_SY'");
                              $printed_words = array();
                             while ($row = mysqli_fetch_array($grade_query)) {
                           
                               if (empty($row['COURSE'])) {$row['COURSE'] = 'N/A';}
                               if (empty($row['YLEVEL'])) {$row['YLEVEL'] = 'N/A';}
                               if (empty($row['COURSE_CODE'])) {$row['COURSE_CODE'] = 'N/A';}
                               if (empty($row['SY'])) {$row['SY'] = 'N/A';}
                               if (empty($row['SEMESTER'])) {$row['SEMESTER'] = 'N/A';}
                               if (empty($row['DEPARTMENT'])) {$row['DEPARTMENT'] = 'N/A';}
                           
                               $COURSE = $row['COURSE'];
                               $YLEVEL = $row['YLEVEL'];
                               $COURSE_CODE = $row['COURSE_CODE'];
                               $DESCRIPTIVE_TITLE = $row['DESCRIPTIVE_TITLE'];
                               $SY = $row['SY'];
                               $SEMESTER = $row['SEMESTER'];
                               $DEPARTMENT = $row['DEPARTMENT'];
                               $NOT_TWICE = $COURSE.$YLEVEL.$COURSE_CODE.$SEMESTER.$SY.$DEPARTMENT;
                               if(!in_array($NOT_TWICE,$printed_words)){
                                 $count +=1; 
                                 $printed_words[] = $NOT_TWICE;
                               }
                              }
                              echo $count;
                         ?><i>Total</i></p>
                    </div>

                    <div class="grade_sheet">
                         <p class="con-text">My&nbsp;student</p>
                         <p class="con-num"><?php
                             include '../dbConnection/db.php';
                             $count = 0;
                         
                             $grade_query = mysqli_query($conn, "SELECT * FROM GRADE WHERE INSTRUCTOR_ID='$CURRENT_USERID' AND SEMESTER = '$CURRENT_SEM' AND SY='$CURRENT_SY'");
                              $printed_words = array();
                             while ($row = mysqli_fetch_array($grade_query)) {
                           
                               if (empty($row['SCHOOL_ID'])) {$row['SCHOOL_ID'] = 'N/A';}
                               if (empty($row['YLEVEL'])) {$row['YLEVEL'] = 'N/A';}
                              //  if (empty($row['COURSE_CODE'])) {$row['COURSE_CODE'] = 'N/A';}
                               if (empty($row['SY'])) {$row['SY'] = 'N/A';}
                               if (empty($row['SEMESTER'])) {$row['SEMESTER'] = 'N/A';}
                               if (empty($row['DEPARTMENT'])) {$row['DEPARTMENT'] = 'N/A';}
                           
                               $SCHOOL_ID = $row['SCHOOL_ID'];
                               $YLEVEL = $row['YLEVEL'];
                              //  $COURSE_CODE = $row['COURSE_CODE'];
                               $DESCRIPTIVE_TITLE = $row['DESCRIPTIVE_TITLE'];
                               $SY = $row['SY'];
                               $SEMESTER = $row['SEMESTER'];
                               $DEPARTMENT = $row['DEPARTMENT'];
                               $NOT_TWICE = $SCHOOL_ID.$YLEVEL.$SEMESTER.$SY.$DEPARTMENT;
                               if(!in_array($NOT_TWICE,$printed_words)){
                                 $count +=1; 
                                 $printed_words[] = $NOT_TWICE;
                               }
                              }
                              echo $count;
                         ?><i>Total</i></p>
                    </div>

                    <div class="grade_sheet">
                         <p class="con-text">Submitted&nbsp;grades</p>
                         <p class="con-num"><?php
                             include '../dbConnection/db.php';
                             $count = 0;
                         
                             $grade_query = mysqli_query($conn, "SELECT * FROM GRADE WHERE INSTRUCTOR_ID='$CURRENT_USERID' AND SEMESTER = '$CURRENT_SEM' AND SY='$CURRENT_SY' AND SUBMITTED=1");
                              $printed_words = array();
                             while ($row = mysqli_fetch_array($grade_query)) {
                           
                               if (empty($row['COURSE_CODE'])) {$row['COURSE_CODE'] = 'N/A';}
                               if (empty($row['YLEVEL'])) {$row['YLEVEL'] = 'N/A';}
                               if (empty($row['SY'])) {$row['SY'] = 'N/A';}
                               if (empty($row['SEMESTER'])) {$row['SEMESTER'] = 'N/A';}
                               if (empty($row['DEPARTMENT'])) {$row['DEPARTMENT'] = 'N/A';}
                           
                              //  $SCHOOL_ID = $row['SCHOOL_ID'];
                               $YLEVEL = $row['YLEVEL'];
                               $COURSE_CODE = $row['COURSE_CODE'];
                               $DESCRIPTIVE_TITLE = $row['DESCRIPTIVE_TITLE'];
                               $SY = $row['SY'];
                               $SEMESTER = $row['SEMESTER'];
                               $DEPARTMENT = $row['DEPARTMENT'];
                               $NOT_TWICE = $COURSE_CODE.$YLEVEL.$SEMESTER.$SY.$DEPARTMENT;
                               if(!in_array($NOT_TWICE,$printed_words)){
                                 $count +=1; 
                                 $printed_words[] = $NOT_TWICE;
                               }
                              }
                              echo $count;
                         ?><i>Total</i></p>
                    </div>
                    
                    </div>

                    <div class="card-con">
                    <div class="important_info">
                         <p class="important_text">GRADE&nbsp;INFO</p>

                         <div class="important_flex">
                         <p class="imp_flex_text">STUDENT&nbsp;BY&nbsp;COURSE</p>
                         <p class="important-num"><?php
                             include '../dbConnection/db.php';
                             $count = 0;
                         
                             $grade_query = mysqli_query($conn, "SELECT * FROM GRADE WHERE INSTRUCTOR_ID='$CURRENT_USERID' AND SEMESTER = '$CURRENT_SEM' AND SY='$CURRENT_SY'");
                              $printed_words = array();
                             while ($row = mysqli_fetch_array($grade_query)) {
                           
                               if (empty($row['COURSE'])) {$row['COURSE'] = 'N/A';}
                               if (empty($row['YLEVEL'])) {$row['YLEVEL'] = 'N/A';}
                               if (empty($row['COURSE_CODE'])) {$row['COURSE_CODE'] = 'N/A';}
                               if (empty($row['SY'])) {$row['SY'] = 'N/A';}
                               if (empty($row['SEMESTER'])) {$row['SEMESTER'] = 'N/A';}
                               if (empty($row['DEPARTMENT'])) {$row['DEPARTMENT'] = 'N/A';}
                           
                               $COURSE = $row['COURSE'];
                               $YLEVEL = $row['YLEVEL'];
                               $COURSE_CODE = $row['COURSE_CODE'];
                               $DESCRIPTIVE_TITLE = $row['DESCRIPTIVE_TITLE'];
                               $SY = $row['SY'];
                               $SEMESTER = $row['SEMESTER'];
                               $DEPARTMENT = $row['DEPARTMENT'];
                               $NOT_TWICE = $COURSE.$COURSE_CODE.$YLEVEL.$SEMESTER.$SY.$DEPARTMENT;
                               if(!in_array($NOT_TWICE,$printed_words)){
                                 $count +=1; 
                              //    $printed_words[] = $NOT_TWICE;
                               }
                              }
                              echo $count;
                         ?><i>Total</i></p>
                         </div>

                         <div class="important_flex">
                         <p class="imp_flex_text">GRADED&nbsp;MID-TERM</p>
                         <p class="important-num"><?php
                             include '../dbConnection/db.php';
                             $count = 0;
                         
                             $grade_query = mysqli_query($conn, "SELECT * FROM GRADE WHERE INSTRUCTOR_ID='$CURRENT_USERID' AND SEMESTER = '$CURRENT_SEM' AND SY='$CURRENT_SY'");
                              $printed_words = array();
                             while ($row = mysqli_fetch_array($grade_query)) {
                           
                               if (empty($row['COURSE'])) {$row['COURSE'] = 'N/A';}
                               if (empty($row['YLEVEL'])) {$row['YLEVEL'] = 'N/A';}
                               if (empty($row['COURSE_CODE'])) {$row['COURSE_CODE'] = 'N/A';}
                               if (empty($row['SY'])) {$row['SY'] = 'N/A';}
                               if (empty($row['SEMESTER'])) {$row['SEMESTER'] = 'N/A';}
                               if (empty($row['DEPARTMENT'])) {$row['DEPARTMENT'] = 'N/A';}
                           
                               $COURSE = $row['COURSE'];
                               $YLEVEL = $row['YLEVEL'];
                               $COURSE_CODE = $row['COURSE_CODE']; 
                               $DESCRIPTIVE_TITLE = $row['DESCRIPTIVE_TITLE'];
                               $SY = $row['SY'];
                               $SEMESTER = $row['SEMESTER'];
                               $DEPARTMENT = $row['DEPARTMENT'];
                               $NOT_TWICE = $COURSE.$COURSE_CODE.$YLEVEL.$SEMESTER.$SY.$DEPARTMENT;
                               if(!in_array($NOT_TWICE,$printed_words)){
                                 $count +=1; 
                               }
                              }
                              $sum = 0;
                              $TRUE = TRUE;
                              $grade_query = mysqli_query($conn, "SELECT * FROM GRADE WHERE INSTRUCTOR_ID='$CURRENT_USERID' AND SEMESTER = '$CURRENT_SEM' AND SY='$CURRENT_SY'");
                               $printed_words = array();
                              while ($row = mysqli_fetch_array($grade_query)) {
                            
                                if (empty($row['MID_TERM'])) {$row['MID_TERM'] = 0;}
                                $MID_TERM = $row['MID_TERM'];
                                if($MID_TERM>0){
                                  $sum +=1; 
                                }
                               }
                               if($count>0){
                                   $percentage=(($sum/$count)*100);
                                   $rounded = round($percentage,1);
                               }else{
                                   $rounded = 0;
                               }
                 
                               echo $rounded;
                         ?><i>%</i></p>
                         </div>

                         <div class="important_flex">
                         <p class="imp_flex_text">GRADED&nbsp;FINAL-TERM</p>
                         <p class="important-num"><?php
                             include '../dbConnection/db.php';
                             $count = 0;
                         
                             $grade_query = mysqli_query($conn, "SELECT * FROM GRADE WHERE INSTRUCTOR_ID='$CURRENT_USERID' AND SEMESTER = '$CURRENT_SEM' AND SY='$CURRENT_SY'");
                              $printed_words = array();
                             while ($row = mysqli_fetch_array($grade_query)) {
                           
                               if (empty($row['COURSE'])) {$row['COURSE'] = 'N/A';}
                               if (empty($row['YLEVEL'])) {$row['YLEVEL'] = 'N/A';}
                               if (empty($row['COURSE_CODE'])) {$row['COURSE_CODE'] = 'N/A';}
                               if (empty($row['SY'])) {$row['SY'] = 'N/A';}
                               if (empty($row['SEMESTER'])) {$row['SEMESTER'] = 'N/A';}
                               if (empty($row['DEPARTMENT'])) {$row['DEPARTMENT'] = 'N/A';}
                           
                               $COURSE = $row['COURSE'];
                               $YLEVEL = $row['YLEVEL'];
                               $COURSE_CODE = $row['COURSE_CODE']; 
                               $DESCRIPTIVE_TITLE = $row['DESCRIPTIVE_TITLE'];
                               $SY = $row['SY'];
                               $SEMESTER = $row['SEMESTER'];
                               $DEPARTMENT = $row['DEPARTMENT'];
                               $NOT_TWICE = $COURSE.$COURSE_CODE.$YLEVEL.$SEMESTER.$SY.$DEPARTMENT;
                               if(!in_array($NOT_TWICE,$printed_words)){
                                 $count +=1; 
                               }
                              }
                              $sum = 0;
                              $TRUE = TRUE;
                              $grade_query = mysqli_query($conn, "SELECT * FROM GRADE WHERE INSTRUCTOR_ID='$CURRENT_USERID' AND SEMESTER = '$CURRENT_SEM' AND SY='$CURRENT_SY'");
                               $printed_words = array();
                              while ($row = mysqli_fetch_array($grade_query)) {
                            
                                if (empty($row['FINAL_TERM'])) {$row['FINAL_TERM'] = 0;}
                                $FINAL_TERM = $row['FINAL_TERM'];
                                if($FINAL_TERM>0){
                                  $sum +=1; 
                                }
                               }
                               if($count>0){
                                   $percentage=(($sum/$count)*100);
                                   $rounded = round($percentage,1);
                               }else{
                                   $rounded = 0;
                               }
                               echo $rounded;
                         ?><i>%</i></p>
                         </div>

                    </div>
                    
                    </div>
  
               </div>
          </div>
     </div>
<?php include_once '../templates/footer.php';?>

<script>
     function toggleDropdown() {
     //for the sidebar-------------------------------
          dropdown = document.getElementById("dropdown");
          var arrow = document.querySelector(".downarrow svg");
          var paragraph = document.querySelector(".sidebar-btn p");
          var svg = document.querySelector(".sidebar-btn svg");
          var activeSidebtn = document.querySelector(".activeSidebtn_home");
          var activeSidesvg = document.querySelector(".activeSidebtn_home svg");
          var activetext = document.querySelector(".activeSidebtn_home p");

          var downarrow = document.querySelector(".downarrow svg");

          if (dropdown.style.display === "none") {
          dropdown.style.transition = "opacity 0.5s ease, transform 0.5s ease, visibility 0s linear 0.5s";
          dropdown.style.display = "block";
          arrow.style.color = "#6c72ff";
          paragraph.style.color = "#6c72ff"; 
          svg.style.color = "#6c72ff";
          activeSidebtn.style.backgroundColor = "#080f25";
          activeSidebtn.style.borderColor = 'transparent';
          activeSidesvg.style.color = "#aeb9e1";
          activetext.style.color = "#aeb9e1";
          downarrow.style.transform = "rotate(-90deg)";
          downarrow.style.transition = "transform 0.3s ease";
          } else {
          dropdown.style.display = "none";
          dropdown.style.transition = "opacity 0.5s ease, transform 0.5s ease, visibility 0s linear 0.5s";
          arrow.style.color = "#aeb9e1";
          svg.style.color = "#aeb9e1";  
          paragraph.style.color = "#aeb9e1"; 
          activeSidebtn.style.backgroundColor = '#212c4d';
          activeSidebtn.style.borderColor = '#6c72ff';
          activeSidesvg.style.color = 'white';
          activetext.style.color = 'white';
          downarrow.style.transform = "rotate(0deg)";
          }
     }

</script>

<script src="../modal/javascript/update_account_modal.js"></script>