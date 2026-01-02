@extends('clients.master-layout')

@section('style')
    <style>
        .photo-card {
            border-radius: 16px;
            overflow: hidden;
            background: #fff;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease;
        }

        .photo-card:hover {
            transform: translateY(-6px);
        }

        .photo-thumb {
            position: relative;
            overflow: hidden;
        }

        .photo-thumb img {
            width: 100%;
            height: 220px;
            object-fit: cover;
            transition: transform 0.4s ease;
        }

        .photo-card:hover img {
            transform: scale(1.08);
        }

        .photo-content {
            padding: 16px;
        }

        .photo-content h5 {
            font-weight: 600;
            color: var(--dark-blue);
            margin: 0;
        }
    </style>
@endsection


@section('content')
    <!-- Page Title Section -->
    <section class="page-banner text-center py-5">
        <div class="container">
            <i class='bx bx-book-open page-icon mb-3'></i>
            <h1 class="page-banner-title">Photo Gallery</h1>
            <p class="page-banner-text">Understanding your rights, responsibilities, and our commitments</p>
        </div>
    </section>

    <section class="contact-page py-5">
        <div class="container">
            <div class="row">

                <!-- Gallery Item -->
                @foreach ($photogalleries as $photogallery)
                    <div class="col-lg-4 col-md-6 p-1">
                        <div class="photo-card">
                            <div class="photo-thumb">
                                <img src="{{ asset('/public/' . $photogallery->post_image) }}"
                                    alt="{{ $photogallery->title }}">
                            </div>
                            <div class="photo-content">
                                <h5>{{ $photogallery->title }}</h5>
                            </div>
                            <div class="photo-content">
                                <p>{{ $photogallery->paragraph }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- Pagination -->
                <div class="mt-3">
                    {{ $photogalleries->links('pagination::bootstrap-5') }}
                </div>

            </div>
        </div>
    </section>
@endsection
