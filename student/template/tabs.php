<?php
function existsInArray($arr, $data)
{
  foreach ($arr as $value) {
    if (in_array($data, $value)) {
      return true;
    } else {
      continue;
    }
  }

  return false;
}

// Set the default value for the semester if it is not already set
$semester = isset($_GET['semester']) ? $_GET['semester'] : 'all';

?>
<link rel="stylesheet" href="../assets/scrollbar.css">
<nav>
<ul class="ul1 flex flex-wrap justify-center">
  <li class="mr-2">
    <style>
      .ul1 {
  display: flex;
  flex-wrap: wrap;
  justify-content: right;
}

li {
  margin-right: 2px;
}
select{
  background-color: transparent;
  padding: 10px;
  border: 1px solid goldenrod;
  border-radius: 10px;
  color: goldenrod;
}

    </style>
<form action="" method="GET">
  <select name="YLEVEL" id="YLEVEL" onchange="this.form.submit()">
    <option hidden value="<?= $_GET['YLEVEL'] ?? '' ?>"><?= $_GET['YLEVEL'] ?? 'SELECT YEAR LEVEL' ?></option>
    <?php
    include_once '../dbConnection/db.php';
    $sql = "SELECT DISTINCT YLEVEL FROM grade";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $YLEVEL = trim($row['YLEVEL']);
        $yearText = '';
        switch ($YLEVEL) {
          case 1:
            $yearText = 'First Year';
            break;
          case 2:
            $yearText = 'Second Year';
            break;
          case 3:
            $yearText = 'Third Year';
            break;
          case 4:
            $yearText = 'Fourth Year';
            break;
        }
        echo '<option value="' . $YLEVEL . '">' . $yearText . '</option>';
      }
    }
    ?>
  </select>
  <input type="hidden" name="semester" value="<?= $semester ?>">
</form>

  </li>
</ul>


  <?php
  // Display semester tabs and data only if a school year is selected
  if (isset($_GET['YLEVEL'])) {
    $selectedSY = $_GET['YLEVEL'];

    ?>
    <ul class="flex flex-wrap mb-4 border-b border-gray-200">
      <li class="mr-2">
        <a href="?semester=all&YLEVEL=<?= $selectedSY ?>" class="inline-block px-4 py-4 text-sm font-medium text-center rounded-t-lg focus:outline-none <?= ($semester === 'all') ? 'bg-gray-200 text-gray-600' : 'hover:text-gray-600 hover:bg-gray-200 text-gray-400'; ?>">All</a>
      </li>
      <li class="mr-2">
        <a href="?semester=1st&YLEVEL=<?= $selectedSY ?>" class="inline-block px-4 py-4 text-sm font-medium text-center rounded-t-lg focus:outline-none <?= ($semester === '1st') ? 'bg-gray-200 text-gray-600' : 'hover:text-gray-600 hover:bg-gray-200 text-gray-400'; ?>">First</a>
      </li>
      <li class="mr-2">
        <a href="?semester=2nd&YLEVEL=<?= $selectedSY ?>" class="inline-block px-4 py-4 text-sm font-medium text-center rounded-t-lg focus:outline-none <?= ($semester === '2nd') ? 'bg-gray-200 text-gray-600' : 'hover:text-gray-600 hover:bg-gray-200 text-gray-400'; ?>">Second</a>
      </li>
    </ul>

    <?php
    // Display data based on the selected SY and semester
    // Add your code here to fetch and display the data
  }
  ?>
</nav>
