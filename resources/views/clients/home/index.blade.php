@extends('clients.master-layout')

@section('content')
    <!-- Hero Slider Section -->
    <section id="hero-slider" class="hero text-center">
        <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">
            <div class="carousel-inner">

                <!-- Slide 1 -->
                <div class="carousel-item active"
                    style="background-image: url( '{{ asset('clients/images/sliders/main-slider-1-1.png') }}' );">
                    <div class="overlay"></div>
                    <div class="carousel-caption d-flex flex-column justify-content-center align-items-center">
                        <img src="images/logo/logo.png" alt="Peace Logo" class="hero-logo mb-4" height="120">
                        <h1 class="fw-bold text-warning mb-3 animate__animated animate__fadeInDown">
                            Promoting Global Peace & Human Rights
                        </h1>
                        <p class="lead text-white mb-4 animate__animated animate__fadeInUp">
                            Empowering communities through advocacy, education, and compassion.
                        </p>
                        <div class="d-flex justify-content-center gap-3">
                            <a href="#about" class="btn btn-primary btn-lg">Learn More</a>
                            <a href="#donate" class="text-white btn btn-outline-brand btn-lg">Support Us</a>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="carousel-item"
                    style="background-image: url('{{ asset('clients/images/sliders/slider-1.png') }}');">
                    <div class="overlay"></div>
                    <div class="carousel-caption d-flex flex-column justify-content-center align-items-center">
                        <img src="images/logo/logo.png" alt="Peace Logo" class="hero-logo mb-4" height="120">
                        <h1 class="fw-bold text-warning mb-3 animate__animated animate__fadeInDown">
                            Building Bridges of Peace Worldwide
                        </h1>
                        <p class="lead text-white mb-4 animate__animated animate__fadeInUp">
                            We believe in dignity, respect, and equality for all.
                        </p>
                        <div class="d-flex justify-content-center gap-3">
                            <a href="#projects" class="btn btn-primary btn-lg">Our Projects</a>
                            <a href="#contact" class="btn btn-outline-brand btn-lg">Get Involved</a>
                        </div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="carousel-item"
                    style="background-image: url('{{ asset('clients/images/sliders/slider-2.png') }}');">
                    <div class="overlay"></div>
                    <div class="carousel-caption d-flex flex-column justify-content-center align-items-center">
                        <img src="images/logo/logo.png" alt="Peace Logo" class="hero-logo mb-4" height="120">
                        <h1 class="fw-bold text-warning mb-3 animate__animated animate__fadeInDown">
                            Together for a Better Future
                        </h1>
                        <p class="lead text-white mb-4 animate__animated animate__fadeInUp">
                            Join our mission to protect human rights around the globe.
                        </p>
                        <div class="d-flex justify-content-center gap-3">
                            <a href="#donate" class="btn btn-primary btn-lg">Donate Now</a>
                            <a href="#about" class="btn btn-outline-brand btn-lg">Learn More</a>
                        </div>
                    </div>
                </div>

                <!-- Slider 4 -->
                <div class="carousel-item"
                    style="background-image: url('{{ asset('clients/images/sliders/slider-3.png') }}');">
                    <div class="overlay"></div>
                    <div class="carousel-caption d-flex flex-column justify-content-center align-items-center">
                        <img src="images/logo/logo.png" alt="Peace Logo" class="hero-logo mb-4" height="120">
                        <h1 class="fw-bold text-warning mb-3 animate__animated animate__fadeInDown">
                            Together for a Better Future
                        </h1>
                        <p class="lead text-white mb-4 animate__animated animate__fadeInUp">
                            Join our mission to protect human rights around the globe.
                        </p>
                        <div class="d-flex justify-content-center gap-3">
                            <a href="#donate" class="btn btn-primary btn-lg">Donate Now</a>
                            <a href="#about" class="btn btn-outline-brand btn-lg">Learn More</a>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Carousel Controls -->
            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
            </button>
        </div>
    </section>

    <!-- Media Section -->
    <section id="media" class="py-5 bg-light">
        <div class="container">
            <h2 class="fw-bold text-brand-deep text-center mb-5">Latest Activities</h2>

            <div class="row justify-content-center">
                <!-- Post Card 1 -->
                <div class="col-md-6 mb-4">
                    <div class="fb-media-card p-4">
                        <div class="d-flex align-items-center mb-3">
                            <img src="{{ asset('clients/images/avatars/avatar-1.png') }} " alt="Profile"
                                class="rounded-circle me-3" width="50" height="50">
                            <div>
                                <h6 class="mb-0 fw-semibold text-brand-deep">Peace IHR Official</h6>
                                <small class="text-muted">October 19, 2025</small>
                            </div>
                        </div>
                        <p class="text-muted mb-3">
                            Our volunteers organized a community workshop to promote peace education and human rights
                            awareness in Dhaka.
                        </p>
                        <img src="{{ asset('clients/images/activity/activity-1.png') }}" alt="Event"
                            class="img-fluid rounded-3 mb-3">
                        <div class="text-end">
                            <small class="text-muted"><i class="bi bi-heart-fill text-danger me-1"></i> 248
                                Likes</small>
                        </div>
                    </div>
                </div>

                <!-- Post Card 2 -->
                <div class="col-md-6 mb-4">
                    <div class="fb-media-card p-4">
                        <div class="d-flex align-items-center mb-3">
                            <img src="{{ asset('clients/images/avatars/avatar-2.png') }}" alt="Profile"
                                class="rounded-circle me-3" width="50" height="50">
                            <div>
                                <h6 class="mb-0 fw-semibold text-brand-deep">Peace IHR Official</h6>
                                <small class="text-muted">October 12, 2025</small>
                            </div>
                        </div>
                        <p class="text-muted mb-3">
                            Honored to collaborate with local NGOs in Chattogram for a women’s rights campaign.
                            Together, we make change possible!
                        </p>
                        <img src="{{ asset('clients/images/activity/activity-2.png') }}" alt="Campaign"
                            class="img-fluid rounded-3 mb-3">
                        <div class="text-end">
                            <small class="text-muted"><i class="bi bi-heart-fill text-danger me-1"></i> 312
                                Likes</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="problems" class="problems-section py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title fw-bold text-brand-deep">Recent Problems</h2>
                <p class="section-subtitle text-muted">
                    Real issues faced by communities — be part of the change.
                </p>
            </div>

            <!-- Add a wrapper around slider -->
            <div class="problems-wrapper position-relative">
                <div class="problems-slider d-flex overflow-auto pb-3">

                    <!-- Problem Card 1 -->
                    <div class="problem-card me-3 flex-shrink-0">
                        <div class="problem-body p-4">
                            <h5 class="problem-title fw-semibold text-brand-deep">Water Crisis in Rural Chattogram</h5>
                            <p class="problem-location text-muted mb-2"><i class="bi bi-geo-alt-fill"></i> Chattogram,
                                Bangladesh</p>
                            <p class="problem-desc text-muted">
                                Thousands of families lack access to clean drinking water due to arsenic contamination.
                            </p>
                            <button class="btn btn-help mt-3">I want to help solve this problem</button>
                        </div>
                    </div>

                    <!-- Problem Card 2 -->
                    <div class="problem-card me-3 flex-shrink-0">
                        <div class="problem-body p-4">
                            <h5 class="problem-title fw-semibold text-brand-deep">Education Gap for Rohingya Children
                            </h5>
                            <p class="problem-location text-muted mb-2"><i class="bi bi-geo-alt-fill"></i> Cox’s Bazar,
                                Bangladesh</p>
                            <p class="problem-desc text-muted">
                                Refugee children need educational materials and safe learning environments.
                            </p>
                            <button class="btn btn-help mt-3">I want to help solve this problem</button>
                        </div>
                    </div>

                    <!-- Problem Card 3 -->
                    <div class="problem-card me-3 flex-shrink-0">
                        <div class="problem-body p-4">
                            <h5 class="problem-title fw-semibold text-brand-deep">Flood Victims Need Shelter</h5>
                            <p class="problem-location text-muted mb-2"><i class="bi bi-geo-alt-fill"></i> Sylhet,
                                Bangladesh</p>
                            <p class="problem-desc text-muted">
                                Recent floods displaced hundreds — temporary shelters and food supplies are urgent
                                needs.
                            </p>
                            <button class="btn btn-primary mt-3">Solved</button>
                        </div>
                    </div>

                    <!-- Problem Card 4 -->
                    <div class="problem-card me-3 flex-shrink-0">
                        <div class="problem-body p-4">
                            <h5 class="problem-title fw-semibold text-brand-deep">Women Safety Awareness</h5>
                            <p class="problem-location text-muted mb-2"><i class="bi bi-geo-alt-fill"></i> Dhaka,
                                Bangladesh
                            </p>
                            <p class="problem-desc text-muted">
                                Empowering young women through self-defense and awareness programs.
                            </p>
                            <button class="btn btn-help mt-3">I want to help solve this problem</button>
                        </div>
                    </div>

                </div>
            </div>
            <hr>

            <div class="text-center mb-5">
                <h2 class="section-title fw-bold text-brand-deep">Solved Problems</h2>
                <p class="section-subtitle text-muted">
                    Real issues faced by communities — be part of the change.
                </p>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ asset('clients/images/solved-section/image.png') }}"
                                    class="img-fluid rounded-start" alt="image">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Flood Victims Need Shelter</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural
                                        lead-in to
                                        additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-body-secondary">Last updated 3 mins
                                            ago</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ asset('clients/images/solved-section/image-1.png') }}"
                                    class="img-fluid rounded-start" alt="image">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Women Safety Awareness</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural
                                        lead-in to
                                        additional content. This content is a little bit longer.</p>
                                    <p class="card-text"><small class="text-body-secondary">Last updated 3 mins
                                            ago</small></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="activities" class="activities-section py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title fw-bold text-brand-deep">Our Activities</h2>
                <p class="section-subtitle text-muted">
                    Discover how we promote peace, equality, and human rights across the globe.
                </p>
            </div>

            <div class="row g-4">
                <!-- Activity Card 1 -->
                <div class="col-md-4">
                    <div class="activity-card shadow-sm border-0 h-100">
                        <img src="{{ asset('clients/images/activity/activity-3.png') }}" class="activity-img"
                            alt="Education Program">
                        <div class="activity-body p-4">
                            <h5 class="activity-title text-brand-deep fw-semibold">Education for Peace</h5>
                            <p class="activity-text text-muted mb-3">
                                We empower communities through workshops and training programs that promote peaceful
                                coexistence.
                            </p>
                            <a href="#" class="activity-link text-brand-sky fw-semibold text-decoration-none">Read
                                More
                                →</a>
                        </div>
                    </div>
                </div>

                <!-- Activity Card 2 -->
                <div class="col-md-4">
                    <div class="activity-card shadow-sm border-0 h-100">
                        <img src="{{ asset('clients/images/activity/activity-4.png') }}" class="activity-img"
                            alt="Advocacy Campaign">
                        <div class="activity-body p-4">
                            <h5 class="activity-title text-brand-deep fw-semibold">Human Rights Advocacy</h5>
                            <p class="activity-text text-muted mb-3">
                                Advocating for justice, equality, and dignity for all through global awareness
                                campaigns.
                            </p>
                            <a href="#" class="activity-link text-brand-sky fw-semibold text-decoration-none">Read
                                More
                                →</a>
                        </div>
                    </div>
                </div>

                <!-- Activity Card 3 -->
                <div class="col-md-4">
                    <div class="activity-card shadow-sm border-0 h-100">
                        <img src="{{ asset('clients/images/activity/activity-5.png') }}" class="activity-img"
                            alt="Relief Program">
                        <div class="activity-body p-4">
                            <h5 class="activity-title text-brand-deep fw-semibold">Relief & Support</h5>
                            <p class="activity-text text-muted mb-3">
                                Delivering aid and mental health support to communities affected by conflict or
                                disaster.
                            </p>
                            <a href="#" class="activity-link text-brand-sky fw-semibold text-decoration-none">Read
                                More
                                →</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Projects Section -->
    <!-- <section id="projects" class="py-5">
                                        <div class="container">
                                            <h2 class="text-center fw-bold text-brand-deep mb-5">Our Projects</h2>
                                            <div class="row g-4">
                                                <div class="col-md-4">
                                                    <div class="card h-100 text-center p-3">
                                                        <img src="images/education.jpg" class="card-img-top rounded-3" alt="Education">
                                                        <div class="card-body">
                                                            <h5 class="fw-bold text-brand-deep">Education for All</h5>
                                                            <p class="text-muted">We empower youth through education programs and rights awareness
                                                                workshops.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="card h-100 text-center p-3">
                                                        <img src="images/justice.jpg" class="card-img-top rounded-3" alt="Justice">
                                                        <div class="card-body">
                                                            <h5 class="fw-bold text-brand-deep">Justice Initiatives</h5>
                                                            <p class="text-muted">Providing legal aid and advocacy for vulnerable and oppressed
                                                                communities.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="card h-100 text-center p-3">
                                                        <img src="images/peace.jpg" class="card-img-top rounded-3" alt="Peace">
                                                        <div class="card-body">
                                                            <h5 class="fw-bold text-brand-deep">Peace Missions</h5>
                                                            <p class="text-muted">Promoting intercultural dialogue and peaceful conflict resolution
                                                                initiatives.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section> -->

    <!-- Contact Section -->
    <section id="contact" class="py-5 bg-light">
        <div class="container text-center">
            <h2 class="fw-bold text-brand-deep mb-3">Get in Touch</h2>
            <p class="text-muted mb-4">Reach out to collaborate, volunteer, or support our mission.</p>
            <form class="mx-auto" style="max-width:600px;">
                <div class="row g-3">
                    <div class="col-md-6">
                        <input type="text" class="form-control" placeholder="Your Name" required>
                    </div>
                    <div class="col-md-6">
                        <input type="email" class="form-control" placeholder="Your Email" required>
                    </div>
                    <div class="col-12">
                        <textarea class="form-control" rows="4" placeholder="Your Message" required></textarea>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary px-4">Send Message</button>
                    </div>
                </div>
            </form>
        </div>
    </section>

@endsection


@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const slider = document.querySelector(".problems-slider");
            if (!slider) return;

            let scrollAmount = 0;
            const scrollStep = 1.5;
            const scrollDelay = 15;

            setInterval(() => {
                slider.scrollLeft += scrollStep;
                scrollAmount += scrollStep;
                if (scrollAmount >= slider.scrollWidth - slider.clientWidth) {
                    slider.scrollLeft = 0;
                    scrollAmount = 0;
                }
            }, scrollDelay);
        });
    </script>
@endsection
