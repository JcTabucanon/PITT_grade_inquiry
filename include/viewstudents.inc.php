<?php
$count = 0;

// query database for user
$COURSE = $_GET['COURSE'];
$YLEVEL = $_GET['YLEVEL'];
$SEMESTER = $_GET['SEMESTER'];
$SY = $_GET['AY'];
view1($COURSE, $YLEVEL, $SEMESTER, $SY);


function view1($COURSE, $YLEVEL, $SEMESTER, $SY) {
  include '../dbConnection/db.php';
  $count = 0;
  $grade_query = mysqli_query($conn, "SELECT * FROM LISTING WHERE COURSE = '$COURSE' AND YLEVEL = '$YLEVEL' AND SEMESTER = '$SEMESTER' AND AY = '$SY'");
  while ($row = mysqli_fetch_array($grade_query)) {
    $count++; 
    if (empty($row['YLEVEL'])) {
      $row['YLEVEL'] = 'NAN';
    }
    $ID = $row['SCHOOL_ID'];
    $COURSE = $row['COURSE'];
    $NAME = $row['FIRSTNAME'] ." ". $row['MI'] ." ". $row['LASTNAME'];
    $YLEVEL = $row['YLEVEL'];
    $CURRICULUM = $row['AY'];

    echo '
    <tr>
      <td>'.$count.'</td>
      <td>'.$ID.'</td>
      <td>'.$NAME.'</td>
      <td>'.$COURSE.'</td>
      <td>'.$YLEVEL.'</td>
      <td>'.$CURRICULUM.'</td>
    </tr>
    ';
  }
}
?>


<script>
  function updateUrl() {
    // Get the current URL
    var url = window.location.href;

    // Split the URL into two parts: the base URL and the query string
    var parts = url.split('?');

    // Get the query string and split it into an array of parameters
    var params = parts[1] ? parts[1].split('&') : [];

    // Create an object to hold the updated parameter values
    var updatedParams = {
      COURSE: 'Edited',
      YLEVEL: 'Edited',
      SEMESTER: '',
      AY: ''
    };


    // Update the values of the COURSE and YLEVEL parameters
    params.forEach(function(param) {
      var parts = param.split('=');
      if (parts[0] === 'COURSE') {
        updatedParams.COURSE = $('#COURSE').val();
      } else if (parts[0] === 'YLEVEL') {
        updatedParams.YLEVEL = $('#level').val();
      } else if (parts[0] === 'SEMESTER') {
        updatedParams.SEMESTER = $('#SEMESTER').val();
      } else if (parts[0] === 'AY') {
        updatedParams.AY = $('#AY').val();
      }
    });

    // Build the updated query string 
    var queryString = Object.keys(updatedParams).map(function(key) {
      return encodeURIComponent(key) + '=' + encodeURIComponent(updatedParams[key]);
    }).join('&');

    // Build the updated URL by combining the base URL and the updated query string
    var updatedUrl = parts[0] + '?' + queryString;

    // Update the URL of the current page
    window.history.pushState(null, null, updatedUrl);
  }

</script>