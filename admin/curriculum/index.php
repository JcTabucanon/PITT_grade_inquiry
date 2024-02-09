
  <link rel="stylesheet" href="assets/viewcurriculum.css">


     <?php 
          if(!empty($_GET['COURSE']) && !empty($_GET['SY'])&&!empty($_GET['DEPARTMENT']) && !empty($_GET['ADVISER_ID']) && !empty($_GET['PROGRAM_ADVISER'])){
               $COURSE = $_GET['COURSE'];
               $SY = $_GET['SY'];
               $DEPARTMENT = $_GET['DEPARTMENT'];
               $ADVISER_ID = $_GET['ADVISER_ID'];
               $PROGRAM_ADVISER = $_GET['PROGRAM_ADVISER'];
               if($COURSE == 'BSIT'){
                    $COURSE_TITLE = 'Bachelor of Science in Information Technology (BSIT)';
               }elseif($COURSE == 'BSFi'){
                    $COURSE_TITLE = 'Bachelor of Science in Fisheries (BSFi)';
               }elseif($COURSE == '(BSHM)'){
                    $COURSE_TITLE = 'Bachelor of Science in Hospitality Management (BSHM)';
               }
          }

     ?>  
     <div class="wrapper">
     <div class="margin_wrapper">

          <div class="container">
               
               <div class = "c-con">
                    
                
                    <!-- <div class="btn-container">
                         <div class="btn-wrapper">
                              <a href="viewstudents.php?COURSE=<?php echo $COURSE;?>&SY=<?php echo $SY?>&DEPARTMENT=<?php echo $DEPARTMENT?>&AY=<?php echo $PROGRAM_ADVISER?>">
                                   <button class="view">
                                   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16"> <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/> <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/> </svg>
                                   View Enrolled List
                                   </button>
                              </a>
                              <a href="../views/addCurriculum.php?COURSE=<?php echo $_GET['COURSE'];?>&SY=<?php echo $_GET['SY'];?>&DEPARTMENT=<?php echo $_GET['DEPARTMENT'];?>&AY=<?php echo $_GET['SY'];?>">
                                   <button class="delete">
                                   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16"> <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/> <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/> </svg>
                                   Add Curriculum
                                   </button>
                              </a>
                         </div>
                    </div> -->

                    <div class="heading">
                         <div class="heading-text">
                         <p>Republic&nbsp;of&nbsp;the&nbsp;Philippines</p>
                         <p class="h-1">PALOMPON&nbsp;INSTITUTE&nbsp;OF&nbsp;TECHNOLOGY&nbsp;TABANGO</p>
                         <p>Tabango,&nbsp;Leyte</p>
                         <p class="h-2">INFORMATION&nbsp;AND&nbsp;COMMUNICATION&nbsp;DEPARTMENT</p>
                         <p class="course-t"><?php echo $COURSE_TITLE;?></p>
                         <p class="effective-t">Effective: SY<?php echo $SY;?></p>

                         </div>

                    </div>

                    <table class="table">
                         <thead>
                              <tr>
                                   <th scope="col">No.</th>
                                   <th scope="col">CORSE&nbsp;CODE</th>
                                   <th scope="col">COURSE&nbsp;TITLE</th>
                                   <th scope="col">LEC</th>
                                   <th scope="col">LAB</th>
                                   <th scope="col">PRE-REQUISITE</th>
                                   <!-- <th scope="col">ACTION</th>    -->
                              </tr>
                         </thead>
                         <tbody>
                              <?php include_once 'includes/viewcurriculum.inc.php';?>
                         </tbody>
                    </table>
                    <!-- add  -->  
                    <?php 
                         // include_once '../modal/curEdit_popup.php'
                         ?>

                    <!-- add  -->

               </div>
          </div>

     </div>   
     </div>   

  
<!-- <script src="../modal/javascript/curEdit_modal.js"></script> -->
