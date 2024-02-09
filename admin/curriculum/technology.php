<?php include "registrar.php"?>

    <link rel="stylesheet" href="assets/technology.css">

    <style>
	.wrapper1
	{
		background-color: #0b1a2c !important;

	}
	.btn-container{
		background-color: #0b1a2c !important;
	}
	.table{
		background-color: white;
	}
    h3{
        color: white;
    }
</style>

    <?php
    $CURRENT_ID = $_SESSION['CURRENT_USERID'];
    if (!empty($_GET['COURSE']) || !empty($_GET['YLEVEL']) || !empty($_GET['SEMESTER']) || !empty($_GET['AY'])) {
        if(!empty($_GET['COURSE'])){
            $COURSE = $_GET['COURSE'];
        }else{
            $COURSE = '';
        }
        if(!empty($_GET['YLEVEL'])){
            $YLEVEL = $_GET['YLEVEL'];
        }else{
            $YLEVEL = '';
        }
        if(!empty($_GET['SEMESTER'])){
            $SEMESTER = $_GET['SEMESTER'];
        }else{
            $SEMESTER = '';
        }
        if(!empty($_GET['AY'])){
            $AY = $_GET['AY'];
        }else{
            $AY = '';
        }
        // for grade lvl
        if ($YLEVEL == 1) {
            $LEVEL = 'First Year';
        } elseif ($YLEVEL == 2) {
            $LEVEL = 'Second Year';
        } elseif ($YLEVEL == 3) {
            $LEVEL = 'Third Year';
        } elseif ($YLEVEL == 4) {
            $LEVEL = 'Fourth Year';
        } else{
            $LEVEL = 'All';
        }
        if ($SEMESTER == "1st") {
            $SEM = "First Semester";
        } elseif ($SEMESTER == "2nd") {
            $SEM = "Second Semester";
        } else{
            $SEM = "All";
        }
    }else{
        $COURSE = 'All';
        $SEMESTER = 'All';
        $AY = 'All';
        $YLEVEL = 'All';
    }

    ?>
    <div class="wrapper1">

        <div class="margin_wrapper">
        <?php include_once 'inc/navigation.php';?>
            <div class="canyon">
                <div class="btn-container">

                    <!-- for search  -->
                   
                    <!-- for search  -->
                    <h3>TECHNOLOGY DEPARTMENT</h3>
              
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>COURSE</th>
                            <th>EFFECTIVE&nbsp;S.Y.</th>
                            <th>DEPARTMENT</th>
                            <th>PROGRAM&nbsp;ADVISER</th>
                            <th>ACTION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php include 'includes/technology.inc.php';?>
                    </tbody>
                </table>
                <!-- add  -->
              

                <!-- add  -->

            </div>
        </div>

    </div>

