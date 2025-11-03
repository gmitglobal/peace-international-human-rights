@extends('admin.master-layout')
@section('content')
    <div class="container-fluid">

        <div class="row mb-3">
            <div class="col-lg-12">
                <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.slider.index') }}">
                    <i class="fa fa-arrow-left"></i> Back to Slider List
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 col-md-10">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0 text-white"><i class="fas fa-folder-plus me-2"></i> Add Slider</h5>
                    </div>
                    <div class="card-body">

                        {{-- Success Message --}}
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        {{-- Error Message --}}
                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error!</strong> {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
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
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        {{-- Form --}}
                        <form action="{{ route('admin.slider.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Title -->
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title" id="title" class="form-control form-control-sm"
                                    placeholder="Enter Title" value="{{ old('title') }}">
                            </div>

                            <!-- Sub Title -->
                            <div class="mb-3">
                                <label for="subtitle" class="form-label">Sub Title</label>
                                <input type="text" name="subtitle" id="subtitle" class="form-control form-control-sm"
                                    placeholder="Enter Sub Title" value="{{ old('subtitle') }}">
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <!-- button1_text -->
                                    <div class="mb-3">
                                        <label for="button1_text" class="form-label">Button-1 Text</label>
                                        <input type="text" name="button1_text" id="button1_text"
                                            class="form-control form-control-sm" placeholder="Enter Button-1 Text"
                                            value="{{ old('button1_text') }}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <!-- button1_link -->
                                    <div class="mb-3">
                                        <label for="button1_link" class="form-label">Button-1 Link</label>
                                        <input type="text" name="button1_link" id="button1_link"
                                            class="form-control form-control-sm" placeholder="Enter Button-1 Link"
                                            value="{{ old('button1_link') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <!-- button2_text -->
                                    <div class="mb-3">
                                        <label for="button2_text" class="form-label">Button-2 Text</label>
                                        <input type="text" name="button2_text" id="button2_text"
                                            class="form-control form-control-sm" placeholder="Enter Button-2 Text"
                                            value="{{ old('button2_text') }}">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <!-- button2_link -->
                                    <div class="mb-3">
                                        <label for="button2_link" class="form-label">Button-2 Link</label>
                                        <input type="text" name="button2_link" id="button2_link"
                                            class="form-control form-control-sm" placeholder="Enter Button-2 Link"
                                            value="{{ old('button2_link') }}">
                                    </div>
                                </div>
                            </div>

                            <!-- Slider Image -->
                            <div class="mb-3">
                                <label for="background_image" class="form-label">Slider</label>

                                <input type="file" name="background_image" id="background_image"
                                    class="form-control form-control-sm"
                                    accept="image/png, image/jpg, image/jpeg, image/svg+xml, image/webp"
                                    onchange="showPreview1(event)">

                                <div style="margin-top:10px">
                                    <small id="fileError" style="color: red; display: none; margin-top:5px"></small>
                                </div>

                                <div class="mt-3">
                                    <img id="file-ip-1-preview" src="{{ asset('no_image.jpg') }}" class="img-thumbnail"
                                        style="width: 100px; height: 80px;" alt="Image Preview">
                                </div>
                            </div>

                            <!-- Logo Image -->
                            <div class="mb-3">
                                <label for="logo_image" class="form-label">Logo</label>

                                <input type="file" name="logo_image" id="logo_image"
                                    class="form-control form-control-sm"
                                    accept="image/png, image/jpg, image/jpeg, image/svg+xml, image/webp"
                                    onchange="showPreview2(event)">

                                <div style="margin-top:10px"><small id="fileError2"
                                        style="color: red; display: none; margin-top:5px"></small></div>

                                <div class="mt-3">
                                    <img id="file-ip-2-preview" src="{{ asset('no_image.jpg') }}" class="img-thumbnail"
                                        style="width: 100px; height: 80px;" alt="Image Preview">
                                </div>
                            </div>

                            <!-- Submit -->
                            <div class="text-end">
                                <button type="submit" class="btn btn-sm btn-success">
                                    <i class="fas fa-check-circle me-1"></i> Add Slider
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        function showPreview1(event) {
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

        function showPreview2(event) {
            const input = event.target;
            const file = input.files[0];

            // Check file size (limit: 50MB)
            if (file && file.size > 50 * 1024 * 1024) {
                alert("File size exceeds 50MB limit.");
                input.value = ""; // Clear file input
                return; // Stop preview generation
            }

            const preview = document.getElementById('file-ip-2-preview');
            preview.src = URL.createObjectURL(event.target.files[0]);
            preview.onload = () => URL.revokeObjectURL(preview.src); // Free memory
        }
    </script>

    <script>
        const fileInput = document.getElementById('background_image');
        const fileError = document.getElementById('fileError');
        const fileInput2 = document.getElementById('logo_image');
        const fileError2 = document.getElementById('fileError2');

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

        fileInput2.addEventListener('change', function() {
            const file = this.files[0];

            if (file) {
                const fileType = file.type;
                const fileSizeInKB = file.size / 1024;

                // Validate MIME type
                if (!allowedTypes.includes(fileType)) {
                    fileError2.textContent = 'Only JPEG, JPG, PNG, WEBP, or SVG files are allowed.';
                    fileError2.style.display = 'inline';
                    this.value = '';
                    return;
                }

                // Validate file size
                if (fileSizeInKB > maxSizeInKB) {
                    fileError2.textContent = 'File size must be less than 2MB.';
                    fileError2.style.display = 'inline';
                    this.value = '';
                    return;
                }

                // If valid
                fileError2.style.display = 'none';
            }
        });
    </script>

@endsection
