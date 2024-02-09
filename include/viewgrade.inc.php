<?php
$count = 0;

if (isset($_GET['ID'])) {
  $ID = $_GET['ID'];
  include_once '../dbConnection/db.php';
  $sql = "SELECT * FROM GRADE WHERE SCHOOL_ID = '$ID'";
  $result = mysqli_query($conn, $sql);
  
  if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $SY = $row['SY'];
      $YLEVEL = $row['YLEVEL'];
      $SEMESTER = $row['SEMESTER'];
      $YLEVEL = $row['YLEVEL'];
      $FIRSTNAME = $row['FIRSTNAME'];
      $LASTNAME = $row['LASTNAME'];
      $MI = $row['MI'];
      $ID = $row['ID'];

      if (empty($row['MID_TERM'])) {
        $row['MID_TERM'] = 'No Data';
      }
      if (empty($row['FINAL_TERM'])) {
        $row['FINAL_TERM'] = 'No Data';
      }

      $MID_TERM = $row['MID_TERM'];
      $FINAL_TERM = $row['FINAL_TERM'];
      $COURSE_CODE = $row['COURSE_CODE'];
      $DESCRIPTIVE_TITLE = $row['DESCRIPTIVE_TITLE'];
      $TOTAL_UNITS = $row['TOTAL_UNITS'];
      $GEN_AVE = $row['GEN_AVE'];

      $avg = $GEN_AVE;

      if ($avg >= 1.0 && $avg <= 3.2) {
        $grade = "Passed";
      } else if ($avg >= 3.3 && $avg <= 4.2) {
        $grade = "Conditional";
      } else if ($avg >= 4.3 && $avg <= 5.0) {
        $grade = "Failed";
      } else {
        $grade = "";
      }

      echo '<tr>
              <td>'.$COURSE_CODE.'</td>
              <td>'.$DESCRIPTIVE_TITLE.'</td>
              <td>'.$SEMESTER.'</td>
              <td>'.$TOTAL_UNITS.'</td>
              <td>'.$MID_TERM.'</td>
              <td>'.$FINAL_TERM.'</td>
              <td>'.$GEN_AVE.'</td>
              <td class="avg">'.$grade.'</td>
              <td class="btn-con" style="text-align: center;">
                <div class="action-con">
                  <button class="open_modal_grade btn btn-primary" 
                  data-id="<?= $ID ?>" 
                  data-course-code='.$COURSE_CODE.'
                  data-descriptive-title='.$DESCRIPTIVE_TITLE.'
                  data-semester='.$SEMESTER.'
                  data-mid-term='.$MID_TERM.'
                  data-final-term='.$FINAL_TERM.'
                  data-gen-ave='.$GEN_AVE.'
                  data-e-avg='.$avg.'
                >  
                  Edit
                </button>
          
              <form action="../include/delete.inc.php" method="POST">
                <input type="hidden" name="id" value="<?= $ID ?>">
                <input type="hidden" name="COURSE" value="<?= $COURSE_CODE ?>">
                <input type="hidden" name="YLEVEL" value="<?= $YLEVEL ?>">
                <input type="hidden" name="SEMESTER" value="<?= $SEMESTER ?>">
                <button type="submit" name="delete" class="btn btn-danger">Remove</button>
              </form>
            </div>
          </td>
          
          </tr>
          ';

      }
    }
  }
?>
<script>
  function getGrade($avg) {
  if ($avg >= 1.0 && $avg <= 3.2) {
    return "Passed";
  } else if ($avg >= 3.3 && $avg <= 4.2) {
    return "Conditional";
  } else if ($avg >= 4.3 && $avg <= 5.0) {
    return "Failed";
  } else {
    return "";
  }
}

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