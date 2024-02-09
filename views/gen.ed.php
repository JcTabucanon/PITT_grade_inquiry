<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technology Department</title>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    
    <link rel="stylesheet" href="../stylesheet/footer.css">
    <link rel="stylesheet" href="../stylesheet/alert.css">
    <link rel="stylesheet" href="../stylesheet/top-nav.css">
    <link rel="stylesheet" href="../stylesheet/sideBar.css">
    <link rel="stylesheet" href="../stylesheet/gen.ed.css">
</head>

<body>
<?php include_once '../templates/sideBar.php';?>
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
    <?php include_once '../templates/nav.php'; ?>
    <div class="wrapper">

        <div class="margin_wrapper">
            <div class="can">
                <div class="btn-container">
                <h3>GENERAL EDUCATION DEPARTMENT</h3>

                    <!-- for search  -->
                    <span class="in-line-con">
                        <form action="" method="post">
                        <p>Define the way you want to display</p>
                            <div class="form-can">
                                <div class="form-group">
                                    <select name="COURSE" id="COURSE" class="COURSE">
                                    <?php 
                                    if($COURSE != "All"){
                                        echo '<option hidden value="'.$COURSE.'">'.$COURSE.'</option>';
                                    }
                                    ?>
                                    <option value="ALL">All</option>
                                    <?php
                                    // Query the database to get the list of COURSE 
                                    include_once '../dbConnection/db.php';
                                    $sql = "SELECT * FROM CURRICULUM";
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
                                    <label for="">Course/Major</label>
                                </div>
                                <div class="form-group">
                                    <select name="YLEVEL" id="YLEVEL">
                                    <?php 
                                        if($YLEVEL!='All'){
                                            echo '<option hidden value="'.$YLEVEL.'">'.$LEVEL.'</option>';
                                        }
                                    ?>
                                    <option value="ALL">All</option>
                                    <option value="1">First Year</option>
                                    <option value="2">Second Year</option>
                                    <option value="3">Third Year</option>
                                    <option value="4">Fourth Year</option>
                                </select>
                                    <label for="">Level</label>
                                </div>
                                <div class="form-group">
                                    <select name="SEMESTER" id="SEMESTER">
                                    <?php 
                                        if($SEMESTER!='All'){
                                            echo '<option hidden value="'.$SEMESTER.'">'.$SEM.'</option>';
                                        }
                                    ?>
                                    <option value="ALL">All</option>
                                    <option value="1st">First Semester</option>
                                    <option value="2nd">Second Semester</option>
                                </select>
                                    <label for="">Semester</label>
                                </div>
                                <div class="form-group">
                                    <select name="AY" id="AY">
                                    <?php 
                                        if($AY!='All'){
                                            echo '<option hidden value="'.$AY.'">'.$AY.'</option>';
                                        }
                                    ?>
                                    <option value="ALL">All</option>
                                    <?php
                                    // Query the database to get the list of COURSE 
                                    include_once '../dbConnection/db.php';
                                    $sql = "SELECT *  FROM CURRICULUM";
                                    $result = mysqli_query($conn, $sql);
                                    if (mysqli_num_rows($result) > 0) {
                                        $printed_words = array();

                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $SY = trim($row['EFFECTIVE_YEAR']);

                                            if (!in_array($SY, $printed_words)) {
                                                echo '
                                                  <option value="' . $row['EFFECTIVE_YEAR'] . '">' . $row['EFFECTIVE_YEAR'] . '</option>';
                                                $printed_words[] = $SY;
                                            }
                                        }
                                    }
                                    ?>
                                </select>
                                    <label for="">A.&nbsp;Y.</label>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="searchSubject" value="Search" onclick="updateUrlSubject()">
                                </div>
                                
                               
                            </div>
                        </form>

                    </span>
                    <!-- for search  -->
              
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
                    <?php include '../include/gen.ed.inc.php';?>
                    </tbody>
                </table>
                <!-- add  -->
              

                <!-- add  -->

            </div>
        </div>

    </div>


    <?php include_once '../templates/footer.php'; ?>
<script>
        //for the sidebar-------------------------------
    function toggleDropdown() {
        var dropdown = document.getElementById("dropdown");
        var arrow = document.querySelector(".downarrow svg");
        var paragraph = document.querySelector(".sidebar-btn p");
        var svg = document.querySelector(".sidebar-btn svg");
        var activesvg = document.querySelector(".active_btn .btn_icon svg");
        var activetext = document.querySelector(".active_btn p");

        if (dropdown.style.display === "none") {
        dropdown.style.display = "block";
        arrow.style.color = "#17a2b8";
        paragraph.style.color = "#17a2b8";
        svg.style.color = "#17a2b8";
        activesvg.style.color = "white";
        activetext.style.color = "white";
        } else {
        dropdown.style.display = "none";
        arrow.style.color = "white";
        svg.style.color = "white";
        paragraph.style.color = "white";
        activesvg.style.color = "white";
        activetext.style.color = "white";

    }
    }
    //script for view_subject_instructor.inc.php----------------------------------------
  function updateUrlSubject() {
    // Get the current URL
    var url = window.location.href;

    // Split the URL into two parts: the base URL and the query string
    var parts = url.split('?');

    // Get the query string and split it into an array of parameters
    var params = parts[1] ? parts[1].split('&') : [];

    // Create an object to hold the updated parameter values
    var updatedParams = {
      COURSE: '',
      YLEVEL: '',
      SEMESTER: '',
      AY: ''
    };
    updatedParams.COURSE = document.getElementById('COURSE').options[document.getElementById('COURSE').selectedIndex].value;
    updatedParams.YLEVEL = document.getElementById('YLEVEL').options[document.getElementById('YLEVEL').selectedIndex].value;
    updatedParams.SEMESTER = document.getElementById('SEMESTER').options[document.getElementById('SEMESTER').selectedIndex].value;
    updatedParams.AY = document.getElementById('AY').options[document.getElementById('AY').selectedIndex].value;

    // Build the updated query string 
    var queryString = Object.keys(updatedParams).map(function(key) {
      return encodeURIComponent(key) + '=' + encodeURIComponent(updatedParams[key]);
    }).join('&');

    // Build the updated URL by combining the base URL and the updated query string
    var updatedUrl = parts[0] + '?' + queryString;

    // Update the URL of the current page
    window.history.pushState(null, null, updatedUrl);
    // window.location.href = updatedUrl;
    window.location.reload();;
  }

</script>