{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}


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
    <title>Admin Register Page</title>
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

        <div class="d-flex align-items-center justify-content-center my-5 my-lg-0">
            <div class="container">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
                    <div class="col mx-auto">
                        <div class="my-4 text-center">
                            <img class="img-thumbnail" style="border-radius: 100% !important;"
                                src="{{ asset('logo.png') }}" width="100" alt="company logo" />
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="border p-4 rounded">
                                    <div class="text-center">
                                        <h3 class="">Sign Up</h3>
                                        <p>
                                            Already have an account?
                                            <a href="{{ route('login') }}">Sign in here</a>
                                        </p>
                                    </div>

                                    <div class="form-body">
                                        <form class="row g-3" method="POST" action="{{ route('register') }}">
                                            @csrf

                                            <div class="col-sm-12">
                                                <label for="inputLastName" class="form-label">Full Name</label>
                                                <input type="text" name="name" :value="old('name')"
                                                    class="form-control" id="inputLastName" placeholder="Full Name">
                                                <x-input-error :messages="$errors->get('name')" class="mt-2 text-danger" />
                                            </div>

                                            <!-- Phone -->
                                            {{-- <div class="mt-4">
                                                <x-input-label for="phone" :value="__('Phone Number')" />
                                                <x-text-input id="phone" class="block mt-1 w-full" type="text"
                                                    name="phone" required autocomplete="phone" />
                                                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                                            </div> --}}

                                            <div class="col-12">
                                                <label for="inputPhoneAddress" class="form-label">Phone Number</label>

                                                <input type="phone" name="phone" :value="old('phone')"
                                                    class="form-control" id="inputPhoneAddress"
                                                    placeholder="Your Phone">
                                                <x-input-error :messages="$errors->get('phone')" class="mt-2 text-danger" />
                                            </div>


                                            <div class="col-12">
                                                <label for="inputEmailAddress" class="form-label">Email
                                                    Address</label>

                                                <input type="email" name="email" :value="old('email')"
                                                    class="form-control" id="inputEmailAddress"
                                                    placeholder="Your Email">
                                                <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                                            </div>

                                            <div class="col-12">
                                                <label for="inputChoosePassword" class="form-label">Password</label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="password" name="password" id="inputChoosePassword"
                                                        class="form-control border-end-0"
                                                        placeholder="Enter Password">
                                                    <a href="javascript:;" class="input-group-text bg-transparent">
                                                        <i class='bx bx-hide'></i>
                                                    </a>
                                                </div>
                                                <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
                                            </div>

                                            <div class="col-12">
                                                <label for="inputChoosePassword2" class="form-label">Confirm
                                                    Password</label>
                                                <div class="input-group" id="show_hide_password2">
                                                    <input type="password" name="password_confirmation"
                                                        class="form-control border-end-0" id="inputChoosePassword2"
                                                        placeholder="Enter Password">
                                                    <a href="javascript:;" class="input-group-text bg-transparent">
                                                        <i class='bx bx-hide'></i>
                                                    </a>
                                                </div>
                                                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-danger" />
                                            </div>

                                            <div class="col-12 ">
                                                <div class="d-grid mt-3">
                                                    <button type="submit" class="btn btn-sm btn-primary">
                                                        <i class='bx bx-user'></i>Sign up
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

        $("#show_hide_password2 a").on('click', function(event) {
            event.preventDefault();
            if ($('#show_hide_password2 input').attr("type") == "text") {
                $('#show_hide_password2 input').attr('type', 'password');
                $('#show_hide_password2 i').addClass("bx-hide");
                $('#show_hide_password2 i').removeClass("bx-show");
            } else if ($('#show_hide_password2 input').attr("type") == "password") {
                $('#show_hide_password2 input').attr('type', 'text');
                $('#show_hide_password2 i').removeClass("bx-hide");
                $('#show_hide_password2 i').addClass("bx-show");
            }
        });
    </script>
    <!--app JS-->
    <script src="{{ asset('admin/assets/js/app.js') }}"></script>
</body>

</html>
