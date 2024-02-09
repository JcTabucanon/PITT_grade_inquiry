<div class="modal fade" id="open_modal_grade" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Grade</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <?php
require_once '../dbConnection/db.php';
$query = mysqli_query($conn, "select * from grade ");
$row = mysqli_fetch_array($query);

?>
<?php
require_once '../dbConnection/db.php';
$get_ID = $_GET['ID'];
$sql = "SELECT * from GRADE where SCHOOL_ID='$get_ID'";
$result = mysqli_query($conn, $sql);
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $ID = $row['ID'];
        $SY = $row['SY'];
        $SID = $row['SCHOOL_ID'];
        $FIRSTNAME = $row['FIRSTNAME'];
        $LASTNAME = $row['LASTNAME'];
        $YLEVEL = $row['YLEVEL'];
        $STATUS = $row['STUDENT_STATUS'];
        $COURSE = $row['COURSE'];
        $COURSE_CODE = $row['COURSE_CODE'];
        $MID_TERM = $row['MID_TERM'];
        $FINAL_TERM = $row['FINAL_TERM'];
        $GEN_AVE = $row['GEN_AVE'];
    }
}
?>


      <form id="edit_form" action="../include/editGrade.inc.php" method="POST">
      <input type="hidden" name="ID" value="<?php echo $ID; ?>">
					<input type="hidden" name="SY" value="<?php echo $SY; ?>">
					<input type="hidden" name="COURSE" value="<?php echo $COURSE;?>"/>
					<input type="hidden" value="<?php echo $SEMESTER ?>" name="SEMESTER">
      <div class="form-group">
          <label for="COURSE_code">COURSE Code:</label>
          
						<input type="hidden" name="COURSE_CODE" value="<?php echo $COURSE_CODE;  ?>">
						<strong><?php echo $COURSE_CODE;  ?></strong>
        </div>

        <div class="form-group">
          <label for="descriptive_title">MID TERM</label>
          <input type="number" id="MID_TERM" name="MID_TERM" step="0.1" min="1.0" max="5.0" value="<?php echo $MID_TERM ?>" oninput="computeFinalGrade()">
        </div>

        <div class="form-group">
          <label for="lec">FINAL TERM</label>
          <input type="number" id="FINAL_TERM" name="FINAL_TERM" step="0.1" min="1.0" max="5.0" value="<?php echo $FINAL_TERM; ?>" oninput="computeFinalGrade()">
        </div>

        <div class="form-group">
          <label for="lab">FINAL GRADE</label>
          <input type="text" id="GEN_AVE" name="GEN_AVE" step="0.1" min="1.0" max="5.0" value="<?php echo $GEN_AVE; ?>" style="background-color:transparent" readonly>
        </div>

        <script>
					function computeFinalGrade() {
						var MID_TERM = parseFloat(document.getElementById("MID_TERM").value);
						var FINAL_TERM = parseFloat(document.getElementById("FINAL_TERM").value);
						var ave = ((MID_TERM + FINAL_TERM) / 2).toFixed(1);
						document.getElementById("GEN_AVE").value = ave;
					}
					computeFinalGrade(); // call the function to compute the initial value
				</script>

          <!-- for COURSE -->
          <input type="hidden" name="id" id="edit_id">
          <input type="hidden" name="COURSE" value="<?php echo $COURSE; ?>">
          <input type="hidden" name="YLEVEL" value="<?php echo $yearlvl; ?>">
          <!-- <input type="submit" name="submit" value="Submit" class="btn btn-primary"> -->
          <button type="submit" name="submit" value="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>

