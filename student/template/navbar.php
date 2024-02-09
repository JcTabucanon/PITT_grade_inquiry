<?php include '../../tooltip.php'; ?>

<nav class="bg-gray-900" style=" background-color:  #050510;">
  <?php require_once '../includes/verify.inc.php' ?>
  <div class="px-8 mx-auto max-w-7xl">
    <div class="flex items-center justify-between h-16">
      <div class="flex items-center">
        <div class="flex-shrink-0">
        </div>
        <div class="nav-layer2">
          <a rel="tooltip" data-placement="bottom" title="Log out" id="sort" href="home.php" class=" active px-4 py-2 text-sm font-medium rounded-md  <?= ($page == 'Land') ?  'text-white ' : 'text-gray-300 '; ?>">
            <img src="../PITT.png" alt="School Logo" class="brand-image img-circle elevation-3" style="width: 30px;height: 30px;max-height: unset">
          </a>
          <a rel="tooltip" data-placement="bottom" title="Home" id="home2" href="homepage.php" class="px-3 py-2 text-sm font-medium rounded-md <?= ($page == 'Home') ? 'text-white bg-gray-900' : 'text-gray-300 hover:bg-gray-700 hover:text-white'; ?>" aria-current="page" style="margin-right: 10px">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
              <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
              <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
            </svg>
          </a>
          <a rel="tooltip" data-placement="bottom" title="Course" id="home3" href="courses.php" class="px-3 py-2 text-sm font-medium rounded-md <?= ($page == 'Courses') ? 'text-white bg-gray-900' : 'text-gray-300 hover:bg-gray-700 hover:text-white'; ?>"style="margin-right: 10px">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-grid-1x2-fill" viewBox="0 0 16 16">
              <path d="M0 1a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V1zm9 0a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1V1zm0 9a1 1 0 0 1 1-1h5a1 1 0 0 1 1 1v5a1 1 0 0 1-1 1h-5a1 1 0 0 1-1-1v-5z" />
            </svg>
          </a>
          <a rel="tooltip" data-placement="bottom" title="Grade" id="home2" href="grades.php" class="px-3 py-2 text-sm font-medium rounded-md <?= ($page == 'Grades') ? 'text-white bg-gray-900' : 'text-gray-300 hover:bg-gray-700 hover:text-white'; ?>"style="margin-right: 10px">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
              <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z" />
            </svg></a>
        </div>
      </div>
      <div class=" nav-layer3 relative px-3 py-2 rounded-md cursor-pointer group">
        <div class="dropdown">
          <button class="dropbtn">
            <?php if (!empty($row['PHOTO'])) { ?>
              <img class="profile-icon" src="../../student/<?php echo $row['PHOTO']; ?>">
            <?php } elseif (empty($row['PHOTO'])) { ?>
              <img class="profile-icon" src="../assets/img/user2.png">
            <?php } ?>
          </button>
          <div class="dropdown-content">
            <a href="grades.php">My Grade</a>
            <a href="courses.php">My Grade Sheet</a>
            <a href="myaccount.php">Profile</a>
            <a href="student_info.php">Change Password</a>
            <hr>
            <a href="../includes/logout.inc.php">Logout</a>
          </div>
        </div>
      </div>

    </div>
  </div>
</nav>

<style>
  .profile-icon {
    width: 40px !important;
    height: 40px !important;
    border: 1px solid white;
    border-radius: 50% !important;
    object-fit: cover !important;
    margin-left: 40px;
  }

  .svg-icon {
    width: 30px !important;
    height: 20px !important;
    border: none !important;
    background-color: transparent !important;
    border-radius: 1px !important;
    fill: #ffffff;
    /* Change the color of the icon */
    align-items: center !important;
    border-radius: 1px !important;

  }

 
    nav{
      width: 100%;
      height: 60px !important;
     
    }

    .nav-layer2{
      display: flex;
      width: 100%;
      /* border: 1px solid red; */
    }

  @media (max-width: 768px) {
    .mobile {
      display: none;
    }

    .nav-layer1 {
      width: 100% !important;
      margin: 0;
      padding: 0;
      margin: 0;
    }

    .bg-gray-800 {
      width: 100vw;

      position: fixed;


    }

    .navbar-text {
      display: none;
    }

    .profile-icon {
      border-radius: 50% !important;
    }

    .dropdown {
      float: right;
      /* overflow: hidden; */
      margin: 0;
    }


    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #151515;
      z-index: 1;
      border-radius: 4px 4px 4px 4px !important;
      font-family: Arial, Helvetica, sans-serif;
      box-shadow: 1px 5px 15px black;
      margin-left: -40px !important;
      font-size: 14px;
      z-index: 99999;


    }


    .dropdown-content a:hover {
      background-color: #ddd;
      color: #151515;
      border-left: solid red;
      min-width: 10px !important;
      z-index: 99999;


    }

    .dropdown:hover .dropdown-content {
      display: block;

    }

    .dropdown-content a:active {
      border-left: 3px;
      transition: 0.4s;

    }

  }

  .dropdown {
    float: right;
    overflow: hidden;
  }

  .dropdown .dropbtn {
    font-size: 16px;
    border: none;
    outline: none;
    color: white;
    padding: 5px 8px;
    background-color: inherit;
    font-family: inherit;
    margin: 0;
    transition: 0.2s;
    z-index: 99999;

  }



  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #151515;
    min-width: 168px;
    z-index: 1;
    border-radius: 0px 0px 4px 4px;
    font-family: Arial, Helvetica, sans-serif;
    box-shadow: 1px 5px 15px black;
    z-index: 99999;

  }

  .dropdown-content a {
    float: none;
    color: #a8a8a8;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
    transition: 1s;
  }

  .dropdown-content a:hover {
    background-color: #ddd;
    color: #151515;
    border-left: solid red;
  }

  .dropdown:hover .dropdown-content {
    display: block;
  }

  .dropdown-content a:active {
    border-left: 3px;
    transition: 0.4s;
  }
</style>
<script>
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
  var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
  })
</script>