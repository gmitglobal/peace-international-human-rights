@extends('clients.master-layout')


@section('style')
    <style>
        .contact-page {
            font-family: 'Segoe UI', sans-serif;
            background-color: #F8F9FA;
        }

        /* Page Title */
        .contact-page-title {
            color: #2E8BC0;
            font-weight: 700;
        }

        /* Cards */
        .contact-form-card,
        .contact-info-card {
            background-color: #ffffff;
            border-radius: 10px;
        }

        /* Form Title */
        .contact-form-title,
        .contact-info-title {
            color: #2E8BC0;
            font-weight: 600;
        }

        /* Map Responsiveness */
        .map-responsive {
            overflow: hidden;
            padding-bottom: 56.25%;
            /* 16:9 Aspect Ratio */
            position: relative;
            height: 0;
        }

        .map-responsive iframe {
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            position: absolute;
            border-radius: 8px;
        }

        /* Form Inputs */
        .contact-form-card input,
        .contact-form-card textarea {
            border-radius: 6px;
        }
    </style>
@endsection


@section('content')
    <!-- Page Title Section -->
    <section class="page-banner text-center py-5">
        <div class="container">
            <i class='bx bx-book-open page-icon mb-3'></i>
            <h1 class="page-banner-title">Contact Us</h1>
            <p class="page-banner-text">Understanding your rights, responsibilities, and our commitments</p>
        </div>
    </section>


    <section class="contact-page py-5">
        <div class="container">

            <div class="row">
                <!-- Contact Form -->
                <div class="col-md-6 mb-4">
                    <div class="contact-form-card p-4 shadow-sm rounded">
                        <h3 class="contact-form-title mb-4">Get in Touch</h3>
                        <form>
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Your Name">
                            </div>
                            <div class="mb-3">
                                <label for="contact" class="form-label">Email / WhatsApp</label>
                                <input type="text" class="form-control" id="contact"
                                    placeholder="Email or WhatsApp Number">
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control" id="message" rows="5" placeholder="Your Message"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Send Message</button>
                        </form>
                    </div>
                </div>

                <!-- Office Info & Map -->
                <div class="col-md-6 mb-4">
                    <div class="contact-info-card p-4 shadow-sm rounded">
                        <h3 class="contact-info-title mb-4">Our Office</h3>
                        <p><strong>Address:</strong> 123 Peace Street, Dhaka, Bangladesh</p>
                        <p><strong>Phone:</strong> +880 1234 567890</p>
                        <p><strong>WhatsApp:</strong> <a href="https://wa.me/8801234567890" target="_blank">+880 1234
                                567890</a></p>

                        <!-- Google Map Embed -->
                        <div class="map-responsive mt-3">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3689.87914264016!2d91.8361608760233!3d22.358191840793147!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30acd943b6e12b85%3A0x7ee9886c436acdee!2sGM%20IT%20Limited!5e0!3m2!1sen!2sbd!4v1760866493330!5m2!1sen!2sbd"
                                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
