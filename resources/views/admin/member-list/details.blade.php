@extends('admin.master-layout')
@section('content')
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Member Details</h4>
        </div>

        <!-- Search -->
        <div class="card mb-3">
            <div class="card-body">
                <a href="{{ route('admin.member.list') }}" class="btn btn-sm btn-secondary">
                    <i class="fas fa-sync-alt me-1"></i> Back
                </a>
            </div>
        </div>

        <!-- Category Table -->
        <div class="card">
            <div class="card-body">
                <div class="container py-2">
                    <div class="card shadow-lg border-0 rounded-4">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <!-- Profile Photo -->
                                <div class="col-md-3 text-center">
                                    <img src="{{ $user->photo ? asset($user->photo) : asset('no_image.jpg') }}"
                                        class="rounded-circle img-fluid border"
                                        style="width: 150px; height: 150px; object-fit: cover;" alt="Profile Photo">
                                </div>

                                <!-- Basic Info -->
                                <div class="col-md-9">
                                    <h4 class="fw-bold mb-1">{{ $user->name }}</h3>
                                        <p class="text-muted mb-1">Role: <span
                                                class="fw-semibold text-primary">{{ ucfirst($user->role) }}</span></p>
                                        <p class="text-muted">Status:
                                            @if ($user->status == 1)
                                                <span class="badge bg-success">Active</span>
                                            @else
                                                <span class="badge bg-secondary">Inactive</span>
                                            @endif
                                        </p>
                                </div>
                            </div>

                            <hr>

                            <!-- Contact Information -->
                            <div class="row mt-3">
                                <div class="col-md-6 mb-3">
                                    <h4 class="fw-bold">Contact Information</h6>
                                        <ul class="list-unstyled">
                                            <li><strong>Phone:</strong> {{ $user->phone }}</li>
                                            <li><strong>WhatsApp:</strong> {{ $user->wphone ?? 'N/A' }}</li>
                                            <li><strong>Email:</strong> {{ $user->email ?? 'N/A' }}</li>
                                        </ul>
                                </div>

                                <!-- Family Information -->
                                <div class="col-md-6 mb-3">
                                    <h4 class="fw-bold">Family Information</h6>
                                        <ul class="list-unstyled">
                                            <li><strong>Father’s Name:</strong> {{ $user->father_name ?? 'N/A' }}</li>
                                            <li><strong>Mother’s Name:</strong> {{ $user->mother_name ?? 'N/A' }}</li>
                                            <li><strong>Birth Certificate No:</strong>
                                                {{ $user->birth_certificate_no ?? 'N/A' }}</li>
                                        </ul>
                                </div>
                            </div>

                            <hr>

                            <!-- Address Information -->
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <h4 class="fw-bold">Address</h6>
                                        <ul class="list-unstyled">
                                            <li><strong>Present:</strong> {{ $user->present_address ?? 'N/A' }}</li>
                                            <li><strong>Permanent:</strong> {{ $user->permanent_address ?? 'N/A' }}</li>
                                        </ul>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <h4 class="fw-bold">Location Details</h6>
                                        <ul class="list-unstyled">
                                            <li><strong>Division:</strong>
                                                {{ $user->divisions->name ?? ($user->division ?? 'N/A') }}</li>
                                            <li><strong>District:</strong>
                                                {{ $user->districts->name ?? ($user->district ?? 'N/A') }}</li>
                                            <li><strong>Thana:</strong>
                                                {{ $user->thanas->name ?? ($user->thana ?? 'N/A') }}
                                            </li>
                                        </ul>
                                </div>
                            </div>

                            <hr>

                            <!-- Documents -->
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="fw-bold">Documents</h6>
                                        <ul class="list-unstyled">
                                            <li>
                                                <strong>NID:</strong> <br>
                                                @if ($user->nid)
                                                    <img src="{{ $user->nid ? asset($user->nid) : asset('no_image.jpg') }}"
                                                        alt="nid" class="mt-2" style="max-width: 150px;">
                                                @else
                                                    <span class="text-muted">Not uploaded</span>
                                                @endif
                                            </li>
                                            <li>
                                                <strong>Signature:</strong><br>
                                                @if ($user->signature)
                                                    <img src="{{ $user->signature ? asset($user->signature) : asset('no_image.jpg') }}"
                                                        alt="Signature" class="mt-2" style="max-width: 150px;">
                                                @else
                                                    <span class="text-muted">Not uploaded</span>
                                                @endif
                                            </li>
                                        </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
