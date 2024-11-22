@extends('apoteker.template.main')

@section('title', 'Edit Profil - E Klinik PAL')

@php
    use Carbon\Carbon;
@endphp

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="row gy-5 g-xl-10">
                    <div class="col-xl-8 mb-xl-10 h-100">
                        <div class="card mb-5 mb-xl-10 mt-5" id="kt_profile_details_view">
                            <div class="card-header cursor-pointer">
                                <div class="card-title m-0">
                                    <h3 class="fw-bold m-0 fs-8">Detail Profil</h3>
                                </div>
                                <a href="{{ route('apoteker-profil-edit') }}"
                                    class="btn btn-sm btn-primary align-self-center">Edit
                                    Profil</a>
                            </div>
                            <div class="card-body p-9">
                                <div class="row mb-10">
                                    <label class="col-lg-4 fw-semibold text-muted">NIP</label>
                                    <div class="col-lg-8">
                                        <span class="fw-bold fs-6 text-gray-800">{{ auth()->user()->nip }}</span>
                                    </div>
                                </div>
                                <div class="row mb-10">
                                    <label class="col-lg-4 fw-semibold text-muted">Nama</label>
                                    <div class="col-lg-8">
                                        <span class="fw-bold fs-6 text-gray-800">{{ auth()->user()->nama }}</span>
                                    </div>
                                </div>
                                <div class="row mb-10">
                                    <label class="col-lg-4 fw-semibold text-muted">Divisi</label>
                                    <div class="col-lg-8">
                                        <span class="fw-bold fs-6 text-gray-800">{{ auth()->user()->divisi->nama }}</span>
                                    </div>
                                </div>
                                <div class="row mb-10">
                                    <label class="col-lg-4 fw-semibold text-muted">Tanggal lahir</label>
                                    <div class="col-lg-8">
                                        <span class="fw-bold fs-6 text-gray-800">
                                            {{ Carbon::parse(auth()->user()->tanggal_lahir)->format('d/m/Y') }}</span>
                                    </div>
                                </div>
                                <div class="row mb-10">
                                    <label class="col-lg-4 fw-semibold text-muted">Tinggi Badan</label>
                                    <div class="col-lg-8">
                                        <span class="fw-bold fs-6 text-gray-800">{{ auth()->user()->tinggi_badan }}</span>
                                    </div>
                                </div>
                                <div class="row mb-10">
                                    <label class="col-lg-4 fw-semibold text-muted">Berat Badan</label>
                                    <div class="col-lg-8">
                                        <span class="fw-bold fs-6 text-gray-800">{{ auth()->user()->berat_badan }}</span>
                                    </div>
                                </div>
                                <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6">
                                    <i class="ki-duotone ki-information fs-2tx text-warning me-4">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                    </i>
                                    <div class="d-flex flex-stack flex-grow-1">
                                        <div class="fw-semibold">
                                            <h4 class="text-gray-900 fw-bold">Informasi Profil</h4>
                                            <div class="fs-6 text-gray-700">Harap pastikan informasi profil Anda selalu
                                                update.
                                                Jika Anda perlu melakukan perubahan apa pun, klik tombol
                                                <a class="fw-bold" href="{{ route('apoteker-profil-edit') }}">Edit Profil</a> di atas.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 mb-xl-10 h-100">
                        <div class="card h-md-100" dir="ltr">
                            <div class="card-body d-flex flex-column flex-center">
                                <div class="mb-2">
                                    <h1 class="fw-semibold text-gray-800 text-center lh-lg">Apakah 
                                        <span class="fw-bolder">Profil Anda Saat Ini</span>
                                        <br /> Diperbarui dengan Benar?
                                    </h1>
                                    <div class="py-10 text-center">
                                        <img src="assets/media/svg/illustrations/easy/2.svg"
                                            class="theme-light-show w-200px" alt="" />
                                        <img src="assets/media/svg/illustrations/easy/2-dark.svg"
                                            class="theme-dark-show w-200px" alt="" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
