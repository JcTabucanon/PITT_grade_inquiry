<?php
require_once "../../dbConnection/db.php";


$page = 'Land';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wecome | PITTinians</title>
    <link rel="stylesheet" href="../../src/css/tailwind.css">
  <link rel="stylesheet" href="../assets/scrollbar.css">
  <link rel="stylesheet" href="../assets/account.css">

    

</head>
<?php include_once '../template/navbar.php'; ?>
<body>
 
<div class="container">
  <div class="header-container">
    <img src="../c.jpg" alt="" class="header-image" />
    <div class="header">
      <h1 class="main-heading"><?php echo $row['LASTNAME'].', '. $row['FIRSTNAME']?></h1>
      <span class="tag"><?php echo $row['SROLE']?></span>
 
      <div class="stats">
      <?php
      $CURRENT_USERID = $_SESSION['CURRENT_USERID'];

      // Assuming $get_ID contains the ID of the student
      $sql = "SELECT * FROM listing WHERE SCHOOL_ID = '$CURRENT_USERID'";
      $result = mysqli_query($conn, $sql);
      $graderow = mysqli_fetch_assoc($result);
      ?>
        <span class="stat-module"> PROGRAM:
        <?php echo $graderow['COURSE']?>
        </span><br>
        <span class="stat-module"> CURRENT YEAR LEVEL:
        <?php echo $graderow['YLEVEL']?>

        </span>
        
      </div>
    </div> <!-- END header -->
  </div>
  
  <div class="overlay-header"></div>
  
  <div class="body1">
  <?php if (!empty($row['PHOTO'])) { ?>
              <img src="../../student/<?php echo $row['PHOTO']; ?> "class="body-image" >
            <?php } elseif (empty($row['PHOTO'])) { ?>
              <img  src="../assets/img/user2.png" class="body-image">
            <?php } ?>
   
            <div class="change">
            <a href="student_info.php" class="body-stats">
   Change Password
  </a>
  <a href="homepage.php" class="body-stats">
    Back to Homepage
  </a>
  
</div>

    <div class="u-clearfix"> </div>
    
    <!-- <div class="body-more">
      <span></span>
      <span></span>
      <span></span>
    </div> -->
    <div class="card u-clearfix">
    
    

    </div>
  </div>
  
</div>
   
    
</body>
<style>
 .body-stats {
  display: inline-block;
  font-size: 12px;
  font-weight: 700;
  position: relative;
  text-transform: uppercase;
  width: 170px;
  margin: 10px;
  padding: 10px;
   color: rgb(8, 8, 8);
  border-radius: 10px;
  border: 1px solid rgb(6, 162, 173);
  text-align: center;
}

.change {
  display: flex;
  justify-content: flex-end;
  align-items: center;
  border: 1px solid rgba(82, 218, 32, 0);

}

.body-stats:hover{
  background-color: goldenrod;
}

    </style>