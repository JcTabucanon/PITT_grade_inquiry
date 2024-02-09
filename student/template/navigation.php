<div class="navigation">
  <ul>
      <li><a href="homepage.php"><i class="fas fa-home"></i>Home</a></li>
      <li><a href="myaccount.php"><i class="fas fa-user"></i>My Profile</a></li>
      <li><a href="courses.php"><i class="fas fa-book"></i>My Grade Sheet</a></li>
      <li><a href="grades.php"><i class="fas fa-chart-bar"></i>My Grades</a></li>
      <li><a href="../includes/logout.inc.php"><i class="far fa-calendar-alt"></i>Log out</a></li>
    </ul>
  </div>
  <style>
    /* Add CSS styles for navigation */
    .navigation {
      position: fixed;
      top: 0;
      left: 0;
      height: 100vh;
      width: 250px;
    
      color: #7d84ab;
      background-color:  #050510;

      padding: 20px;
      /* margin-top: 60px; */
      z-index: -1;
    }

    .navigation ul {
      list-style: none;
      padding: 0;
      margin: 0;
      margin-top: 60px;
    }

    .navigation ul li {
      margin-bottom: 10px;
    }

    .navigation ul li a {
      text-decoration: none;
      color: #7d84ab;
      font-size: 1.2rem;
      font-family: "Poppins", sans-serif;
      display: flex;
      align-items: center;
    }

    .navigation ul li a i {
      margin-right: 10px;
    }
    @media (max-width: 768px) {
        .navigation{
            display: none;
        }
        .grade{
            width: 100%;
    height: 150px !important;
    margin: 0 !important;
    padding: 10px !important;
    padding-left: 0;
    margin-top: 0 !important;
    padding-top: 10px !important;
    left: 0 !important;
        }
    }
  </style>