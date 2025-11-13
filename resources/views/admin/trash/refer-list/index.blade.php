@extends('admin.master-layout')
@section('content')
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Refer List</h4>
        </div>
        <hr>

        <!-- Category Table -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-3">All Member List</h5>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle mb-0">
                        <thead class="table-success text-center">
                            <tr>
                                <th>#</th>
                                <th>Refer ID</th>
                                <th>Name</th>
                                <th>Count</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $key => $item)
                                <tr>
                                    <td class="text-center">{{ $key + 1 }}</td>
                                    <td class="text-center">{{ $item->refer_id }}</td>
                                    <td class="text-center">{{ $item->name }}</td>
                                    <td class="text-center">
                                        <span
                                            class="badge bg-{{ $item->count >= 10 ? 'success' : 'secondary' }}">
                                            {{ $item->count }}
                                        </span>
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

                                        <a href="{{ route('admin.refer.list', $item->refer_id ?? 0) }}"
                                            class="btn btn-sm btn-secondary" title="Edit">
                                            <i class="fas fa-eye"></i>
                                        </a>

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
                                <th>Refer ID</th>
                                <th>Name</th>
                                <th>Count</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-3">
                    {{ $users->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
@endsection
