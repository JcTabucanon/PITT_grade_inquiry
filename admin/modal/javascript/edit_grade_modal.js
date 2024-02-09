$(document).ready(function() {
  $('.open_modal_grade').click(function() {
    // Get the values of the clicked row and fill the form
    var id = $(this).data('id');
    var courseCode = $(this).data('course-code');
    var descriptiveTitle = $(this).data('descriptive-title');
    var semester = $(this).data('semester');
    var midTerm = $(this).data('mid-term');
    var finalTerm = $(this).data('final-term');
    var genAve = $(this).data('gen-ave');
    var avg = $(this).data('e-avg');

    $('#edit_id').val(id);
    $('#COURSE_code').val(courseCode);
    $('#descriptive_title').val(descriptiveTitle);
    $('#semester').val(semester);
    $('#mid_term').val(midTerm);
    $('#final_term').val(finalTerm);
    $('#gen_ave').val(genAve);
    $('#avg').val(avg);

    // Display the modal dialog
    $("#editModal").modal('show');
  });
});