<?php
include_once '../dbConnection/db.php';

     if (isset($_POST['delete'])) {
          if(!empty($_POST['id']) && !empty($_POST['COURSE']) && !empty($_POST['YLEVEL'])){
               $id = $_POST['id'];
               $COURSE = $_POST['COURSE'];
               $YLEVEL = $_POST['YLEVEL'];
               $SEMESTER = $_POST['SEMESTER'];
               $AY = $_POST['AY'];
               
               // delete record from database
               $sql = "DELETE FROM CURRICULUM WHERE ID = '$id'";
               $result = mysqli_query($conn, $sql);
               
               // check if delete was successful
               if($result){
                    // redirect back to curriculum list page
                    header("location:../views/viewcurriculum.php?COURSE=$COURSE&YLEVEL=$YLEVEL&SEMESTER=$SEMESTER&AY=$AY");
                    exit();
                } else {
                    echo "Error deleting record: " . mysqli_error($conn);
                }
                
          } else {
               echo "Invalid request.";
               }
     }
     mysqli_close($conn);
