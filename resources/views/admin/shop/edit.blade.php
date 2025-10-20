@extends('admin.master-layout')
@section('content')
    <div class="container-fluid">
        {{-- <div class="row">
            <div class="col-lg-12 mb-3">
                <a class="btn btn-sm btn-primary" href="{{ route('admin.category.index') }}">Back</a>
            </div>
        </div> --}}
        <div class="row mb-3">
            <div class="col-lg-12">
                <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.category.index') }}">
                    <i class="fa fa-arrow-left"></i> Back to Category List
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0 text-white"><i class="fas fa-folder-plus me-2"></i> Edit Category</h5>
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
                                <strong>Validation Errors:</strong>
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <form action="{{ route('admin.category.update', ['id' => $category->id]) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            {{-- Category Name --}}
                            <div class="mb-3">
                                <label for="name" class="form-label">Category Name <span
                                        class="text-danger">*</span></label>
                                <input type="text" name="name" id="name"
                                    class="form-control form-control-sm @error('name') is-invalid @enderror"
                                    placeholder="Enter category name" value="{{ old('name', $category->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Category Image --}}
                            <div class="mb-3">
                                <label for="image" class="form-label">Category Image</label>
                                <input type="file" name="image" id="image"
                                    class="form-control form-control-sm @error('image') is-invalid @enderror"
                                    accept="image/png, image/jpg, image/jpeg, image/svg+xml, image/webp"
                                    onchange="showPreview(event)">
                                <small id="fileError" style="color: red; display: none;"></small>
                                @error('image')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                                <div class="mt-3">
                                    <img id="file-ip-1-preview"
                                        src="{{ $category->image ? asset($category->image) : asset('no_image.jpg') }}"
                                        alt="Preview" class="img-thumbnail" width="100px" height="100px">
                                </div>
                            </div>

                            {{-- Submit Button --}}
                            <div class="text-end">
                                <button type="submit" class="btn btn-info btn-sm">
                                    <i class="fas fa-save me-1"></i> Update Category
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
