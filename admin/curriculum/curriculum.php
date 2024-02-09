
<?php
  $department = $_GET['department'] ?? ''; // Get the selected department from the URL parameter

  // Prepare the query based on the selected department
  $query = "SELECT * FROM curriculum";
  if ($department === 'technology') {
    $query .= " WHERE DEPARTMENT = 'Technology Department'";
  } else if ($department === 'general_education') {
    $query .= " WHERE DEPARTMENT = 'General Education Department'";
  }

  $curriculumQuery = $conn->query($query);

  echo '<div class="table-responsive">';
  echo '<table cellpadding="0" cellspacing="0" style="border:0;" class="table table-bordered" id="example">';
  echo '<thead>';
  echo '<tr>';
  echo '<th>ID</th>';
  echo '<th>Course</th>';
  echo '<th>Program Description</th>';
  echo '<th>Year Level</th>';
  echo '<th>Course Code</th>';
  echo '<th>Descriptive Title</th>';
  echo '<th>Pre-requisites</th>';
  echo '<th>Instructor ID</th>';
  echo '<th>Instructor Name</th>';
  echo '<th>Lecture</th>';
  echo '<th>Lab</th>';
  echo '<th>Total Units</th>';
  echo '<th>School Year</th>';
  echo '<th>Semester</th>';
  echo '<th>Adviser ID</th>';
  // echo '<th>Program Adviser</th>';
  echo '<th>Department</th>';
  echo '</tr>';
  echo '</thead>';
  echo '<tbody>';

  while ($row = $curriculumQuery->fetch_assoc()) {
    echo '<tr>';
    echo '<td>' . $row['ID'] . '</td>';
    echo '<td>' . $row['COURSE'] . '</td>';
    echo '<td>' . $row['PROGRAM_DESC'] . '</td>';
    echo '<td>' . $row['YLEVEL'] . '</td>';
    echo '<td>' . $row['COURSE_CODE'] . '</td>';
    echo '<td>' . $row['DESCRIPTIVE_TITLE'] . '</td>';
    echo '<td>' . $row['PRE_REQUISITES'] . '</td>';
    echo '<td>' . $row['INSTRUCTOR_ID'] . '</td>';
    echo '<td>' . $row['INSTRUCTOR_NAME'] . '</td>';
    echo '<td>' . $row['LEC'] . '</td>';
    echo '<td>' . $row['LAB'] . '</td>';
    echo '<td>' . $row['TOTAL_UNITS'] . '</td>';
    echo '<td>' . $row['SY'] . '</td>';
    echo '<td>' . $row['SEMESTER'] . '</td>';
    echo '<td>' . $row['ADVISER_ID'] . '</td>';
    // echo '<td>' . $row['PROGRAM_ADVISER'] . '</td>';
    echo '<td>' . $row['DEPARTMENT'] . '</td>';
    echo '</tr>';
  }

  echo '</tbody>';
  echo '</table>';
  echo '</div>';
?>
