<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit Curriculum</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">




      <form id="edit_form" action="../include/curEdit.inc.php" method="POST">
        <div class="form-group">
          <label for="COURSE_code">COURSE Code:</label>
          <input type="text" class="form-control" id="COURSE_code" name="COURSE_code">
        </div>

        <div class="form-group">
          <label for="descriptive_title">Descriptive Title:</label>
          <input type="text" class="form-control" id="descriptive_title" name="descriptive_title">
        </div>

        <div class="form-group">
          <label for="instructor">Instructor</label>
          <select class="form-control" id="instructor_name" name="instructor_name">
            <option disabled COURSE value="" style="display: none;">Select an option</option>
            <?php
              // Query the database to get the list of COURSE codes
              include_once '../dbConnection/db.php';
              $sql = "SELECT *  from CURRICULUM";
              $result = mysqli_query($conn, $sql);

              // Loop through the results and create an option for each COURSE code
              while ($row = mysqli_fetch_assoc($result)) {
                echo '
                  <option value="'.$row['INSTRUCTOR_NAME'].'">'.$row['INSTRUCTOR_NAME'].'</option>';
              }
            ?>
          </select>
        </div>

        <div class="form-group">
          <label for="lec">LEC:</label>
          <input type="text" class="form-control" id="lec" name="lec">
        </div>

        <div class="form-group">
          <label for="lab">LAB:</label>
          <input type="text" class="form-control" id="lab" name="lab">
        </div>

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

