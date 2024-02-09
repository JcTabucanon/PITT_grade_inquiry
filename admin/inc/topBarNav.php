<style>
  .profile-icon {
    border-radius: 50%;
    object-fit: cover;
  }

  .btn-rounded {
    border-radius: 50px;
  }

  .nav-icon {
    font-weight: 600;
  }
</style>
<?php
// Define and initialize the "conn" constant
define('conn', mysqli_connect('localhost', 'root', '', 'PITGRADING-SYSTEM'));

// Check if the database connection is successful
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  exit();
}

$CURRENT_USERID = $_SESSION['CURRENT_USERID'];

// Assuming you have a database connection established, replace 'your_db_connection' with your actual connection variable
$query = "SELECT * FROM users WHERE USER_ID = '$CURRENT_USERID'";
$result = mysqli_query(conn, $query);

if ($row = mysqli_fetch_assoc($result)) {
  $firstName = $row['FIRSTNAME'];
  $LastName = $row['LASTNAME'];
  $Srole = $row['SROLE'];
  $capitalLetters = strtoupper($LastName);
}
?>
<style>
 .main-header{
  background-color: #0c1e35;
 }
</style>
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-dark shadow text-sm">
  <!-- Left navbar links -->
  
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button">
        <i class="fa fa-bars"></i>
      </a>
    </li>

      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link"><?= !isMobileDevice() ? $_settings->info('name') : $_settings->info('short_name'); ?> </a>
      </li>
  
    <li class="nav-item dropdown">
      <a href="./" class="nav-link nav-home">
        <i class="nav-icon fa fa-tachometer-alt"></i>

      </a>
    </li>
    <li class="nav-item dropdown">
      <a href="<?php echo base_url ?>admin/?page=courses" class="nav-link nav-courses">
        <i class="nav-icon fa fa-building"></i>

      </a>
    </li>
    <li class="nav-item dropdown">
      <a href="<?php echo base_url ?>admin/?page=students" class="nav-link nav-students">
        <i class="nav-icon fa fa-users"></i>

      </a>
    </li>
    <li class="nav-item dropdown">
      <a href="<?php echo base_url ?>admin/?page=instructors" class="nav-link nav-instructors">
        <i class="nav-icon fa fa-user"></i>
      </a>
    </li>
    <li class="nav-item dropdown">
      <a href="<?php echo base_url ?>admin/?page=createlist" class="nav-link nav-createlist">
        <i class="nav-icon fa fa-list"></i>

      </a>
    </li>

    <li class="nav-item dropdown">
      <a href="<?php echo base_url ?>admin/?page=curriculum/technology" class="nav-link nav-curriculum_technology">
        <i class="nav-icon fa fa-blog"></i>

      </a>
    </li>
    <li class="nav-item dropdown">
      <a href="<?php echo base_url ?>admin/?page=curriculum/genEd" class="nav-link nav-curriculum_genEd">
        <i class="nav-icon fa fa-blog"></i>

      </a>
    </li>
    <li class="nav-item dropdown">
      <a href="<?php echo base_url ?>admin/?page=user/list" class="nav-link nav-user_list">
        <i class="nav-icon fas fa-users-cog"></i>

      </a>
    </li>
    <li class="nav-item dropdown">
      <a href="<?php echo base_url ?>admin/?page=system_info" class="nav-link nav-system_info">
        <i class="nav-icon fas fa-cogs"></i>

      </a>
    </li>
  </ul>
  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Messages Dropdown Menu -->
    <li class="nav-item">
      <div class="btn-group nav-link">
        <button type="button" class="btn btn-rounded badge badge-light dropdown-toggle dropdown-icon" data-toggle="dropdown">
          <span>
            <?php if (!empty($row['PHOTO'])) { ?>
              <img height="30" class="profile-icon" width="30" src="<?= $row['PHOTO'] ?>">
            <?php } elseif (empty($row['PHOTO'])) { ?>
              <img height="30" class="profile-icon" width="30" src="../assets/img/user2.png">
            <?php } ?>
          </span>
          <span class="ml-3"><?= $capitalLetters ?>, <?= strtoupper($firstName) ?></span>
          <span class="sr-only">Toggle Dropdown</span>
        </button>
        <div class="dropdown-menu" role="menu">
          <a class="dropdown-item" href="<?= base_url ?>admin/?page=user">
            <span class="fa fa-user"></span> My Account
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo base_url . '/classes/Login.php?f=logout' ?>"><span class="fas fa-sign-out-alt"></span> Logout</a>
        </div>
      </div>
    </li>
    <li class="nav-item">
    </li>
    <!--  <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
        <i class="fas fa-th-large"></i>
      </a>
    </li> -->
  </ul>
</nav>
<!-- /.navbar -->