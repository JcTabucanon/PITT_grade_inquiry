$(document).ready(function() {
    $('.open_modal').click(function() {
      // Get the values of the clicked row and fill the form
      var id = $(this).data('id');
      var COURSE_code = $(this).data('COURSE-code');
      var descriptive_title = $(this).data('descriptive-title');
      var instructor_name = $(this).data('instructor-name');
      var lec = $(this).data('lec');
      var lab = $(this).data('lab');
      $('#edit_id').val(id);
      $('#COURSE_code').val(COURSE_code);
      $('#descriptive_title').val(descriptive_title);
      $('#instructor_name').val(instructor_name);
      $('#lec').val(lec);
      $('#lab').val(lab);

      // Display the modal dialog
      $("#editModal").modal('show');
    });
  });
