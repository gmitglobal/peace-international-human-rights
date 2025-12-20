@extends('clients.master-layout')


@section('style')
    <style>
        /* Video Cards */
        .video-card {
            border-radius: 16px;
            overflow: hidden;
            background: #fff;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease;
        }

        .video-card:hover {
            transform: translateY(-6px);
        }

        .video-thumb {
            position: relative;
            overflow: hidden;
        }

        .video-thumb iframe {
            width: 100%;
            height: 220px;
            border: none;
        }

        .video-content {
            padding: 16px;
        }

        .video-content h5 {
            font-weight: 600;
            color: var(--dark-blue);
        }

        .video-content p {
            font-size: 0.95rem;
            color: #555;
        }
    </style>
@endsection


@section('content')
    <!-- Page Title Section -->
    <section class="page-banner text-center py-5">
        <div class="container">
            <i class='bx bx-book-open page-icon mb-3'></i>
            <h1 class="page-banner-title">Video Gallery</h1>
            <p class="page-banner-text">Understanding your rights, responsibilities, and our commitments</p>
        </div>
    </section>


    <section class="contact-page py-5">
        <div class="container">

            <div class="row">
                <!-- Video Item -->

                @foreach ($videogalleries as $key => $videogallery)
                    <!-- Button to Open Modal -->
                    <div class="col-lg-4 col-md-6 p-1" data-bs-toggle="modal" data-bs-target="#videoModal{{ $key }}">
                        <div class="video-card">
                            <img src="https://img.youtube.com/vi/{{ $videogallery->video_link }}/mqdefault.jpg"
                                width="100%">
                            <div class="video-content">
                                <h5>{{ $videogallery->title }}</h5>
                            </div>
                        </div>
                    </div>

                    <div class="modal fade" id="videoModal{{ $key }}" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h5 class="modal-title">Video Preview</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal Body -->
                                <div class="modal-body p-0">
                                    <div class="ratio ratio-16x9">
                                        <iframe src="https://www.youtube.com/embed/{{ $videogallery->video_link }}"
                                            title="YouTube video"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen>
                                        </iframe>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach


                <!-- Pagination -->
                <div class="mt-3">
                    {{ $videogalleries->links('pagination::bootstrap-5') }}
                </div>

            </div>
        </div>
    </section>

    <script>
        document.querySelectorAll('.modal').forEach(function(modal) {
            modal.addEventListener('hidden.bs.modal', function() {
                const iframe = modal.querySelector('iframe');
                if (iframe) {
                    const src = iframe.src;
                    iframe.src = "";
                    iframe.src = src;
                }
            });
        });
    </script>
@endsection
