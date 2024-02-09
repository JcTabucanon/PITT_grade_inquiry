  // Get the modal
var open_modal = document.getElementById("open_modalGrade");

// Get the button that opens the modal
var btn = document.getElementById("open_modal");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close_modal_Grade")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  open_modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  open_modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  var id = $(this).data('id');
  var course = $(this).data('course');
  var sy = $(this).data('sy');
  var YLEVEL = $(this).data('YLEVEL');
  var course_code = $(this).data('course_code');
  var descriptive_title = $(this).data('descriptive_title');
  var semester = $(this).data('semester');
  var midTerm = $(this).data('mid-term');
  var finalTerm = $(this).data('final-term');
  var genAve = $(this).data('gen-ave');
  var avg = $(this).data('e-avg');
  var instructor_id = $(this).data('instructor-id');

  $('#STUDENT_ID').val(id);
  $('#COURSE').val(course);
  $('#SY').val(sy);
  $('#YLEVEL').val(YLEVEL);
  $('#COURSE_code').val(course_code);
  $('#DESCRIPTIVE_TITLE').val(descriptive_title);
  $('#SEMESTER').val(semester);
  $('#MID_TERM').val(midTerm);
  $('#FINAL_TERM').val(finalTerm);
  $('#GEN_AVE').val(genAve);
  $('#avg').val(avg);
  $('#INSTRUCTOR_ID').val(instructor_id);
  if (event.target == modal) {
    open_modal.style.display = "none";
  }
}