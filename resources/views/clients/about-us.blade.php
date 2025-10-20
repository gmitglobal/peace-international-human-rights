<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Peace International Human Rights</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <link href="css/style-fb-card.css" rel="stylesheet" />
    <link href="css/activities.css" rel="stylesheet" />
    <link href="css/problems.css" rel="stylesheet" />
    <link href="css/footer.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    <style>
        /* Page Background */
        .about-page {
            background-color: #F8F9FA;
            font-family: 'Segoe UI', sans-serif;
        }

        /* Page Title */
        .about-page-title {
            color: #2E8BC0;
            font-weight: 700;
        }

        /* Card Styling */
        .about-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
            background-color: #ffffff;
            padding: 20px;
        }

        .about-card-title {
            color: #2E8BC0;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        /* Team Member Images */
        .about-card img {
            width: 120px;
            height: 120px;
            object-fit: cover;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="#">
                <img src="images/logo/logo.png" alt="Peace Logo" height="80" class="me-2">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link active" href="./index.html">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="./about-us.html">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">Activities</a></li>
                    <li class="nav-item"><a class="nav-link" href="./contact-us.html">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="#projects">Login/Signup</a></li>
                </ul>
                <a href="#donate" class="btn btn-primary ms-lg-3">Donate</a>
            </div>
        </div>
    </nav>

    <!-- Page Title Section -->
    <section class="page-banner text-center py-5">
        <div class="container">
            <i class='bx bx-book-open page-icon mb-3'></i>
            <h1 class="page-banner-title">About Us</h1>
            <p class="page-banner-text">Understanding your rights, responsibilities, and our commitments</p>
        </div>
    </section>


    <section class="about-page py-5">
        <div class="container">

            <!-- Mission Statement -->
            <div class="card about-card mb-4">
                <div class="card-body">
                    <h3 class="about-card-title">Mission Statement</h3>
                    <p>Our mission is to promote peace, equality, and human rights across the globe through education,
                        advocacy, and community programs.</p>
                </div>
            </div>

            <!-- Vision Statement -->
            <div class="card about-card mb-4">
                <div class="card-body">
                    <h3 class="about-card-title">Vision Statement</h3>
                    <p>We envision a world where every individual enjoys dignity, freedom, and access to opportunities,
                        with human rights respected and upheld everywhere.</p>
                </div>
            </div>

            <!-- History / Story -->
            <div class="card about-card mb-4">
                <div class="card-body">
                    <h3 class="about-card-title">History / Story</h3>
                    <p>Founded in 2005, Peace International Human Rights began as a small group of volunteers committed
                        to advocacy and social justice. Over the years, we have grown into a global network supporting
                        communities in need.</p>
                </div>
            </div>

            <!-- Optional Team Members -->
            <div class="card about-card mb-4">
                <div class="card-body">
                    <h3 class="about-card-title">Our Team</h3>
                    <div class="row">
                        <div class="col-md-3 text-center mb-3">
                            <img src="./images/avatars/avatar-16.png" alt="Team Member"
                                class="img-fluid rounded-circle mb-2">
                            <h5>Jane Doe</h5>
                            <p>Founder & CEO</p>
                        </div>
                        <div class="col-md-3 text-center mb-3">
                            <img src="./images/avatars/avatar-17.png" alt="Team Member"
                                class="img-fluid rounded-circle mb-2">
                            <h5>John Smith</h5>
                            <p>Program Director</p>
                        </div>
                        <div class="col-md-3 text-center mb-3">
                            <img src="./images/avatars/avatar-1.png" alt="Team Member"
                                class="img-fluid rounded-circle mb-2">
                            <h5>Jane Doe</h5>
                            <p>Founder & CEO</p>
                        </div>
                        <div class="col-md-3 text-center mb-3">
                            <img src="./images/avatars/avatar-2.png" alt="Team Member"
                                class="img-fluid rounded-circle mb-2">
                            <h5>John Smith</h5>
                            <p>Program Director</p>
                        </div>
                        <!-- Add more team members here -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="pihr-footer">
        <div class="container py-5">
            <div class="row">
                <!-- About Column -->
                <div class="col-md-4 mb-4 pihr-footer-about">
                    <h5>About</h5>
                    <p>Peace International Human Rights is committed to promoting human rights, peace, and equality
                        worldwide.</p>
                </div>

                <!-- Quick Links Column -->
                <div class="col-md-4 mb-4 pihr-footer-links">
                    <h5>Quick Links</h5>
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
                    <h5>Contact</h5>
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
</body>

</html>