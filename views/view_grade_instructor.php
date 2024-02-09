<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View | Students</title>
    <link rel="stylesheet" href="../stylesheet/footer.css">
    <link rel="stylesheet" href="../stylesheet/alert.css">
    <link rel="stylesheet" href="../stylesheet/top-nav.css">
    <link rel="stylesheet" href="../stylesheet/sideBar.css">
    <link rel="stylesheet" href="../modal/stylesheet/editGrade_modal.css">
    <link rel="stylesheet" href="../stylesheet/viewgrade_intructor.css">
</head>
<body>
    <?php  include_once '../templates/sideBar.php';?>
    <?php
    $INSTRUCTOR_ID = $_SESSION['CURRENT_USERID'];
    if (!empty($_GET['DEPARTMENT']) && !empty($_GET['INSTRUCTOR_ID']) && !empty($_GET['COURSE']) && !EMPTY($_GET['COURSE_CODE']) && !empty($_GET['YLEVEL']) && !empty($_GET['SEMESTER']) && !empty($_GET['SY'])) {
        $ID = $_GET['INSTRUCTOR_ID'];
        $COURSE = $_GET['COURSE'];
        $COURSE_CODE = $_GET['COURSE_CODE'];
        $DESCRIPTIVE_TITLE = $_GET['DESCRIPTIVE_TITLE'];
        $YLEVEL = $_GET['YLEVEL'];
        $SEMESTER = $_GET['SEMESTER'];
        $TOTAL_UNITS = $_GET['TOTAL_UNITS'];
        $SY = $_GET['SY'];
        $DEPARTMENT = $_GET['DEPARTMENT'];
        $BTN_SHOW = $_GET['BTN_SHOW'];
        if($BTN_SHOW == 0){
            $HIDE_BTN = 'display: block;';
        }elseif($BTN_SHOW == 1){
            $HIDE_BTN = 'display: none;';
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
        }
        // for SEMESTER
        if ($SEMESTER == "1st") {
            $SEM = "First Semester";
        } elseif ($SEMESTER == "2nd") {
            $SEM = "Second Semester";
        }
        
    }else{
        $COURSE = 'N/A';
        $COURSE_CODE = 'N/A';
        $DESCRIPTIVE_TITLE = 'N/A';
        $TOTAL_UNITS = 'N/A';
        $YLEVEL = 'Course&nbsp;and&nbspYear&nbspLevel';
        $LEVEL = 'N/A';
        $SEM = 'N/A';
        $SY = 'N/A';
        $DEPARTMENT = 'N/A';
    }
    ?>
    <?php include '../templates/nav.php';?>
    <div class="wrapper">
    <div class="margin_wrapper">
        <div class="can">
            
            <div class="btn-container">
                <div class="heading">
                <div class="heading-two">
                    <div class="heading-logo">
                        <div class="pit-logo"></div>
                    </div>
                    <div class="heading-text">
                        <p>Republic&nbsp;of&nbsp;the&nbsp;Philippines</p>
                        <p class="h-1">PALOMPON&nbsp;INSTITUTE&nbsp;OF&nbsp;TECHNOLOGY&nbsp;TABANGO</p>
                        <p>Tabango,&nbsp;Leyte</p>
                        <p>Office of Instruction</p>
                        <p class="h-1"><?php echo $DEPARTMENT;?> Education Unit</p>
                    </div>

                </div>
                </div>
                <div class="sheet">
                    <div class="sheet-name">
                        <p>GRADES&nbsp;SHEET</p>
                        <p><?php echo $SEM.'&nbsp;'.'S.Y.'.'&nbsp;'.$SY?></p>

                    </div>
                    <div class="sheet-text">
                        <div class="sheet-left">
                            <p>Program&nbsp;&&nbsp;Year&nbsp;Level</p>
                            <p>Course&nbsp;Code</p>
                            <p>Course&nbsp;Description</p>
                            <p>Units</p>
                        </div>
                        <div class="sheet-right">
                            <p><?php echo '&nbsp;'.':'.'&nbsp;'.$COURSE.'&nbsp;'.$YLEVEL?></p>
                            <p><?php echo '&nbsp;'.':'.'&nbsp;'.$COURSE_CODE;?></p>
                            <p><?php echo '&nbsp;'.':'.'&nbsp;'.$DESCRIPTIVE_TITLE;?></p>
                            <p><?php echo '&nbsp;'.':'.'&nbsp;'.$TOTAL_UNITS;?></p>

                        </div>
                       
                    </div>

                </div>
            
            </div>
            <form action="../include/editGrade.inc.php" method="post">
                <div class="check-can">
                    <input type="checkbox" name="checkbox" id="checkbox" value="1">
                    <p>
                    Please note that if you intend to submit this form to the registrar, kindly check the checkbox provided. It's important to understand that once the form is submitted, it will no longer be editable. Therefore, please review the information carefully before proceeding with the submission.
                    </p>
                </div>
                <input type="hidden" name="DEPARTMENT" id="DEPARTMENT" value="<?php echo $DEPARTMENT;?>">
                <input type="hidden" name="INSTRUCTOR_ID" id="INSTRUCTOR_ID" value="<?php echo $INSTRUCTOR_ID;?>">
                <input type="hidden" name="COURSE" id="COURSE" value="<?php echo $COURSE;?>">
                <input type="hidden" name="COURSE_CODE" id="COURSE_CODE" value="<?php echo $COURSE_CODE;?>">
                <input type="hidden" name="DESCRIPTIVE_TITLE" id="DESCRIPTIVE_TITLE" value="<?php echo $DESCRIPTIVE_TITLE;?>">
                <input type="hidden" name="YLEVEL" id="YLEVEL" value="<?php echo $YLEVEL;?>">
                <input type="hidden" name="SEMESTER" id="SEMESTER" value="<?php echo $SEMESTER;?>">
                <input type="hidden" name="SY" id="SY" value="<?php echo $SY;?>">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="act">#</th>       
                            <th scope="col">NAME&nbsp;OF&nbsp;STUDENT</th>
                            <th scope="col">MID&nbsp;TERM</th> 
                            <th scope="col">FINAL&nbsp;TERM</th>                                
                            <th scope="col">FINAL&nbsp;GRADE</th>       
                            <th scope="col">REMARKS</th>       
                        </tr>
                    </thead>
                    <tbody>
                        <?php include '../include/view_grade_instructor.inc.php';?>
                    </tbody>
                </table>
                <div class="save-btn">
                    <button class="save" type="submit" name="SaveGrade" style="<?php echo $HIDE_BTN;?>">
                        Save
                    </button>
                </div>
                
            </form>
            <!-- add  -->

        </div>

    </div>
    </div>

<?php include '../templates/footer.php'; ?>
<script>
    const checkbox = document.getElementById("checkbox");
    const button = document.querySelector(".save");

    checkbox.addEventListener("change", function() {
    if (checkbox.checked) {
        button.textContent = "Submit";
    } else {
        button.textContent = "Save";
    }
    });
    function toggleDropdown() {
        //for the sidebar-------------------------------
            dropdown = document.getElementById("dropdown");
            var arrow = document.querySelector(".downarrow svg");
            var paragraph = document.querySelector(".sidebar-btn p");
            var svg = document.querySelector(".sidebar-btn svg");
            var activesvg = document.querySelector(".side_btn .grade svg");
            var activetext = document.querySelector(".side_btn .grade p");



            if (dropdown.style.display === "none") {
                dropdown.style.display = "block";
                arrow.style.color = "#17a2b8";
                paragraph.style.color = "#17a2b8"; 
                svg.style.color = "#17a2b8";
                activesvg.style.color = "black";
                activetext.style.color = "black";
            } else {
                dropdown.style.display = "none";
                arrow.style.color = "black";
                svg.style.color = "black"; 
                paragraph.style.color = "black"; 
                activesvg.style.color = '#17a2b8';
                activetext.style.color = '#17a2b8';
            }
        }
  function updateUrlGradeSheet() {
    // Get the current URL
    var url = window.location.href;

    // Split the URL into two parts: the base URL and the query string
    var parts = url.split('?');

    // Get the query string and split it into an array of parameters
    var params = parts[1] ? parts[1].split('&') : [];

    // Create an object to hold the updated parameter values
    var updatedParams = {
      DEPARTMENT: '',
      TOTAL_UNITS: '',
      INSTRUCTOR_ID: '',
      COURSE: '',
      COURSE_CODE: '',
      DESCRIPTIVE_TITLE: '',
      YLEVEL: '',
      SEMESTER: '',
      SY: ''
    };
    // Update the values of the COURSE and YLEVEL parameters
    updatedParams.DEPARTMENT = document.getElementById('DEPARTMENT').value;
    updatedParams.TOTAL_UNITS = document.getElementById('TOTAL_UNITS').value;
    updatedParams.INSTRUCTOR_ID = document.getElementById('INSTRUCTOR_ID').value;
    updatedParams.COURSE = document.getElementById('COURSE').value;
    updatedParams.COURSE_CODE = document.getElementById('COURSE_CODE').value;
    updatedParams.DESCRIPTIVE_TITLE = document.getElementById('DESCRIPTIVE_TITLE').value;
    updatedParams.YLEVEL = document.getElementById('YLEVEL').value;
    updatedParams.SEMESTER = document.getElementById('SEMESTER').value;
    updatedParams.SY = document.getElementById('SY').value;

    // Build the updated query string 
    var queryString = Object.keys(updatedParams).map(function(key) {
      return encodeURIComponent(key) + '=' + encodeURIComponent(updatedParams[key]);
    }).join('&');

    // Build the updated URL by combining the base URL and the updated query string
    var updatedUrl = parts[0] + '?' + queryString;

    // Update the URL of the current page
    window.history.pushState(null, null, updatedUrl);
    // window.location.href = updatedUrl;
    window.location.reload();
  }

</script>