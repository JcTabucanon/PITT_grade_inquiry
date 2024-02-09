<?php include('header.php'); ?>

<?php include('navbar_dashboard.php'); ?>
<?php $get_ID = $_GET['ID']; ?>
<div class="container">
	<div class="margin-top">
		<div class="row">
			<div class="">
				<?php
				$query = mysqli_query($connection, "select * from grade ");
				$row = mysqli_fetch_array($query);

				?>
				<div class="alert alert-info"><i class="icon-pencil"></i>&nbsp;Edit Student</div>

				<div class="addstudent">
					<div class="details">EDIT STUDENT</div>
					<form class="form-horizontal" method="POST" action="update_students.php" enctype="multipart/form-data">
						<?php
						require_once '../dbConnection/db.php';
						$sql = "SELECT * from GRADE where SCHOOL_ID='$get_ID'";
						$result=mysqli_query($conn,$sql);
						 if($result){
						   while($row=mysqli_fetch_assoc($result)){
							$ID = $row['ID'];
							 $SY=$row['SY'];
							 $SID=$row['SCHOOL_ID'];
							 $FIRSTNAME=$row['FIRSTNAME'];
							 $LASTNAME=$row['LASTNAME'];
							 $YLEVEL=$row['YLEVEL'];
							 $STATUS=$row['STUDENT_STATUS'];
							 $COURSE=$row['COURSE'];
						   }
						 }
						?>
						<!--iD --------------------------------------------------------------------->
						<input style="display:none;" name="ID" type="text" value ="<?php echo $ID;?>">


						<div class="control-group">
							<label class="control-label" for="inputPassword">A.Y</label>
							<div class="controls">
							<select name="SY" required class="span2">
								<option value="<?php echo $SY;?>" style="display:none;"><?php echo $SY;?></option>
								<?php include_once '../dbConnection/db.php';
								$sql = "SELECT * from CURRICULUM";
								$result = mysqli_query($conn, $sql);
								if(mysqli_num_rows($result) > 0) {
									$printed_words = array();

									while($row = mysqli_fetch_assoc($result)) {
									$SY = trim($row['SY']);

									if(!in_array($SY, $printed_words)) {
									echo '
										<option value="'.$row['SY'].'">'.$row['SY'].'</option>';
									$printed_words[] = $SY;
									}  
									}
								} 
								?>
							</select>
						</div>
						</div>


						<div class="control-group">
							<label class="control-label" for="inputPassword">Student ID:</label>
							<div class="controls">
								<input type="text" id="inputEmail" name="SCHOOL_ID" value="<?php echo $SID; ?>" placeholder="SCHOOL ID" required>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="inputEmail">FIRSTNAME:</label>
							<div class="controls">
								<input type="text" id="inputEmail" name="FIRSTNAME" value="<?php echo $FIRSTNAME; ?>" placeholder="FIRSTNAME" required>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="inputPassword">LASTNAME:</label>
							<div class="controls">
								<input type="text" id="inputPassword" name="LASTNAME" value="<?php echo $LASTNAME; ?>" placeholder="LASTNAME" required>
							</div>
						</div>
						
		<?php
						// $query = mysqli_query($connection, "select * from grade where SCHOOL_ID='$get_ID'") or die(mysqli_error($connection));
						// $row = mysqli_fetch_array($query);
						$query = mysqli_query($connection, "select * from grade") or die(mysqli_error($connection));
						$row = mysqli_fetch_array($query);

						?>
						<div class="control-group">						
							<label class="control-label" for="inputPassword">COURSE:</label>
							<div class="controls">
								<select name="COURSE" required class="span2">
									<option><?php echo $COURSE; ?></option>
									<?php include_once '../dbConnection/db.php';
									$sql = "SELECT * from CURRICULUM";
									$result = mysqli_query($conn, $sql);
									if(mysqli_num_rows($result) > 0) {
										$printed_words = array();

										while($row = mysqli_fetch_assoc($result)) {
										$COURSE = trim($row['COURSE']);

										if(!in_array($COURSE, $printed_words)) {
										echo '
											<option value="'.$row['COURSE'].'">'.$row['COURSE'].'</option>';
										$printed_words[] = $COURSE;
										}  
										}
									} 
									?>
								</select>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="inputPassword">Year Level:</label>
							<div class="controls">
								<select name="YLEVEL" required>
									<option><?php echo $YLEVEL;?></option>
									<option>First Year</option>
									<option>Second Year</option>
									<option>Third Year</option>
									<option>Fourth Year</option>
								</select>
							</div>
						</div>
						<div class="control-group">
							<label class="control-label" for="inputPassword">Status:</label>
							<div class="controls">
								<select name="STUDENT_STATUS" class="span2" required>
									<option><?php echo $STATUS; ?></option>
									<option>Regular</option>
									<option>Irregular</option>
								</select>
							</div>
						</div>
						<div class="control-group">
							<div class="controls">
								<a class="btn btn-info" href="students.php"><i class="icon-arrow-left icon-large"></i>&nbsp;Back</a>
								<button name="submit" type="submit" class="btn btn-success"><i class="icon-save icon-large"></i>&nbsp;Update</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include('footer.php') ?>