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
            <h1 class="page-banner-title">Support Request</h1>
            <p class="page-banner-text">Understanding your rights, responsibilities, and our commitments</p>
        </div>
    </section>


    <section class="contact-page py-5">
        <div class="container">

            {{-- Success Message --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- Error Message --}}
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- Validation Errors --}}
            @if ($errors->any())
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Validation Error!</strong>
                    <ul class="mb-0 mt-1">
                        @foreach ($errors->all() as $error)
                            <li class="small">{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="row">
                <!-- Contact Form -->
                <div class="col-md-12 mb-4">
                    <div class="contact-form-card p-4 shadow-sm rounded">
                        <h3 class="contact-form-title mb-4">Send Support Request</h3>
                        <form action="{{ route('support.request.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Your Name" required>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="mobile" class="form-label">Mobile</label>
                                        <input type="text" class="form-control" id="mobile" name="mobile"
                                            placeholder="Your Mobile" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="whatsApp" class="form-label">WhatsApp</label>
                                        <input type="text" class="form-control" id="whatsApp" name="whatsApp"
                                            placeholder="Your WhatsApp">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="voterid" class="form-label">Voter ID</label>
                                        <input type="text" class="form-control" id="voterid" name="voterid"
                                            placeholder="Your Voter ID" required>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <textarea class="form-control" id="address" name="address" rows="5" placeholder="Your Address" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="problem" class="form-label">Problem</label>
                                <textarea class="form-control" id="problem" name="problem" rows="5" placeholder="Your Problem" required></textarea>
                            </div>


                            <!-- Post Image -->
                            <div class="mb-3">
                                <label for="post_image" class="form-label">Post Image</label>

                                <input type="file" name="post_image" id="post_image" class="form-control form-control-sm"
                                    accept="image/png, image/jpg, image/jpeg, image/svg+xml, image/webp"
                                    onchange="showPreview(event)">

                                <div style="margin-top:10px">
                                    <small id="fileError" style="color: red; display: none; margin-top:5px"></small>
                                </div>

                                <div class="mt-3">
                                    <img id="file-ip-1-preview" src="{{ asset('no_image.jpg') }}" class="img-thumbnail"
                                        style="width: 150px; height: 100px;" alt="Image Preview">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script>
        function showPreview(event) {
            const input = event.target;
            const file = input.files[0];

            // Check file size (limit: 50MB)
            if (file && file.size > 50 * 1024 * 1024) {
                alert("File size exceeds 50MB limit.");
                input.value = ""; // Clear file input
                return; // Stop preview generation
            }

            const preview = document.getElementById('file-ip-1-preview');
            preview.src = URL.createObjectURL(event.target.files[0]);
            preview.onload = () => URL.revokeObjectURL(preview.src); // Free memory
        }
    </script>

    <script>
        const fileInput = document.getElementById('post_image');
        const fileError = document.getElementById('fileError');

        const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp', 'image/svg+xml'];
        const maxSizeInKB = 2048;

        fileInput.addEventListener('change', function() {
            const file = this.files[0];

            if (file) {
                const fileType = file.type;
                const fileSizeInKB = file.size / 1024;

                // Validate MIME type
                if (!allowedTypes.includes(fileType)) {
                    fileError.textContent = 'Only JPEG, JPG, PNG, WEBP, or SVG files are allowed.';
                    fileError.style.display = 'inline';
                    this.value = '';
                    return;
                }

                // Validate file size
                if (fileSizeInKB > maxSizeInKB) {
                    fileError.textContent = 'File size must be less than 2MB.';
                    fileError.style.display = 'inline';
                    this.value = '';
                    return;
                }

                // If valid
                fileError.style.display = 'none';
            }
        });
    </script>
@endsection
