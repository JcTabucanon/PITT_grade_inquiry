<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="../stylesheet/addCurriculum.css">
     <link rel="stylesheet" href="../modal/stylesheet/addInstructor_modal.css">
     <link rel="stylesheet" href="../stylesheet/addInstructor.css">
     <link rel="stylesheet" href="../stylesheet/alert.css">
     <link rel="stylesheet" href="../stylesheet/top-nav.css">
     <link rel="stylesheet" href="../stylesheet/footer.css">
     <title>Create Curriculum</title>
</head>
<body>
    <?php 
        include_once '../templates/nav.php';
        include_once '../include/addCurrilum.inc.php';
        $sCOURSE = '';
        $sYLEVEL = '';
        $sSEMESTER = '';
        $sAY = '';
        $checkmale = '';
        $checkfmale = '';
        if(!empty($_GET['SEMESTER']) && $_GET['SEMESTER'] == "1st"){
            $checkmale = 'checked';
            $checkfmale = '';
        }elseif(!empty($_GET['SEMESTER']) && $_GET['SEMESTER'] == "2nd"){
            $checkmale = '';
            $checkfmale = 'checked';
        }
        if(!empty($_GET['COURSE'])){
            $sCOURSE = $_GET['COURSE'];
        }
        if(!empty($_GET['YLEVEL'])){
            $sYLEVEL = $_GET['YLEVEL'];
        }
        if(!empty($_GET['SEMESTER'])){
            $sSEMESTER = $_GET['SEMESTER'];
        }
        if(!empty($_GET['AY'])){
            $sAY = $_GET['AY'];
        }

    ?>
    <div class= "import">
        <div class = "move">
            <div class = "imp-con line">
                <!-- import data  -->
                <h1>Import Data from Excel</h1>
                <form action="../views/impCurriculom.php" method="POST" enctype="multipart/form-data">
                    <label for="excel">Select Excel File :  </label>
                    <input type="file" name="excel" id="excel" class="imp-excel">
                    <input type="submit" name="submit" value="Import" class="imp-btn">
                </form>
            </div>
            <h1 class="imp-manual-txt">Create Curriculum - Manual</h1>

            <!-- select instructor -->
            <div class="select-instructor-con">
                <?php 
                    $insname = "";
                    if(!empty($_GET['selected'])){
                        $id = $_GET['selected'];
                        include_once '../dbConnection/db.php';
                        $sql = "SELECT * from `INSTRUCTORS` WHERE USER_ID = '$id'";
                        $result=mysqli_query($conn,$sql);
                        if($result){
                            while($row=mysqli_fetch_assoc($result)){
                                $ID=$row['USER_ID'];
                                $FIRSTNAME=$row['FIRSTNAME'];
                                $MI=$row['MI'];
                                $LASTNAME=$row['LASTNAME'];
                                $insname = $FIRSTNAME." ".$MI." ".$LASTNAME;  
                            }
                        }
                    }
                    if(!empty($_GET['COURSE'])){
                        $COURSE = $_GET['COURSE'];
                    }
                ?>
                <!-- // to display the COURSE instructor -->

                <label for="instructor_name">Instructor</label>     
                <div class="select-instructor">
                    <div class="select-instructor-1">
                        <input disabled placeholder="Select a Instructor" type="text" class="txt-select-ins" value="<?php echo$insname;?>" name="instructor_name" id="instructor_name">
                        <button id="open_modal" class="open_modal">Select</button>
                        <?php include_once '../modal/addInstructor_modal.php';?>
                    </div>
                    <p class="select-instructor-note">Impotant Note : Please ensure that you have COURSE an instructor before proceeding to fill up the form below.</p>
                </div>
            </div>

            <!-- <h1>Create Curriculum</h1> -->
            <div class = "imp-con">
                <form action="" method="POST">
                    <div class = "imp-manual">

                        <!-- to pass value  -->
                        <input type="text" name="ins_name" id="ins_name" class="hide" value="<?php echo $insname;?>">
                        <input type="text" name="ins_id" id="ins_id" class="hide" value="<?php echo $ID;?>">

                        <label for="COURSE">COURSE</label>
                        <!-- <input placeholder="Input the COURSE" type="text" name="COURSE" id="COURSE" required onblur="this.value = this.value.trim()"> -->

                        <input placeholder="Input the COURSE" type="text" name="COURSE" id="COURSE" value="<?php echo $sCOURSE?>" required>

                        <label for="level">Level</label>
                        <input placeholder="Input the year level" type="text" name="level" id="level" value="<?php echo $sYLEVEL?>" required>

                        <label for="COURSE_code">COURSE Code</label>
                        <input placeholder="Input the COURSE code" type="text" name="COURSE_code" id="COURSE_code" required>

                        <label for="desc_title">Descriptive Title</label>
                        <input placeholder="Input the descriptive title" type="text" name="desc_title" id="desc_title" required>

                        <label for="lec">Lecture</label>
                        <input placeholder="Input the number of lecture" type="text" name="lec" id="lec">

                        <label for="lab">Laboratory</label>
                        <input placeholder="Input the number of laboratory" type="text" name="lab" id="lab">

                        <label for="sy">School Year</label>
                        <input placeholder="Input the school year" type="text" name="sy" id="sy" value="<?php echo $sAY?>" required>
                        <label for="SEMESTER">SEMESTER</label>
                        <div class="SEMESTER">
                            <label for="SEMESTER">1st</label>
                            <input type="radio" name="SEMESTER" id="SEMESTER" value="1st" <?php echo $checkmale;?> required>
                            <label for="SEMESTER">2nd</label>
                            <input type="radio" name="SEMESTER" id="SEMESTER" value="2nd" <?php echo $checkfmale;?> required>
                        </div>
                        <input type="submit" name="submit-manual" value="Save" id="imp-btn-manual">
                    </div>

                </form>
            </div>
        </div>

    </div>
    
    <?php include_once '../templates/footer.php';?>

<script src="../modal/javascript/addInstructor_modal.js"></script>