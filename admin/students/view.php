
<?php
$get_ID = $_GET['ID'];

$sql = "SELECT * FROM GRADE WHERE SCHOOL_ID = '$get_ID'";
$result = mysqli_query($conn, $sql);

$FIRSTNAME = "";
$MI = "";
$LASTNAME = "";
$COURSE = "";
$YLEVEL = "";
$STUDENT_STATUS = "";

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $YLEVEL = $row['YLEVEL'];
    $SEMESTER = $row['SEMESTER'];
    $FIRSTNAME = $row['FIRSTNAME'];
    $LASTNAME = $row['LASTNAME'];
    $MI = $row['MI'];
    $STUDENT_STATUS = $row['STUDENT_STATUS'];
    $COURSE = $row['COURSE'];

} else {
    // Fetch data from the LISTING table based on SCHOOL_ID
    $listingSql = "SELECT * FROM LISTING WHERE SCHOOL_ID = '$get_ID'";
    $listingResult = mysqli_query($conn, $listingSql);
    if ($listingResult && mysqli_num_rows($listingResult) > 0) {
        $listingRow = mysqli_fetch_assoc($listingResult);
        $FIRSTNAME = $listingRow['FIRSTNAME'];
        $MI = $listingRow['MI'];
        $LASTNAME = $listingRow['LASTNAME'];
        $COURSE = $listingRow['COURSE'];
        $STUDENT_STATUS = $listingRow['STUDENT_STATUS'];

    }
}

?>
 
<div class="container">
    <div class="logo_pit"></div>
    <div class="margin-top">
        <div class="row">
            <div class="span">
                <div class="name">
                    <span>STUDENT NUMBER: <strong><?php echo $get_ID; ?></strong></span>
                    <span>STUDENT NAME: <strong><?php echo $FIRSTNAME . " " . $MI . " " . $LASTNAME; ?></strong></span>
                    <span>COURSE: <strong><?php echo $COURSE; ?></strong></span>
                    <span id="print_right">
                        <span><?php echo $YLEVEL; ?></span>
                        <span>Status: <strong><?php echo $STUDENT_STATUS; ?></strong></span>
                    </span>
                </div>
                <hr>
                <?php include('grade_option.php'); ?>
                <hr>
            </div>
            <div class="span2">
                <div id="add">

                </div>
            </div>
            <?php
            // units_table.php
            if (isset($SY) && isset($SEMESTER)) {
                // Use $SY and $SEMESTER as needed
                // ...
            } else {
                // Handle case when $SY and/or $SEMESTER are not defined
                // ...
            }
			
			// Rest of the code
			
            include_once 'view_table.php';
            include_once 'units_table.php'; // Pass $SY and $SEMESTER as parameters
            include_once 'gwa_table.php'; // Pass $SY and $SEMESTER as parameters
            ?>
        </div>
    </div>
</div>
<style>
                    td {
                        text-align: center;
                        vertical-align: middle;
                    }
                    
                    input[type="text"]
                    {
                        height: 20px;
                        border: 1px solid #333;
                        width: 35vw;
                    }
                   
                </style>

<div class="registrar">
    <p>Jhobert Himang</p>
    <p>Registrar</p>
</div>
