<?php
// Assuming you have established a database connection

// Check if the department parameter is passed
if (isset($_GET['department'])) {
  $department = $_GET['department'];

  // Perform your database query to fetch department-specific data
  $query = "SELECT * FROM curriculum WHERE DEPARTMENT = '$department'";
  $result = $conn->query($query);

  if ($result->num_rows > 0) {
    // Start building the HTML table
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
    echo '<th>Department</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    // Loop through the result and generate table rows
    while ($row = $result->fetch_assoc()) {
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
      echo '<td>' . $row['DEPARTMENT'] . '</td>';
      echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
  } else {
    echo '<p>No data available for the selected department.</p>';
  }
} else {
  echo '<p>No department selected.</p>';
}
?>
