

<?php include_once '../templates/nav.php';?>
	
	<div id="edit_student<?php echo $ID; ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-body">
			<div class="alert alert-info">Add Grade</div>
			<form class="form-horizontal" method="post">
				
				<div class="control-group">
					<?php

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
					<input type="hidden" name="ID" value="<?php echo $ID; ?>">
					<input type="hidden" name="SY" value="<?php echo $SY; ?>">
					<input type="hidden" name="COURSE" value="<?php echo $COURSE;?>"/>
					<input type="hidden" value="<?php echo $SEMESTER ?>" name="SEMESTER">
					<label class="control-label" for="inputEmail">Subject Code</label>
					<div class="controls">


						<input type="hidden" name="COURSE_CODE" value="<?php echo $COURSE_CODE;  ?>">
						<strong><?php echo $COURSE_CODE;  ?></strong>

					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="inputPassword">Mid</label>
					<div class="controls">
						<input type="number" id="MID_TERM" name="MID_TERM" step="0.1" min="1.0" max="5.0" value="<?php echo $MID_TERM ?>" oninput="computeFinalGrade()">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="inputPassword">Final</label>
					<div class="controls">
						<input type="number" id="FINAL_TERM" name="FINAL_TERM" step="0.1" min="1.0" max="5.0" value="<?php echo $FINAL_TERM; ?>" oninput="computeFinalGrade()">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="inputPassword">Final Grade</label>
					<div class="controls">
						<input type="text" id="GEN_AVE" name="GEN_AVE" step="0.1" min="1.0" max="5.0" value="<?php echo $GEN_AVE; ?>" style="background-color:transparent" readonly>
					</div>
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

				<div class="control-group">
					<div class="controls">
						<button name="edit" type="submit" class="btn btn-success"><i class="icon-save icon-large"></i>&nbsp;Save</button>
					</div>
				</div>
			</form>
		</div>
		<div class="modal-footer">
			<button class="btn" data-dismiss="modal" aria-hidden="true"><i class="icon-remove icon-large"></i>&nbsp;Close</button>
		</div>
	</div>

	<?php

	if (isset($_POST['edit'])) {
		$SY = $_POST['SY'];
		$ID=$_POST['ID'];
		$COURSE = $_POST['COURSE'];
		$GEN_AVE = $_POST['GEN_AVE'];
		$SEMESTER = $_POST['SEMESTER'];
		$MID_TERM = $_POST['MID_TERM'];
		$FINAL_TERM = $_POST['FINAL_TERM'];

		if ($GEN_AVE >= 1.0 && $GEN_AVE <= 3.2) {
			$REMARKS = "Passed";
		} elseif ($GEN_AVE >= 3.3 && $GEN_AVE <= 4.2) {
			$ave = 4.0;
			$REMARKS = "Conditional";
		} elseif ($GEN_AVE >= 4.3 && $GEN_AVE <= 5.0) {
			$GEN_AVE = 5.0;
			$REMARKS = "Failed";
		} else {
			$REMARKS = "";
		}
		include_once '../dbConnection/db.php';
		$sql = "UPDATE GRADE SET COURSE_CODE='$COURSE_CODE', MID_TERM='$MID_TERM', FINAL_TERM='$FINAL_TERM', GEN_AVE='$GEN_AVE', SY='$SY', SEMESTER='$SEMESTER', REMARKS='$REMARKS' WHERE ID='$ID'";
		$result = mysqli_query($conn, $sql);

		if (!$result) {
			die("Update failed: " . mysqli_error($connection));
		} else {
			echo "Update successful";
		}

	?>


		<script>
			window.location = "view_grade.php<?php echo '?ID=' . $get_ID;  ?>";
		</script>
	<?php
	}
	?>