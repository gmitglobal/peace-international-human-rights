@extends('clients.master-layout')


@section('style')
    <style>
        .contact-page {
            font-family: 'Segoe UI', sans-serif;
            background-color: #F8F9FA;
        }

        /* Page Title */
        .contact-page-title {
            color: #2E8BC0;
            font-weight: 700;
        }

        /* Cards */
        .contact-form-card,
        .contact-info-card {
            background-color: #ffffff;
            border-radius: 10px;
        }

        /* Form Title */
        .contact-form-title,
        .contact-info-title {
            color: #2E8BC0;
            font-weight: 600;
        }

        /* Map Responsiveness */
        .map-responsive {
            overflow: hidden;
            padding-bottom: 56.25%;
            /* 16:9 Aspect Ratio */
            position: relative;
            height: 0;
        }

        .map-responsive iframe {
            left: 0;
            top: 0;
            height: 100%;
            width: 100%;
            position: absolute;
            border-radius: 8px;
        }

        /* Form Inputs */
        .contact-form-card input,
        .contact-form-card textarea {
            border-radius: 6px;
        }
    </style>

    <style>
        .info-card {
            border: 1px solid #e3e3e3;
            border-radius: 8px;
            padding: 20px;
            background: #fff;
            margin-bottom: 30px;
        }

        .payment-box {
            border-radius: 10px;
            padding: 15px;
            background: #f5f8ff;
            border: 1px solid #dce6ff;
            text-align: center;
            transition: .3s;
        }

        .payment-box:hover {
            background: #e9f0ff;
            transform: translateY(-3px);
        }

        .payment-box img {
            width: 90px;
            height: 70px;
            margin-bottom: 8px;
        }

        .section-title {
            border-left: 4px solid #0d6efd;
            padding-left: 10px;
            margin-bottom: 20px;
            font-weight: bold;
            font-size: 22px;
        }

        .form-section-title {
            background: #f0f4ff;
            padding: 8px 15px;
            border-radius: 5px;
            font-weight: 600;
            margin-bottom: 15px;
        }
    </style>
@endsection


@section('content')
    <!-- Page Title Section -->
    <section class="page-banner text-center py-5">
        <div class="container">
            <i class='bx bx-book-open page-icon mb-3'></i>
            <h1 class="page-banner-title">Donate</h1>
            <p class="page-banner-text">Understanding your rights, responsibilities, and our commitments</p>
        </div>
    </section>


    <section class="contact-page py-5">
        <div class="container">

            {{-- Success Message --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- Error Message --}}
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Error!</strong> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="row">
                <div class="col-12">
                    <h2 class="section-title">Merchant Bank Account Details</h2>

                    <div class="info-card">
                        <div class="row mb-2">
                            <div class="col-6 fw-bold">Bank Name</div>
                            <div class="col-6 text-end">{{ $paymentSetting->bank_name }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6 fw-bold">Branch Name</div>
                            <div class="col-6 text-end">{{ $paymentSetting->branch_name }}</div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-6 fw-bold">Account Holder Name</div>
                            <div class="col-6 text-end">{{ $paymentSetting->account_holder_name }}</div>
                        </div>
                        <div class="row">
                            <div class="col-6 fw-bold">Account No.</div>
                            <div class="col-6 text-end">{{ $paymentSetting->account_number }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payment Info Section -->
            <div class="row">
                <div class="col-12">
                    <h2 class="section-title">Payment Methods</h2>
                </div>

                <div class="col-lg-3 col-6 mb-3">
                    <div class="payment-box">
                        <img src="{{ asset('payment/bkash.png') }}" alt="image">
                        <div class="fw-bold">Bkash</div>
                        <small>{{ $paymentSetting->bkash }}</small>
                    </div>
                </div>

                <div class="col-lg-3 col-6 mb-3">
                    <div class="payment-box">
                        <img src="{{ asset('payment/nagad.png') }}" alt="image">
                        <div class="fw-bold">Nagad</div>
                        <small>{{ $paymentSetting->nagad }}</small>
                    </div>
                </div>

                <div class="col-lg-3 col-6 mb-3">
                    <div class="payment-box">
                        <img src="{{ asset('payment/rocket.png') }}" alt="image">
                        <div class="fw-bold">Rocket</div>
                        <small>{{ $paymentSetting->rocket }}</small>
                    </div>
                </div>

                <div class="col-lg-3 col-6 mb-3">
                    <div class="payment-box">
                        <img src="{{ asset('payment/Upai.png') }}" alt="image">
                        <div class="fw-bold">Upay</div>
                        <small>{{ $paymentSetting->upai }}</small>
                    </div>
                </div>
            </div>

            <!-- Donate Form -->
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="info-card">
                        <h3 class="section-title">Send Donate</h3>

                        <form action="{{ route('admin.donate.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Basic Info -->
                            <div class="form-section-title">Your Information</div>
                            <div class="row">
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" placeholder="Your Name"
                                        required>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Mobile <span class="text-danger">*</span></label>
                                    <input type="text" name="mobile" class="form-control" placeholder="Your Mobile"
                                        required>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label class="form-label">Amount <span class="text-danger">*</span></label>
                                    <input type="text" name="real_amount" class="form-control" placeholder="Your Amount"
                                        required>
                                </div>
                            </div>

                            <!-- Payment Option -->
                            <div class="form-section-title">Select Payment Method</div>

                            <div class="d-flex flex-wrap gap-4 mb-3">
                                <label class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_type" value="bkash">
                                    <span class="ms-2">Bkash</span>
                                </label>
                                <label class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_type" value="nogod">
                                    <span class="ms-2">Nagad</span>
                                </label>
                                <label class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_type" value="rocket">
                                    <span class="ms-2">Rocket</span>
                                </label>
                                <label class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_type" value="upay">
                                    <span class="ms-2">Upay</span>
                                </label>
                            </div>

                            <!-- Mobile Banking Payment Details -->
                            <div id="mobileBankFields" style="display: none;">
                                <div class="row">
                                    <div class="col-lg-4 mb-3">
                                        <label class="form-label">Payment Account Number <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="payment_account"
                                            placeholder="Payment Account Number">
                                    </div>
                                    <div class="col-lg-4 mb-3">
                                        <label class="form-label">Transaction Number / Last 4 Digit <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="transaction_last4"
                                            placeholder="Transaction Number / Last 4 Digit">
                                    </div>
                                    <div class="col-lg-4 mb-3">
                                        <label class="form-label">Pay Date <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" name="pay_date">
                                    </div>
                                </div>
                            </div>

                            <!-- Card Payment -->
                            <div class="form-section-title">Card Payment</div>

                            <label class="form-check mb-3">
                                <input class="form-check-input" type="radio" id="payment_type" name="payment_type"
                                    value="card">
                                <span class="ms-2">Pay by Card</span>
                            </label>

                            <!-- Card Payment Form (Initially Hidden) -->
                            <div id="cardPaymentFields" style="display: none;">
                                <div class="row">
                                    <div class="col-lg-4 mb-3">
                                        <label class="form-label">Account Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="card_account_name"
                                            placeholder="Account Name">
                                    </div>
                                    <div class="col-lg-4 mb-3">
                                        <label class="form-label">Account Number <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="card_account_number"
                                            placeholder="Account Number">
                                    </div>
                                    <div class="col-lg-4 mb-3">
                                        <label class="form-label">Transaction ID <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="card_trx_id"
                                            placeholder="Transaction ID">
                                    </div>
                                    <div class="col-lg-4 mb-3">
                                        <label class="form-label">Bank Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="card_bank_name"
                                            placeholder="Bank Name">
                                    </div>
                                    <div class="col-lg-4 mb-3">
                                        <label class="form-label">Branch Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="card_branch"
                                            placeholder="Branch Name">
                                    </div>
                                    <div class="col-lg-4 mb-3">
                                        <label class="form-label">Pay Date <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" name="card_pay_date">
                                    </div>
                                </div>
                            </div>

                            <!-- Address -->
                            <div class="form-section-title">Your Location</div>
                            <div class="row mb-3">
                                <div class="col-lg-4 mb-3">
                                    <label>Select Division <span class="text-danger">*</span></label>
                                    <select name="division_id" id="divisionSelect" class="form-select" required></select>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label>Select District <span class="text-danger">*</span></label>
                                    <select name="district_id" id="districtSelect" class="form-select" required></select>
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label>Select Thana <span class="text-danger">*</span></label>
                                    <select name="thana_id" id="thanaSelect" class="form-select" required></select>
                                </div>
                            </div>

                            <!-- Proof -->
                            <div class="form-section-title">Payment Proof</div>

                            <div class="mb-3">
                                <label class="form-label">Upload Screenshot</label>
                                <input type="file" name="post_image" id="post_image"
                                    class="form-control form-control-sm"
                                    accept="image/png, image/jpg, image/jpeg, image/svg+xml, image/webp"
                                    onchange="showPreview(event)">

                                <small id="fileError" class="text-danger d-none"></small>

                                <div class="mt-3">
                                    <img id="file-ip-1-preview" src="{{ asset('no_image.jpg') }}" class="img-thumbnail"
                                        style="width:150px;height:100px;">
                                </div>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary btn-lg mt-2">Donate</button>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </section>


    <script>
        function showPreview(event) {
            const input = event.target;
            const file = input.files[0];

            // Check file size (limit: 50MB)
            if (file && file.size > 50 * 1024 * 1024) {
                alert("File size exceeds 50MB limit.");
                input.value = ""; // Clear file input
                return; // Stop preview generation
            }

            const preview = document.getElementById('file-ip-1-preview');
            preview.src = URL.createObjectURL(event.target.files[0]);
            preview.onload = () => URL.revokeObjectURL(preview.src); // Free memory
        }
    </script>

    <script>
        const cardRadio = document.getElementById('payment_type');
        const cardFields = document.getElementById('cardPaymentFields');

        document.querySelectorAll('input[name="payment_type"]').forEach(radio => {
            radio.addEventListener('change', function() {
                if (cardRadio.checked) {
                    cardFields.style.display = 'block';
                } else {
                    cardFields.style.display = 'none';
                }
            });
        });
    </script>

    <script>
        const paymentRadios = document.querySelectorAll('input[name="payment_type"]');
        const mobileFields = document.getElementById('mobileBankFields');

        paymentRadios.forEach(radio => {
            radio.addEventListener('change', function() {
                // Show mobile fields for Bkash, Nagad, Rocket, Upay
                if (['bkash', 'nogod', 'rocket', 'upay'].includes(this.value)) {
                    mobileFields.style.display = 'block';
                } else {
                    mobileFields.style.display = 'none';
                }
            });
        });
    </script>


    <script>
        const fileInput = document.getElementById('post_image');
        const fileError = document.getElementById('fileError');

        const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp', 'image/svg+xml'];
        const maxSizeInKB = 2048;

        fileInput.addEventListener('change', function() {
            const file = this.files[0];

            if (file) {
                const fileType = file.type;
                const fileSizeInKB = file.size / 1024;

                // Validate MIME type
                if (!allowedTypes.includes(fileType)) {
                    fileError.textContent = 'Only JPEG, JPG, PNG, WEBP, or SVG files are allowed.';
                    fileError.style.display = 'inline';
                    this.value = '';
                    return;
                }

                // Validate file size
                if (fileSizeInKB > maxSizeInKB) {
                    fileError.textContent = 'File size must be less than 2MB.';
                    fileError.style.display = 'inline';
                    this.value = '';
                    return;
                }

                // If valid
                fileError.style.display = 'none';
            }
        });
    </script>

    <!-- ✅ Axios CDN -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <!-- ✅ Values from backend -->
    <script>
        const selectedDivisionId = "";
        const selectedDistrictId = "";
        const selectedThanaId = "";

        document.addEventListener('DOMContentLoaded', async function() {
            const divisionSelect = document.getElementById('divisionSelect');
            const districtSelect = document.getElementById('districtSelect');
            const thanaSelect = document.getElementById('thanaSelect');

            try {
                divisionSelect.innerHTML = '<option selected disabled>-- Select Division --</option>';
                const divRes = await axios.get('/locations/divisions');
                const divisions = divRes.data;

                divisions.forEach(div => {
                    const option = document.createElement('option');
                    option.value = div.id;
                    option.textContent = div.name;
                    if (parseInt(selectedDivisionId) === parseInt(div.id)) option.selected = true;
                    divisionSelect.appendChild(option);
                });

                if (selectedDivisionId) await loadDistricts(selectedDivisionId);
            } catch (error) {
                console.error('Error fetching divisions:', error);
            }

            divisionSelect.addEventListener('change', function() {
                loadDistricts(this.value);
            });

            async function loadDistricts(divisionId) {
                districtSelect.innerHTML = '<option selected disabled>-- Select District --</option>';
                thanaSelect.innerHTML = '<option selected disabled>-- Select Thana --</option>';
                try {
                    const distRes = await axios.get(`/locations/districts/${divisionId}`);
                    const districts = distRes.data;

                    districts.forEach(dist => {
                        const option = document.createElement('option');
                        option.value = dist.id;
                        option.textContent = dist.name;
                        if (parseInt(selectedDistrictId) === parseInt(dist.id)) option.selected =
                            true;
                        districtSelect.appendChild(option);
                    });

                    if (selectedDistrictId) await loadThanas(selectedDistrictId);
                } catch (error) {
                    console.error('Error fetching districts:', error);
                }
            }

            districtSelect.addEventListener('change', function() {
                loadThanas(this.value);
            });

            async function loadThanas(districtId) {
                thanaSelect.innerHTML = '<option selected disabled>-- Select Thana --</option>';
                try {
                    const thanaRes = await axios.get(`/locations/thanas/${districtId}`);
                    const thanas = thanaRes.data;
                    thanas.forEach(thana => {
                        const option = document.createElement('option');
                        option.value = thana.id;
                        option.textContent = thana.name;
                        if (parseInt(selectedThanaId) === parseInt(thana.id)) option.selected =
                            true;
                        thanaSelect.appendChild(option);
                    });
                } catch (error) {
                    console.error('Error fetching thanas:', error);
                }
            }
        });
    </script>
@endsection
