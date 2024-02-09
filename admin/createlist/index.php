<?php if ($_settings->chk_flashdata('success')) : ?>
    <script>
        alert_toast("<?php echo $_settings->flashdata('success') ?>", 'success');
    </script>
<?php endif; ?>
<link rel="stylesheet" href="../stylesheet/createlist.css">
<?php include "registrar.php"?>

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