@extends('apoteker.template.main')

@section('title', 'Dashboard Apoteker - E Klinik PAL')

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
                                        <span class="me-2">Selamat datang, Apoteker {{ auth()->user()->nama }}!
                                            <div class="fs-2"> Mari kita berkolaborasi untuk memberikan pelayanan kesehatan 
                                                <br /> yang terbaik kepada setiap pasien. Terima kasih telah bergabung<br /> dalam misi kesehatan kami di
                                                <span class="position-relative d-inline-block text-danger">
                                                    <a class="text-info opacity-75-hover">e-Klinik</a>
                                                    <span
                                                        class="position-absolute opacity-15 bottom-0 start-0 border-4 border-danger border-bottom w-100">
                                                    </span>
                                                </span>.
                                            </div>
                                        </span>
                                    </div>
                                    <div class="text-center">
                                        <a href='{{ route('apoteker-obat') }}'
                                            class="btn btn-sm btn-primary fw-bold">Lihat Daftar Obat</a>
                                    </div>
                                </div>
                                <img class="mx-auto h-150px h-lg-200px theme-light-show"
                                    src="assets/media/illustrations/unitedpalms-1/6.png" alt="" />
                                <img class="mx-auto h-150px h-lg-200px theme-dark-show"
                                    src="assets/media/illustrations/unitedpalms-1/6-dark.png" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
