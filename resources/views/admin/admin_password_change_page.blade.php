@extends('admin.master-layout')

@section('title', 'Admin Dashboard')

@section('content')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Change Password</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Change Password Page</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto"></div>
    </div>
    <!--end breadcrumb-->
    <hr>

    <div class="row justify-content-center">
        <div class="col-lg-8">

            {{-- Flash message --}}
            @if (session('message'))
                <div class="alert alert-{{ session('alert-type', 'info') }} alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card border-0 shadow-sm">
                <div class="card-header bg-danger text-white fw-semibold">
                    Update Password
                </div>

                <div class="card-body p-4">
                    <form method="POST" action="{{ route('admin.password.update') }}">
                        @csrf

                        {{-- Old Password --}}
                        <div class="mb-3">
                            <label for="oldPassword" class="form-label">Old Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class='bx bxs-lock-open'></i></span>
                                <input type="password" name="old_password" id="oldPassword"
                                    class="form-control @error('old_password') is-invalid @enderror"
                                    placeholder="Enter current password" value="{{ old('old_password') }}">
                                @error('old_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- New Password --}}
                        <div class="mb-3">
                            <label for="new_password" class="form-label">New Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class='bx bxs-lock-open'></i></span>
                                <input type="password" name="new_password" id="new_password"
                                    class="form-control @error('new_password') is-invalid @enderror"
                                    placeholder="Enter new password" value="{{ old('new_password') }}">
                                @error('new_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Confirm Password --}}
                        <div class="mb-4">
                            <label for="new_password_confirmation" class="form-label">Confirm Password</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class='bx bxs-lock'></i></span>
                                <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                                    class="form-control" placeholder="Confirm new password"
                                    value="{{ old('new_password_confirmation') }}">
                            </div>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-danger">
                                <i class="bx bx-save"></i> Update Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
