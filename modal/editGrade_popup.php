<div id="open_modalGrade" class="open_modalGrade">
     <div class="modal-content">
     <span class="close_modal_Grade">
     <div class="close-info">
          <label for="">Update account info</label>
          </div>
          <button>
               &times;
          </button>
     </span>
     <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">EDIT GRADE</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

        <form id="edit_form" action="../include/editGrade.inc.php" method="POST">
        
          <div class="form-group">
            <label for="COURSE_code">COURSE&nbsp;CODE&nbsp;:</label>
              <strong style="color: darkcyan"><?php echo $COURSE_CODE;?></strong>
          </div>

          <div class="form-group">
            <label for="descriptive_title">DESCRIPTIVE&nbsp;TITLE&nbsp;:</label>
              <strong style="color: darkcyan"><?php echo $DESCRIPTIVE_TITLE;?></strong>
          </div>

          <div class="form-group">
            <label for="mid_term">MID&nbsp;TERM</label>
            <input type="number" id="MID_TERM" name="MID_TERM" step="0.1" min="1.0" max="5.0"  oninput="cFinalGrade()">
          </div>

          <div class="form-group">
            <label for="lec">FINAL&nbsp;TERM</label>
            <input type="number" id="FINAL_TERM" name="FINAL_TERM" step="0.1" min="1.0" max="5.0" oninput="cFinalGrade()">
          </div>

          <div class="form-group">
            <label for="lab">FINAL&nbsp;GRADE</label>
            <input type="text" id="GEN_AVE" name="GEN_AVE" step="0.1" min="1.0" max="5.0"  style="background-color:transparent" readonly>
          </div>
       
          <!-- for COURSE -->
          <input type="hidden" name="DESCRIPTIVE_TITLE" value="<?php echo $DESCRIPTIVE_TITLE;?>">
          <input type="hidden" name="STUDENT_ID" id="STUDENT_ID">
          <input type="hidden" name="COURSE" value="<?php echo $COURSE;?>">
          <input type="hidden" name="COURSE_CODE" value="<?php echo $COURSE_CODE;?>" ?>
          <input type="hidden" name="SEMESTER" value="<?php echo $SEMESTER;?>">
          <input type="hidden" name="SY" id="SY">
          <input type="hidden" name="YLEVEL" value="<?php echo $YLEVEL;?>">
          <input type="hidden" name="INSTRUCTOR_ID" id="INSTRUCTOR_ID">

          <button type="submit" name="submit" value="submit" class="btn btn-primary">Save changes</button>
        </form>

      </div>
    </div>
     </div>
</div>


<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">

  </div>
</div>

<script>
  function cFinalGrade() {
    var MID_TERM = parseFloat(document.getElementById("MID_TERM").value);
    var FINAL_TERM = parseFloat(document.getElementById("FINAL_TERM").value);
    var ave = ((MID_TERM + FINAL_TERM) / 2).toFixed(1);
    document.getElementById("GEN_AVE").value = ave;
  }
  cFinalGrade(); // call the function to compute the initial value
</script>