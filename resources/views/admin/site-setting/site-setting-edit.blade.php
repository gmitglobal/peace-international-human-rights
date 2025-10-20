@extends('admin.master-layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title" style="color: black">
                            <b>Site Setting Info</b>
                        </h4>
                        <hr class="m-1" />
                        <form id="myForm" action="{{ route('settings.update') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="company_name" class="col-form-label">Company
                                            Name</label>
                                        <div class="form-group">
                                            <input type="text" name="company_name" id="company_name"
                                                class="form-control form-control-sm"
                                                value="{{ $siteSettings?->company_name }}" placeholder="Company Name" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="company_subtitle" class="col-form-label">Company
                                    Subtitle</label>
                                <div class="form-group">
                                    <textarea type="text" name="company_subtitle" id="company_subtitle" class="form-control form-control-sm"
                                        placeholder="Company Subtitle">{{ $siteSettings?->company_subtitle }}</textarea>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="office_address" class="col-form-label">Office Address</label>
                                <div class="form-group">
                                    <textarea type="text" name="office_address" id="office_address" class="form-control form-control-sm"
                                        placeholder="Office Address">{{ $siteSettings?->office_address }}</textarea>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="head_office" class="col-form-label">Head Office Address</label>
                                <div class="form-group">
                                    <textarea type="text" name="head_office" id="head_office" class="form-control form-control-sm"
                                        placeholder="Office Address">{{ $siteSettings?->head_office }}</textarea>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="other_office_address" class="col-form-label">Other Office Address</label>
                                <div class="form-group">
                                    <textarea type="text" name="other_office_address" id="other_office_address" class="form-control form-control-sm"
                                        placeholder="Office Address">{{ $siteSettings?->other_office_address }}</textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="email" class="col-form-label">Email</label>
                                        <div class="form-group">
                                            <input type="text" name="email" id="email"
                                                class="form-control form-control-sm" value="{{ $siteSettings?->email }}"
                                                placeholder="Email" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="phone_number" class="col-form-label">Phone</label>
                                        <div class="form-group">
                                            <input type="text" name="phone_number" id="phone_number"
                                                class="form-control form-control-sm"
                                                value="{{ $siteSettings?->phone_number }}" placeholder="Phone" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="mobile" class="col-form-label">Mobile</label>
                                        <div class="form-group">
                                            <input type="text" name="mobile" id="mobile"
                                                class="form-control form-control-sm" value="{{ $siteSettings?->mobile }}"
                                                placeholder="Mobile" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="hot_number" class="col-form-label">Hot Number</label>
                                        <div class="form-group">
                                            <input type="text" name="hot_number" id="hot_number"
                                                class="form-control form-control-sm"
                                                value="{{ $siteSettings?->hot_number }}" placeholder="Hot Number" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="working_days" class="col-form-label">Working
                                            Days</label>
                                        <div class="form-group">
                                            <input type="text" name="working_days" id="working_days"
                                                class="form-control form-control-sm"
                                                value="{{ $siteSettings?->working_days }}" placeholder="Working Days" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="working_hours" class="col-form-label">Working
                                            Hours</label>
                                        <div class="form-group">
                                            <input type="text" name="working_hours" id="working_hours"
                                                class="form-control form-control-sm"
                                                value="{{ $siteSettings?->working_hours }}"
                                                placeholder="Working Hours" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="powered_by" class="col-form-label">Powered By</label>
                                        <div class="form-group">
                                            <input type="text" name="powered_by" id="powered_by" readonly
                                                class="form-control form-control-sm" value="KAF TECH BD"
                                                value="{{ $siteSettings?->powered_by }}" placeholder="Powered By" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="google_map_iframe" class="col-form-label">Google Map</label>
                                <div class="form-group">
                                    <textarea type="text" name="google_map_iframe" rows="5" id="google_map_iframe"
                                        class="form-control form-control-sm" placeholder="Google Map">{{ $siteSettings?->google_map_iframe }}</textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="header_logo" class="mb-2">Header Logo</label>
                                        <input type="file" class="mb-2 form-control form-control-sm" id="header_logo"
                                            name="header_logo"
                                            accept="image/png, image/jpg, image/jpeg, image/svg+xml, image/webp"
                                            onchange="showPreview3(event)" />
                                        <div class="preview">
                                            <img src="{{ $siteSettings?->header_logo ? asset($siteSettings?->header_logo) : asset('no_image.jpg') }}"
                                                class="img img-thumbnail" id="file-ip-3-preview" width="150px"
                                                height="80px" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="footer_logo" class="mb-2">Footer Logo</label>
                                        <input type="file" class="mb-2 form-control form-control-sm" id="footer_logo"
                                            name="footer_logo"
                                            accept="image/png, image/jpg, image/jpeg, image/svg+xml, image/webp"
                                            onchange="showPreview(event)" />
                                        <div class="preview">
                                            <img src="{{ $siteSettings?->footer_logo ? asset($siteSettings?->footer_logo) : asset('no_image.jpg') }}"
                                                class="img img-thumbnail" id="file-ip-1-preview" width="150px"
                                                height="80px" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="banner_image" class="mb-2">Banner Image</label>
                                        <input type="file" class="mb-2 form-control form-control-sm" id="banner_image"
                                            name="banner_image"
                                            accept="image/png, image/jpg, image/jpeg, image/svg+xml, image/webp"
                                            onchange="showPreview2(event)" />
                                        <div class="preview">
                                            <img src="{{ $siteSettings?->banner_image ? asset($siteSettings?->banner_image) : asset('no_image.jpg') }}"
                                                class="img img-thumbnail" id="file-ip-2-preview" width="150px"
                                                height="80px" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <input type="submit" class="btn btn-sm btn-warning waves-effect waves-light"
                                value="Update" />
                        </form>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
    </div>
    <!--end page wrapper -->

    <script>
        function showPreview(event) {
            const preview = document.getElementById('file-ip-1-preview');
            preview.src = URL.createObjectURL(event.target.files[0]);
            preview.onload = () => URL.revokeObjectURL(preview.src); // Free memory
        }

        function showPreview2(event) {
            const preview = document.getElementById('file-ip-2-preview');
            preview.src = URL.createObjectURL(event.target.files[0]);
            preview.onload = () => URL.revokeObjectURL(preview.src); // Free memory
        }

        function showPreview3(event) {
            const preview = document.getElementById('file-ip-3-preview');
            preview.src = URL.createObjectURL(event.target.files[0]);
            preview.onload = () => URL.revokeObjectURL(preview.src); // Free memory
        }
    </script>
@endsection
