<?php include "registrar.php"?>
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
    <link rel="stylesheet" href="assets/technology.css">

    <?php include_once 'inc/topBarNav.php'; ?>
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
                    <h3>GENERAL EDUCATION DEPARTMENT</h3>
              
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
                        <?php include 'includes/genEd.inc.php';?>
                    </tbody>
                </table>
                <!-- add  -->
              

                <!-- add  -->

            </div>
        </div>

    </div>


<script>
        //for the sidebar-------------------------------
    function toggleDropdown() {
        var dropdown = document.getElementById("dropdown");
        var paragraph = document.querySelector(".sidebar-btn p");
        var svg = document.querySelector(".sidebar-btn svg");
        var activesvg = document.querySelector(".active_btn .btn_icon svg");
        var activetext = document.querySelector(".active_btn p");

        if (dropdown.style.display === "none") {
        dropdown.style.display = "block !important";
        paragraph.style.color = "goldenrod";
        svg.style.color = "goldenrod";
        activesvg.style.color = "black";
        activetext.style.color = "black";
        } else {
        dropdown.style.display = "none !important";
        svg.style.color = "black";
        paragraph.style.color = "black";
        activesvg.style.color = "black";
        activetext.style.color = "black";

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