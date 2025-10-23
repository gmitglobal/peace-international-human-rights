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

    <div class="row g-4">
        {{-- Profile Info Card --}}
        <div class="col-lg-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <img src="{{ !empty($data->photo) ? url($data->photo) : url('no_image.jpg') }}" alt="Admin"
                        class="rounded-circle img-thumbnail mb-3" width="110">
                    <h4>{{ $data->name }}</h4>
                    <p class="text-muted mb-1">{{ $data->email }}</p>
                    <p class="text-muted">{{ $data->role }}</p>
                </div>
            </div>
        </div>

        {{-- Profile Edit Form --}}
        <div class="col-lg-8">
            @if (session('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white fw-semibold">
                    Profile Info
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
                        @csrf

                        {{-- Name --}}
                        <div class="mb-3 row">
                            <label for="name" class="col-sm-3 col-form-label">Full Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" id="name" placeholder="Full Name"
                                    value="{{ old('name', $data->name) }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Phone --}}
                        <div class="mb-3 row">
                            <label for="phone" class="col-sm-3 col-form-label">Phone</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone"
                                    value="{{ old('phone', $data->phone) }}">
                            </div>
                        </div>

                        {{-- WhatsApp Number --}}
                        <div class="mb-3 row">
                            <label for="wphone" class="col-sm-3 col-form-label">WhatsApp Number</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="wphone" id="wphone"
                                    placeholder="WhatsApp Number" value="{{ old('WhatsApp Number', $data->wphone) }}">
                            </div>
                        </div>


                        {{-- father_name --}}
                        <div class="mb-3 row">
                            <label for="father_name" class="col-sm-3 col-form-label">Father Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('father_name') is-invalid @enderror"
                                    name="father_name" id="father_name" placeholder="Father Name"
                                    value="{{ old('father_name', $data->father_name) }}">
                                @error('father_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- mother_name --}}
                        <div class="mb-3 row">
                            <label for="mother_name" class="col-sm-3 col-form-label">Mother Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control @error('mother_name') is-invalid @enderror"
                                    name="mother_name" id="mother_name" placeholder="Mother Name"
                                    value="{{ old('mother_name', $data->mother_name) }}">
                                @error('mother_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- birth_certificate_no --}}
                        <div class="mb-3 row">
                            <label for="birth_certificate_no" class="col-sm-3 col-form-label">Birth Certificate No.</label>
                            <div class="col-sm-9">
                                <input type="text"
                                    class="form-control @error('birth_certificate_no') is-invalid @enderror"
                                    name="birth_certificate_no" id="birth_certificate_no"
                                    placeholder="Birth Certificate No."
                                    value="{{ old('birth_certificate_no', $data->birth_certificate_no) }}">
                                @error('birth_certificate_no')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- present_address --}}
                        <div class="mb-3 row">
                            <label for="present_address" class="col-sm-3 col-form-label">Present Address</label>
                            <div class="col-sm-9">
                                <textarea name="present_address" id="present_address" rows="3" class="form-control"
                                    placeholder="Present Address">{{ old('present_address', $data->present_address) }}</textarea>
                            </div>
                        </div>

                        {{-- permanent_address --}}
                        <div class="mb-3 row">
                            <label for="permanent_address" class="col-sm-3 col-form-label">Permanent Address</label>
                            <div class="col-sm-9">
                                <textarea name="permanent_address" id="permanent_address" rows="3" class="form-control"
                                    placeholder="Permanent Address">{{ old('permanent_address', $data->permanent_address) }}</textarea>
                            </div>
                        </div>

                        {{-- Select Division --}}
                        <div class="mb-3 row">
                            <label for="divisionSelect" class="col-sm-3 col-form-label">Select Division</label>
                            <div class="col-sm-9">
                                <select name="division" id="divisionSelect" class="form-select"
                                    aria-label="Division select">
                                    <option selected disabled>-- Select Division --</option>
                                </select>
                            </div>
                        </div>

                        {{-- Select District --}}
                        <div class="mb-3 row">
                            <label for="districtSelect" class="col-sm-3 col-form-label">Select District</label>
                            <div class="col-sm-9">
                                <select name="district" id="districtSelect" class="form-select"
                                    aria-label="District select">
                                    <option selected disabled>-- Select District --</option>
                                </select>
                            </div>
                        </div>

                        {{-- Select Thana --}}
                        <div class="mb-3 row">
                            <label for="thanaSelect" class="col-sm-3 col-form-label">Select Thana</label>
                            <div class="col-sm-9">
                                <select name="thana" id="thanaSelect" class="form-select" aria-label="Thana select">
                                    <option selected disabled>-- Select Thana --</option>
                                </select>
                            </div>
                        </div>




                        <hr>

                        {{-- Photo --}}
                        <div class="mb-3 row">
                            <label for="photo" class="col-sm-3 col-form-label">Photo</label>
                            <div class="col-sm-9">
                                <input type="file" id="photo" name="photo" onchange="showPreview(event)"
                                    class="form-control @error('photo') is-invalid @enderror">
                                @error('photo')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Preview --}}
                        <div class="mb-3 row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <img id="file-ip-1-preview"
                                    src="{{ !empty($data->photo) ? url($data->photo) : url('no_image.jpg') }}"
                                    alt="Admin" class="img-thumbnail rounded" width="110">
                            </div>
                        </div>

                        {{-- NID --}}
                        <div class="mb-3 row">
                            <label for="nid" class="col-sm-3 col-form-label">NID</label>
                            <div class="col-sm-9">
                                <input type="file" id="nid" name="nid" onchange="showPreview2(event)"
                                    class="form-control @error('nid') is-invalid @enderror">
                                @error('nid')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Preview --}}
                        <div class="mb-3 row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <img id="file-ip-2-preview"
                                    src="{{ !empty($data->nid) ? url($data->nid) : url('no_image.jpg') }}" alt="Admin"
                                    class="img-thumbnail rounded" width="110">
                            </div>
                        </div>


                        {{-- signature --}}
                        <div class="mb-3 row">
                            <label for="signature" class="col-sm-3 col-form-label">Signature</label>
                            <div class="col-sm-9">
                                <input type="file" id="signature" name="signature" onchange="showPreview3(event)"
                                    class="form-control @error('signature') is-invalid @enderror">
                                @error('signature')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Preview --}}
                        <div class="mb-3 row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <img id="file-ip-3-preview"
                                    src="{{ !empty($data->signature) ? url($data->signature) : url('no_image.jpg') }}"
                                    alt="Admin" class="img-thumbnail rounded" width="110">
                            </div>
                        </div>

                        {{-- Submit --}}
                        <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary px-4">
                                    <i class="bx bx-save"></i> Save Changes
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('script')
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

            // Show preview if valid
            if (file) {
                const src = URL.createObjectURL(file);
                const preview = document.getElementById("file-ip-1-preview");
                preview.src = src;
                preview.style.display = "block";
            }
        }

        function showPreview2(event) {
            const input = event.target;
            const file = input.files[0];

            // Check file size (limit: 50MB)
            if (file && file.size > 50 * 1024 * 1024) {
                alert("File size exceeds 50MB limit.");
                input.value = ""; // Clear file input
                return; // Stop preview generation
            }

            // Show preview if valid
            if (file) {
                const src = URL.createObjectURL(file);
                const preview = document.getElementById("file-ip-2-preview");
                preview.src = src;
                preview.style.display = "block";
            }
        }

        function showPreview3(event) {
            const input = event.target;
            const file = input.files[0];

            // Check file size (limit: 50MB)
            if (file && file.size > 50 * 1024 * 1024) {
                alert("File size exceeds 50MB limit.");
                input.value = ""; // Clear file input
                return; // Stop preview generation
            }

            // Show preview if valid
            if (file) {
                const src = URL.createObjectURL(file);
                const preview = document.getElementById("file-ip-3-preview");
                preview.src = src;
                preview.style.display = "block";
            }
        }
    </script>

    <!-- ✅ Axios CDN -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <!-- ✅ Values from backend -->
    <script>
        const selectedDivisionId = {{ $data->division ?? 'null' }};
        const selectedDistrictId = {{ $data->district ?? 'null' }};
        const selectedThanaId = {{ $data->thana ?? 'null' }};
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', async function() {
            const divisionSelect = document.getElementById('divisionSelect');
            const districtSelect = document.getElementById('districtSelect');
            const thanaSelect = document.getElementById('thanaSelect');

            // ✅ Step 1: Load Divisions
            try {
                const divRes = await axios.get('/locations/divisions');
                const divisions = divRes.data;

                divisions.forEach(div => {
                    const option = document.createElement('option');
                    option.value = div.id;
                    option.textContent = div.name;
                    if (selectedDivisionId === div.id) option.selected = true;
                    divisionSelect.appendChild(option);
                });

                // If editing → load districts
                if (selectedDivisionId) await loadDistricts(selectedDivisionId);
            } catch (error) {
                console.error('Error fetching divisions:', error);
            }

            // ✅ Step 2: Load Districts when Division changes
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
                        if (selectedDistrictId === dist.id) option.selected = true;
                        districtSelect.appendChild(option);
                    });

                    if (selectedDistrictId) await loadThanas(selectedDistrictId);
                } catch (error) {
                    console.error('Error fetching districts:', error);
                }
            }

            // ✅ Step 3: Load Thanas when District changes
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
                        if (selectedThanaId === thana.id) option.selected = true;
                        thanaSelect.appendChild(option);
                    });
                } catch (error) {
                    console.error('Error fetching thanas:', error);
                }
            }
        });
    </script>

@endsection
