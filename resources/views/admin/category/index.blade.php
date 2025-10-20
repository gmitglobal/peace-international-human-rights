@extends('admin.master-layout')
@section('content')
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Category Management</h4>
            <a href="{{ route('admin.category.create') }}" class="btn btn-sm btn-dark">
                <i class="fas fa-plus-circle me-1"></i> Add Category
            </a>
        </div>

        <!-- Search -->
        <div class="card mb-3">
            <div class="card-body">
                <form action="{{ route('admin.category.index') }}" method="GET" class="row g-2 align-items-center">
                    <div class="col-md-4">
                        <input type="text" name="search" class="form-control form-control-sm"
                            placeholder="Search category..." value="{{ request('search') }}">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-sm btn-primary">
                            <i class="fas fa-search me-1"></i> Search
                        </button>
                        <a href="{{ route('admin.category.index') }}" class="btn btn-sm btn-secondary">
                            <i class="fas fa-sync-alt me-1"></i> Reset
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Category Table -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-3">All Categories</h5>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle mb-0">
                        <thead class="table-success text-center">
                            <tr>
                                <th style="width:5%">#</th>
                                <th style="width:20%">Image</th>
                                <th style="width:65%" class="text-start">Name</th>
                                <th style="width:10%">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $key => $category)
                                <tr>
                                    <td class="text-center">{{ $key + 1 }}</td>
                                    <td class="text-center">
                                        <img src="{{ $category->image ? asset($category->image) : asset('no_image.jpg') }}"
                                            class="img-thumbnail" width="60" height="60" alt="Category Image">
                                    </td>
                                    <td>{{ $category->name }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.category.toggle.status', $category->id) }}"
                                            class="btn btn-sm btn-{{ $category->status ? 'success' : 'danger' }}"
                                            title="Toggle Status">
                                            <i class="fas fa-check-circle"></i>
                                        </a>

                                        <a href="{{ route('admin.category.edit', $category->id) }}"
                                            class="btn btn-sm btn-info" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal_{{ $category->id }}">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>

                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="deleteModal_{{ $category->id }}" tabindex="-1"
                                            aria-labelledby="deleteModalLabel_{{ $category->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog">
                                                <form action="{{ route('admin.category.destroy', $category->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $category->id }}">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-danger text-white">
                                                            <h5 class="modal-title text-white"
                                                                id="deleteModalLabel_{{ $category->id }}">
                                                                Confirm Deletion
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to delete the category
                                                            <strong>{{ $category->name }}</strong>?
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
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="4">No categories found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tfoot class="table-success text-center">
                            <tr>
                                <th style="width:5%">#</th>
                                <th style="width:20%">Image</th>
                                <th style="width:65%" class="text-start">Name</th>
                                <th style="width:10%">Actions</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-3">
                    {{ $categories->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection
