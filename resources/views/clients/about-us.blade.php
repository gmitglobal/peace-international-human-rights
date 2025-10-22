@extends('clients.master-layout')


@section('style')
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
@endsection


@section('content')
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
@endsection
