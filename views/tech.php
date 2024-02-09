<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="../stylesheet/technology.css">
     <link rel="stylesheet" href="../stylesheet/footer.css">
     <link rel="stylesheet" href="../stylesheet/top-nav.css">
     <link rel="stylesheet" href="../stylesheet/sideBar.css">
     <title>Department | Technology</title>
</head>
<body>
     <?php 
          include_once '../templates/nav.php';
          $current_year = date("Y");
     ?>
     <div class="wrapper">
          <div class="margin_wrapper">

               <?php include_once '../templates/sideBar.php';?>
               
               <div class="can">
               <div class="dashboard">
                         <h3>Technology Department</h3>
                    </div>
                    <div class="card_wrapper">
                         <!-- start -->
                         <?php include_once '../templates/technology/bsit.php';?>
                          <!-- end ---------->
                         <!-- start -->
                         <?php include_once '../templates/technology/bsint-mechanical.php';?>
                         <!-- end ---------->
                         <!-- start -->
                         <?php include_once '../templates/technology/bsint-foodtect.php';?>
                         <!-- end ---------->
                         <!-- BSInt-Electrical -->
                         <?php include_once '../templates/technology/bsint-electrical.php';?>
                          <!-- BSInt-Electrical ---------->
                         <!-- BSInt-Automotive -->
                         <?php include_once '../templates/technology/bsint-automotive.php';?>
                         <!-- BSInt-Automotive ---------->
                         <!-- BSHM -->
                         <?php include_once '../templates/technology/bshm.php';?>
                         <!-- BSHM ---------->
                    </div>
                    </div>
               </div>
          </div>
     </div>

<?php 
     include_once '../templates/footer.php';
?>