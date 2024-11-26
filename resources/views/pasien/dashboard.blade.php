@extends('pasien.template.main')

@section('title', 'Dashboard Pasien - E Klinik PAL')

@php
    use Carbon\Carbon;
@endphp

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="row g-5 gx-xl-10 mb-5 mb-xl-10">
                    <div class="col-xxl-12">
                        <div class="card card-flush h-md-100">
                            <div class="card-body d-flex flex-column justify-content-between mt-9 bgi-no-repeat bgi-size-cover bgi-position-x-center pb-0"
                                style="background-position: 100% 50%; background-image:url('assets/media/stock/900x600/42.png')">
                                <div class="mb-10">
                                    <div class="fs-2hx fw-bold text-gray-800 text-center mb-5">
                                        <span class="me-2">Selamat datang, User {{ auth()->user()->nama }}!
                                            <div class="fs-2"> Nikmati kemudahan mengakses layanan kesehatan dengan
                                                <span class="position-relative d-inline-block text-danger">
                                                    <a class="text-info opacity-75-hover">e-Klinik</a>
                                                    <span
                                                        class="position-absolute opacity-15 bottom-0 start-0 border-4 border-danger border-bottom w-100">
                                                    </span>
                                                </span>.
                                                <br /> Kami hadir untuk memberikan pelayanan terbaik dengan proses yang <br /> cepat, aman, dan nyaman karena kesehatan Anda adalah prioritas utama kami.
                                            </div>
                                        </span>
                                    </div>
                                    <div class="text-center">
                                        <a href='{{ route('pasien-pengajuan') }}' class="btn btn-sm btn-primary fw-bold" data-bs-toggle="modal"
                                        data-bs-target="#modalAdd">Ajukan Pengajuan</a>
                                    </div>
                                </div>
                                <img class="mx-auto h-150px h-lg-200px theme-light-show"
                                    src="assets/media/illustrations/unitedpalms-1/3.png" alt="" />
                                <img class="mx-auto h-150px h-lg-200px theme-dark-show"
                                    src="assets/media/illustrations/unitedpalms-1/3-dark.png" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modals')
    <div id="modalAdd" class="modal fade" tabindex="-1" aria-hidden="true" aria-labelledby="modalAddsLabel">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Tambah Pengajuan Baru</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <form class="form" action="{{ route('pasien-datapengajuan-tambah') }}" method="POST">
                        @csrf
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span>Nama</span>
                            </label>
                            <input type="text" class="form-control form-control-solid" placeholder="" id="addNama"
                                name="nama" readonly value="{{ $user->nama }}">
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span>Tanggal Lahir</span>
                            </label>
                            <input type="text" class="form-control form-control-solid" placeholder=""
                                id="addTanggalLahir" name="tanggal_lahir" readonly
                                value="{{ Carbon::parse(auth()->user()->tanggal_lahir)->format('d/m/Y') }}">
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span class="required">Keluhan</span>
                            </label>
                            <input type="text" class="form-control form-control-solid" placeholder="Masukkan keluhan"
                                id="addKeluhan" name="keluhan">
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="fs-6 fw-semibold mb-2 required">Poli</label>
                            <select class="form-select form-select-solid" data-placeholder="" data-hide-search="true"
                                id="addPoli" name="poli">
                                <option value="" selected disabled>Masukkan poli</option>
                                @foreach ($polis as $poli)
                                    <option value="{{ $poli->id }}">{{ $poli->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row g-9 mb-8">
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>Tinggi Badan</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="addTinggiBadan" name="tinggi_badan" value="{{ $user->tinggi_badan }}">
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>Berat Badan</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="addBeratBadan" name="berat_badan" value="{{ $user->berat_badan }}">
                            </div>
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="fs-6 fw-semibold mb-2 required">Tanggal Pemeriksaan</label>
                            <div class="position-relative d-flex align-items-center">
                                <i class="ki-duotone ki-calendar-8 fs-2 position-absolute mx-4">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                    <span class="path5"></span>
                                    <span class="path6"></span>
                                </i>
                                <input type="date" class="form-control form-control-solid ps-12" placeholder=""
                                    id="addTanggalPemeriksaan" name="tanggal_pemeriksaan" />
                            </div>
                        </div>
                        <div class="text-end pt-15">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                                class="btn btn-light me-3">Batal</button>
                            <button type="submit" class="btn btn-primary">
                                <span class="indicator-label">Simpan</span>
                                <span class="indicator-progress">Tunggu....
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        // Clear form modal add
        $('#modalAdd').on('hidden.bs.modal', function() {
            $(this).find('form')[0].reset();
        });

        // Menangani penanganan form modal add
        $('#modalAdd form').on('submit', function(e) {
            const swalMixinSuccess = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
            });
            e.preventDefault();
            let data = $(this).serialize();
            let form = $(this);
            $.ajax({
                url: form.attr('action'),
                type: "POST",
                data: data,
                success: function(response) {
                    // console.log(response);
                    $('#modalAdd').modal('hide');
                    swalMixinSuccess.fire(
                        'Success!',
                        'Pengajuan berhasil ditambah.',
                        'success'
                    );
                },
                error: function(xhr) {
                    // console.log(xhr.responseJSON.message);
                    Swal.fire(
                        'Error!',
                        'Error menambahkan pengajuan: ' + xhr.responseJSON.message,
                        'error'
                    );
                }
            });
        });

        // Regex input tinggi badan, berat badan
        function restrictInputToNumbers(event) {
            event.target.value = event.target.value.replace(/[^0-9]/g, '');
        }
        const inputs = document.querySelectorAll(
            'input[name="tinggi_badan"], input[name="berat_badan"]');
        inputs.forEach(input => {
            input.addEventListener('input', restrictInputToNumbers);
        });

        // Handler input tanggal pemeriksaan
        document.addEventListener('DOMContentLoaded', function() {
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('addTanggalPemeriksaan').setAttribute('min', today);
        });
    </script>
@endpush
