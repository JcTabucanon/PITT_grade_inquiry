<nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="assets/img/school_logos/logomaster_white.png" class="img-fluid d-none d-lg-block usa-logo"
                alt="Logo" style="width: 200px">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#homeSection">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#vmgo" id="admissionLink">VMGO's</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#aboutSection">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="views/signup.php" id="admissionLink">SIgn up</a>
                </li>
                <li class="nav-item ">
                    <a href="views/login_form.php" class="btn btn-warning" type="button" >Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<style>
    body {
      padding-top: 80px; /* Adjust this value based on the height of your fixed navbar */
    }

    .navbar {
      background-color: transparent; /* Set initial background color */
      transition: background-color 0.3s;
      height: 80px !important;
    }

    .navbar.fixed-top {
        background-color: #001a2c!important;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add shadow for a subtle effect */
    }
  </style>
  