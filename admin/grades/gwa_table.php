<tr>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td class="numberu"></td>
  <td>GWA:</td>
  <td>
    <?php
    $get_ID = $_GET['ID']; // Update 'ID' to 'id' to match the URL parameter
    $SY = 'YOUR_SY_VALUE'; // Replace with the actual value for $SY
    $SEMESTER = 'YOUR_SEMESTER_VALUE'; // Replace with the actual value for $SEMESTER
    
    $result = mysqli_query($conn, "SELECT sum(GEN_AVE) FROM grade WHERE SCHOOL_ID = '$get_ID' AND SY = '$SY' AND SEMESTER = '$SEMESTER'") or die(mysqli_error($connection));

    $test_count = mysqli_query($conn, "SELECT * FROM grade WHERE GEN_AVE <> '' AND SCHOOL_ID = '$get_ID' AND SY = '$SY' AND SEMESTER = '$SEMESTER'") or die(mysqli_error($connection));
    $count_gen = mysqli_num_rows($test_count);

    while ($rows = mysqli_fetch_array($result)) {
      if ($count_gen <= 0) {
        // Handle case when count_gen is less than or equal to 0
      } else {
        $GEN_AVE = $rows['sum(GEN_AVE)'];
        $equal = $GEN_AVE / $count_gen;
        echo round($equal, 2);
      }
    }
    ?>
  </td>
  <td></td>
  <td></td>
</tr>
