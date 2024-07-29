@extends('admin.template.main')

@section('title', 'Data User - E Klinik PAL')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                        Data User</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">Home</li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">User</li>
                    </ul>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <button type="button" class="btn btn-sm fw-bold btn-secondary" id="bt-download">
                        Download PDF Pasien
                    </button>
                    <button type="button" class="btn btn-sm fw-bold btn-secondary" id="bt-download-dokter">
                        Download PDF Dokter
                    </button>
                    <button type="button" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal"
                        data-bs-target="#modalAdd">
                        Tambah User
                    </button>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card card-flush h-xl-100">
                            <div class="card-body">
                                <ul id="navRole" class="nav nav-pills nav-pills-custom mb-3">
                                    <li class="nav-item mb-3 me-3 me-lg-6">
                                        <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-row overflow-hidden w-100 h-auto p-3 active"
                                            data-bs-toggle="pill" href="#kt_stats_widget_6_tab_1">
                                            <div class="nav-icon me-3 d-flex align-items-center">
                                                <i class="ki-duotone ki-people fs-1">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                    <span class="path4"></span>
                                                    <span class="path5"></span>
                                                </i>
                                            </div>
                                            <span
                                                class="nav-text text-gray-800 fw-bold fs-6 lh-1 d-flex align-items-center">Pasien</span>
                                            <span
                                                class="bullet-custom position-absolute start-0 bottom-0 w-100 h-4px bg-primary"></span>
                                        </a>
                                    </li>
                                    <li class="nav-item mb-3 me-3 me-lg-6">
                                        <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-row overflow-hidden w-100 h-auto p-3"
                                            data-bs-toggle="pill" href="#kt_stats_widget_6_tab_2">
                                            <div class="nav-icon me-3 d-flex align-items-center">
                                                <i class="ki-duotone ki-syringe fs-1">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                    <span class="path4"></span>
                                                    <span class="path5"></span>
                                                </i>
                                            </div>
                                            <span
                                                class="nav-text text-gray-800 fw-bold fs-6 lh-1 d-flex align-items-center">Dokter</span>
                                            <span
                                                class="bullet-custom position-absolute start-0 bottom-0 w-100 h-4px bg-primary"></span>
                                        </a>
                                    </li>
                                    <li class="nav-item mb-3 me-3 me-lg-6">
                                        <a class="nav-link btn btn-outline btn-flex btn-color-muted btn-active-color-primary flex-row overflow-hidden w-100 h-auto p-3"
                                            data-bs-toggle="pill" href="#kt_stats_widget_6_tab_3">
                                            <div class="nav-icon me-3 d-flex align-items-center">
                                                <i class="ki-duotone ki-brifecase-timer fs-1">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                    <span class="path3"></span>
                                                    <span class="path4"></span>
                                                    <span class="path5"></span>
                                                    <span class="path6"></span>
                                                    <span class="path7"></span>
                                                </i>
                                            </div>
                                            <span
                                                class="nav-text text-gray-800 fw-bold fs-6 lh-1 d-flex align-items-center">Admin</span>
                                            <span
                                                class="bullet-custom position-absolute start-0 bottom-0 w-100 h-4px bg-primary"></span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade active show" id="kt_stats_widget_6_tab_1">
                                        <div class="table-responsive">
                                            <table id="TabelUserPasien"
                                                class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4"
                                                style="width: 100%">
                                                <thead class="thead-dark">
                                                    <tr class="fw-bold text-muted">
                                                        <th>No</th>
                                                        <th>NIP</th>
                                                        <th>Nama</th>
                                                        <th>Status</th>
                                                        <th>Role</th>
                                                        <th>Divisi</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="kt_stats_widget_6_tab_2">
                                        <div class="table-responsive">
                                            <table id="TabelUserDokter"
                                                class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4"
                                                style="width: 100%">
                                                <thead class="thead-dark">
                                                    <tr class="fw-bold text-muted">
                                                        <th>No</th>
                                                        <th>NIP</th>
                                                        <th>Nama</th>
                                                        <th>Status</th>
                                                        <th>Role</th>
                                                        <th>Divisi</th>
                                                        <th>Poli</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="kt_stats_widget_6_tab_3">
                                        <div class="table-responsive">
                                            <table id="TabelUserAdmin"
                                                class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4"
                                                style="width: 100%">
                                                <thead class="thead-dark">
                                                    <tr class="fw-bold text-muted">
                                                        <th>No</th>
                                                        <th>NIP</th>
                                                        <th>Nama</th>
                                                        <th>Status</th>
                                                        <th>Role</th>
                                                        <th>Divisi</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
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

@section('modals')
    <div id="modalDetail" class="modal fade" tabindex="-1" aria-hidden="true" aria-labelledby="modalDetailLabel">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Detail User</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <form class="form" action="#">
                        <div class="row g-9 mb-8">
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>NIP</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="detailNip" readonly>
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>Nama</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="detailNama" readonly>
                            </div>
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span>Status</span>
                            </label>
                            <input type="text" class="form-control form-control-solid" placeholder=""
                                id="detailStatus" readonly>
                        </div>
                        <div class="row g-9 mb-8">
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>Role</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="detailRole" readonly>
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>Divisi</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="detailDivisiNama" readonly>
                            </div>
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span>Tanggal Lahir</span>
                            </label>
                            <input type="text" class="form-control form-control-solid" placeholder=""
                                id="detailTanggalLahir" readonly>
                        </div>
                        <div class="row g-9 mb-8">
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>Tinggi Badan</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="detailTinggiBadan" readonly>
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>Berat Badan</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="detailBeratBadan" readonly>
                            </div>
                        </div>
                        <div class="text-end pt-15">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                                class="btn btn-light me-3">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="modalDetailDokter" class="modal fade" tabindex="-1" aria-hidden="true"
        aria-labelledby="modalDetailDokterLabel">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Detail User</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <form class="form" action="#">
                        <div class="row g-9 mb-8">
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>NIP</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="detailNipDokter" readonly>
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>Nama</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="detailNamaDokter" readonly>
                            </div>
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span>Status</span>
                            </label>
                            <input type="text" class="form-control form-control-solid" placeholder=""
                                id="detailStatusDokter" readonly>
                        </div>
                        <div class="row g-9 mb-8">
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>Role</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="detailRoleDokter" readonly>
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>Divisi</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="detailDivisiNamaDokter" readonly>
                            </div>
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span>Poli</span>
                            </label>
                            <input type="text" class="form-control form-control-solid" placeholder=""
                                id="detailPoliNamaDokter" readonly>
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span>Tanggal Lahir</span>
                            </label>
                            <input type="text" class="form-control form-control-solid" placeholder=""
                                id="detailTanggalLahirDokter" readonly>
                        </div>
                        <div class="row g-9 mb-8">
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>Tinggi Badan</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="detailTinggiBadanDokter" readonly>
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>Berat Badan</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="detailBeratBadanDokter" readonly>
                            </div>
                        </div>
                        <div class="text-end pt-15">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                                class="btn btn-light me-3">Batal</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div id="modalAdd" class="modal fade" tabindex="-1" aria-hidden="true" aria-labelledby="modalAddLabel">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Tambah User Baru</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <form class="form" action="{{ route('admin-datauser-tambah') }}" method="POST">
                        @csrf
                        <div class="row g-9 mb-8">
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">NIP</span>
                                </label>
                                <input type="text" class="form-control form-control-solid"
                                    placeholder="Masukkan nip user" id="addNip" name="nip" pattern="\d{8}"
                                    title="NIP harus berupa 8 digit angka">
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Nama</span>
                                </label>
                                <input type="text" class="form-control form-control-solid"
                                    placeholder="Masukkan nama user" id="addNama" name="nama">
                            </div>
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="required fs-6 fw-semibold mb-2">Status</label>
                            <select class="form-select form-select-solid" data-placeholder="" data-hide-search="true"
                                id="addStatus" name="status">
                                <option value="" selected disabled>Masukkan status user</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Tidak Aktif">Tidak Aktif</option>
                            </select>
                        </div>
                        <div class="row g-9 mb-8">
                            <div class="col-md-6 fv-row">
                                <label class="required fs-6 fw-semibold mb-2">Role</label>
                                <select class="form-select form-select-solid" data-placeholder="" data-hide-search="true"
                                    id="addRole" name="role">
                                    <option value="" selected disabled>Masukkan role user</option>
                                    <option value="Pasien">Pasien</option>
                                    <option value="Dokter">Dokter</option>
                                    <option value="Admin">Admin</option>
                                </select>
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="required fs-6 fw-semibold mb-2">Divisi</label>
                                <select class="form-select form-select-solid" data-placeholder="" data-hide-search="true"
                                    id="addDivisi" name="divisi">
                                    <option value="" selected disabled>Masukkan divisi user</option>
                                    @foreach ($divisis as $divisi)
                                        <option value="{{ $divisi->id }}">{{ $divisi->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="fs-6 fw-semibold mb-2">Poli</label>
                            <select class="form-select form-select-solid" data-placeholder="Pilih poli" id="addPoli"
                                name="polis[]" multiple>
                                @foreach ($polis as $poli)
                                    <option value="{{ $poli->id }}">{{ $poli->nama }}</option>
                                @endforeach
                            </select>
                            <small class="text-muted">Input Poli hanya aktif jika Role adalah Dokter.</small>
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="fs-6 fw-semibold mb-2 required">Tanggal Lahir</label>
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
                                    id="addTanggalLahir" name="tanggal_lahir" />
                            </div>
                        </div>
                        <div class="row g-9 mb-8">
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>Tinggi Badan</span>
                                </label>
                                <input type="text" class="form-control form-control-solid"
                                    placeholder="Masukkan tinggi badan user" id="addTinggiBadan" name="tinggi_badan">
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>Berat Badan</span>
                                </label>
                                <input type="text" class="form-control form-control-solid"
                                    placeholder="Masukkan berat badan user" id="addBeratBadan" name="berat_badan">
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

    <div id="modalEdit" class="modal fade" tabindex="-1" aria-hidden="true" aria-labelledby="modalEditLabel">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Edit User</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <form class="form" action="{{ route('admin-datauser-edit') }}" method="PUT">
                        @csrf
                        <input type="hidden" id="id" name="id">
                        <div class="row g-9 mb-8">
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">NIP</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="updateNip" name="nip" pattern="\d{8}"
                                    title="NIP harus berupa 8 digit angka">
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Nama</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="updateNama" name="nama">
                            </div>
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="required fs-6 fw-semibold mb-2">Status</label>
                            <select class="form-select form-select-solid" data-placeholder="" data-hide-search="true"
                                id="updateStatus" name="status">
                                <option value="" selected disabled>Pilih status user</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Tidak Aktif">Tidak Aktif</option>
                            </select>
                        </div>
                        <div class="row g-9 mb-8">
                            <div class="col-md-6 fv-row">
                                <label class="required fs-6 fw-semibold mb-2">Role</label>
                                <select class="form-select form-select-solid" data-placeholder="" data-hide-search="true"
                                    id="updateRole" name="role">
                                    <option value="" selected disabled>Pilih role user</option>
                                    <option value="Pasien">Pasien</option>
                                    <option value="Dokter">Dokter</option>
                                    <option value="Admin">Admin</option>
                                </select>
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="required fs-6 fw-semibold mb-2">Divisi</label>
                                <select class="form-select form-select-solid" data-placeholder="" data-hide-search="true"
                                    id="updateDivisiId" name="divisi">
                                    <option value="" selected disabled>Pilih divisi user</option>
                                    @foreach ($divisis as $divisi)
                                        <option value="{{ $divisi->id }}">{{ $divisi->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="fs-6 fw-semibold mb-2">Poli</label>
                            <select class="form-select form-select-solid" data-placeholder="Pilih poli" id="updatePoli"
                                name="polis[]" multiple>
                                @foreach ($polis as $poli)
                                    <option value="{{ $poli->id }}">{{ $poli->nama }}</option>
                                @endforeach
                            </select>
                            <small class="text-muted">Input Poli hanya aktif jika Role adalah Dokter.</small>
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="fs-6 fw-semibold mb-2 required">Tanggal Lahir</label>
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
                                    id="updateTanggalLahir" name="tanggal_lahir" />
                            </div>
                        </div>
                        <div class="row g-9 mb-8">
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>Tinggi Badan</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="updateTinggiBadan" name="tinggi_badan">
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>Berat Badan</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="updateBeratBadan" name="berat_badan">
                            </div>
                        </div>
                        <div class="text-end pt-15">
                            <button type="button" class="btn btn-warning" id="resetPasswordBtn"
                                class="btn btn-light me-3">Reset Password</button>
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
        // Multiple select add modal
        $(document).ready(function() {
            $('#addPoli').select2({
                allowClear: true
            });
        });

        // Multiple select update modal
        $(document).ready(function() {
            $('#updatePoli').select2({
                allowClear: true
            });
        });

        // Handle poli select role dokter
        $(document).ready(function() {
            $('#updateRole').change(function() {
                var selectedRole = $(this).val();
                if (selectedRole !== 'Dokter') {
                    $('#updatePoli').prop('disabled', true);
                } else {
                    $('#updatePoli').prop('disabled', false);
                }
            });
            if ($('#updateRole').val() !== 'Dokter') {
                $('#updatePoli').prop('disabled', true);
            }
        });
        $(document).ready(function() {
            $('#addRole').change(function() {
                var selectedRole = $(this).val();
                if (selectedRole !== 'Dokter') {
                    $('#addPoli').prop('disabled', true);
                } else {
                    $('#addPoli').prop('disabled', false);
                }
            });
            if ($('#addRole').val() !== 'Dokter') {
                $('#addPoli').prop('disabled', true);
            }
        });

        // Inisialisasi datatable dokter
        $(document).ready(function() {
            tabelDokter = $('#TabelUserDokter').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin-datauser-dokter') }}",
                order: [
                    [2, 'asc']
                ],
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        searchable: false,
                        orderable: false,
                        render: function(data, type, row, meta) {
                            return `<span class="text-gray-900 fw-bold fs-8">${data}</span>`;
                        }
                    },
                    {
                        data: 'nip',
                        name: 'nip',
                        orderable: true,
                        render: function(data, type, row, meta) {
                            return `<span class="text-gray-900 fw-bold fs-8">${data}</span>`;
                        }
                    },
                    {
                        data: 'nama',
                        name: 'nama',
                        orderable: true,
                        render: function(data, type, row, meta) {
                            return `<span class="text-gray-900 fw-bold fs-8">${data}</span>`;
                        }
                    },
                    {
                        data: 'status',
                        name: 'status',
                        orderable: true,
                        render: function(data, type, row) {
                            if (data === 'Aktif') {
                                return `<span class="badge badge-light-success">${data}</span>`;
                            } else {
                                return `<span class="badge badge-light-danger">${data}</span>`;
                            }
                        }
                    },
                    {
                        data: 'role',
                        name: 'role',
                        orderable: true,
                        render: function(data, type, row) {
                            if (data === 'Admin') {
                                return `<span class="badge badge-primary">${data}</span>`;
                            } else if (data === 'Dokter') {
                                return `<span class="badge badge-warning">${data}</span>`;
                            } else {
                                return `<span class="badge badge-success">${data}</span>`;
                            }
                        }
                    },
                    {
                        data: 'divisi_nama',
                        name: 'divisi_nama',
                        orderable: true,
                        render: function(data, type, row, meta) {
                            return `<span class="badge badge-light-secondary">${data}</span>`;
                        }
                    },
                    {
                        data: 'poli_nama',
                        name: 'poli_nama',
                        orderable: true,
                        render: function(data, type, row, meta) {
                            return `<span class="badge badge-light-secondary">${data}</span>`;
                        }
                    },
                    {
                        data: null,
                        name: 'aksi',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row, meta) {
                            return `<div class="d-flex justify-content-center flex-shrink-0">
                                <a onclick="modalDetailDokter('${row.nip}', '${row.nama}', '${row.status}', '${row.role}', '${row.divisi_nama}', '${row.tanggal_lahir}', '${row.tinggi_badan}', '${row.berat_badan}', '${row.poli_nama}')" class="btn btn-icon btn-bg-light btn-active-color-info btn-xl me-1" data-bs-toggle="modal" data-bs-target="#modalDetailDokter">
                                    <i class="ki-duotone ki-scroll fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </a>
                                <a onclick="modalEdit('${row.id}', '${row.nip}', '${row.nama}', '${row.status}', '${row.role}', '${row.divisi_id}', '${row.tanggal_lahir}', '${row.tinggi_badan}', '${row.berat_badan}')" class="btn btn-icon btn-bg-light btn-active-color-primary btn-xl me-1" data-bs-toggle="modal" data-bs-target="#modalEdit">
                                    <i class="ki-duotone ki-wrench fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </a>
                                <a onclick="deleteData(${row.id})" class="btn btn-icon btn-bg-light btn-active-color-danger btn-xl">
                                    <i class="ki-duotone ki-trash fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                        <span class="path5"></span>
                                    </i>
                                </a>
                            </div>`;
                        }
                    }
                ],
                aLengthMenu: [
                    [10, 30, 50, -1],
                    [10, 30, 50, "All"]
                ],
                iDisplayLength: 10,
                responsive: true,
                language: {
                    paginate: {
                        "previous": "Sebelumnya",
                        "next": "Selanjutnya"
                    },
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                    search: "Cari:",
                    lengthMenu: "Tampilkan _MENU_ entri",
                    zeroRecords: "Tidak ditemukan data yang sesuai",
                    infoEmpty: "Menampilkan 0 sampai 0 dari 0 entri",
                    infoFiltered: "(disaring dari _MAX_ entri keseluruhan)"
                },
            });
            // Fix tampilan tabel berubah setelah dilakukan responsif
            $(window).resize(function() {
                tabelDokter.columns.adjust().responsive.recalc();
            });
        });

        // Inisialisasi datatable Pasien
        $(document).ready(function() {
            tabelPasien = $('#TabelUserPasien').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin-datauser-pasien') }}",
                order: [
                    [2, 'asc']
                ],
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        searchable: false,
                        orderable: false,
                        render: function(data, type, row, meta) {
                            return `<span class="text-gray-900 fw-bold fs-8">${data}</span>`;
                        }
                    },
                    {
                        data: 'nip',
                        name: 'nip',
                        orderable: true,
                        render: function(data, type, row, meta) {
                            return `<span class="text-gray-900 fw-bold fs-8">${data}</span>`;
                        }
                    },
                    {
                        data: 'nama',
                        name: 'nama',
                        orderable: true,
                        render: function(data, type, row, meta) {
                            return `<span class="text-gray-900 fw-bold fs-8">${data}</span>`;
                        }
                    },
                    {
                        data: 'status',
                        name: 'status',
                        orderable: true,
                        render: function(data, type, row) {
                            if (data === 'Aktif') {
                                return `<span class="badge badge-light-success">${data}</span>`;
                            } else {
                                return `<span class="badge badge-light-danger">${data}</span>`;
                            }
                        }
                    },
                    {
                        data: 'role',
                        name: 'role',
                        orderable: true,
                        render: function(data, type, row) {
                            if (data === 'Admin') {
                                return `<span class="badge badge-primary">${data}</span>`;
                            } else if (data === 'Dokter') {
                                return `<span class="badge badge-warning">${data}</span>`;
                            } else {
                                return `<span class="badge badge-success">${data}</span>`;
                            }
                        }
                    },
                    {
                        data: 'divisi_nama',
                        name: 'divisi_nama',
                        orderable: true,
                        render: function(data, type, row, meta) {
                            return `<span class="badge badge-light-secondary">${data}</span>`;
                        }
                    },
                    {
                        data: null,
                        name: 'aksi',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row, meta) {
                            return `<div class="d-flex justify-content-center flex-shrink-0">
                                <a onclick="modalDetail('${row.nip}', '${row.nama}', '${row.status}', '${row.role}', '${row.divisi_nama}', '${row.tanggal_lahir}', '${row.tinggi_badan}', '${row.berat_badan}')" class="btn btn-icon btn-bg-light btn-active-color-info btn-xl me-1" data-bs-toggle="modal" data-bs-target="#modalDetail">
                                    <i class="ki-duotone ki-scroll fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </a>
                                <a onclick="modalEdit('${row.id}', '${row.nip}', '${row.nama}', '${row.status}', '${row.role}', '${row.divisi_id}', '${row.tanggal_lahir}', '${row.tinggi_badan}', '${row.berat_badan}')" class="btn btn-icon btn-bg-light btn-active-color-primary btn-xl me-1" data-bs-toggle="modal" data-bs-target="#modalEdit">
                                    <i class="ki-duotone ki-wrench fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </a>
                                <a onclick="deleteData(${row.id})" class="btn btn-icon btn-bg-light btn-active-color-danger btn-xl">
                                    <i class="ki-duotone ki-trash fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                        <span class="path5"></span>
                                    </i>
                                </a>
                            </div>`;
                        }
                    }
                ],
                aLengthMenu: [
                    [10, 30, 50, -1],
                    [10, 30, 50, "All"]
                ],
                iDisplayLength: 10,
                responsive: true,
                language: {
                    paginate: {
                        "previous": "Sebelumnya",
                        "next": "Selanjutnya"
                    },
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                    search: "Cari:",
                    lengthMenu: "Tampilkan _MENU_ entri",
                    zeroRecords: "Tidak ditemukan data yang sesuai",
                    infoEmpty: "Menampilkan 0 sampai 0 dari 0 entri",
                    infoFiltered: "(disaring dari _MAX_ entri keseluruhan)"
                },
            });
            // Fix tampilan tabel berubah setelah dilakukan responsif
            $(window).resize(function() {
                tabelPasien.columns.adjust().responsive.recalc();
            });
        });

        // Inisialisasi datatable
        $(document).ready(function() {
            tabelAdmin = $('#TabelUserAdmin').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin-datauser-admin') }}",
                order: [
                    [2, 'asc']
                ],
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        searchable: false,
                        orderable: false,
                        render: function(data, type, row, meta) {
                            return `<span class="text-gray-900 fw-bold fs-8">${data}</span>`;
                        }
                    },
                    {
                        data: 'nip',
                        name: 'nip',
                        orderable: true,
                        render: function(data, type, row, meta) {
                            return `<span class="text-gray-900 fw-bold fs-8">${data}</span>`;
                        }
                    },
                    {
                        data: 'nama',
                        name: 'nama',
                        orderable: true,
                        render: function(data, type, row, meta) {
                            return `<span class="text-gray-900 fw-bold fs-8">${data}</span>`;
                        }
                    },
                    {
                        data: 'status',
                        name: 'status',
                        orderable: true,
                        render: function(data, type, row) {
                            if (data === 'Aktif') {
                                return `<span class="badge badge-light-success">${data}</span>`;
                            } else {
                                return `<span class="badge badge-light-danger">${data}</span>`;
                            }
                        }
                    },
                    {
                        data: 'role',
                        name: 'role',
                        orderable: true,
                        render: function(data, type, row) {
                            if (data === 'Admin') {
                                return `<span class="badge badge-primary">${data}</span>`;
                            } else if (data === 'Dokter') {
                                return `<span class="badge badge-warning">${data}</span>`;
                            } else {
                                return `<span class="badge badge-success">${data}</span>`;
                            }
                        }
                    },
                    {
                        data: 'divisi_nama',
                        name: 'divisi_nama',
                        orderable: true,
                        render: function(data, type, row, meta) {
                            return `<span class="badge badge-light-secondary">${data}</span>`;
                        }
                    },
                    {
                        data: null,
                        name: 'aksi',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row, meta) {
                            return `<div class="d-flex justify-content-center flex-shrink-0">
                                <a onclick="modalDetail('${row.nip}', '${row.nama}', '${row.status}', '${row.role}', '${row.divisi_nama}', '${row.tanggal_lahir}', '${row.tinggi_badan}', '${row.berat_badan}')" class="btn btn-icon btn-bg-light btn-active-color-info btn-xl me-1" data-bs-toggle="modal" data-bs-target="#modalDetail">
                                    <i class="ki-duotone ki-scroll fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </a>
                                <a onclick="resetPasswordModal('${row.id}', '${row.tanggal_lahir}')" class="btn btn-icon btn-bg-light btn-active-color-danger btn-xl me-1">
                            <i class="ki-duotone ki-timer fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </a>
                            </div>`;
                        }
                    }
                ],
                aLengthMenu: [
                    [10, 30, 50, -1],
                    [10, 30, 50, "All"]
                ],
                iDisplayLength: 10,
                responsive: true,
                language: {
                    paginate: {
                        "previous": "Sebelumnya",
                        "next": "Selanjutnya"
                    },
                    info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                    search: "Cari:",
                    lengthMenu: "Tampilkan _MENU_ entri",
                    zeroRecords: "Tidak ditemukan data yang sesuai",
                    infoEmpty: "Menampilkan 0 sampai 0 dari 0 entri",
                    infoFiltered: "(disaring dari _MAX_ entri keseluruhan)"
                },
            });
            // Fix tampilan tabel berubah setelah dilakukan responsif
            $(window).resize(function() {
                tabelAdmin.columns.adjust().responsive.recalc();
            });
        });

        // Handle download pdf pasien
        document.addEventListener("DOMContentLoaded", function() {
            const {
                jsPDF
            } = window.jspdf;
            document.getElementById('bt-download').addEventListener('click', function() {
                $.ajax({
                    url: "{{ route('admin-datauser-pasien') }}",
                    type: "GET",
                    success: function(response) {
                        $.ajax({
                            url: "/logo-base64",
                            type: "GET",
                            success: function(logoResponse) {
                                // Urutkan data berdasarkan nama
                                var sortedData = response.data.sort((a, b) => {
                                    return a.nama.localeCompare(b.nama);
                                });
                                var doc = new jsPDF();
                                // Menambahkan kop perusahaan
                                var companyLogo = logoResponse.base64;
                                var companyAddress =
                                    'Jl. Ujung Kel. Ujung, Kec. Semampir, PO BOX 1134 Surabaya 60155';
                                var companyContact =
                                    'Telp (62-31) 329 2275 Fax (62-31) 329 2530';
                                var pageWidth = doc.internal.pageSize.getWidth();
                                var logoWidth = 50;
                                var centerX = pageWidth / 2;
                                doc.addImage(companyLogo, 'PNG', centerX -
                                    logoWidth / 2, 10, logoWidth, 10);
                                doc.setFontSize(10);
                                doc.setFont("helvetica", "normal");
                                doc.text(companyAddress, centerX, 30, {
                                    align: "center"
                                });
                                doc.text(companyContact, centerX, 35, {
                                    align: "center"
                                });
                                doc.setFontSize(10);
                                doc.text('Data Pasien Pt. PAL Indonesia', 14, 55);
                                // Menambahkan tabel
                                var columns = ["No", "NIP", "Nama", "Status",
                                    "Role", "Divisi", "Tanggal Lahir", "Tinggi Badan", "Berat Badan"
                                ];
                                var data = sortedData.map((row, index) => [
                                    index + 1,
                                    row.nip,
                                    row.nama,
                                    row.status,
                                    row.role,
                                    row.divisi_nama.replace(/&amp;/g, '&'),
                                    formatDate(row.tanggal_lahir),
                                    row.tinggi_badan,
                                    row.berat_badan
                                ]);
                                doc.autoTable({
                                    head: [columns],
                                    body: data,
                                    startY: 60,
                                    styles: {
                                        halign: 'center'
                                    },
                                    headStyles: {
                                        halign: 'center'
                                    }
                                });
                                doc.save('Data_Pasien_Report.pdf');
                            }
                        });
                    }
                });
            });
            // Fungsi untuk format tanggal
            function formatDate(dateStr) {
                var tanggal = new Date(dateStr);
                var day = tanggal.getDate().toString().padStart(2, '0');
                var month = (tanggal.getMonth() + 1).toString().padStart(2, '0');
                var year = tanggal.getFullYear();
                return `${day}-${month}-${year}`;
            }
        });

        // Handle download pdf dokter
        document.addEventListener("DOMContentLoaded", function() {
            const {
                jsPDF
            } = window.jspdf;
            document.getElementById('bt-download-dokter').addEventListener('click', function() {
                $.ajax({
                    url: "{{ route('admin-datauser-dokter') }}",
                    type: "GET",
                    success: function(response) {
                        $.ajax({
                            url: "/logo-base64",
                            type: "GET",
                            success: function(logoResponse) {
                                // Urutkan data berdasarkan nama
                                var sortedData = response.data.sort((a, b) => {
                                    return a.nama.localeCompare(b.nama);
                                });
                                var doc = new jsPDF();
                                // Menambahkan kop perusahaan
                                var companyLogo = logoResponse.base64;
                                var companyAddress =
                                    'Jl. Ujung Kel. Ujung, Kec. Semampir, PO BOX 1134 Surabaya 60155';
                                var companyContact =
                                    'Telp (62-31) 329 2275 Fax (62-31) 329 2530';
                                var pageWidth = doc.internal.pageSize.getWidth();
                                var logoWidth = 50;
                                var centerX = pageWidth / 2;
                                doc.addImage(companyLogo, 'PNG', centerX -
                                    logoWidth / 2, 10, logoWidth, 10);
                                doc.setFontSize(10);
                                doc.setFont("helvetica", "normal");
                                doc.text(companyAddress, centerX, 30, {
                                    align: "center"
                                });
                                doc.text(companyContact, centerX, 35, {
                                    align: "center"
                                });
                                doc.setFontSize(10);
                                doc.text('Data Dokter Pt. PAL Indonesia', 14, 55);
                                // Menambahkan tabel
                                var columns = ["No", "NIP", "Nama", "Status",
                                    "Role", "Divisi", "Tanggal Lahir", "Tinggi Badan", "Berat Badan"
                                ];
                                var data = sortedData.map((row, index) => [
                                    index + 1,
                                    row.nip,
                                    row.nama,
                                    row.status,
                                    row.role,
                                    row.divisi_nama.replace(/&amp;/g, '&'),
                                    formatDate(row.tanggal_lahir),
                                    row.tinggi_badan,
                                    row.berat_badan
                                ]);
                                doc.autoTable({
                                    head: [columns],
                                    body: data,
                                    startY: 60,
                                    styles: {
                                        halign: 'center'
                                    },
                                    headStyles: {
                                        halign: 'center'
                                    }
                                });
                                doc.save('Data_Dokter_Report.pdf');
                            }
                        });
                    }
                });
            });
            // Fungsi untuk format tanggal
            function formatDate(dateStr) {
                var tanggal = new Date(dateStr);
                var day = tanggal.getDate().toString().padStart(2, '0');
                var month = (tanggal.getMonth() + 1).toString().padStart(2, '0');
                var year = tanggal.getFullYear();
                return `${day}-${month}-${year}`;
            }
        });

        // Fix tampilan tabel berubah setelah dilakukan responsif
        $('a[data-bs-toggle="pill"]').on('shown.bs.tab', function(e) {
            tabelPasien.columns.adjust().responsive.recalc();
            tabelDokter.columns.adjust().responsive.recalc();
            tabelAdmin.columns.adjust().responsive.recalc();
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
                    console.log(response);
                    $('#modalAdd').modal('hide');
                    tabelPasien.ajax.reload();
                    tabelDokter.ajax.reload();
                    tabelAdmin.ajax.reload();
                    swalMixinSuccess.fire(
                        'Success!',
                        'User berhasil ditambah.',
                        'success'
                    );
                },
                error: function(xhr) {
                    console.log(xhr.responseJSON.message);
                    Swal.fire(
                        'Error!',
                        'Error menambahkan user: ' + xhr.responseJSON.message,
                        'error'
                    );
                }
            });
        });

        // Menangani penanganan fungsi delete data
        function deleteData(id) {
            const swalMixinSuccess = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
            });
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch(`/admin/data-user-delete/${id}`, {
                            method: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                    'content'),
                                'Content-Type': 'application/json'
                            }
                        })
                        .then(response => {
                            if (!response.ok) {
                                return response.json().then(errorData => {
                                    throw new Error(errorData.message);
                                });
                            }
                            return response.json();
                        })
                        .then(data => {
                            console.log('Deleted:', data);
                            tabelPasien.ajax.reload();
                            tabelDokter.ajax.reload();
                            tabelAdmin.ajax.reload();
                            swalMixinSuccess.fire(
                                'Deleted!',
                                'User berhasil dihapus.',
                                'success'
                            );
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            Swal.fire(
                                'Error!',
                                'Error menghapus user: ' + error.message,
                                'error'
                            );
                        });
                }
            });
        }

        // Regex input nip, tinggi badan, berat badan
        function restrictInputToNumbers(event) {
            event.target.value = event.target.value.replace(/[^0-9]/g, '');
        }
        const inputs = document.querySelectorAll(
            'input[name="nip"], input[name="tinggi_badan"], input[name="berat_badan"]');
        inputs.forEach(input => {
            input.addEventListener('input', restrictInputToNumbers);
        });

        // Clear form modal
        $('#modalAdd').on('hidden.bs.modal', function() {
            $(this).find('form')[0].reset();
        });
        $('#modalEdit').on('hidden.bs.modal', function() {
            $('#updatePoli').val(null).trigger('change');
        });

        // Pengambilan data modal detail
        function modalDetail(nip, nama, status, role, divisi_nama, tanggal_lahir, tinggi_badan, berat_badan) {
            $('#detailNip').val(nip);
            $('#detailNama').val(nama);
            $('#detailStatus').val(status);
            $('#detailRole').val(role);
            $('#detailDivisiNama').val(divisi_nama);
            let date = new Date(tanggal_lahir);
            let day = String(date.getDate()).padStart(2, '0');
            let month = String(date.getMonth() + 1).padStart(2, '0');
            let year = String(date.getFullYear());
            let formattedBirthdate = `${day}/${month}/${year}`;
            $('#detailTanggalLahir').val(formattedBirthdate);
            $('#detailTinggiBadan').val(tinggi_badan);
            $('#detailBeratBadan').val(berat_badan);
            $('#modalDetail').modal('show');
        }

        // Pengambilan data modal detail dokter
        function modalDetailDokter(nip, nama, status, role, divisi_nama, tanggal_lahir, tinggi_badan, berat_badan,
            poli_nama) {
            $('#detailNipDokter').val(nip);
            $('#detailNamaDokter').val(nama);
            $('#detailStatusDokter').val(status);
            $('#detailRoleDokter').val(role);
            $('#detailDivisiNamaDokter').val(divisi_nama);
            let date = new Date(tanggal_lahir);
            let day = String(date.getDate()).padStart(2, '0');
            let month = String(date.getMonth() + 1).padStart(2, '0');
            let year = String(date.getFullYear());
            let formattedBirthdate = `${day}/${month}/${year}`;
            $('#detailTanggalLahirDokter').val(formattedBirthdate);
            $('#detailTinggiBadanDokter').val(tinggi_badan);
            $('#detailBeratBadanDokter').val(berat_badan);
            $('#detailPoliNamaDokter').val(poli_nama);
            $('#modalDetailDokter').modal('show');
        }

        // Penangaan form modal edit
        $('#modalEdit form').on('submit', function(e) {
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
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Anda ingin menyimpan perubahan ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, simpan!',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: form.attr('action'),
                        type: "PUT",
                        data: data,
                        success: function(response) {
                            console.log(response);
                            $('#modalEdit').modal('hide');
                            tabelPasien.ajax.reload();
                            tabelDokter.ajax.reload();
                            tabelAdmin.ajax.reload();
                            swalMixinSuccess.fire(
                                'Saved!',
                                'User berhasil diupdate.',
                                'success'
                            );
                        },
                        error: function(xhr) {
                            console.log(xhr.responseJSON.message);
                            Swal.fire(
                                'Error!',
                                'Error mengupdate user: ' + xhr.responseJSON.message,
                                'error'
                            );
                        }
                    });
                }
            });
        });

        // Pengambilan data old modal edit
        function modalEdit(id, nip, nama, status, role, divisi_id, tanggal_lahir, tinggi_badan, berat_badan) {
            $('#id').val(id);
            $('#updateNip').val(nip);
            $('#updateNama').val(nama);
            $('#updateStatus').val(status);
            $('#updateRole').val(role);
            $('#updateDivisiId').val(divisi_id);
            $('#updateTanggalLahir').val(tanggal_lahir);
            $('#updateTinggiBadan').val(tinggi_badan);
            $('#updateBeratBadan').val(berat_badan);
            $('#modalEdit').modal('show');
        }

        // Penanganan untuk fungsi reset password
        document.getElementById('resetPasswordBtn').addEventListener('click', function() {
            const swalMixinSuccess = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
            });
            let userId = document.getElementById('id').value;
            let tanggalLahir = document.getElementById('updateTanggalLahir').value;
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Password akan direset berdasarkan tanggal lahir!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, reset!',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch("{{ route('admin-datauser-resetpassword') }}", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": "{{ csrf_token() }}"
                            },
                            body: JSON.stringify({
                                id: userId,
                                tanggal_lahir: tanggalLahir
                            })
                        }).then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                $('#modalEdit').modal('hide');
                                swalMixinSuccess.fire(
                                    'Saved!',
                                    'Password user berhasil direset.',
                                    'success'
                                );
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal!',
                                    text: 'Gagal mereset password: ' + data.message,
                                });
                            }
                        }).catch(error => {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: 'Terjadi kesalahan: ' + error.message,
                            });
                        });
                }
            });
        });

        // Penanganan untuk fungsi reset password khusus admin
        function resetPasswordModal(id, tanggalLahir) {
            const swalMixinSuccess = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
            });
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Password akan direset berdasarkan tanggal lahir!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, reset!',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch("{{ route('admin-datauser-resetpassword') }}", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": "{{ csrf_token() }}"
                            },
                            body: JSON.stringify({
                                id: id,
                                tanggal_lahir: tanggalLahir
                            })
                        }).then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                swalMixinSuccess.fire(
                                    'Saved!',
                                    'Password user berhasil direset.',
                                    'success'
                                );
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal!',
                                    text: 'Gagal mereset password: ' + data.message,
                                });
                            }
                        }).catch(error => {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: 'Terjadi kesalahan: ' + error.message,
                            });
                        });
                }
            });
        }
    </script>
@endpush

@push('style')
    <style>
        #TabelUserAdmin td,
        #TabelUserAdmin th,
        #TabelUserDokter td,
        #TabelUserDokter th,
        #TabelUserPasien td,
        #TabelUserPasien th {
            text-align: center;
            white-space: nowrap;
        }

        #TabelUserAdmin thead th:first-child,
        #TabelUserDokter thead th:first-child,
        #TabelUserPasien thead th:first-child {
            cursor: default;
        }

        #TabelUserAdmin thead th:first-child::after,
        #TabelUserAdmin thead th:first-child::before,
        #TabelUserDokter thead th:first-child::after,
        #TabelUserDokter thead th:first-child::before,
        #TabelUserPasien thead th:first-child::after,
        #TabelUserPasien thead th:first-child::before {
            display: none !important;
            pointer-events: none;
        }

        @media only screen and (max-width: 768px) {

            #TabelUserAdmin td,
            #TabelUserDokter td,
            #TabelUserPasien td {
                white-space: normal;
                word-wrap: break-word;
            }

            #navRole {
                justify-content: center;
            }
        }
    </style>
@endpush
