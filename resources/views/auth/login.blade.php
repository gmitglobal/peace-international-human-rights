<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{ asset('admin/assets/images/favicon-32x32.png') }}" type="image/png" />
    <!--plugins-->
    <link href="{{ asset('admin/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <!-- loader-->
    <link href="{{ asset('admin/assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('admin/assets/js/pace.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/css/icons.css') }}" rel="stylesheet">
    <link href="{{ asset('clients/css/footer.css') }}" rel="stylesheet" />
    <title>Admin Sign In Page</title>



</head>

<body class="bg-login">
    <!--wrapper-->
    <div class="wrapper">
        <nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top">
            <div class="container">
                <a class="navbar-brand fw-bold text-primary" href="#">
                    <img src="{{ asset('clients/images/logo/logo.png') }}" alt="Peace Logo" height="120"
                        class="me-2">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link active" href="{{ route('home') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="#about">Activities</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                    </ul>
                    <a href="#donate" class="btn btn-primary ms-lg-3">Donate</a>
                </div>
            </div>
        </nav>

        <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
            <div class="container-fluid">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                    <div class="col mx-auto">
                        <div class="mb-4 text-center">
                            <img class="img-thumbnail" style="border-radius: 100% !important;"
                                src="{{ asset('logo.png') }}" width="100" alt="company logo" />
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="border p-2 mb-3 rounded">
                                    <div class="text-center">
                                        <h3 class="">Sign In</h3>
                                        <p>Don't have an account yet? <a href="{{ route('register') }}">Sign up
                                                here</a>
                                            {{-- <p style="font-size: 13px;">Don't have an account yet? Ask Admin to make one for you.</p> --}}
                                    </div>
                                </div>
                                <div class="form-body">


                                    <form class="row g-3" method="POST" action="{{ route('login') }}">
                                        @csrf

                                        {{-- <div class="col-12">
                                            <label for="inputEmailAddress" class="form-label">Email Address</label>
                                            <input type="email" name="email" :value="old('email')"
                                                class="form-control" id="inputEmailAddress" placeholder="Email Address">
                                            <x-input-error :messages="$errors->get('email')" class="m-2 text-danger" />
                                        </div> --}}
                                        <div class="col-12">
                                            <label for="inputPhoneAddress" class="form-label">Phone</label>
                                            <input type="phone" name="phone" :value="old('phone')"
                                                class="form-control" id="inputPhoneAddress" placeholder="Phone">
                                            <x-input-error :messages="$errors->get('phone')" class="m-2 text-danger" />
                                        </div>


                                        <div class="col-12">
                                            <label for="inputChoosePassword" class="form-label">
                                                Enter Password
                                            </label>
                                            <div class="input-group" id="show_hide_password">
                                                <input type="password" name="password" class="form-control border-end-0"
                                                    id="inputChoosePassword" placeholder="Enter Password">
                                                <a href="javascript:;" class="input-group-text bg-transparent">
                                                    <i class='bx bx-hide'></i>
                                                </a>
                                            </div>
                                            <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
                                        </div>

                                        {{-- <div class="col-md-12 text-end"> <a
                                                href="{{ route('password.request') }}">Forgot Password ?</a>
                                        </div> --}}
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <button type="submit" class="btn btn-sm btn-primary">
                                                    <i class="bx bxs-lock-open"></i> Sign in
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>

        <footer class="pihr-footer">
            <div class="container py-5">
                <div class="row">
                    <!-- About Column -->
                    <div class="col-md-4 mb-4 pihr-footer-about">
                        <h5 style="color: aliceblue">About</h5>
                        <p>Peace International Human Rights is committed to promoting human rights, peace, and equality
                            worldwide.</p>
                    </div>

                    <!-- Quick Links Column -->
                    <div class="col-md-4 mb-4 pihr-footer-links">
                        <h5 style="color: aliceblue">Quick Links</h5>
                        <ul class="list-unstyled">
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Programs</a></li>
                            <li><a href="#">Get Involved</a></li>
                            <li><a href="#">Donate</a></li>
                            <li><a href="./privacy-policy.html">Privacy Policy</a></li>
                            <li><a href="./terms-conditions.html">Terms Conditions</a></li>
                        </ul>
                    </div>

                    <!-- Contact Column -->
                    <div class="col-md-4 mb-4 pihr-footer-contact">
                        <h5 style="color: aliceblue">Contact</h5>
                        <p>Email: info@pihr.org</p>
                        <p>Phone: +123 456 7890</p>
                        <div class="pihr-social-icons mt-2">
                            <a href="#"><i class="bx bxl-facebook"></i></a>
                            <a href="#"><i class="bx bxl-twitter"></i></a>
                            <a href="#"><i class="bx bxl-linkedin"></i></a>
                            <a href="#"><i class="bx bxl-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Strip -->
            <div class="pihr-footer-bottom text-center py-3">
                <p class="mb-0">Copyright © Peace International Human Rights</p>
            </div>
        </footer>
    </div>
    <!--end wrapper-->
    <!-- Bootstrap JS -->
    <script src="{{ asset('admin/assets/js/bootstrap.bundle.min.js') }}"></script>
    <!--plugins-->
    <script src="{{ asset('admin/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
    <!--Password show & hide js -->
    <script>
        $(document).ready(function() {
            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("bx-hide");
                    $('#show_hide_password i').removeClass("bx-show");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("bx-hide");
                    $('#show_hide_password i').addClass("bx-show");
                }
            });
        });
    </script>
    <!--app JS-->
    <script src="{{ asset('admin/assets/js/app.js') }}"></script>
</body>

</html>
