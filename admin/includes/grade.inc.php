<?php
$count = 0;
$get_ID = $_GET['ID'] ?? '';
$TOTAL_LAB = 0;
$TOTAL_LEC = 0;
include '../dbConnection/db.php';
$COURSE = " ";
$SY = '';
$ID = $rows['ID'] ?? '';

$COURSE_CODE = '';

if (!empty($_GET['ID'])) {
    $levelMap = [
        1 => 'FIRST YEAR',
        2 => 'SECOND YEAR',
        3 => 'THIRD YEAR',
        4 => 'FOURTH YEAR',
    ];

    $modalCounter = 0; // Initialize modal counter outside the loop

    for ($LVL = 1; $LVL < 5; $LVL++) {
        $LVL_TEXT = $levelMap[$LVL] ?? '';

        for ($SEM = 1; $SEM < 3; $SEM++) {
            switch ($SEM) {
                case 1:
                    $SEM_TEXT = 'FIRST SEMESTER';
                    $SEM_SQL = '1st';
                    break;
                case 2:
                    $SEM_TEXT = 'SECOND SEMESTER';
                    $SEM_SQL = '2nd';
                    break;
                default:
                    $SEM_TEXT = '';
                    $SEM_SQL = '';
                    break;
            }

            echo '
            <tr class="t-YLVL">
              <td colspan="6" class="td-YLVL" style="text-align:left;"><strong>' . $LVL_TEXT . ' - ' . $SEM_TEXT . '</strong></td>
            </tr>
            ';
            $sql = "SELECT * FROM GRADE WHERE SCHOOL_ID = '$get_ID' AND YLEVEL = $LVL AND SEMESTER = '$SEM_SQL' AND SUBMITTED = 1";
            $result = mysqli_query($conn, $sql);
            $modalCounter = 0; // Reset modal counter for each level and semester
            while ($rows = mysqli_fetch_assoc($result)) {
                $count++;

                $COURSE_CODE = $rows['COURSE_CODE'] ?? '';
                $DESCRIPTIVE_TITLE = $rows['DESCRIPTIVE_TITLE'] ?? '';
                $LAB = $rows['LAB'] ?? 0;
                $TOTAL_LAB += $LAB;
                $LEC = $rows['LEC'] ?? 0;
                $TOTAL_LEC += $LEC;
                $PRE_REQUISITE = $rows['PRE_REQUISITE'] ?? '';
                $PRE_REQUISITE = $PRE_REQUISITE == '' ? 'None' : $PRE_REQUISITE;
                $YLEVEL = $rows['YLEVEL'] ?? '';
                $LEVEL = $levelMap[$YLEVEL] ?? '';
                $SY = $rows['SY'];
                $SEMESTER = $rows['SEMESTER'] ?? '';
                $MID_TERM = $rows['MID_TERM'] ?? '';
                $FINAL_TERM = $rows['FINAL_TERM'] ?? '';
                $GEN_AVE = $rows['GEN_AVE'] ?? '';
                $avg = $GEN_AVE;
                $remarks = $rows['REMARKS'] ?? '';

                echo '
                <tr>
                  <td hidden>' . $count . '</td>
                  <td class="td-left">' . $COURSE_CODE . '</td>
                  <td class="td-left">' . $DESCRIPTIVE_TITLE . '</td>
                  <td>' . $MID_TERM . '</td>
                  <td>' . $FINAL_TERM . '</td>
                  <td>' . $GEN_AVE . '</td>
                  <td>' . $LEC . '</td>
                  <td>' . $LAB . '</td>
                  <td>' . $PRE_REQUISITE . '</td>
                  <td>' . $remarks . '</td>
                  ';

                if ($_SESSION['CURRENT_SROLE'] == "ADMIN") {
                    $modalCounter++; // Increment modal counter for each row
                    echo '<td>
                    <button type="button" class="btn edit_data" style="
                        align-items: center;
                         text-align: center;
                         background-color: green;
                         padding: 2px 8px 2px 10px;
                         color: white;
                         margin: 0;
                       " data-toggle="modal" data-target="#editModal' . $modalCounter . '">
                   EDIT
                    </button>
                    </td>
                    ';
                }

                echo '
                </tr>';
            }

            $TOTAL_LEC = empty($TOTAL_LEC) ? 0 : $TOTAL_LEC;
            $TOTAL_LAB = empty($TOTAL_LAB) ? 0 : $TOTAL_LAB;

            if ($_SESSION['CURRENT_SROLE'] == "ADMIN") {
                $colspan1 = 'colspan="3"';
                $colspan2 = 'colspan="3"';
            } else {
                $colspan1 = 'colspan="2"';
                $colspan2 = 'colspan="2"';
            }

            echo '
            <tr class="tr-SUBTOTAL">
              <td colspan="5" class="td-SUBTOTAL" style="text-align:right;">TOTAL</td>
              <td>' . $TOTAL_LEC . '</td>
              <td>' . $TOTAL_LAB . '</td>
              <td ' . $colspan1 . '></td>
            </tr>
            <tr class="tr-UNITS">
              <td colspan="5" class="td-UNITS" style="text-align:right;">TOTAL ACADEMIC UNIT</td>
              <td class="td-U" colspan="2">' . ($TOTAL = $TOTAL_LEC + $TOTAL_LAB) . '</td>
              <td ' . $colspan2 . '></td>
            </tr>';

            $TOTAL_LAB = 0;
            $TOTAL_LEC = 0;

            $sql = "SELECT * FROM GRADE WHERE SCHOOL_ID = '$get_ID' AND YLEVEL = $LVL AND SEMESTER = '$SEM_SQL' AND SUBMITTED = 1";
            $result = mysqli_query($conn, $sql);
            $modalCounter = 0; // Reset modal counter
            while ($rows = mysqli_fetch_assoc($result)) {
                $modalCounter++; // Increment modal counter for each row
                // Rest of your modal code
                ?>

                <div class="modal" id="editModal<?= $modalCounter ?>">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Edit Grade</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="">
                                    <input type="hidden" name="ID" value="<?= $ID ?>">
                                    <input type="hidden" name="SY" value="<?= $SY ?>">
                                    <input type="hidden" name="COURSE_CODE" value="<?= $COURSE_CODE ?>">
                                    <input type="hidden" name="YLEVEL" value="<?= $YLEVEL ?>">
                                    <input type="hidden" name="SEMESTER" value="<?= $SEMESTER ?>">

                                    <div class="form-group">
                                        <label class="control-label" for="courseCode"><?= $COURSE_CODE ?></label>
                                    </div>
                                    <div class="form-group">
                                        <label for="midTerm">Mid-Term:</label>
                                        <input type="text" class="form-control" name="MID_TERM" id="midTerm<?= $modalCounter ?>" step="0.1" min="1.0" max="5.0" value="<?= $MID_TERM ?>" oninput="computeFinalGrade(this)">
                                    </div>
                                    <div class="form-group">
                                        <label for="finalTerm">Final Term:</label>
                                        <input type="text" class="form-control" name="FINAL_TERM" id="finalTerm<?= $modalCounter ?>" step="0.1" min="1.0" max="5.0" value="<?= $FINAL_TERM ?>" oninput="computeFinalGrade(this)">
                                    </div>
                                    <div class="form-group">
                                        <label for="genAve">Gen. Ave.:</label>
                                        <input type="text" class="form-control" name="GEN_AVE" id="genAve<?= $modalCounter ?>" value="<?= $GEN_AVE ?>" readonly>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary" name="updateGrade">Save</button>
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
    }
}
?>
<script>
    function computeFinalGrade(input) {
        var midTermInput = input.id;
        var modalCounter = midTermInput.substring(8); // Extract the modal counter from the input ID

        var midTermValue = parseFloat(document.getElementById(midTermInput).value);
        var finalTermValue = parseFloat(document.getElementById('finalTerm' + modalCounter).value);
        var genAveInput = document.getElementById('genAve' + modalCounter);

        if (!isNaN(midTermValue) && !isNaN(finalTermValue)) {
            var genAve = (midTermValue + finalTermValue) / 2;
            genAveInput.value = genAve.toFixed(2);
        } else {
            genAveInput.value = '';
        }
    }
</script>
