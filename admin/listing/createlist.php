<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listing | Instructors</title>
    <link rel="stylesheet" href="create.css">
   

</head>


<body>

    <div class="cl-can">
        <div class="cl-wrap">
            <h1>Import Data from Excel</h1>
            <form action="" method="POST" enctype="multipart/form-data">
            <label for="excel">Select Excel file:</label>
            <input type="file" name="excel" id="excel">
            <input type="submit" name="submit" value="Import">
        </form>

        </div>
    </div>
    <?php include_once 'includes/createlist.inc.php';?>
    


