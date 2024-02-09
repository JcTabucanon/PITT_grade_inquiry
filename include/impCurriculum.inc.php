<?php
session_start();
// EDUC-----------------------------------------------------------------------

// BEEd - Bachelor of Elementary Education (BEEd)
// BSEd Math - Bachelor of Secondary Education (BSEd) | Major in Mathematics
// BSEd Science - Bachelor of Secondary Education (BSEd) | Major in Science
// BTLEd - Bachelor of Technology and Livelihood Education (BTLEd) | Major in Home Economics

// BTVTEd Auto - Bachelor of Technical - Vocational Teacher Education (BTVTEd) | Major in Automotive Technology
// BTVTEd Elec - Bachelor of Technical - Vocational Teacher Education (BTVTEd) | Major in Electrical Technology
// BTVTEd FSM - Bachelor of Technical - Vocational Teacher Education (BTVTEd) | Major in Foods and Service Management
// BTVTEd Mech - Bachelor of Technical - Vocational Teacher Education (BTVTEd) | Major in Mechanical Technology

// TECHNOLOGY --------------------------------------------------------------------

// BSInfoTech - Bachelor of Science in Information Technology (BSIT)
// BSHM - Bachelor of Science in Hospitality Management (BSHM)
// BSFi - Bachelor of Science in Fisheries (BSFi)

// BSInduTech Auto - Bachelor of Science in Industrial Technology (BSInT) | Major in Automotive Technology
// BSInduTech Elec - Bachelor of Science in Industrial Technology (BSInT) | Major in Electrical Technology
// BSInduTech FBPSM - Bachelor of Science in Industrial Technology (BSInT) | Major in Food and Beverage Preparation and Service Management
// BSInduTech Mech - Bachelor of Science in Industrial Technology (BSInT) | Major in Mechanical Technology
require_once 'xlsx.php'; // Include the SimpleXLSX library
include '../dbConnection/db.php';
if (isset($_POST['Import'])) {
    $YLEVEL = '1';
    $SEMESTER ='1st';
    $PROGRAM_DESC = '';
    $COURSE = '';
    $DEPARTMENT = '';
    $EFFECTIVE_YEAR = $_POST['EFFECTIVE_YEAR'];              
    $ADVISER_ID = $_SESSION['CURRENT_USERID'];
    $PROGRAM_ADVISER = $_SESSION['CURRENT_FNAME'];
    if (isset($_FILES['excel']['name'])) {

        if ($conn) {
            $excel = SimpleXLSX::parse($_FILES['excel']['tmp_name']);
            // echo "<pre>";
            for ($sheet = 0; $sheet < sizeof($excel->sheetNames()); $sheet++) {
                $rowcol = $excel->dimension($sheet);
                $i = 0;
                if ($rowcol[0] != 1 && $rowcol[1] != 1) {
                    $sheetName = $excel->sheetNames()[$sheet];
                    if ($sheetName == "BEEd" || $sheetName == "BSEd Math" || $sheetName == "BSEd Science" || $sheetName == "BTLEd" || $sheetName == "BTVTEd Auto" || $sheetName == "BTVTEd Elec" || $sheetName == "BTVTEd FSM" || $sheetName == "BTVTEd Mech" || $sheetName == "BSInfoTech" || $sheetName == "BSHM" || $sheetName == "BSFi" || $sheetName == "BSInduTech Auto" || $sheetName == "BSInduTech Elec" || $sheetName == "BSInduTech FBPSM" || $sheetName == "BSInduTech Mech") { // Check if the sheet name matches the table name
                        if($sheetName == 'BSInfoTech'){
                            $PROGRAM_DESC = 'Bachelor of Science in Information Technology (BSIT)';
                            $COURSE = 'BSInfoTech';
                            $DEPARTMENT = 'Technology';
                        }elseif($sheetName == 'BSHM'){
                            $PROGRAM_DESC = 'Bachelor of Science in Hospitality Management (BSHM)';
                            $COURSE = 'BSHM';
                            $DEPARTMENT = 'Technology';
                        }elseif($sheetName == 'BSFi'){
                            $PROGRAM_DESC = 'Bachelor of Science in Fisheries (BSFi)';
                            $COURSE = 'BBSFi';
                            $DEPARTMENT = 'Technology';
                        }elseif($sheetName == 'BSInduTech Auto'){
                            $PROGRAM_DESC = 'Bachelor of Science in Industrial Technology (BSInT)';
                            $COURSE = 'BSInduTech Auto';
                            $DEPARTMENT = 'Technology';
                        }elseif($sheetName == 'BSInduTech Elec'){
                            $PROGRAM_DESC = 'Bachelor of Science in Industrial Technology (BSInT)';
                            $COURSE = 'BSInduTech Elec';
                            $DEPARTMENT = 'Technology';
                        }elseif($sheetName == 'BSInduTech FBPSM'){
                            $PROGRAM_DESC = 'Bachelor of Science in Industrial Technology (BSInT)';
                            $COURSE = 'BSInduTech FBPSM';
                            $DEPARTMENT = 'Technology';
                        }elseif($sheetName == 'BSInduTech Mech'){
                            $PROGRAM_DESC = 'Bachelor of Science in Industrial Technology (BSInT)';
                            $COURSE = 'BSInduTech Mech';
                            $DEPARTMENT = 'Technology';
                        }elseif($sheetName == 'BEEd'){
                            $PROGRAM_DESC = 'Bachelor of Elementary Education (BEEd)';
                            $COURSE = 'BEEd';
                            $DEPARTMENT = 'GEN. ED.';
                        }elseif($sheetName == 'BSEd Math'){
                            $PROGRAM_DESC = ' - Bachelor of Secondary Education (BSEd)';
                            $COURSE = 'BSEd Math';
                            $DEPARTMENT = 'GEN. ED.';
                        }elseif($sheetName == 'BSEd Science'){
                            $PROGRAM_DESC = 'Bachelor of Secondary Education (BSEd)';
                            $COURSE = 'BSEd Science';
                            $DEPARTMENT = 'GEN. ED.';
                        }elseif($sheetName == 'BTLEd'){
                            $PROGRAM_DESC = 'Bachelor of Technology and Livelihood Education (BTLEd)';
                            $COURSE = 'BTLEd(Major in Home Economics)';
                            $DEPARTMENT = 'GEN. ED.';
                        }elseif($sheetName == 'BTVTEd Auto'){
                            $PROGRAM_DESC = 'Bachelor of Technical - Vocational Teacher Education (BTVTEd)';
                            $COURSE = 'BTVTEd Auto';
                            $DEPARTMENT = 'GEN. ED.';
                        }elseif($sheetName == 'BTVTEd Elec'){
                            $PROGRAM_DESC = 'Bachelor of Technical - Vocational Teacher Education (BTVTEd)';
                            $COURSE = 'BTVTEd Elec';
                            $DEPARTMENT = 'GEN. ED.';
                        }elseif($sheetName == 'BTVTEd FSM'){
                            $PROGRAM_DESC = 'Bachelor of Technical - Vocational Teacher Education (BTVTEd)';
                            $COURSE = 'BTVTEd FSM';
                            $DEPARTMENT = 'GEN. ED.';
                        }elseif($sheetName == 'BTVTEd Mech'){
                            $PROGRAM_DESC = 'Bachelor of Technical - Vocational Teacher Education (BTVTEd)';
                            $COURSE = 'BTVTEd Mech';
                            $DEPARTMENT = 'GEN. ED.';
                        }
                        foreach ($excel->rows($sheet) as $key => $row) {
                            if ($i > 10) { // Ignore the first 11 row
                                $TO_SKIP[0] = $row[0];
                                $TO_SKIP[1] = $row[1];
                                $TO_SKIP[2] = $row[2];
                                $TO_SKIP[3] = $row[3];
                                $TO_SKIP[4] = $row[4];
                                $TO_SKIP[5] = $row[5];
                                $TO_SKIP[6] = $row[6];
                                $TO_SKIP[7] = $row[7];
                                $TO_SKIP[8] = $row[8];
                                $TO_SKIP[9] = $row[9];

                                $TO_SKIP[10] = $TO_SKIP[0];
                            
                                if($TO_SKIP[0] == 'TOTAL' || $TO_SKIP[0] == 'TOTAL ACADEMIC UNITS' || $TO_SKIP[0] == 'TOTAL ACADEMIC UNITS:' || $TO_SKIP[0] == 'OVERALL TOTAL ACADEMIC UNITS' || $TO_SKIP[1] == 'TOTAL' || $TO_SKIP[1] == 'TOTAL ACADEMIC UNITS' || $TO_SKIP[1] == 'TOTAL ACADEMIC UNITS:' || $TO_SKIP[1] == 'OVERALL TOTAL ACADEMIC UNITS' || $TO_SKIP[2] == 'TOTAL' || $TO_SKIP[2] == 'TOTAL ACADEMIC UNITS' || $TO_SKIP[2] == 'TOTAL ACADEMIC UNITS:' || $TO_SKIP[2] == 'OVERALL TOTAL ACADEMIC UNITS' || $TO_SKIP[3] == 'TOTAL' || $TO_SKIP[3] == 'TOTAL ACADEMIC UNITS' || $TO_SKIP[3] == 'TOTAL ACADEMIC UNITS:' || $TO_SKIP[3] == 'OVERALL TOTAL ACADEMIC UNITS' || $TO_SKIP[4] == 'TOTAL' || $TO_SKIP[4] == 'TOTAL ACADEMIC UNITS' || $TO_SKIP[4] == 'TOTAL ACADEMIC UNITS:' || $TO_SKIP[4] == 'OVERALL TOTAL ACADEMIC UNITS' || $TO_SKIP[5] == 'TOTAL' || $TO_SKIP[5] == 'TOTAL ACADEMIC UNITS' || $TO_SKIP[5] == 'TOTAL ACADEMIC UNITS:' || $TO_SKIP[5] == 'OVERALL TOTAL ACADEMIC UNITS' || $TO_SKIP[6] == 'TOTAL' || $TO_SKIP[6] == 'TOTAL ACADEMIC UNITS' || $TO_SKIP[6] == 'TOTAL ACADEMIC UNITS:' || $TO_SKIP[6] == 'OVERALL TOTAL ACADEMIC UNITS' || $TO_SKIP[7] == 'TOTAL' || $TO_SKIP[7] == 'TOTAL ACADEMIC UNITS' || $TO_SKIP[7] == 'TOTAL ACADEMIC UNITS:' || $TO_SKIP[7] == 'OVERALL TOTAL ACADEMIC UNITS' || $TO_SKIP[8] == 'TOTAL' || $TO_SKIP[8] == 'TOTAL ACADEMIC UNITS' || $TO_SKIP[8] == 'TOTAL ACADEMIC UNITS:' || $TO_SKIP[8] == 'OVERALL TOTAL ACADEMIC UNITS' || $TO_SKIP[9] == 'TOTAL' || $TO_SKIP[9] == 'TOTAL ACADEMIC UNITS' || $TO_SKIP[9] == 'TOTAL ACADEMIC UNITS:' || $TO_SKIP[9] == 'OVERALL TOTAL ACADEMIC UNITS' || $TO_SKIP[0] == '1st Semester' || $TO_SKIP[0] == '2nd Semester' || $TO_SKIP[0] == 'FIRST YEAR' || $TO_SKIP[0] == 'SECOND YEAR' || $TO_SKIP[0] == 'THIRD YEAR' || $TO_SKIP[0] == 'FOURTH YEAR' || $TO_SKIP[1] == '1st Semester' || $TO_SKIP[1] == '2nd Semester' || $TO_SKIP[1] == 'FIRST YEAR' || $TO_SKIP[1] == 'SECOND YEAR' || $TO_SKIP[1] == 'THIRD YEAR' || $TO_SKIP[1] == 'FOURTH YEAR' || $TO_SKIP[2] == '1st Semester' || $TO_SKIP[2] == '2nd Semester' || $TO_SKIP[2] == 'FIRST YEAR' || $TO_SKIP[2] == 'SECOND YEAR' || $TO_SKIP[2] == 'THIRD YEAR' || $TO_SKIP[2] == 'FOURTH YEAR' || $TO_SKIP[3] == '1st Semester' || $TO_SKIP[3] == '2nd Semester' || $TO_SKIP[3] == 'FIRST YEAR' || $TO_SKIP[3] == 'SECOND YEAR' || $TO_SKIP[3] == 'THIRD YEAR' || $TO_SKIP[3] == 'FOURTH YEAR' || $TO_SKIP[4] == '1st Semester' || $TO_SKIP[4] == '2nd Semester' || $TO_SKIP[4] == 'FIRST YEAR' || $TO_SKIP[4] == 'SECOND YEAR' || $TO_SKIP[4] == 'THIRD YEAR' || $TO_SKIP[4] == 'FOURTH YEAR' || $TO_SKIP[5] == '1st Semester' || $TO_SKIP[5] == '2nd Semester' || $TO_SKIP[5] == 'FIRST YEAR' || $TO_SKIP[5] == 'SECOND YEAR' || $TO_SKIP[5] == 'THIRD YEAR' || $TO_SKIP[5] == 'FOURTH YEAR' || $TO_SKIP[6] == '1st Semester' || $TO_SKIP[6] == '2nd Semester' || $TO_SKIP[6] == 'FIRST YEAR' || $TO_SKIP[6] == 'SECOND YEAR' || $TO_SKIP[6] == 'THIRD YEAR' || $TO_SKIP[6] == 'FOURTH YEAR' || $TO_SKIP[7] == '1st Semester' || $TO_SKIP[7] == '2nd Semester' || $TO_SKIP[7] == 'FIRST YEAR' || $TO_SKIP[7] == 'SECOND YEAR' || $TO_SKIP[7] == 'THIRD YEAR' || $TO_SKIP[7] == 'FOURTH YEAR' || $TO_SKIP[8] == '1st Semester' || $TO_SKIP[8] == '2nd Semester' || $TO_SKIP[8] == 'FIRST YEAR' || $TO_SKIP[8] == 'SECOND YEAR' || $TO_SKIP[8] == 'THIRD YEAR' || $TO_SKIP[8] == 'FOURTH YEAR' || $TO_SKIP[9] == '1st Semester' || $TO_SKIP[9] == '2nd Semester' || $TO_SKIP[9] == 'FIRST YEAR' || $TO_SKIP[9] == 'SECOND YEAR' || $TO_SKIP[9] == 'THIRD YEAR' || $TO_SKIP[9] == 'FOURTH YEAR'){
                    
                                    $SKIP[0] = $row[0];
                                    if($SKIP[0] == 'FIRST YEAR'){
                                        $YLEVEL = 1;
                                    }elseif($SKIP[0] == 'SECOND YEAR'){
                                        $YLEVEL = 2;
                                    }elseif($SKIP[0] == 'THIRD YEAR'){
                                        $YLEVEL = 3;
                                    }elseif($SKIP[0] == 'FOURTH YEAR'){
                                        $YLEVEL = 4;
                                    }
                                    
                                }else{
                                    $COURSE_CODE = $row[0];
                                    $COURSE_TITLE = $row[1];
                                    $LEC = $row[6];
                                    $LAB = $row[7];
                                    $PRE_REQUISITE = $row[8];
                                    if($SKIP[0] == '1st Semester'){
                                        $SEMESTER = '1st';
                                    }elseif($SKIP[0] == '2nd Semester'){
                                        $SEMESTER = '2nd';
                                    }
                                    impCur($COURSE_CODE,$COURSE_TITLE,$LEC,$LAB,$PRE_REQUISITE,$EFFECTIVE_YEAR,$PROGRAM_DESC,$COURSE,$SEMESTER,$ADVISER_ID,$PROGRAM_ADVISER,$DEPARTMENT,$YLEVEL);
                                }
                                
                            }
                            $i++;
                        }
                    } else {
                        echo "<div><span>The name of the Excel sheet '$sheetName' does not match the recommended name. Please ensure that the Excel sheet name matches the recommended name. The sheet will be ignored.</span></div>";
                    }
                }
            }
        }
    }
}

function impCur($COURSE_CODE,$COURSE_TITLE,$LEC,$LAB,$PRE_REQUISITE,$EFFECTIVE_YEAR,$PROGRAM_DESC,$COURSE,$SEMESTER,$ADVISER_ID,$PROGRAM_ADVISER,$DEPARTMENT,$YLEVEL){
    include '../dbConnection/db.php';

    $check_query = "SELECT * FROM CURRICULUM WHERE COURSE_CODE = '$COURSE_CODE' AND DESCRIPTIVE_TITLE = '$COURSE_TITLE' AND COURSE = '$COURSE' AND EFFECTIVE_YEAR='$EFFECTIVE_YEAR' AND YLEVEL='$YLEVEL';";
    $check_result = mysqli_query($conn, $check_query);
    $check_row = mysqli_fetch_assoc($check_result);
    if (!$check_row) {
        $query = "INSERT INTO `CURRICULUM`(`COURSE_CODE`, `DESCRIPTIVE_TITLE`, `LEC`, `LAB`, `PRE_REQUISITE`, `EFFECTIVE_YEAR`, `PROGRAM_DESC`, `COURSE`, `SEMESTER`,`ADVISER_ID`,`PROGRAM_ADVISER`,`DEPARTMENT`,`YLEVEL`) VALUES ('$COURSE_CODE','$COURSE_TITLE','$LEC','$LAB','$PRE_REQUISITE','$EFFECTIVE_YEAR','$PROGRAM_DESC','$COURSE','$SEMESTER','$ADVISER_ID','$PROGRAM_ADVISER','$DEPARTMENT','$YLEVEL')";
        if (mysqli_query($conn, $query)) {
            echo "<div><p>$COURSE_CODE inserted successfully</p></div>";
        }
    } else {
        echo "<div><span>The COURSE code '$COURSE_CODE' already exists. This entry will be ignored.</span></div>";
    }
}

    