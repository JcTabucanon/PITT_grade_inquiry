<div class="notif-create-con">
    <div class="notif-create">

        <?php
        session_start();
        require_once 'xlsx.php'; // Include the SimpleXLSX library
        require_once '../dbConnection/db.php';

        if (isset($_POST['UploadGrade'])) {
            // Check if a file was uploaded
            if (isset($_FILES['excel']['name'])) {
                $AY = $_POST['AY'];
                $INSTRUCTOR_ID = $_SESSION['CURRENT_USERID'];
                $INSTRUCTOR_NAME = $_SESSION['CURRENT_LNAME'] . ' ' . $_SESSION['CURRENT_FNAME'];

                if ($conn) {
                    $excel = SimpleXLSX::parse($_FILES['excel']['tmp_name']);
                    for ($sheet = 0; $sheet < sizeof($excel->sheetNames()); $sheet++) {
                        $rowcol = $excel->dimension($sheet);
                        $i = 0;
                        if ($rowcol[0] != 1 && $rowcol[1] != 1) {
                            $sheetName = $excel->sheetNames()[$sheet];
                            // if ($sheetName == "STUDENT") { // Check if the sheet name matches the table name
                            foreach ($excel->rows($sheet) as $key => $row) {
                                if ($i > 0) { // Ignore the first row
                                    $COURSE_CODE = $row[0];
                                    $SEMESTER = $row[1];
                                    $YLEVEL = $row[2];
                                    $COURSE = $row[3];

                                    $check_query = "SELECT * FROM GRADE WHERE COURSE='$COURSE' AND COURSE_CODE='$COURSE_CODE' AND SY='$AY' AND YLEVEL='$YLEVEL' AND SEMESTER='$SEMESTER' AND INSTRUCTOR_ID='$INSTRUCTOR_ID';";
                                    $check_result = mysqli_query($conn, $check_query);
                                    $check_row = mysqli_fetch_assoc($check_result);
                                    if (!$check_row) {
                                        // require_once '../dbConnection/db.php';
                                        $sql = "SELECT * FROM CURRICULUM WHERE COURSE='$COURSE' AND COURSE_CODE='$COURSE_CODE' AND SEMESTER='$SEMESTER' AND YLEVEL='$YLEVEL'";
                                        $result = mysqli_query($conn, $sql);
                                        if ($result) {
                                            while ($row = mysqli_fetch_assoc($result)) {
                                                $PROGRAM_DESC = $row['PROGRAM_DESC'];
                                                $DESCRIPTIVE_TITLE = $row['DESCRIPTIVE_TITLE'];
                                                $LEC = $row['LEC'];
                                                $LAB = $row['LAB'];
                                                $DEPARTMENT = $row['DEPARTMENT'];

                                                $sqlStudent = "SELECT * FROM LISTING WHERE COURSE='$COURSE' AND YLEVEL='$YLEVEL' AND SEMESTER='$SEMESTER' AND AY='$AY' AND DEPARTMENT='$DEPARTMENT'";
                                                $resultStudent = mysqli_query($conn, $sqlStudent);
                                                if($resultStudent){
                                                    while ($rowStudent = mysqli_fetch_assoc($resultStudent)) {
                                                        $STUDENT_ID = $rowStudent['SCHOOL_ID'];
                                                        if (empty($rowStudent['FIRSTNAME'])) {
                                                            $rowStudent['FIRSTNAME'] = 'N/A';
                                                        }
                                                        if (empty($rowStudent['MI'])) {
                                                            $rowStudent['MI'] = 'N/A';
                                                        }
                                                        if (empty($rowStudent['LASTNAME'])) {
                                                            $rowStudent['LASTNAME'] = 'N/A';
                                                        }
    
                                                        $FIRSTNAME = $rowStudent['FIRSTNAME'];
                                                        $MI = $rowStudent['MI'];
                                                        $LASTNAME = $rowStudent['LASTNAME'];
    
                                                        include '../dbConnection/db.php';
                                                        $insertToGrade = "INSERT INTO GRADE (SCHOOL_ID, FIRSTNAME, LASTNAME, MI, YLEVEL, COURSE, COURSE_CODE, DESCRIPTIVE_TITLE, SY, SEMESTER, INSTRUCTOR_ID, INSTRUCTOR_NAME, DEPARTMENT, LEC, LAB) VALUES ('$STUDENT_ID', '$FIRSTNAME', '$LASTNAME', '$MI', '$YLEVEL', '$COURSE', '$COURSE_CODE', '$DESCRIPTIVE_TITLE', '$AY', '$SEMESTER', '$INSTRUCTOR_ID', '$INSTRUCTOR_NAME', '$DEPARTMENT', '$LEC', '$LAB');";
                                                        if (mysqli_query($conn, $insertToGrade)) {
                                                            echo "<span><label>$FIRSTNAME $LASTNAME Course/Level: $COURSE/$YLEVEL - Was added to your student list.</label></span><br>";
                                                        } else {
                                                            echo "<span><p>Error 1st.</p></span><br>";
                                                        }
                                                    }
                                                }else{
                                                    echo "<span><p>Error 2nd.</p></span><br>";
                                                }
                                                
                                            }
                                        } else {
                                            echo "<span><p>Error 3rd.</p></span><br>";
                                        }

                                    } else {
                                        echo "<span><p>School ID $FIRSTNAME $LASTNAME already exists in the database. Ignoring this entry.</p></span><br>";
                                    }
                                }
                                $i++;
                            }
                            // } else {
                            //     echo "<span><p>Excel sheet $sheetName does not match the name of the database table. Ignoring this sheet.</p></span><br>";
                            // }
                        }
                    }
                }
            }
        }

        ?>

    </div>

</div>
