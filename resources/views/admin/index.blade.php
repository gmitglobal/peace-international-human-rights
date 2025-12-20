@extends('admin.master-layout')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="alert alert-warning" role="alert">
                <h5 class="d-flex align-items-center">
                    Pls Fillup Your Profile
                    <a href="{{ route('admin.profile.page') }}" class="btn btn-sm btn-primary ms-2">
                        Click Here
                    </a>
                </h5>
            </div>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
        <div class="col">
            <div class="card radius-10 bg-gradient-deepblue">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0 text-white">{{ $total_donation ?? 0 }}</h5>
                        <div class="ms-auto">
                            <i class='bx bx-cart fs-3 text-white'></i>
                        </div>
                    </div>
                    <div class="progress my-3 bg-light-transparent" style="height:3px;">
                        <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex align-items-center text-white">
                        <p class="mb-0">Total No. Donation</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 bg-gradient-orange">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0 text-white">{{ $total_expense ?? 0 }}</h5>
                        <div class="ms-auto">
                            <i class='bx bx-dollar fs-3 text-white'></i>
                        </div>
                    </div>
                    <div class="progress my-3 bg-light-transparent" style="height:3px;">
                        <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex align-items-center text-white">
                        <p class="mb-0">Total No. Expense</p>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="col">
            <div class="card radius-10 bg-gradient-deepblue">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h5 class="mb-0 text-white">{{ $properties ?? 0 }}</h5>
                        <div class="ms-auto">
                            <i class='bx bx-dollar fs-3 text-white'></i>
                        </div>
                    </div>
                    <div class="progress my-3 bg-light-transparent" style="height:3px;">
                        <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25"
                            aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="d-flex align-items-center text-white">
                        <p class="mb-0">Total No. Product</p>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
    <!--end row-->
@endsection
