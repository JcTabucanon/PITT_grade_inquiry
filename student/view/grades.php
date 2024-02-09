<?php
include_once "../../dbConnection/db.php";
include_once '../database/database.classes.php';
include_once '../page/grades/grades.classes.php';

$page = 'Grades';
?>

<!DOCTYPE html>
<html >

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student's Grades</title>
  <link rel="stylesheet" href="../../src/css/tailwind.css">
  <link rel="stylesheet" href="scrollbar.css">

</head>

<body class="bg-gray-900">
<?php include_once '../template/navigation.php'; ?>

  <?php include_once '../template/navbar.php'; ?>
  <main>
    <div class="grade px-8 py-6 mx-auto " style="position: absolute;
    left: 250px;
    right: 0;">
      <?php include_once '../template/tabs.php'; ?>
      <section class="w-full">
        <div class="flex flex-col min-w-full overflow-hidden overflow-x-auto align-middle rounded-md shadow">
          <table class="min-w-full divide-y divide-indigo-200 table-fixed" style="margin-top: 30px">
            <thead class="bg-gray-400">
              <tr>

                <th class="text-white th">
                  CODE
                </th>
                <th class="text-white th">
                  DESCRIPTIVE&nbsp;TITTLE
                </th>
                <th class="text-white th">
                  SEMESTER
                </th>
                <th class="text-white th">
                  MID&nbsp;TERM
                </th>
                <th class="text-white th">
                  FINAL&nbsp;TERM
                </th>
                <th class="text-white th">
                  FINAL&nbsp;GRADE
                </th>
                <th class="text-white th">
                  REMARKS
                </th>
              </tr>
            </thead>
            <?php include_once '../page/grades/display-data.inc.php'; ?>
          </table>
        </div>
      </section>

    </div>
   
  </main>

</body>

</html>