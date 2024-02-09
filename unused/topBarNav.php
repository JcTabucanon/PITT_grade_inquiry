<nav class="navbar navbar-expand-lg navbar-dark bg-gradient-primary">
    <div class="container px-4 px-lg-5">
        <button class="navbar-toggler btn btn-sm" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
       
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link text-white" aria-current="page" href="./">Home</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="./?p=blogs">Blogs</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="./?p=departments">Departments</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="./?p=courses">Courses</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="./?p=about">About</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="./?p=contact_us">Contact</a></li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a rel="tooltip" data-placement="bottom" title="Click Here to Login" id="login" href="views/login_form.php">Login</a>
                </li>
                <li class="nav-item divider-vertical"></li>
                <li class="nav-item">
                    <a rel="tooltip" data-placement="bottom" title="Click Here to Sign Up" id="signup" href="views/signup.php">Sign up</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<script>
    $(function() {
        $('#login').click(function() {
            uni_modal("", "login.php");
        });

        $('#navbarSupportedContent').on('show.bs.collapse', function() {
            $('#navbarSupportedContent').addClass('navbar-shrink');
        });

        $('#navbarSupportedContent').on('hidden.bs.collapse', function() {
            if ($('body').offset.top == 0)
                $('#navbarSupportedContent').removeClass('navbar-shrink');
        });

        $('#search-form').submit(function(e) {
            e.preventDefault();
            var sTxt = $('[name="search"]').val();
            if (sTxt != '')
                location.href = './?p=products&search=' + sTxt;
        });
    });
</script>
