<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
    <title>PIT-TABANGO</title>
    <link rel="shortcut icon" href="img/school_logos/pitlogo.png">

    <link href="landing_pagev3/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="landing_pagev3/assets/css/custom_style.css" rel="stylesheet">

    <link rel="stylesheet" href="landing_pagev3/assets/css/animate.min.css">
    <link rel="stylesheet" href="landing_pagev3/assets/css/fontawesome.css">
    <link rel="stylesheet" href="landing_pagev3/assets/css/templatemo-finance-business.css">
    <link rel="stylesheet" href="landing_pagev3/assets/css/owl.css">

    <link rel="stylesheet" href="font.css" />
</head>

<body>
        <div class="sub-header">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-xs-12">
                    <ul class="left-info text-white">
                                                <li><i class="fa fa-time"></i>Tabango Standard Time: <span id="current-time"></span></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        // Update current time every second
        function updateTime() {
            var currentTime = new Date();
            var hours = currentTime.getHours();
            var minutes = currentTime.getMinutes();
            var seconds = currentTime.getSeconds();

            // Add leading zero if needed
            hours = (hours < 10) ? "0" + hours : hours;
            minutes = (minutes < 10) ? "0" + minutes : minutes;
            seconds = (seconds < 10) ? "0" + seconds : seconds;

            var formattedTime = hours + ":" + minutes + ":" + seconds;
            document.getElementById("current-time").innerText = formattedTime;
        }

        // Update time initially and then every second
        updateTime(); // Initial update
        setInterval(updateTime, 1000); // Update every second
    </script>
    
     <div class="main-banner header-text" id="homeSection">

    <div id="tsparticles"></div>
<section>
    <div class="content">
        <h1>Students Grade Information System</h1>
        <p><strong>PITTSGIS</strong>, the centralized platform for Palompon Institute of Technology-Tabango students to
            manage their academic records. Access your grades and other important information with ease. Stay on top of
            your academic performance and take control of your future. Start exploring the system today and discover how
            it can help you succeed in your studies.</p>
        <a type="button" href="views/login_form.php" class="filled-button sign-in-btn">Get started</a>
    </div>
    <div class="swiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="assets/img/school_logos/CD.jpg" />
                <div class="overlay">
                    <h1>EUTIQUIO A. PERNIS, Ed. D., J.D</h1>
                    <p class="text-sm text-white">CAMPUS DIRECTOR</p>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    /* @import  url("https://fonts.googleapis.com/css2?family=Comfortaa:wght@700&family=Nunito:wght@300;600&display=swap"); */

    *,
    *::before,
    *::after {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Nunito", sans-serif;
    }

    body {
        background-image: radial-gradient(circle at 20% 100%,
                rgba(184, 184, 184, 0.1) 0%,
                rgba(184, 184, 184, 0.1) 33%,
                rgba(96, 96, 96, 0.1) 33%,
                rgba(96, 96, 96, 0.1) 66%,
                rgba(7, 7, 7, 0.1) 66%,
                rgba(7, 7, 7, 0.1) 99%),
            linear-gradient(40deg, #040a22, #162561, #202e64, #6f7aa6);
        background-repeat: no-repeat;
        background-size: cover;
    }

    section {
        display: grid;
        grid-template-columns: 50% 45%;
        place-items: center;
        gap: 60px;
        min-height: 100vh;
        padding: 20px 60px;
    }

    /* CONTENT */

    .content {
        max-width: 2400px;
    }

    .content h1 {
        font-family: "Comfortaa", sans-serif;
        font-size: clamp(2rem, 4vw, 3.5rem);
        font-weight: 700;
        line-height: 1.2;
        letter-spacing: 1px;
        margin-bottom: 36px;
        color: #fff;
    }

    .content p {
        font-size: clamp(1rem, 4vw, 1.1rem);
        font-weight: 300;
        line-height: 1.5;
        margin-bottom: 30px;
        color: #fff;
    }

    .content button {
        background: #eaeaea;
        color: #202134;
        font-size: clamp(0.9rem, 4vw, 1rem);
        font-weight: 600;
        border: 0;
        outline: 0;
        padding: 8px 14px;
        border-radius: 7px;
        transform: scale(1);
        transition: all 0.4s ease-in;
        cursor: pointer;
    }

    .content button:is(:hover, :focus) {
        transform: scale(0.98);
        background-color: #6f7aa6;
        color: #eaeaea;
    }

    /* SLIDER */

    .swiper {
        position: relative;
        width: 400px;
        height: 490px;
    }

    .swiper-slide {
        position: relative;
        background-position: center;
        background-size: cover;
        border: 1px solid rgba(255, 255, 255, 0.3);
        user-select: none;
        border-radius: 20px;
    }

    .dark-text {
        color: #202134;
    }

    .swiper-slide img {
        width: 100%;
        height: 100%;
        border-radius: 20px;
    }

    .overlay {
        position: absolute;
        display: flex;
        flex-direction: column;
        justify-content: center;
        left: 0;
        bottom: 0;
        width: 100%;
        height: 100px;
        padding: 10px 20px;
        background: rgba(93, 95, 145, 0.2);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border-top: 1px solid rgba(255, 255, 255, 0.3);
        color: #fff;
        border-radius: 0 0 20px 20px;
    }

    .overlay h1 {
        font-size: clamp(1.2rem, 4vw, 1.5rem);
        font-weight: 600;
    }

    .overlay p {
        font-size: clamp(0.8rem, 4vw, 0.9rem);
        font-weight: 300;
        line-height: 1.3;
    }

  

    @media (max-width: 1050px) {
        .swiper {
            width: 350px;
            height: 450px;
        }
    }

    @media (max-width: 930px) {
        section {
            grid-template-columns: 100%;
            grid-template-rows: 55% 40%;
            grid-template-areas:
                "content"
                "slider";
            place-items: center;
            gap: 30px;
        }

        .swiper {
            grid-area: slider;
        }

        .content {
            grid-area: content;
            text-align: center;
        }

        .content h1 {
            margin-bottom: 20px;
        }
    }

    @media (max-width: 470px) {
        section {
            padding: 40px 40px 60px;
        }

        .swiper {
            width: 300px;
            height: 400px;
        }
    }
</style>
<script>
    var swiper = new Swiper(".swiper", {
        effect: "cube",
        grabCursor: true,
        loop: true,
        speed: 1000,
        cubeEffect: {
            shadow: false,
            slideShadows: true,
            shadowOffset: 10,
            shadowScale: 0.94,
        },
        autoplay: {
            delay: 2600,
            pauseOnMouseEnter: true,
        },
    });
</script>
     </div>
    <div class="request-form">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h4>Do you have any questions or concern?</h4>
                    <span>Please contact us, we would love to hear from you so we can help you serve better.</span>
                </div>
                <div class="col-md-4">
                    <a href="#contactUsSection" class="border-button contact-us">Contact Us</a>
                </div>
            </div>
        </div>
    </div>

    <style>
       .text1 {
        text-transform: uppercase;
        background: linear-gradient(to right, #30CFD0 0%, #dfab1c 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        font-size: 20vw;
        font-family: "Poppins", sans-serif;
        }
    </style>
     <div class="services mb-5 py-4" id="vmgo" style="background-color: transparent; ">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading">
                          <h2 class="text1">V M G O's</em></h2>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="service-item" style="height: 350px">
                            <div class="down-content">
                                <h4 class="mt-2">Vision</h4>
                                <p>
                                <?php if (is_file(base_app . 'pages/default/vision.html')) : ?>
                                        <?= file_get_contents(base_app . 'pages/default/vision.html') ?>
                                    <?php else : ?>
                                        <center><small class="text-muted"><i>Content is not set yet.</i></small></center>
                                    <?php endif; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="service-item " style="height: 350px">
                            <div class="down-content">
                                <h4 class="mt-2">Mission</h4>
                                <p>
                                <?php if (is_file(base_app . 'pages/default/mission.html')) : ?>
                                    <?= file_get_contents(base_app . 'pages/default/mission.html') ?>
                                <?php else : ?>
                                    <center><small class="text-muted"><i>Content is not set yet.</i></small></center>
                                <?php endif; ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="service-item" style="height: 350px">
                            <div class="down-content">
                                <h4 class="mt-2">Goal</h4>
                                <p>
                                <?php if (is_file(base_app . 'pages/default/goal.html')) : ?>
                                    <?= file_get_contents(base_app . 'pages/default/goal.html'); ?>
                                <?php else : ?>
                                    <center><small class="text-muted"><i>Content is not set yet.</i></small></center>
                                <?php endif; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="services mb-5 py-4" id="aboutSection" style="background-color: transparent;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2 class="text1">Talented Students Behind This Project</em></h2>
                    </div>
                </div>
                <div class="col-md-6 align-center">
                    <div class="service-item text-center">
                        <div class="down-content">
                            <div class="d-md-flex justify-content-md-start">
                                <img src="landing_pagev3/assets/images/Jessie.png"
                                    class="img-fluid rounded-circle custom-img-icons" alt="Jessie's Photo" loading="lazy"
                                    style="max-width: 200px; height: auto;">
                                <div class="ms-md-3">
                                    <h4 class="mt-2">Cuna, Jessie</h4>
                                    <p>Programmer</p>
                                    <div class="col-md-12">
                                        <div class="footer-item text-center">
                                            <p>Palompon&nbsp;Institute&nbsp;of&nbsp;Technology&nbsp;Tabango Tabango, Leyte</p><br>
                                            <p><b>Batch: 2023-2024</b></p>
                                        </div>
                                    </div>
                                    <div class="social">
                                        <a href="#" class="twitter"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                                                <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                                            </svg>
                                        </a>
                                        <a href="https://www.facebook.com/cuna.jessie" class="facebook"><i class="facebook">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                                                </svg>

                                            </i></a>
                                        <a href="#" class="instagram"><i class="instagram"></i> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                                <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="service-item text-center">
                        <div class="down-content">
                            <div class="d-md-flex justify-content-md-start">
                                <img src="landing_pagev3/assets/images/wendel.png"
                                    class="img-fluid rounded-circle custom-img-icons" alt="Wendel's Photo" loading="lazy"
                                    style="max-width: 200px; height: auto;">
                                <div class="ms-md-3">
                                    <h4 class="mt-2">Luche, Wendel</h4>
                                    <p>Programmer</p>
                                    <div class="col-md-12">
                                        <div class="footer-item text-center">
                                            <p>Palompon&nbsp;Institute&nbsp;of&nbsp;Technology&nbsp;Tabango Tabango, Leyte</p><br>
                                            <p><b>Batch: 2023-2024</b></p>
                                        </div>
                                    </div>
                                    <div class="social">
                                        <a href="#" class="twitter">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                                                <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                                            </svg>
                                        </a>
                                        <a href="https://www.facebook.com/wendel.luche" class="facebook">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                                                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                                            </svg>
                                        </a>
                                        <a href="https://instagram.com/yukiro_21?igshid=MzNlNGNkZWQ4Mg==" class="instagram">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                                <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                                            </svg>
                                        </a>

                                        <a href="#" class="linkedin">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                                                <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z" />
                                            </svg>
                                        </a>
                                    
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
   
  
    <script>
        $(function() {
            $('#navbarResponsive').singlePageNav({
                'offset': 80,
                'filter': ':not(.external)'
            });

            // On mobile, close the menu after nav-link click
            $('#navbarResponsive .navbar-nav .nav-item .nav-link').click(function() {
                $('#navbarResponsive').removeClass('show');
            });

            $('#admissionLink').click(function(e) {
                window.location.href = $(this).attr('href');
            });

            $('#loginLink').click(function(e) {
                window.location.href = "http://localhost/wamplang/main/public/auth/login";
            });
        });

        function modalAnim(x) {
            $('#moduleDetail').find('.modal-dialog').attr('class', 'modal-dialog modal-dialog-centered modal-lg ' + x +
                '  animate__animated')
        };

        $('#moduleDetail').on('show.bs.modal', function(e) {
            var button = $(e.relatedTarget);
            var modal = $(this);

            var img_src = button.data('img_src');
            var module_name = button.data('module_name');

            modal.find('.modal-header #moduleDetailLbl').text(module_name);
            modal.find('.modal-body .modulePreview').attr('src', img_src);

            modalAnim('animate__fadeIn');
        });

        $('#moduleDetail').on('hide.bs.modal', function(e) {
            var modal = $(this);
            modal.find('.modal-header #moduleDetailLbl').text('');
            modal.find('.modal-body .modulePreview').attr('src', '!#');

            modalAnim('animate__fadeOut');
        });
    </script>
    <script src="assets/js/jquery-3.5.1.slim.min.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
    </body>

</html>
