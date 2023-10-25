<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8" />
        <title>Qexal - Responsive Bootstrap 5 Landing Page Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="Premium Bootstrap 5 Landing Page Template" />
        <meta name="keywords" content="bootstrap 5, premium, marketing, multipurpose" />
        <meta content="Themesbrand" name="author" />
        <!-- favicon -->
        <link rel="shortcut icon" href="images/favicon.ico" />

        <!-- css -->
        <link href="{{ asset('login/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('login/css/materialdesignicons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('login/css/style.min.css') }}" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <section class="bg-account-pages vh-100 d-flex align-items-center bg-center position-relative" style="background-image: url('login/images/auth-bg.png');">

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="form-bg shadow bg-white">
                            <div class="p-4">
                                <div class="text-center mt-3 brand-logo">
                                    <a href="index-1.html">
                                        <img src="images/logo-dark.png" alt="" class="logo-dark" height="30" />
                                        <img src="images/logo-light.png" alt="" class="logo-light" height="30" />
                                    </a>
                                    <p class="text-muted mt-2">Sign in to continue to Qexal.</p>
                                </div>
                                <div class="p-3">
                                    <form novalidate="" action="#" method="get" class="av-invalid">
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Username</label>
                                            <input name="username" required="" placeholder="Enter username" id="username" type="text" class="form-control" value="" />
                                        </div>
                                        <div class="mb-3">
                                            <label for="userpassword" class="form-label">Password</label>
                                            <input name="password" required="" placeholder="Enter password" id="userpassword" type="password" class="form-control" value="" />
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="remember-Check">
                                            <label class="form-check-label" for="remember-Check">
                                                Remember me
                                            </label>
                                        </div>
                                        <div class="d-grid mt-3"><button type="submit" class="btn btn-primary btn-none">Log In</button></div>
                                        <div class="mt-4 mb-0 text-center">
                                            <a class="text-dark" href="password-forget.html"><i class="icon-xs icon me-1" data-feather="lock"></i> Forgot your password?</a>
                                        </div>
                                    </form>
                                    <!-- end form -->
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-4 bottom-text">
                            <p>Don't have an account ? <a href="sign-up.html" class="font-weight-semibold text-primary"> Signup </a> </p>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </section>
        <!-- end section -->

        <!-- Style switcher -->
        <div id="style-switcher">
            <div class="bottom">
                <a href="javascript: void(0);" id="mode" class="mode-btn text-white">
                    <i class="mdi mdi-white-balance-sunny mode-light"></i>
                    <i class="mdi mdi-moon-waning-crescent mode-dark"></i>
                </a>
                <a href="javascript: void(0);" class="settings" onclick="toggleSwitcher()"><i class="mdi mdi-cog  mdi-spin"></i></a>
            </div>
        </div>

        <!-- javascript -->
        <script src="{{ asset('login/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('login/js/smooth-scroll.polyfills.min.js') }}"></script>
        <script src="{{ asset('login/js/app.js') }}"></script>

        <script src="https://unpkg.com/feather-icons"></script>

        <!-- App Js -->
        <script src="js/app.js"></script>
    </body>

<!-- Mirrored from themesbrand.com/qexal/layout/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 25 Oct 2023 03:12:52 GMT -->
</html>
