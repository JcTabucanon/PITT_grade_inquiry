
    <link rel="stylesheet" href="assets/viewstudent.css">

    <?php
    if (!empty($_GET['COURSE']) && !empty($_GET['YLEVEL']) && !empty($_GET['SEMESTER']) && !empty($_GET['SY'])) {
        $COURSE = $_GET['COURSE'];
        $YLEVEL = $_GET['YLEVEL'];
        $SEMESTER = $_GET['SEMESTER'];
        $SY = $_GET['AY'];
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
        // Query the database to get the list of COURSE 
        $sql = "SELECT * from grade WHERE grade = '$COURSE' and YLEVEL = '$YLEVEL' and SEMESTER='$SEMESTER' and SY='$SY'";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $SEMESTER = $row["SEMESTER"];
            $SY = $row["SY"];
            $adviserId = $row["ADVISER_ID"];
            $programAdviser = $row["PROGRAM_ADVISER"];
            $instructorName = $row["INSTRUCTOR_NAME"];
            if ($SEMESTER == "1st") {
                $SEMESTER = "First SEMESTER";
            } elseif ($SEMESTER == "2nd") {
                $SEMESTER = "Second SEMESTER";
            }
        }
    }

    ?>
    <div class="wrapper2">
        <div class="container1">
            <div class="c-con">

                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>SCHOOL&nbsp;ID</th>
                            <th>NAME</th>
                            <th>COURSE</th>
                            <th>YEAR&nbsp;LEVEL</th>
                            <th>CURRICULUM</th>
                        </tr>
                    </thead>
                    <?php
                    include 'includes/viewstudents.inc.php';
                    ?>
                </table>
                <!-- add  -->
              

                <!-- add  -->

            </div>
        </div>

    </div>


    <script src="../modal/javascript/viewStudents_modal.js"></script>