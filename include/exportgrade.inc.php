<div class = "notif-create-con">

    <div class = "notif-create">

        <?php
            require_once 'xlsx.php'; // Include the SimpleXLSX library
            require_once '../dbConnection/db.php';

            if (isset($_POST['submit'])) {
                // Check if a file was uploaded
                if (isset($_FILES['excel']['name'])) {

                    if ($conn) {
                        $excel = SimpleXLSX::parse($_FILES['excel']['tmp_name']);
                        for ($sheet = 0; $sheet < sizeof($excel->sheetNames()); $sheet++) {
                            $rowcol = $excel->dimension($sheet);
                            $i = 0;
                            if ($rowcol[0] != 1 && $rowcol[1] != 1) {
                                $sheetName = $excel->sheetNames()[$sheet];
                                if ($sheetName == "STUDENT") { // Check if the sheet name matches the table name
                                    foreach ($excel->rows($sheet) as $key => $row) {
                                        if ($i > 0) { // Ignore the first row
                                            $SCHOOL_ID = $row[0];
                                            $FIRSTNAME = $row[1];
                                            $LASTNAME = $row[2];
                                            $MI = $row[3];
                                            $YLEVEL = $row[4];
                                            $COURSE = $row[5];
                                            $DEPARTMENT = $row[6];
                                            $AY = $row[7];
                                            $SEMESTER = $row[8];
                                            $SROLE = 'STUDENT';

                                            $check_query = "SELECT * FROM LISTING WHERE SCHOOL_ID = '$SCHOOL_ID' and YLEVEL = '$YLEVEL' and SEMESTER = '$SEMESTER';";
                                            $check_result = mysqli_query($conn, $check_query);
                                            $check_row = mysqli_fetch_assoc($check_result);
                                            if (!$check_row) {
                                                // require_once '../dbConnection/db.php';
                                                
                                                $query = "INSERT INTO LISTING (	SCHOOL_ID, FIRSTNAME, LASTNAME, MI, YLEVEL, COURSE, DEPARTMENT, AY, SEMESTER, SROLE) VALUES ('$SCHOOL_ID', '$FIRSTNAME', '$LASTNAME', '$MI', '$YLEVEL', '$COURSE', '$DEPARTMENT', '$AY', '$SEMESTER', '$SROLE');";
                                                if (mysqli_query($conn, $query)) {
                                                    echo "<span><label>$FIRSTNAME' '$LASTNAME COURSE/Level : $COURSE/$YLEVEL - Inserted successfully.</label></span><br>";
                                                }
                                            } else {
                                                echo "<span><p>School ID $FIRSTNAME' '$LASTNAME already exists in the database. Ignoring this entry.</p></span><br>";
                                            }
                                        }
                                        $i++;
                                    }
                                } elseif($sheetName == "INSTRUCTOR"){
                                    foreach ($excel->rows($sheet) as $key => $row) {
                                        if ($i > 0) { // Ignore the first row
                                            $SCHOOL_ID = $row[0];
                                            $FIRSTNAME = $row[1];
                                            $LASTNAME = $row[2];
                                            $MI = $row[3];
                                            $YLEVEL = '';
                                            $COURSE = '';
                                            $DEPARTMENT = '';
                                            $AY = '';
                                            $SEMESTER = '';
                                            $SROLE = 'INSTRUCTOR';

                                            $check_query = "SELECT * FROM LISTING WHERE SCHOOL_ID = '$SCHOOL_ID' and YLEVEL = '' and SEMESTER = '';";
                                            $check_result = mysqli_query($conn, $check_query);
                                            $check_row = mysqli_fetch_assoc($check_result);
                                            if (!$check_row) {
                                                require_once '../dbConnection/db.php';

                                                $query = "INSERT INTO LISTING (	SCHOOL_ID, FIRSTNAME, LASTNAME, MI, YLEVEL, COURSE, DEPARTMENT, AY, SEMESTER, SROLE) VALUES ('$SCHOOL_ID', '$FIRSTNAME', '$LASTNAME', '$MI', '$YLEVEL', '$COURSE', '$DEPARTMENT', '$AY', '$SEMESTER', '$SROLE');";
                                                if (mysqli_query($conn, $query)) {
                                                    echo "<span><label>$FIRSTNAME' '$LASTNAME COURSE/Level : $COURSE/$YLEVEL - Inserted successfully.</label></span><br>";
                                                }
                                            } else {
                                                echo "<span><p>School ID $FIRSTNAME' '$LASTNAME already exists in the database. Ignoring this entry.</p></span><br>";
                                            }
                                        }
                                        $i++;
                                    }
                                } else {
                                    echo "<span><p>Excel sheet $sheetName does not match the name of the database table. Ignoring this sheet.</p></span><br>";
                                }
                            }
                        }
                    }
                }
            }

        ?>

    </div>

</div>




