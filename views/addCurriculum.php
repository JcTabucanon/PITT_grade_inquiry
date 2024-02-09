<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../stylesheet/sideBar.css">
     <link rel="stylesheet" href="../stylesheet/alert.css">
     <link rel="stylesheet" href="../stylesheet/top-nav.css">
     <link rel="stylesheet" href="../stylesheet/footer.css">
     <link rel="stylesheet" href="../modal/stylesheet/addInstructor_modal.css">
     <link rel="stylesheet" href="../stylesheet/addInstructor.css">
     <link rel="stylesheet" href="../stylesheet/addCurriculum.css">
     <title>Create Curriculum</title>
</head>
<body>

    <?php include '../templates/sideBar.php';?>
    <?php 
        $COURSE = '';
        $YLEVEL = '';
        $SEMESTER = '';
        $EFFECTIVE_YEAR = '';
        $checkmale = '';
        $checkfmale = '';
        $PRE_REQUISITE ='';
        if(!empty($_GET['SEMESTER']) && $_GET['SEMESTER'] == "1st"){
            $checkmale = 'checked';
            $checkfmale = '';
        }elseif(!empty($_GET['SEMESTER']) && $_GET['SEMESTER'] == "2nd"){
            $checkmale = '';
            $checkfmale = 'checked';
        }
        if(!empty($_GET['COURSE'])){
            $COURSE = $_GET['COURSE'];
        }
        if(!empty($_GET['YLEVEL'])){
            $YLEVEL = $_GET['YLEVEL'];
        }
        if(!empty($_GET['SEMESTER'])){
            $SEMESTER = $_GET['SEMESTER'];
        }
        if(!empty($_GET['EFECTIVE_YEAR'])){
            $EFFECTIVE_YEAR = $_GET['EFECTIVE_YEAR'];
        }
        if(!empty($_GET['PRE_REQUISITE'])){
            $PRE_REQUISITE = $_GET['PRE_REQUISITE'];
        }

    ?>
    <?php include_once '../templates/nav.php';?>
    <div class="wrapper">
        <div class="margin_wrapper">

            <div class="can">
                <div class = "line">
                    <!-- import data  -->
                    <h1>Import Data from Excel</h1>
                    <form action="../views/impCurriculom.php" method="POST" enctype="multipart/form-data">

                        <label for="excel">Select Excel File :  </label>
                        <input type="file" name="excel" id="excel" class="imp-excel">
                        <div></div>
                        <input class="effective-year" placeholder="Effective year" onblur="this.value = this.value.trim()" type="text" name="EFFECTIVE_YEAR" required>
                        <input type="submit" name="Import" value="Import" class="imp-btn">
                    </form>
                    <i>*Please ensure that the curriculum template in the selected Excel file precisely matches the required format. This will help ensure smooth data transfer and avoid any potential issues or errors.</i>

                </div>
                <!-- <div class="line-separetor"></div> -->
                <h1 class="imp-manual-txt">Create Curriculum - Manual</h1>
                
                <div class = "manual">
                    <form action="" method="POST">
                        <div class = "imp-manual">
                            <!-- <input placeholder="Input the COURSE" type="text" name="COURSE" id="COURSE" required onblur="this.value = this.value.trim()"> -->
                            <div class="merge">
                                <div>
                                <label for="COURSE">Course</label>
                                <input required onblur="this.value = this.value.trim()" placeholder="Input the COURSE" type="text" name="COURSE" id="COURSE" value="<?php echo $COURSE?>">
                                </div>

                                <div>
                                <label for="YLEVEL">Level</label>
                                <input required onblur="this.value = this.value.trim()" oninput="this.value = this.value.replace(/[^0-9]/g, '')" placeholder="Input the year level" type="text" name="YLEVEL" id="YLEVE" value="<?php echo $YLEVEL?>">

                                </div>
                            </div>
                            <div class="merge">
                                <div class="m-full">
                                <label for="DESCRIPTIVE_TITLE">Course Title</label>
                                <input required onblur="this.value = this.value.trim()" placeholder="Input the course title" type="text" name="DESCRIPTIVE_TITLE" id="DESCRIPTIVE_TITLE">
                                </div>
                            </div>
                            <div class="merge">
                                <div>
                                <label for="COURSE_CODE">Course Code</label>
                                <input required onblur="this.value = this.value.trim()" placeholder="Input the course code" type="text" name="COURSE_CODE" id="COURSE_CODE">
                                </div>
                                <div>
                                <label for="LEC">Lecture</label>
                                <input required onblur="this.value = this.value.trim()" oninput="this.value = this.value.replace(/[^0-9]/g, '')"  placeholder="Input the number of lecture" type="text" name="LEC" id="LEC">
                                </div>
                            </div>
                            <div class="merge">
                                <div>
                                <label for="LAB">Laboratory</label>
                                <input required onblur="this.value = this.value.trim()" oninput="this.value = this.value.replace(/[^0-9]/g, '')"     placeholder="Input the number of laboratory" type="text" name="LAB" id="LAB">
                                </div>
                                
                                <div>
                                <label for="EFFECTIVE_YEAR">Effective Year</label>
                                <input required onblur="this.value = this.value.trim()" placeholder="Input the effective year" type="text" name="EFFECTIVE_YEAR" id="EFFECTIVE_YEAR" value="<?php echo $EFFECTIVE_YEAR?>">
                                </div>
                            </div>

                            <div class="merge">
                                <div>
                                <label for="SEMESTER">SEMESTER</label>
                                <div class="SEMESTER">
                                    <label for="SEMESTER">1st</label>
                                    <input type="radio" name="SEMESTER" id="SEMESTER" value="1st" <?php echo $checkmale;?>>
                                    <label for="SEMESTER">2nd</label>
                                    <input type="radio" name="SEMESTER" id="SEMESTER" value="2nd" <?php echo $checkfmale;?>>
                                </div>
                                </div>
                                
                                <div>
                                <label for="PRE_REQUISITE">Pre-Requisite</label>
                                <input onblur="this.value = this.value.trim()" placeholder="Input the Pre-Requisite if none just leave it blank" type="text" name="PRE_REQUISITE" id="PRE_REQUISITE" value="<?php echo $PRE_REQUISITE?>">
                                </div>
                                
                            </div>
                            <input type="submit" name="submit-manual" value="Save" id="imp-btn-manual">
                        </div>
                    </form>

                    <?php include_once '../include/addCurrilum.inc.php';?>
                </div>
                <i>* This form is designed to enable the meticulous creation of a curriculum manually. It offers the convenience of inputting one course code at a time, allowing for careful consideration and attention to detail. To expedite the process and enhance efficiency, an Excel file import feature has been incorporated above this form, empowering users to effortlessly import multiple course codes. </i>

            </div>

    
        </div>
    </div>
  
    <?php include_once '../templates/footer.php';?>

<script src="../modal/javascript/addInstructor_modal.js"></script>
<script>
     function toggleDropdown() {
        dropdown = document.getElementById("dropdown");
        var arrow = document.querySelector(".downarrow svg");
        var paragraph = document.querySelector(".sidebar-btn p");
        var svg = document.querySelector(".sidebar-btn svg");
        // var activesvg = document.querySelector(".mysubject .btn_icon svg");
        var activetext = document.querySelector(".side_btn .sidebr .dropdown-content .addCurr-btn");

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
        // activesvg.style.color = "#17a2b8";
        activetext.style.color = "#17a2b8";
        }
    }
</script>