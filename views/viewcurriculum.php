<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>View | Curriculum</title>
  <link rel="stylesheet" href="../stylesheet/footer.css">
  <link rel="stylesheet" href="../stylesheet/alert.css">
  <link rel="stylesheet" href="../modal/stylesheet/curEdit_modal.css">
  <link rel="stylesheet" href="../stylesheet/viewcurriculum.css">
  <link rel="stylesheet" href="../stylesheet/top-nav.css">
  <link rel="stylesheet" href="../stylesheet/sideBar.css">
</head>
<body>
     <?php include_once '../templates/sideBar.php';?>
     <?php 
          if(!empty($_GET['COURSE']) && !empty($_GET['EFFECTIVE_YEAR'])&&!empty($_GET['DEPARTMENT']) && !empty($_GET['ADVISER_ID']) && !empty($_GET['PROGRAM_ADVISER'])){
               $COURSE = $_GET['COURSE'];
               $EFFECTIVE_YEAR = $_GET['EFFECTIVE_YEAR'];
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
     <?php include_once '../templates/nav.php';?>
     <div class="wrapper">
     <div class="margin_wrapper">

          <div class="container">
               
               <div class = "c-con">
                    
                
                    <div class="btn-container">
                         <div class="btn-wrapper">
                              <a href="technology.php" title="Return previus page">
                                   <button class="view">
                                   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-90deg-left" viewBox="0 0 16 16"> <path fill-rule="evenodd" d="M1.146 4.854a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H12.5A2.5 2.5 0 0 1 15 6.5v8a.5.5 0 0 1-1 0v-8A1.5 1.5 0 0 0 12.5 5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4z"/> </svg>
                                   </button>
                              </a>
                     
                              <a href="../views/addCurriculum.php?COURSE=<?php echo $_GET['COURSE'];?>&EFFECTIVE_YEAR=<?php echo $_GET['EFFECTIVE_YEAR'];?>&DEPARTMENT=<?php echo $_GET['DEPARTMENT'];?>">
                                   <button class="delete">
                                   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16"> <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/> <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/> </svg>
                                   Create&nbsp;New&nbsp;Curriculum
                                   </button>
                              </a>
                         </div>
                    </div>

                    <div class="heading">
                         <div class="heading-text">
                         <p>Republic&nbsp;of&nbsp;the&nbsp;Philippines</p>
                         <p class="h-1">PALOMPON&nbsp;INSTITUTE&nbsp;OF&nbsp;TECHNOLOGY&nbsp;TABANGO</p>
                         <p>Tabango,&nbsp;Leyte</p>
                         <p class="h-2">INFORMATION&nbsp;AND&nbsp;COMMUNICATION&nbsp;DEPARTMENT</p>
                         <p class="course-t"><?php echo $COURSE_TITLE;?></p>
                         <p class="effective-t">Effective: SY&nbsp;<?php echo $EFFECTIVE_YEAR;?></p>

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
                              <?php include_once '../include/viewcurriculum.inc.php';?>
                         </tbody>
                    </table>

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
          var activesvg = document.querySelector(".active_btn .btn_icon svg");
          var activetext = document.querySelector(".active_btn p");

          if (dropdown.style.display === "none") {
          dropdown.style.display = "block";
          arrow.style.color = "#17a2b8";
          paragraph.style.color = "darkcyan"; 
          svg.style.color = "darkcyan";
          activesvg.style.color = "black";
          activetext.style.color = "black";
          } else {
          dropdown.style.display = "none";
          arrow.style.color = "black";
          svg.style.color = "black"; 
          paragraph.style.color = "black"; 
          activesvg.style.color = '#17a2b8';
          activetext.style.color = "#17a2b8";

          }
     }
</script>
