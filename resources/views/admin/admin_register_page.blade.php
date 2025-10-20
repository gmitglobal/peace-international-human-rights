@extends('admin.master-layout')

@section('title', 'Admin Dashboard')

@section('content')
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">User Profile</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">User Profile</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto"></div>
    </div>
    <!--end breadcrumb-->
    <hr>

    <div class="row justify-content-center">
        <div class="col-lg-6">

            {{-- Success Flash Message --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white fw-semibold">
                    New Member Registration
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.register.store') }}">
                        @csrf

                        {{-- Full Name --}}
                        <div class="mb-3 row">
                            <label for="name" class="col-sm-3 col-form-label">Full Name</label>
                            <div class="col-sm-9">
                                <input type="text" id="name" name="name"
                                    class="form-control @error('name') is-invalid @enderror" placeholder="Full Name"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Phone --}}
                        <div class="mb-3 row">
                            <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                            <div class="col-sm-9">
                                <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone"
                                    value="{{ old('phone') }}">
                            </div>
                        </div>

                        {{-- Address --}}
                        <div class="mb-3 row">
                            <label for="address" class="col-sm-3 col-form-label">Address</label>
                            <div class="col-sm-9">
                                <textarea id="address" name="address" rows="3" class="form-control" placeholder="Address">{{ old('address') }}</textarea>
                            </div>
                        </div>

                        <hr>

                        {{-- Email --}}
                        <div class="mb-3 row">
                            <label for="email" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" id="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror" placeholder="Email"
                                    value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Password --}}
                        <div class="mb-4 row">
                            <label for="password" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" id="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                                @error('password')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Submit --}}
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary px-4">
                                    <i class="bx bx-save"></i> Save
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>

    {{-- Admin List Table --}}
    @if (isset($admins) && $admins->count())
        <div class="row justify-content-center mt-5">
            <div class="col-lg-10">
                <div class="card shadow-sm">
                    <div class="card-header bg-dark text-white fw-semibold">
                        Registered Members
                    </div>
                    <div class="card-body table-responsive">
                        {{-- Search --}}
                        <form method="GET" action="{{ route('admin.register.page') }}" class="mb-4">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control"
                                    placeholder="Search by name, email or phone" value="{{ request('search') }}">
                                <button class="btn btn-outline-secondary" type="submit">Search</button>
                            </div>
                        </form>
                        <br>

                        {{-- Table --}}
                        <table class="table table-bordered table-striped align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Registered At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admins as $index => $admin)
                                    <tr>
                                        <td>{{ $admins->firstItem() + $index }}</td>
                                        <td>{{ $admin->name }}</td>
                                        <td>{{ $admin->email }}</td>
                                        <td>{{ $admin->phone ?? '-' }}</td>
                                        <td>{{ $admin->role }}</td>
                                        <td>
                                            <a href="{{ route('admin.toggle.status', $admin->id) }}"
                                                class="btn btn-sm d-inline-flex align-items-center {{ $admin->status ? 'btn-success' : 'btn-danger' }}"
                                                onclick="return confirm('Are you sure you want to toggle status?')">
                                                <i
                                                    class="bx {{ $admin->status ? 'bx-toggle-right' : 'bx-toggle-left' }} me-1"></i>
                                                {{ $admin->status ? 'Active' : 'Inactive' }}
                                            </a>
                                        </td>
                                        <td>{{ $admin->created_at->format('d M, Y h:i A') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{-- Pagination --}}
                        <div class="col-lg-12">
                            <div class="mt-3">
                                {{ $admins->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row justify-content-center mt-5">
            <div class="col-lg-10">
                <div class="card shadow-sm">
                    <div class="card-header bg-dark text-white fw-semibold">
                        Registered Members
                    </div>
                    <div class="card-body table-responsive">
                        {{-- Search --}}
                        <form method="GET" action="{{ route('admin.register.page') }}" class="mb-4">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control"
                                    placeholder="Search by name, email or phone" value="{{ request('search') }}">
                                <button class="btn btn-outline-secondary" type="submit">Search</button>
                            </div>
                        </form>
                        <br>

                        <h3 class="text-center">No Data Found</h3>
                    </div>
                </div>
            </div>
        </div>

    @endif


@endsection
