<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Singularity Ltd">
    <title>Guest Management </title>
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor_assets/css/bootstrap/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor_assets/css/fontawesome.css') }}">
    <style>
       *{
            font-family: Arial, Helvetica, sans-serif;
        }
        .hero-banner {
            position: relative;
            background: #fff;
            background-size: cover;
            z-index: 1;
            height: 100vh;
            overflow-y: scroll;
        }

        .hero-banner .navbar-brand img {
            height: 50px;
        }

        .hero-banner::after {
            content: "";
            display: block;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 60%;
            background: url({{ asset('assets/img/banner-bg.webp') }}) left center no-repeat;
            background-size: cover;
            z-index: -1;
        }

        .content-card {
            display: flex;
            flex-direction: column;
            height: 100%;
            justify-content: center;
        }

        .content-card h2 {
            padding: 10px 0;
            text-align: justify;
            font-size: 35px;
            line-height: 1.5;
            letter-spacing: 2px;
        }

        .content-card p {
            padding: 10px 0;
            text-align: justify;
            font-size: 18px;
            line-height: 1.5;
            letter-spacing: 1px;
            color: #000;
            /*font-weight: bold;*/
        }

        .home-img {
            width: 100%;
        }

        .navbar-expand-lg {
            padding-left: 0 !important;
            padding-right: 0 !important;
        }
        .contents {
            align-items: center;
        }
    </style>
</head>

<body>
    <div class="hero-banner">
        <div class="side-main">
            <div class="container">
                <nav class="navbar navbar-expand-lg pl-0 pr-0">
                    <div class="container-fluid">
                        <div class="d-flex justify-content-between w-100">
                            <a class="navbar-brand" href="#">
                                <img src="{{ asset('frontend/images/logo.png') }}" alt="Guest Management">
                            </a>
                            <div class="d-flex">
                                <a href="{{ url('administrator/login') }}" class="btn btn-outline-primary">Log in</a>
                            </div>
                        </div>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarScroll">
                            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll"
                                style="--bs-scroll-height: 100px;">

                            </ul>

                        </div>
                    </div>
                </nav>

                <div class="row mt-50 contents">
                    <div class="col-md-6 p-3 content-card">
                        <img class="home-img" src="{{ asset('assets/img/frontendContent/home.svg') }}"
                            alt="Guest Management">
                    </div>
                    <div class="col-md-6 p-3">
                        <div class="content-card">
                            <h2>Guest Management System</h2>
                            <p>
                                Guest management System is essential not only to streamline the check-in experience but
                                also to ensure security within your premises.Without a proper and reliable visitor
                                management System, nearly anyone can access your property. When you have a guest
                                management platform,you need not to worry. Ideally, the guest check-in process is
                                automated and visitors can easily navigate the building to meet their hosts. So,a guest
                                management system is must have for the convenience of your guests and front desk staff.
                                Just go for Vizitor for a seamless guest experience.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/vendor_assets/js/jquery/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/vendor_assets/js/jquery/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/vendor_assets/js/bootstrap/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor_assets/js/bootstrap/bootstrap.min.js') }}"></script>
</body>

</html>
