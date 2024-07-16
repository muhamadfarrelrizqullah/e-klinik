@extends('admin.template.main')

@section('title', 'Edit Profil - E-Klinik PAL')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="card mb-5 mb-xl-10">
                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                        data-bs-target="#kt_account_profile_details" aria-expanded="true"
                        aria-controls="kt_account_profile_details">
                        <div class="card-title m-0">
                            <h3 class="fw-bold m-0">Profile Details</h3>
                        </div>
                    </div>
                    <div id="kt_account_settings_profile_details" class="collapse show">
                        <form id="kt_account_profile_details_form" class="form" action="{{ route('admin-profil-update') }}"
                            method="PUT">
                            @csrf
                            <div class="card-body border-top p-9">
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Nama</label>
                                    <div class="col-lg-8 fv-row">
                                        <input type="text" id="editNama" name="nama" value="{{ $users->nama }}"
                                            class="form-control form-control-lg form-control-solid" />
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Tinggi Badan</label>
                                    <div class="col-lg-8 fv-row">
                                        <input type="text" id="editTinggiBadan" name="tinggi_badan" value="{{ $users->tinggi_badan }}"
                                            class="form-control form-control-lg form-control-solid" />
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Berat Badan</label>
                                    <div class="col-lg-8 fv-row">
                                        <input type="text" id="editBeratBadan" name="berat_badan" value="{{ $users->berat_badan }}"
                                            class="form-control form-control-lg form-control-solid" />
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Password</label>
                                    <div class="col-lg-8 fv-row">
                                        <input type="password" id="editPassword" name="password"
                                            placeholder="Enter your password"
                                            class="form-control form-control-lg form-control-solid" />
                                    </div>
                                </div>
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Confirm
                                        Password</label>
                                    <div class="col-lg-8 fv-row">
                                        <input type="password" id="editConfirmPassword" name="confirmPassword"
                                            placeholder="Confirm your password"
                                            class="form-control form-control-lg form-control-solid" />
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                <button type="reset" class="btn btn-light btn-active-light-primary me-2"><a
                                        href="{{ route('admin-profil') }}">Discard</a></button>
                                <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save
                                    Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        // Form Handling Update
        $('#kt_account_profile_details_form').on('submit', function(e) {
            e.preventDefault();
            let data = $(this).serialize();
            Swal.fire({
                title: 'Are you sure?',
                text: "Do you want to save the changes?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, save it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: "POST",
                        data: data,
                        success: function(response) {
                            Swal.fire(
                                'Saved!',
                                'Your data has been updated.',
                                'success'
                            ).then((result) => {
                                if (result.isConfirmed) {
                                    window.location.href =
                                        "{{ route('admin-profil') }}";
                                }
                            });
                        },
                        error: function(xhr) {
                            console.log(xhr.responseJSON.message);
                            Swal.fire(
                                'Error!',
                                'Error updating data: ' + xhr.responseJSON.message,
                                'error'
                            );
                        }
                    });
                }
            });
        });
    </script>
@endpush