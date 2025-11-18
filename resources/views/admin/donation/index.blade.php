@extends('admin.master-layout')
@section('content')
    <div class="container-fluid">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Donation Management</h4>
            {{-- <a href="{{ route('admin.activities.create') }}" class="btn btn-sm btn-dark">
                <i class="fas fa-plus-circle me-1"></i> Add Donation
            </a> --}}
        </div>

        <!-- Search -->
        <div class="card mb-3">
            <div class="card-body">
                <form action="{{ route('admin.donate.index') }}" method="GET" class="row g-2 align-items-center">
                    <div class="col-md-4">
                        <input type="text" name="search" class="form-control form-control-sm" placeholder="Search ..."
                            value="{{ request('search') }}">
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="btn btn-sm btn-primary">
                            <i class="fas fa-search me-1"></i> Search
                        </button>
                        <a href="{{ route('admin.donate.index') }}" class="btn btn-sm btn-secondary">
                            <i class="fas fa-sync-alt me-1"></i> Reset
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3">
                <div class="alert alert-primary" role="alert">
                    <strong>Total Sum: {{ $total_sum }} BDT</strong>
                </div>
            </div>
        </div>

        <!-- Category Table -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-3">All Donation</h5>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle mb-0">
                        <thead class="table-success text-center">
                            <tr>
                                <th>#</th>
                                <th class="text-start">Name</th>
                                <th class="text-start">Mobile</th>
                                <th class="text-start">Payment Type</th>
                                <th class="text-start">Real Amount</th>
                                <th class="text-start">Cal Amount</th>
                                <th class="text-start">Payment Account</th>
                                <th class="text-start">Transaction Last 4 (digits)</th>
                                <th class="text-start">Pay Date</th>
                                <th class="text-start">Card Account Name</th>
                                <th class="text-start">Card Account Number</th>
                                <th class="text-start">Card TRDX ID</th>
                                <th class="text-start">Card Bank Name</th>
                                <th class="text-start">Card Branch</th>
                                <th class="text-start">Card Pay Date</th>
                                <th class="text-start">Division</th>
                                <th class="text-start">District</th>
                                <th class="text-start">Thana</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($donations as $key => $donation)
                                <tr>
                                    <td class="text-center">{{ $key + 1 }}</td>
                                    <td>{{ $donation->name }}</td>
                                    <td>{{ $donation->mobile }}</td>
                                    <td>{{ $donation->payment_type }}</td>
                                    <td>{{ $donation->real_amount }}</td>
                                    <td>{{ $donation->cal_amount }}</td>
                                    <td>{{ $donation->payment_account }}</td>
                                    <td>{{ $donation->transaction_last4 }}</td>
                                    <td>{{ $donation->pay_date }}</td>
                                    <td>{{ $donation->card_account_name }}</td>
                                    <td>{{ $donation->card_account_number }}</td>
                                    <td>{{ $donation->card_trx_id }}</td>
                                    <td>{{ $donation->card_bank_name }}</td>
                                    <td>{{ $donation->card_branch }}</td>
                                    <td>{{ $donation->card_pay_date }}</td>
                                    <td>{{ $donation->division->name }}</td>
                                    <td>{{ $donation->district->name }}</td>
                                    <td>{{ $donation->thana->name }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.donate.toggle.status', $donation->id) }}"
                                            class="btn btn-sm btn-{{ $donation->status ? 'success' : 'danger' }}"
                                            title="Toggle Status">
                                            <i class="fas fa-check-circle"></i>
                                        </a>

                                        {{-- <a href="{{ route('admin.activities.edit', $donation->id) }}"
                                            class="btn btn-sm btn-info" title="Edit">
                                            <i class="fas fa-edit"></i>
                                        </a>

                                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal_{{ $donation->id }}">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>

                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="deleteModal_{{ $donation->id }}" tabindex="-1"
                                            aria-labelledby="deleteModalLabel_{{ $donation->id }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog">
                                                <form action="{{ route('admin.activities.destroy', $donation->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $donation->id }}">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-danger text-white">
                                                            <h5 class="modal-title text-white"
                                                                id="deleteModalLabel_{{ $donation->id }}">
                                                                Confirm Deletion
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to delete the category
                                                            <strong>{{ $donation->name }}</strong>?
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
                                    <td colspan="19">No activities found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                        <tfoot class="table-success text-center">
                            <tr>
                                <th>#</th>
                                <th class="text-start">Name</th>
                                <th class="text-start">Mobile</th>
                                <th class="text-start">Payment Type</th>
                                <th class="text-start">Real Amount</th>
                                <th class="text-start">Cal Amount</th>
                                <th class="text-start">Payment Account</th>
                                <th class="text-start">Transaction Last 4 (digits)</th>
                                <th class="text-start">Pay Date</th>
                                <th class="text-start">Card Account Name</th>
                                <th class="text-start">Card Account Number</th>
                                <th class="text-start">Card TRDX ID</th>
                                <th class="text-start">Card Bank Name</th>
                                <th class="text-start">Card Branch</th>
                                <th class="text-start">Card Pay Date</th>
                                <th class="text-start">Division</th>
                                <th class="text-start">District</th>
                                <th class="text-start">Thana</th>
                                <th>Actions</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <!-- Pagination -->
                {{-- <div class="mt-3">
                    {{ $donations->links('pagination::bootstrap-5') }}
                </div> --}}
            </div>
        </div>
    </div>
@endsection
