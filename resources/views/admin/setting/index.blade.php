@extends('admin.master-layout')
@section('content')
    <div class="container-fluid">

        {{-- <div class="row mb-3">
            <div class="col-lg-12">
                <a class="btn btn-sm btn-outline-primary" href="{{ route('admin.role.index') }}">
                    <i class="fa fa-arrow-left"></i> Back to Setting List
                </a>
            </div>
        </div>
        <hr> --}}

        <div class="row">
            <div class="col-lg-8 col-md-10">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0 text-white"><i class="fas fa-folder-plus me-2"></i> Payment Details</h5>
                    </div>
                    <div class="card-body">

                        {{-- Success Message --}}
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        {{-- Error Message --}}
                        @if (session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <strong>Error!</strong> {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        {{-- Validation Errors --}}
                        @if ($errors->any())
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Validation Error!</strong>
                                <ul class="mb-0 mt-1">
                                    @foreach ($errors->all() as $error)
                                        <li class="small">{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        {{-- Form --}}
                        <form action="{{ route('admin.payment.setting.donate.update', $paymentSetting->id) }}"
                            method="POST">
                            @csrf

                            <!-- Bkash -->
                            <div class="mb-3">
                                <label for="bkash" class="form-label">Bkash</label>
                                <input type="text" name="bkash" id="bkash" class="form-control form-control-sm"
                                    placeholder="Enter Number" value="{{ old('bkash', $paymentSetting->bkash) }}">
                            </div>

                            <!-- Nagad -->
                            <div class="mb-3">
                                <label for="nagad" class="form-label">Nagad</label>
                                <input type="text" name="nagad" id="nagad" class="form-control form-control-sm"
                                    placeholder="Enter Number" value="{{ old('nagad', $paymentSetting->nagad) }}">
                            </div>

                            <!-- Rocket -->
                            <div class="mb-3">
                                <label for="rocket" class="form-label">Rocket</label>
                                <input type="text" name="rocket" id="rocket" class="form-control form-control-sm"
                                    placeholder="Enter Number" value="{{ old('rocket', $paymentSetting->rocket) }}">
                            </div>

                            <!-- Upai -->
                            <div class="mb-3">
                                <label for="upai" class="form-label">Upai</label>
                                <input type="text" name="upai" id="upai" class="form-control form-control-sm"
                                    placeholder="Enter Number" value="{{ old('upai', $paymentSetting->upai) }}">
                            </div>

                            <hr>

                            <!-- Title -->
                            <div class="mb-3">
                                <label for="bank_name" class="form-label">Bank Name</label>
                                <input type="text" name="bank_name" id="bank_name" class="form-control form-control-sm"
                                    placeholder="Bank Name" value="{{ old('bank_name', $paymentSetting->bank_name) }}">
                            </div>

                            <!-- Title -->
                            <div class="mb-3">
                                <label for="branch_name" class="form-label">Branch Name</label>
                                <input type="text" name="branch_name" id="branch_name"
                                    class="form-control form-control-sm" placeholder="Branch Name"
                                    value="{{ old('branch_name', $paymentSetting->branch_name) }}">
                            </div>

                            <!-- Title -->
                            <div class="mb-3">
                                <label for="account_holder_name" class="form-label">Account Holder Name</label>
                                <input type="text" name="account_holder_name" id="account_holder_name"
                                    class="form-control form-control-sm" placeholder="Account Holder Name"
                                    value="{{ old('account_holder_name', $paymentSetting->account_holder_name) }}">
                            </div>

                            <!-- Title -->
                            <div class="mb-3">
                                <label for="account_number" class="form-label">Account Number</label>
                                <input type="text" name="account_number" id="account_number"
                                    class="form-control form-control-sm" placeholder="Account Number"
                                    value="{{ old('account_number', $paymentSetting->account_number) }}">
                            </div>


                            <!-- Submit -->
                            <div class="text-end">
                                <button type="submit" class="btn btn-sm btn-success">
                                    <i class="fas fa-check-circle me-1"></i> Update
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
