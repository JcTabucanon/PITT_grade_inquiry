<?php
$COURSE_TITLE = "";
if (!empty($_GET['COURSE']) && !empty($_GET['SY']) && !empty($_GET['DEPARTMENT']) && !empty($_GET['ADVISER_ID']) && !empty($_GET['PROGRAM_ADVISER'])) {
     $COURSE = $_GET['COURSE'];
     $SY = $_GET['SY'];
     $DEPARTMENT = $_GET['DEPARTMENT'];
     $ADVISER_ID = $_GET['ADVISER_ID'];
     $PROGRAM_ADVISER = $_GET['PROGRAM_ADVISER'];
     if ($COURSE == 'BSIT') {
          $COURSE_TITLE = 'Bachelor of Science in Information Technology (BSIT)';
     } elseif ($COURSE == 'BSFi') {
          $COURSE_TITLE = 'Bachelor of Science in Fisheries (BSFi)';
     } elseif ($COURSE == '(BSHM)') {
          $COURSE_TITLE = 'Bachelor of Science in Hospitality Management (BSHM)';
     }
     
}

?>


<?php include "registrar.php"?>
<link rel="stylesheet" href="assets/viewcurriculum.css">
<div class="wrapper1">
     <div class="margin_wrapper">
          <div class="container">
               <div class="c-con">
                    <table class="table table-bordered">
                         <thead>
                              <tr class="row-height">
                                   <th scope="col">No.</th>
                                   <th scope="col">CORSE&nbsp;CODE</th>
                                   <th scope="col">COURSE&nbsp;TITLE</th>
                                   <th scope="col">LEC</th>
                                   <th scope="col">LAB</th>
                                   <th scope="col">PRE-REQUISITE</th>
                              </tr>
                         </thead>
                         <tbody>
                              <?php include_once 'includes/viewcurriculum.inc.php'; ?>
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