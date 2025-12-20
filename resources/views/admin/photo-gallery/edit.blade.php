@extends('admin.master-layout')
@section('content')
    <div class="container-fluid">
        <div class="row mb-3">
            <div class="col-lg-12">
                <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.photo.gallery.index') }}">
                    <i class="fa fa-arrow-left"></i> Back to Photo Gallery Management List
                </a>
            </div>
        </div>
        <hr>

        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0 text-white"><i class="fas fa-folder-plus me-2"></i> Edit Photo Gallery Management
                        </h5>
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
                        <form action="{{ route('admin.photo.gallery.update', $activities->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <!-- Title -->
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title" id="title" class="form-control form-control-sm"
                                    placeholder="Enter Title" value="{{ old('title', $activities->title) }}">
                            </div>

                            <!-- Paragraph -->
                            <div class="mb-3">
                                <label for="paragraph" class="form-label">Paragraph</label>
                                <textarea class="form-control form-control-sm" name="paragraph" id="paragraph" cols="30" rows="4"
                                    placeholder="Write the post">{{ old('paragraph', $activities->paragraph) }}</textarea>
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
                                    <img id="file-ip-1-preview"
                                        src="{{ $activities->post_image ? asset($activities->post_image) : asset('no_image.jpg') }}"
                                        class="img-thumbnail" style="width: 200px; height: 200px;" alt="Image Preview">
                                </div>
                            </div>

                            <!-- Submit -->
                            <div class="text-end">
                                <button type="submit" class="btn btn-sm btn-success">
                                    <i class="fas fa-check-circle me-1"></i> Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end page wrapper -->

    {{-- Preview Image Script --}}
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
        const fileInput = document.getElementById('image');
        const fileError = document.getElementById('fileError');

        const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp', 'image/svg+xml'];
        const maxSizeInKB = 1024000;

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
