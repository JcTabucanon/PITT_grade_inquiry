<div class="span12">
    <table cellpadding="0" cellspacing="0" style="border:0;" class="table table-bordered" id="example">
        <thead>
            <tr>
                <th width="100">CODE</th>
                <th width="400">COURSE</th>
                <th>SEMESTER</th>
                <th>UNITS</th>
                <th>MID</th>
                <th>FINAL</th>
                <th>FINAL GRADE</th>
                <th>REMARKS</th>
                <th class="act">ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?php  
            $get_ID = $_GET['ID'];
            include_once '../../dbConnection/db.php';
            $sql = "SELECT * FROM listing l JOIN grade g ON l.SCHOOL_ID = g.SCHOOL_ID WHERE l.SCHOOL_ID = '$get_ID'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $SY = $row['SY'];
                    $YLEVEL = $row['YLEVEL'];
                    $SEMESTER = $row['SEMESTER'];
                    $FIRSTNAME = $row['FIRSTNAME'];
                    $LASTNAME = $row['LASTNAME'];
                    $MI = $row['MI'];
                    $ID = $row['ID'];
                    $MID_TERM = $row['MID_TERM'];
                    $FINAL_TERM = $row['FINAL_TERM'];
                    $COURSE_CODE = $row['COURSE_CODE'];
                    $DESCRIPTIVE_TITLE = $row['DESCRIPTIVE_TITLE'];
                    $TOTAL_UNITS = $row['TOTAL_UNITS'];
                    $GEN_AVE = $row['GEN_AVE'];

                    if (empty($MID_TERM)) {
                        $MID_TERM = 'No Data';
                    }
                    if (empty($FINAL_TERM)) {
                        $FINAL_TERM = 'No Data';
                    }

                    echo '<tr>';
                    echo '<td>' . $COURSE_CODE . '</td>';
                    echo '<td>' . $DESCRIPTIVE_TITLE . '</td>';
                    echo '<td>' . $SEMESTER . '</td>';
                    echo '<td>' . $TOTAL_UNITS . '</td>';
                    echo '<td>' . $MID_TERM . '</td>';
                    echo '<td>' . $FINAL_TERM . '</td>';
                    echo '<td width="100">' . $GEN_AVE . '</td>';
                    echo '<td>';
                    $avg = $GEN_AVE;
                    if ($avg >= 1.0 && $avg <= 3.2) {
                        echo "Passed";
                    } else if ($avg >= 3.3 && $avg <= 4.2) {
                        echo "Conditional";
                    } else if ($avg >= 4.3 && $avg <= 5.0) {
                        echo "Failed";
                    }
                    echo '</td>';
                    include('toolttip_edit_delete.php');
                    echo '<td class="act" width="100">';
                    echo '<a rel="tooltip" title="Delete" ID="' . $ID . '" href="#delete_student' . $ID . '" data-toggle="modal" class="btn btn-danger"><i class="icon-trash icon-large"></i></a>';
                    include('delete_grade_modal.php');
                    echo '<a href="#edit_student' . $ID . '" data-toggle="modal" rel="tooltip" title="Edit" ID="e' . $ID . '" class="btn btn-success"><i class="icon-pencil icon-large"></i></a>';
                    include_once '../registrar/edit_grade.php';
                    echo '</td>';
                    echo '</tr>';
                }
            }
            ?>
        </tbody>
        
        <tfoot>
            <?php include('units_table.php'); ?>
            <?php include('gwa_table.php'); ?>
        </tfoot>
    </table>
    <hr>	
</div>
