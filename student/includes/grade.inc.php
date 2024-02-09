<?php
$count = 0;

$get_ID =$_SESSION['CURRENT_USERID'] ?? '';
$TOTAL_LAB = 0;
$TOTAL_LEC = 0;
include '../dbConnection/db.php';
$COURSE = " ";
$SY = '';
$modalCounter = 0;
$COURSE_CODE = '';

if (!empty($_SESSION['CURRENT_USERID'])) {
    $levelMap = [
        1 => 'FIRST YEAR',
        2 => 'SECOND YEAR',
        3 => 'THIRD YEAR',
        4 => 'FOURTH YEAR',
    ];

    $startYear = 2021;  // Starting school year
    $currentYear = date('Y');
    $startYear = $currentYear - ($currentYear - $startYear) % 10; // Adjust to the nearest decade

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

            $SY = ($startYear + $LVL - 1) . '-' . ($startYear + $LVL);

            echo '
            <tr class="t-YLVL">
              <td colspan="9" class="td-YLVL" style="text-align:left;"><strong>' . $LVL_TEXT . ' - ' . $SEM_TEXT . '</td>
             
            </tr>
            ';

            $sql = "SELECT * FROM GRADE WHERE SCHOOL_ID = '$get_ID' AND YLEVEL = $LVL AND SEMESTER = $SEM  AND SUBMITTED= 1";
            $result = mysqli_query($conn, $sql);

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
                $TOTAL_UNITS = $rows['TOTAL_UNITS'] ?? '';
                $YLEVEL = $rows['YLEVEL'] ?? '';
                $LEVEL = $levelMap[$YLEVEL] ?? '';
                $SY=$rows['SY'];
                $SEMESTER = $rows['SEMESTER'] ?? '';
                $MID_TERM = $rows['MID_TERM'] ?? '';
                $GEN_AVE = $rows['GEN_AVE'] ?? '';
                $avg = $GEN_AVE;

                $remarks =$rows['REMARKS'] ??  '';


                echo '
                <tr>
                  <td hidden>' . $count . '</td>
                  <td class="td-left">' . $COURSE_CODE . '</td>
                  <td class="td-left">' . $DESCRIPTIVE_TITLE . '</td>
                  
                  <td>' . $GEN_AVE . '</td>
                 
                  <td>' . $remarks . '</td>
                  ';

                if ($_SESSION['CURRENT_SROLE'] == "ADMIN") {
                    echo '<td>
                        <button type="button" class="btn btn-success edit_data" data-toggle="modal" data-target="#editModal' . $modalCounter . '">
                            <i class="icon-pencil icon-large"></i>EDIT
                        </button>
                        </td>
                    ';
                }

                echo '
                </tr>';
            }

          

            $TOTAL_LAB = 0;
            $TOTAL_LEC = 0;
        }
    }
}
?>

