@extends('admin.master-layout')
@section('content')
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Member Management</h4>
        </div>

        <!-- Search -->
        <div class="card mb-3">
            <div class="card-body">
                <form action="{{ route('admin.member.list') }}" method="GET" class="row g-2 align-items-center">
                    <div class="col-md-4">
                        <input type="text" name="search" class="form-control form-control-sm"
                            placeholder="Search Member..." value="{{ request('search') }}">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-sm btn-primary">
                            <i class="fas fa-search me-1"></i> Search
                        </button>
                        <a href="{{ route('admin.member.list') }}" class="btn btn-sm btn-secondary">
                            <i class="fas fa-sync-alt me-1"></i> Reset
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Category Table -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-3">All Member List</h5>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle mb-0">
                        <thead class="table-success text-center">
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Refer ID</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Division</th>
                                <th>District</th>
                                <th>Thana</th>
                                <th>Count</th>
                                <th>Role</th>
                                <th>Members</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $key => $item)
                                <tr>
                                    <td class="text-center">{{ $key + 1 }}</td>
                                    <td class="text-center">
                                        <img src="{{ $item->photo ? asset($item->photo) : asset('no_image.jpg') }}"
                                            class="img-thumbnail" width="60" height="60" alt="Image">
                                    </td>
                                    <td class="text-center">{{ $item->refer_id }}</td>
                                    <td class="text-center">{{ $item->name }}</td>
                                    <td class="text-center">{{ $item->phone }}</td>

                                    <td class="text-center">{{ $item->divisions->name ?? 'N/A' }}</td>
                                    <td class="text-center">{{ $item->districts->name ?? 'N/A' }}</td>
                                    <td class="text-center">{{ $item->thanas->name ?? 'N/A' }}</td>
                                    <td class="text-center">
                                        <span class="badge bg-{{ $item->count >= 10 ? 'success' : 'secondary' }}">
                                            {{ $item->count }}
                                        </span>
                                    </td>
                                    <td class="text-center">{{ $item->role->name ?? '-' }}</td>
                                    <td class="text-center">

                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal{{ $item->id }}">
                                            Members
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1"
                                            aria-labelledby="exampleModal{{ $item->id }}Label" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModal{{ $item->id }}Label">
                                                            Details</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">



                                                        <form action="{{ route('admin.member.changeRole', $item->id) }}"
                                                            method="POST">
                                                            @csrf

                                                            <select class="form-select form-select-sm" name="role_id">
                                                                <option value="">Select Role</option>
                                                                @foreach ($myRoles as $myRole)
                                                                    <option value="{{ $myRole->id }}"
                                                                        {{ $myRole->id == $item->role_id ? 'selected' : '' }}>
                                                                        {{ $myRole->name }}
                                                                    </option>
                                                                @endforeach
                                                            </select>

                                                            <div class="d-grid gap-2 mt-2">
                                                                <button class="btn btn-primary"
                                                                    type="submit">Change</button>
                                                            </div>
                                                        </form>





                                                        <hr>
                                                        <table class="table">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">#</th>
                                                                    <th scope="col">Member</th>
                                                                    <th scope="col">Count</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>

                                                                @php

                                                                    $users = App\Models\User::where(
                                                                        'refered_by',
                                                                        $item->refer_id,
                                                                    )->get();

                                                                @endphp
                                                                @foreach ($users as $key => $user)
                                                                    <tr>
                                                                        <th scope="row">{{ $key + 1 }}</th>
                                                                        <td>{{ $user->name }}</td>
                                                                        <td>{{ $user->count }}</td>
                                                                    </tr>
                                                                @endforeach

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </td>

                                    <td class="text-center">

                                        <a href="{{ route('admin.member.status', $item->id) }}"
                                            class="btn btn-sm btn-{{ $item->status ? 'success' : 'danger' }}"
                                            title="Toggle Status">
                                            <i class="fas fa-check-circle"></i>
                                        </a>

                                        <a href="{{ route('admin.member.details', $item->id) }}"
                                            class="btn btn-sm btn-warning" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        {{-- <a href="{{ route('admin.refer.list', $item->refer_id ?? 0) }}"
                                            class="btn btn-sm btn-secondary" title="Edit">
                                            <i class="fas fa-eye"></i>
                                        </a> --}}

                                        {{-- <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal_{{ $item->id }}">
                                            <i class="fas fa-trash-alt"></i>
                                        </button> --}}

                                        <!-- Delete Modal -->
                                        {{-- <div class="modal fade" id="deleteModal_{{ $item->id }}" tabindex="-1"
                                            aria-labelledby="deleteModalLabel_{{ $item->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog">
                                                <form action="{{ route('admin.member.destroy', $item->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-danger text-white">
                                                            <h5 class="modal-title text-white"
                                                                id="deleteModalLabel_{{ $item->id }}">
                                                                Confirm Deletion
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to delete the category
                                                            <strong>{{ $item->name }}</strong>?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-danger">Yes,
                                                                Delete</button>
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancel</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div> --}}
                                    </td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="8">
                                        <h3>No Item Found</h3>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tfoot class="table-success text-center">
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Refer ID</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Division</th>
                                <th>District</th>
                                <th>Thana</th>
                                <th>Count</th>
                                <th>Role</th>
                                <th>Members</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-3">
                    {{ $items->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection
