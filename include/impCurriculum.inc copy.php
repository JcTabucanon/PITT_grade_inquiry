<?php
require_once 'xlsx.php'; // Include the SimpleXLSX library
require_once '../dbConnection/db.php';
if (isset($_POST['submit'])) {
    
    if (isset($_FILES['excel']['name'])) {


        if ($conn) {
            $excel = SimpleXLSX::parse($_FILES['excel']['tmp_name']);
            // echo "<pre>";
            for ($sheet = 0; $sheet < sizeof($excel->sheetNames()); $sheet++) {
                $rowcol = $excel->dimension($sheet);
                $i = 0;
                if ($rowcol[0] != 1 && $rowcol[1] != 1) {
                    $sheetName = $excel->sheetNames()[$sheet];
                    if ($sheetName == "CURRICULUM") { // Check if the sheet name matches the table name
                        foreach ($excel->rows($sheet) as $key => $row) {
                            if ($i > 0) { // Ignore the first row
                                $COURSE = $row[0];
                                $ylevel = $row[1];
                                $COURSECode = $row[2];
                                $descTitle = $row[3];
                                $instructorId = $row[4];
                                $instructorName = $row[5];
                                $lec = $row[6];
                                $lab = $row[7];
                                $sy = $row[9];
                                $SEMESTER = $row[10];
                                $totalUnits = $lec + $lab;
                                $adviser_id = $_SESSION['CURRENT_USERID'];
                                $program_adviser = $_SESSION['CURRENT_FNAME'];
                                $check_query = "SELECT * FROM CURRICULUM WHERE COURSE_CODE = '$COURSECode' and DESCRIPTIVE_TITLE = '$descTitle';";
                                $check_result = mysqli_query($conn, $check_query);
                                $check_row = mysqli_fetch_assoc($check_result);
                                if (!$check_row) {
                                    $query = "INSERT INTO `curriculum`(`COURSE`, `YLEVEL`, `COURSE_CODE`, `DESCRIPTIVE_TITLE`, `INSTRUCTOR_ID`, `INSTRUCTOR_NAME`, `LEC`, `LAB`, `TOTAL_UNITS`, `SY`, `SEMESTER`, `ADVISER_ID`, `PROGRAM_ADVISER`) VALUES ('$COURSE','$ylevel','$COURSECode','$descTitle','$instructorId','$instructorName','$lec','$lab','$totalUnits','$sy','$SEMESTER','$adviser_id','$program_adviser')";
                                    if (mysqli_query($conn, $query)) {
                                        echo "<div><p>$COURSECode inserted successfully</p></div>";
                                    }
                                } else {
                                    echo "<div><span>The COURSE code '$COURSECode' already exists. This entry will be ignored.</span></div>";
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
