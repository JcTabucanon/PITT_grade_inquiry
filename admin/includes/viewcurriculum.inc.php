<?php
$count = 0;
$SEM = 1;
$LVL = 1;
$TOTAL_LAB = 0;
$TOTAL_LEC = 0;
include '../dbConnection/db.php';
$COURSE = " ";
    $SY = " ";
if (!empty($_GET['COURSE']) && !empty($_GET['ADVISER_ID']) && !empty($_GET['DEPARTMENT']) && !empty($_GET['ADVISER_ID']) && !empty($_GET['PROGRAM_ADVISER'])) {
    $COURSE = $_GET['COURSE'];
    $SY = $_GET['EFFECTIVE_YEAR'];
    $DEPARTMENT = $_GET['DEPARTMENT'];
    $ADVISER_ID = $_GET['ADVISER_ID'];
    $PROGRAM_ADVISER = $_GET['PROGRAM_ADVISER'];

    while ($LVL < 5) {
        if ($LVL == 1) {
            $LVL_TEXT = 'FIRST YEAR';
        } elseif ($LVL == 2) {
            $LVL_TEXT = 'SECOND YEAR';
        } elseif ($LVL == 3) {
            $LVL_TEXT = 'THIRD YEAR';
        } elseif ($LVL == 4) {
            $LVL_TEXT = 'FOURTH YEAR';
        }
        $SEM = 1;

        while ($SEM < 3) {
            if ($SEM == 1) {
                $SEM_TEXT = 'First Semester';
                $SEM_SQL = '1st';
            } elseif ($SEM == 2) {
                $SEM_TEXT = 'Second Semester';
                $SEM_SQL = '2nd';
            }

            echo '
            <tr class="tr-YLVL">
              <td colspan="6" class="td-YLVL">' . $LVL_TEXT . '</td>
            </tr>
            <tr class="tr-SEM">
              <td colspan="6" class="td-SEM">' . $SEM_TEXT . '</td>
            </tr>
            ';

            $sql = "SELECT * FROM CURRICULUM WHERE COURSE = '$COURSE' AND EFFECTIVE_YEAR = '$SY' AND DEPARTMENT = '$DEPARTMENT' AND SEMESTER = '$SEM_SQL' AND YLEVEL = '$LVL'";
            $result = mysqli_query($conn, $sql);

            while ($rows = mysqli_fetch_assoc($result)) {
                $count++;

                $COURSE_CODE = !empty($rows['COURSE_CODE']) ? $rows['COURSE_CODE'] : '';
                $DESCRIPTIVE_TITLE = !empty($rows['DESCRIPTIVE_TITLE']) ? $rows['DESCRIPTIVE_TITLE'] : '';
                $LAB = !empty($rows['LAB']) ? $rows['LAB'] : 0;
                $TOTAL_LAB += $LAB;
                $LEC = !empty($rows['LEC']) ? $rows['LEC'] : 0;
                $TOTAL_LEC += $LEC;
                $PRE_REQUISITE = !empty($rows['PRE_REQUISITE']) ? $rows['PRE_REQUISITE'] : '';
                $PRE_REQUISITE = ($PRE_REQUISITE == '') ? 'None' : $PRE_REQUISITE;
                $TOTAL_UNITS = !empty($rows['TOTAL_UNITS']) ? $rows['TOTAL_UNITS'] : '';
                $YLEVEL = !empty($rows['YLEVEL']) ? $rows['YLEVEL'] : '';

                if ($YLEVEL == 1) {
                    $LEVEL = 'FIRST YEAR';
                } elseif ($YLEVEL == 2) {
                    $LEVEL = 'SECOND YEAR';
                } elseif ($YLEVEL == 3) {
                    $LEVEL = 'THIRD YEAR';
                } elseif ($YLEVEL == 4) {
                    $LEVEL = 'FOURTH YEAR';
                } else {
                    $LEVEL = '';
                }

                $SEMESTER = !empty($rows['SEMESTER']) ? $rows['SEMESTER'] : '';

                echo '
                <tr>
                  <td>' . $count . '</td>
                  <td class="td-left">' . $COURSE_CODE . '</td>
                  <td class="td-left">' . $DESCRIPTIVE_TITLE . '</td>
                  <td>' . $LEC . '</td>
                  <td>' . $LAB . '</td>
                  <td>' . $PRE_REQUISITE . '</td>  
                </tr>
                ';
            }

            if (empty($TOTAL_LEC)) {
                $TOTAL_LEC = 0;
            }
            if (empty($TOTAL_LAB)) {
                $TOTAL_LAB = 0;
            }

            echo '
            <tr class="tr-SUBTOTAL">
              <td></td>
              <td></td>
              <td class="td-SUBTOTAL">TOTAL</td>
              <td>' . $TOTAL_LEC . '</td>
              <td>' . $TOTAL_LAB . '</td>
              <td></td> 
            </tr>
            <tr class="tr-UNITS">
              <td></td>
              <td></td>
              <td class="td-UNITS">TOTAL ACADEMIC UNIT</td>
              <td class="td-U" colspan="2">' . ($TOTAL = $TOTAL_LEC + $TOTAL_LAB) . '</td>
              <td></td> 
            </tr>
            ';

            $SEM += 1;
        }
        $LVL += 1;
    }
}
?>
