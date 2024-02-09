<link rel="stylesheet" href="asset/css/styles.css">
<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container px-4 px-lg-5">
        <button class="navbar-toggler btn btn-sm" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="./">
            <img src="PITT/pitlogo.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
        </a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link text-white" aria-current="page" href="./">Home</a></li>
                <!-- <li class="nav-item"><a class="nav-link text-white" href="./?p=blogs">BLOGS</a></li> -->
                <li class="nav-item"><a class="nav-link text-white" href="./?p=courses">Programs</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="./?p=about">About</a></li>
            </ul>
        </div>
        
        <div class="mobile-links">
            <a href="views/login_form.php" class="text-decoration-none text-white">
               Log in
            </a>
            <span class="line-l"></span>
            <a href="views/signup.php" class="text-decoration-none text-white">
               Sign up
            </a>
        </div>
    </div>
</nav>

<style>
    .navbar
    {
        background-color: #050510 !important;
    }
    .line-l
        {
            border: 1px solid cyan;
            margin: 40px;
            height: 20px;
            margin-top:-1px;

        }
    @media (max-width: 767px)
    
    {
       
        .line-l
        {
            border: 1px solid cyan;
            margin: 40px;
            height: 20px;
            margin-top:-1px;
        }
    }
</style>
