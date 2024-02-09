<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>View | Students</title>
    <link rel="stylesheet" href="../stylesheet/viewcurriculum.css">
    <link rel="stylesheet" href="../stylesheet/footer.css">
    <link rel="stylesheet" href="../stylesheet/alert.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
    <?php include_once '../templates/nav.php';?>
    <?php
    if (!empty($_GET['COURSE']) && !empty($_GET['YLEVEL']) && !empty($_GET['SEMESTER']) && !empty($_GET['SY'])) {
        $ID = $_GET['ID'];
        $COURSE = $_GET['COURSE'];
        $YLEVEL = $_GET['YLEVEL'];
        $SEMESTER = $_GET['SEMESTER'];
        $SY = $_GET['SY'];
        // for grade lvl
        if ($YLEVEL == 1) {
            $YLEVEL = 'First Year';
        } elseif ($YLEVEL == 2) {
            $YLEVEL = 'Second Year';
        } elseif ($YLEVEL == 3) {
            $YLEVEL = 'Third Year';
        } elseif ($YLEVEL == 4) {
            $YLEVEL = 'Fourth Year';
        }
        // for SEMESTER
        $SEMESTER = "";
        if ($SEMESTER == "1st") {
            $SEMESTER = "First SEMESTER";
        } elseif ($SEMESTER == "2nd") {
            $SEMESTER = "Second SEMESTER";
        }
        // $SEMESTER = SEMESTERtxt($SEMESTER);
        include_once '../dbConnection/db.php';
        $sql = "SELECT * FROM GRADE WHERE SCHOOL_ID = '$ID'";
        $result = mysqli_query($conn, $sql);
        if($result){
            while($row=mysqli_fetch_assoc($result)){
                    $YLEVEL = $row['YLEVEL'];
                    $SEMESTER = $row['SEMESTER'];
                    $YLEVEL = $row['YLEVEL'];
                    $FIRSTNAME = $row['FIRSTNAME'];
                    $LASTNAME = $row['LASTNAME'];
                    $MI = $row['MI'];
                    $STUDENT_STATUS = $row['STUDENT_STATUS'];
                    $COURSE = $row['COURSE'];
            }
        }
    }
    ?>
    <div class="wrapper">

        <div class="container">
            <div class="c-con">
                <div class="btn-container">
                    <!-- for search  -->
                    <span class="in-line-con">
                        <form action="" method="post">
                            <div class="form-can">
                                <label for="">COURSE/Major&nbsp;: </label>
                                <select name="COURSE" id="COURSE" class="COURSE">
                                <?php
                                    $COURSE = "";
                                    $SEMESTER = "";
                                    $AY = "";

                                    if (!empty($_GET['COURSE']) && !empty($_GET['YLEVEL']) && !empty($_GET['SEMESTER']) && !empty($_GET['SY'])) {
                                        $COURSE = $_GET['COURSE'];
                                        // rest of the code
                                    }

                                    if (!empty($_GET['COURSE']) && !empty($_GET['YLEVEL']) && !empty($_GET['SEMESTER']) && !empty($_GET['SY'])) {
                                        $COURSE = $_GET['COURSE'];
                                        $YLEVEL = $_GET['YLEVEL'];
                                        $SEMESTER = $_GET['SEMESTER'];
                                        // rest of the code
                                    }

                                    if (!empty($_GET['COURSE']) && !empty($_GET['YLEVEL']) && !empty($_GET['SEMESTER']) && !empty($_GET['SY'])) {
                                        $COURSE = $_GET['COURSE'];
                                        $YLEVEL = $_GET['YLEVEL'];
                                        $SEMESTER = $_GET['SEMESTER'];
                                        $SY = $_GET['SY'];
                                        // rest of the code
                                    }
                                    ?>

                                    <option hidden value="<?php echo $COURSE; ?>"><?php echo $COURSE; ?></option>
                                    <?php
                                    // Query the database to get the list of COURSE 
                                    include_once '../dbConnection/db.php';
                                    $sql = "SELECT * from grade";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        $printed_words = array();

                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $COURSE = trim($row['COURSE']);

                                            if (!in_array($COURSE, $printed_words)) {
                                                echo '
                                                  <option value="' . $row['COURSE'] . '">' . $row['COURSE'] . '</option>';
                                                $printed_words[] = $COURSE;
                                            }
                                        }
                                    }
                                    ?>
                                </select>
                                <label for="">Level&nbsp;: </label>
                                <select name="YLEVEL" id="YLEVEL">
                                    <?php
                                    $YLEVEL = "";
                                    if (!empty($_GET['COURSE']) && !empty($_GET['YLEVEL']) && !empty($_GET['SEMESTER']) && !empty($_GET['SY'])) {
                                        $COURSE = $_GET['COURSE'];
                                        $YLEVEL = $_GET['YLEVEL'];
                                        // rest of the code
                                    }

                                    ?>
                                    <option hidden value="<?php echo $YLEVEL; ?>"><?php echo $YLEVEL; ?></option>
                                    <option value="1">First Year</option>
                                    <option value="2">Second Year</option>
                                    <option value="3">Third Year</option>
                                    <option value="4">Fourth Year</option>
                                </select>
                                <label for="">SEMESTER&nbsp;: </label>
                                <select name="SEMESTER" id="SEMESTER">
                                    <option hidden value="<?php echo $SEMESTER; ?>"><?php echo $SEMESTER; ?></option>
                                    <option value="1st">First SEMESTER</option>
                                    <option value="2nd">Second SEMESTER</option>
                                </select>
                                <label for="">A.&nbsp;Y&nbsp;: </label>
                                <select name="AY" id="AY">
                                    <option hidden value="<?php echo $AY; ?>"><?php echo $AY; ?></option>
                                    <?php
                                    // Query the database to get the list of COURSE 
                                    include_once '../dbConnection/db.php';
                                    $sql = "SELECT *  from grade";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        $printed_words = array();

                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $SY = trim($row['SY']);

                                            if (!in_array($SY, $printed_words)) {
                                                echo '
                                                  <option value="' . $row['SY'] . '">' . $row['SY'] . '</option>';
                                                $printed_words[] = $SY;
                                            }
                                        }
                                    }
                                    ?>
                                </select>
                                <input type="submit" name="search" value="Search" onclick="updateUrl()">
                            </div>
                        </form>
                    </span>
                    <!-- for search  -->
              
                </div>
                <table class="table">
                    <thead>
                    <tr>
                        <th width="100">#</th>
                        <th width="100">COURSE&nbsp;CODE</th>
                        <th width="400">DESCRIPTIVE&nbsp;TITLE</th> 
                        <th>SEMESTER</th>   
                        <th>UNITS</th>  
                        <th>MIDTERM</th> 
                        <th>FINAL</th>                                
                        <th>AVERAGE</th>       
                        <th>REMARKS</th>       
                        <th class="act">ACTIONS</th>       
                    </tr>
                    </thead>
                    <?php
                        include '../include/viewgrade.inc.php';
                    ?>
                </table>
                <!-- add  -->
                <?php include_once '../modal/editGrade_popup.php'; ?>

                <!-- add  -->

            </div>
        </div>

    </div>


    <?php include_once '../templates/footer.php'; ?>
    <script src="../modal/javascript/edit_grade_modal.js"></script>