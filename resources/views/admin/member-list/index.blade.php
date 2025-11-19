@extends('admin.master-layout')
@section('content')
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Member Management</h4>
            {{-- <a href="{{ route('admin.member.list.index') }}" class="btn btn-sm btn-dark">
                <i class="fas fa-plus-circle me-1"></i> Add Member
            </a> --}}
        </div>

        <!-- Search -->
        {{-- <div class="card mb-3">
            <div class="card-body">
                <form action="{{ route('admin.member.list.index') }}" method="GET" class="row g-2 align-items-center">
                    <div class="col-md-4">
                        <input type="text" name="search" class="form-control form-control-sm" placeholder="Search ..."
                            value="{{ request('search') }}">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-sm btn-primary">
                            <i class="fas fa-search me-1"></i> Search
                        </button>
                        <a href="{{ route('admin.member.list.index') }}" class="btn btn-sm btn-secondary">
                            <i class="fas fa-sync-alt me-1"></i> Reset
                        </a>
                    </div>
                </form>
            </div>
        </div> --}}

        <!-- Category Table -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-3">All Members</h5>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle mb-0">
                        <thead class="table-success text-center">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Division</th>
                                <th>District</th>
                                <th>Thana</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">

                            @forelse ($paginatedData ?? [] as $result)
                                <tr>
                                    <td class="text-center">#</td>
                                    <td>{{ $result['name'] ?? null }}</td>
                                    <td>{{ $result['division'] ?? null }}</td>
                                    <td>{{ $result['district'] ?? null }}</td>
                                    <td>{{ $result['thana'] ?? null }}</td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="7">No data found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tfoot class="table-success text-center">
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Division</th>
                                <th>District</th>
                                <th>Thana</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-3">
                    @if ($paginatedData ?? null)
                        {{ $paginatedData->links('pagination::bootstrap-5') }}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
