@extends('admin.template.main')

@section('title', 'Data Pengajuan - E Klinik PAL')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                        Data Pengajuan</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">Home</li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Pengajuan</li>
                    </ul>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <div class="m-0">
                        <a href="#" class="btn btn-sm btn-flex btn-light-secondary fw-bold" data-kt-menu-trigger="click"
                            data-kt-menu-placement="bottom-end">
                            <i class="ki-duotone ki-filter fs-6 text-muted me-1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>Filter</a>
                        <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true"
                            id="kt_menu_658cdae763501">
                            <div class="px-7 py-5">
                                <div class="fs-5 text-gray-900 fw-bold">Range Filter</div>
                            </div>
                            <div class="separator border-gray-200"></div>
                            <div class="px-7 py-5">
                                <div class="mb-10">
                                    <label class="form-label fw-semibold">Nama Pasien:</label>
                                    <select class="form-select form-select-solid" data-placeholder=""
                                        data-hide-search="true" id="filterNama" name="nama">
                                        <option value="" selected disabled>Pilih nama pasien</option>
                                        @foreach ($pasiens as $pasien)
                                            <option value="{{ $pasien->id }}">{{ $pasien->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-10">
                                    <label class="form-label fw-semibold">Data tanggal:</label>
                                    <select class="form-select form-select-solid" data-placeholder=""
                                        data-hide-search="true" id="filterDataTanggal">
                                        <option value="" selected disabled>Pilih data tanggal</option>
                                        <option value="tanggal_pengajuan">Tanggal Pengajuan</option>
                                        <option value="tanggal_pemeriksaan">Tanggal Pemeriksaan</option>
                                    </select>
                                </div>
                                <div class="mb-10">
                                    <label class="form-label fw-semibold">Tanggal setelah:</label>
                                    <input type="date" id="filterTanggalSetelah" name="date-before"
                                        class="form-control form-control-sm me-2">
                                </div>
                                <div class="mb-10">
                                    <label class="form-label fw-semibold">Tanggal sebelum:</label>
                                    <input type="date" id="filterTanggalSebelum" name="date-after"
                                        class="form-control form-control-sm me-2">
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="reset" class="btn btn-sm btn-danger btn-active-light-primary me-2"
                                        data-kt-menu-dismiss="true">Reset</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="m-0">
                        <a class="btn btn-sm btn-flex btn-success fw-bold" data-kt-menu-trigger="click"
                            data-kt-menu-placement="bottom-end" id="bt-download">
                            <i class="ki-duotone ki-folder-down fs-6 me-1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>Download PDF</a>
                    </div>
                    <div class="m-0">
                        <a class="btn btn-sm btn-flex btn-danger fw-bold" data-kt-menu-trigger="click"
                            data-kt-menu-placement="bottom-end" id="bt-tolak-semua">
                            <i class="ki-duotone ki-delete-files fs-6 me-1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>Tolak Semua Pengajuan</a>
                    </div>
                </div>
            </div>
        </div>
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="TabelPengajuan"
                                        class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4"
                                        style="width: 100%">
                                        <thead class="thead-dark">
                                            <tr class="fw-bold text-muted">
                                                <th>No</th>
                                                <th>Nama Pasien</th>
                                                {{-- <th>Nama Dokter</th> --}}
                                                <th>Keluhan</th>
                                                <th>Status</th>
                                                <th>Tanggal Pengajuan</th>
                                                <th>Tanggal Pemeriksaan</th>
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
@endsection

@section('modals')
    <div id="modalDetail" class="modal fade" tabindex="-1" aria-hidden="true" aria-labelledby="modalDetailLabel">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Detail Pengajuan</h2>
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
                                    <span>NIP Pasien</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="detailNipPasien" readonly>
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>Nama Pasien</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="detailNamaPasien" readonly>
                            </div>
                        </div>
                        <div class="row g-9 mb-8">
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>NIP Dokter</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="detailNipDokter" readonly>
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>Nama Dokter</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="detailNamaDokter" readonly>
                            </div>
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span>Keluhan</span>
                            </label>
                            <input type="text" class="form-control form-control-solid" placeholder=""
                                id="detailKeluhan" readonly>
                        </div>
                        <div class="row g-9 mb-8">
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>Poli</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="detailNamaPoli" readonly>
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>Status</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="detailStatus" readonly>
                            </div>
                        </div>
                        <div class="row g-9 mb-8">
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>Tanggal Pengajuan</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="detailTanggalPengajuan" readonly>
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>Tanggal Pemeriksaan</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="detailTanggalPemeriksaan" readonly>
                            </div>
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span>Catatan</span>
                            </label>
                            <input type="text" class="form-control form-control-solid" placeholder=""
                                id="detailCatatan" readonly>
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

    <div id="modalDetailQR" class="modal fade" tabindex="-1" aria-hidden="true" aria-labelledby="modalDetailQRLabel">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Detail QR Code</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <form class="form" action="#">
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span>QR Code</span>
                            </label>
                            <img src="" alt="QR Code" class="img-fluid" id="detailQR"
                                style="max-width: 200px;">
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span>Status QR Code</span>
                            </label>
                            <input type="text" class="form-control form-control-solid" placeholder=""
                                id="detailStatusQR" readonly>
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

    {{-- <div id="modalEdit" class="modal fade" tabindex="-1" aria-hidden="true" aria-labelledby="modalEditLabel">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Edit Pengajuan</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <form class="form" action="{{ route('admin-datapengajuan-edit') }}" method="PUT">
                        @csrf
                        <input type="hidden" id="id" name="id">
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="required fs-6 fw-semibold mb-2">Pasien</label>
                            <select class="form-select form-select-solid" data-placeholder="" data-hide-search="true"
                                id="updateIdPasien" name="pasien">
                                <option value="" selected disabled>Pilih pasien</option>
                                @foreach ($pasiens as $pasien)
                                    <option value="{{ $pasien->id }}">{{ $pasien->nama }} - {{ $pasien->nip }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="required fs-6 fw-semibold mb-2">Dokter</label>
                            <select class="form-select form-select-solid" data-placeholder="" data-hide-search="true"
                                id="updateIdDokter" name="dokter">
                                <option value="" selected disabled>Pilih dokter</option>
                                @foreach ($dokters as $dokter)
                                    <option value="{{ $dokter->id }}">{{ $dokter->nama }} - {{ $dokter->nip }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row g-9 mb-8">
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span class="required">Keluhan</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="updateKeluhan" name="keluhan">
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="required fs-6 fw-semibold mb-2">Status</label>
                                <select class="form-select form-select-solid" data-placeholder="" data-hide-search="true"
                                    id="updateStatus" name="status">
                                    <option value="" selected disabled>Pilih status pengajuan</option>
                                    <option value="Pending">Pending</option>
                                    <option value="Ditolak">Ditolak</option>
                                    <option value="Diterima">Diterima</option>
                                    <option value="Diproses">Diproses</option>
                                    <option value="Selesai">Selesai</option>
                                </select>
                            </div>
                        </div>
                        <div class="row g-9 mb-8">
                            <div class="col-md-6 fv-row">
                                <label class="fs-6 fw-semibold mb-2 required">Tanggal Pengajuan</label>
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
                                        id="updateTanggalPengajuan" name="tanggal_pengajuan" />
                                </div>
                            </div>
                            <div class="col-md-6 fv-row">
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
                                        id="updateTanggalPemeriksaan" name="tanggal_pemeriksaan" />
                                </div>
                            </div>
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span>Catatan</span>
                            </label>
                            <input type="text" class="form-control form-control-solid" placeholder=""
                                id="updateCatatan" name="catatan">
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
    </div> --}}
@endsection

@push('script')
    <script>
        // Inisialisasi datatable
        $(document).ready(function() {
            tabel = $('#TabelPengajuan').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('admin-datapengajuan') }}",
                    data: function(d) {
                        d.id_pasien = $('#filterNama').val();
                        d.data_tanggal = $('#filterDataTanggal').val();
                        d.tanggal_setelah = $('#filterTanggalSetelah').val();
                        d.tanggal_sebelum = $('#filterTanggalSebelum').val();
                    }
                },
                order: [
                    [7, 'asc'],
                    [4, 'desc'],
                ],
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        searchable: false,
                        orderable: false,
                        render: function(data, type, row, meta) {
                            return `<span class="text-gray-900 fw-bold fs-6">${data}</span>`;
                        }
                    },
                    {
                        data: 'nama_pasien',
                        name: 'nama_pasien',
                        orderable: true,
                        render: function(data, type, row, meta) {
                            return `<span class="text-gray-900 fw-bold fs-6">${data}</span>`;
                        }
                    },
                    // {
                    //     data: 'nama_pasien',
                    //     name: 'nama_pasien',
                    //     orderable: true,
                    //     render: function(data, type, row, meta) {
                    //         if (data === null || data === undefined) {
                    //             return '<span class="text-gray-900 fw-bold fs-6">Belum ada dokter</span>';
                    //         } else {
                    //             return `<span class="text-gray-900 fw-bold fs-6">${data}</span>`;
                    //         }
                    //     }
                    // },
                    {
                        data: 'keluhan',
                        name: 'keluhan',
                        orderable: true,
                        render: function(data, type, row, meta) {
                            return `<span class="text-gray-900 fw-bold fs-6">${data}</span>`;
                        }
                    },
                    {
                        data: 'status',
                        name: 'status',
                        orderable: true,
                        render: function(data, type, row) {
                            if (data === 'Ditolak') {
                                return `<span class="badge badge-light-danger">${data}</span>`;
                            } else if (data === 'Diterima') {
                                return `<span class="badge badge-light-secondary">${data}</span>`;
                            } else if (data === 'Diproses') {
                                return `<span class="badge badge-light-primary">${data}</span>`;
                            } else {
                                return `<span class="badge badge-light-success">${data}</span>`;
                            }
                        }
                    },
                    {
                        data: 'tanggal_pengajuan',
                        name: 'tanggal_pengajuan',
                        orderable: true,
                        render: function(data, type, row, meta) {
                            var tanggal = new Date(data);
                            var day = tanggal.getDate().toString().padStart(2, '0');
                            var month = (tanggal.getMonth() + 1).toString().padStart(2, '0');
                            var year = tanggal.getFullYear();
                            return `<span class="text-gray-900 fw-bold fs-6">${day}-${month}-${year}</span>`;
                        }
                    },
                    {
                        data: 'tanggal_pemeriksaan',
                        name: 'tanggal_pemeriksaan',
                        orderable: true,
                        render: function(data, type, row, meta) {
                            var tanggal = new Date(data);
                            var day = tanggal.getDate().toString().padStart(2, '0');
                            var month = (tanggal.getMonth() + 1).toString().padStart(2, '0');
                            var year = tanggal.getFullYear();
                            return `<span class="text-gray-900 fw-bold fs-6">${day}-${month}-${year}</span>`;
                        }
                    },
                    {
                        data: null,
                        name: 'aksi',
                        orderable: false,
                        searchable: false,
                        render: function(data, type, row, meta) {
                            if (row.status === 'Diproses' || row.status === 'Selesai' && !row
                                .surat_izin) {
                                return `<div class="d-flex justify-content-center flex-shrink-0">
                                <a onclick="modalDetail('${row.nama_pasien}', '${row.nip_pasien}', '${row.nama_dokter}', '${row.nip_dokter}', '${row.keluhan}', '${row.status}', '${row.tanggal_pengajuan}', '${row.tanggal_pemeriksaan}', '${row.catatan}', '${row.nama_poli}')" class="btn btn-icon btn-light-primary btn-xl me-2" data-bs-toggle="modal" data-bs-target="#modalDetail">
                                    <i class="ki-duotone ki-scroll fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </a>
                                <a onclick="modalDetailQR('${row.id}', '${row.status_qrcode}')" class="btn btn-icon btn-light-info btn-xl me-2" data-bs-toggle="modal" data-bs-target="#modalDetailQR">
                                    <i class="ki-duotone ki-scan-barcode fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                        <span class="path5"></span>
                                        <span class="path6"></span>
                                        <span class="path7"></span>
                                        <span class="path8"></span>
                                    </i>
                                </a>
                            </div>`
                            } else if (row.status === 'Diproses' || row.status === 'Selesai' && row
                                .surat_izin) {
                                return `<div class="d-flex justify-content-center flex-shrink-0">
                                <a onclick="modalDetail('${row.nama_pasien}', '${row.nip_pasien}', '${row.nama_dokter}', '${row.nip_dokter}', '${row.keluhan}', '${row.status}', '${row.tanggal_pengajuan}', '${row.tanggal_pemeriksaan}', '${row.catatan}', '${row.nama_poli}')" class="btn btn-icon btn-light-primary btn-xl me-2" data-bs-toggle="modal" data-bs-target="#modalDetail">
                                    <i class="ki-duotone ki-scroll fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </a>
                                <a onclick="modalDetailQR('${row.id}', '${row.status_qrcode}')" class="btn btn-icon btn-light-info btn-xl me-2" data-bs-toggle="modal" data-bs-target="#modalDetailQR">
                                    <i class="ki-duotone ki-scan-barcode fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                        <span class="path5"></span>
                                        <span class="path6"></span>
                                        <span class="path7"></span>
                                        <span class="path8"></span>
                                    </i>
                                </a>
                                <a onclick="downloadFile('${row.surat_izin}')" class="btn btn-icon btn-light-success btn-xl me-2">
                                    <i class="ki-duotone ki-file-down fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                    </i>
                                </a>
                            </div>`
                            } else if (row.status === 'Diterima') {
                                return `<div class="d-flex justify-content-center flex-shrink-0">
                                <a onclick="modalDetail('${row.nama_pasien}', '${row.nip_pasien}', '${row.nama_dokter}', '${row.nip_dokter}', '${row.keluhan}', '${row.status}', '${row.tanggal_pengajuan}', '${row.tanggal_pemeriksaan}', '${row.catatan}', '${row.nama_poli}')" class="btn btn-icon btn-light-primary btn-xl me-2" data-bs-toggle="modal" data-bs-target="#modalDetail">
                                    <i class="ki-duotone ki-scroll fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </a>
                                <a onclick="modalDetailQR('${row.id}', '${row.status_qrcode}')" class="btn btn-icon btn-light-info btn-xl me-2" data-bs-toggle="modal" data-bs-target="#modalDetailQR">
                                    <i class="ki-duotone ki-scan-barcode fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
                                        <span class="path4"></span>
                                        <span class="path5"></span>
                                        <span class="path6"></span>
                                        <span class="path7"></span>
                                        <span class="path8"></span>
                                    </i>
                                </a>
                                <a onclick="updateStatus(${row.id}, 'Diproses')" class="btn btn-icon btn-light-success btn-xl me-2">
                                    <i class="ki-duotone ki-check fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </a>
                                <a onclick="updateStatus(${row.id}, 'Ditolak')" class="btn btn-icon btn-light-danger btn-xl">
                                    <i class="ki-duotone ki-cross fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </a>
                            </div>`
                            } else {
                                return `<div class="d-flex justify-content-center flex-shrink-0">
                                <a onclick="modalDetail('${row.nama_pasien}', '${row.nip_pasien}', '${row.nama_dokter}', '${row.nip_dokter}', '${row.keluhan}', '${row.status}', '${row.tanggal_pengajuan}', '${row.tanggal_pemeriksaan}', '${row.catatan}', '${row.nama_poli}')" class="btn btn-icon btn-light-primary btn-xl me-2" data-bs-toggle="modal" data-bs-target="#modalDetail">
                                    <i class="ki-duotone ki-scroll fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </a>
                                </div>`
                            };
                        }
                    },
                    {
                        data: 'status_order',
                        name: 'status_order',
                        visible: false,
                        searchable: false,
                        orderable: true
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

            // Event listener untuk filter nama pasien
            $('#filterNama').on('change', function() {
                tabel.ajax.reload();
            });

            // Event listener untuk filter tanggal
            $('#filterDataTanggal').on('change', function() {
                tabel.ajax.reload();
            });

            // Event listener untuk filter tanggal setelah
            $('#filterTanggalSetelah').on('change', function() {
                tabel.ajax.reload();
            });

            // Event listener untuk filter tanggal sebelum
            $('#filterTanggalSebelum').on('change', function() {
                tabel.ajax.reload();
            });

            // Event listener untuk reset filter
            document.querySelector('button[type="reset"]').addEventListener('click', function() {
                document.getElementById('filterNama').value = '';
                document.getElementById('filterDataTanggal').value = '';
                document.getElementById('filterTanggalSetelah').value = '';
                document.getElementById('filterTanggalSebelum').value = '';
                $('#TabelPengajuan').DataTable().ajax.reload();
            });

            // Fix tampilan tabel berubah setelah dilakukan responsif
            $(window).resize(function() {
                tabel.columns.adjust().responsive.recalc();
            });
        });

        // Pengambilan data nama file
        function downloadFile(suratIzin) {
            if (suratIzin) {
                var downloadUrl = `/storage/pdf/${suratIzin}`;
                window.location.href = downloadUrl;
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Tidak Ditemukan',
                    text: 'Surat izin tidak ditemukan.',
                    confirmButtonText: 'OK'
                });
            }
        }

        // Handle download pdf
        document.addEventListener("DOMContentLoaded", function() {
            const {
                jsPDF
            } = window.jspdf;
            document.getElementById('bt-download').addEventListener('click', function() {
                var filterNama = document.getElementById('filterNama').value;
                var filterDataTanggal = document.getElementById('filterDataTanggal').value;
                var filterTanggalSetelah = document.getElementById('filterTanggalSetelah').value;
                var filterTanggalSebelum = document.getElementById('filterTanggalSebelum').value;
                $.ajax({
                    url: "{{ route('admin-datapengajuan') }}",
                    type: "GET",
                    data: {
                        id_pasien: filterNama,
                        data_tanggal: filterDataTanggal,
                        tanggal_setelah: filterTanggalSetelah,
                        tanggal_sebelum: filterTanggalSebelum
                    },
                    success: function(response) {
                        $.ajax({
                            url: "/logo-base64",
                            type: "GET",
                            success: function(logoResponse) {
                                var sortedData = response.data.sort((a, b) => a
                                    .nama_pasien.localeCompare(b.nama_pasien));
                                var doc = new jsPDF();
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
                                doc.text('Data Pengajuan Pt. PAL Indonesia', 14,
                                    55);
                                var columns = ["No", "Nama Pasien", "Nama Dokter",
                                    "Poli", "Keluhan", "Status",
                                    "Tanggal Pengajuan", "Tanggal Pemeriksaan"
                                ];
                                var data = sortedData.map((row, index) => [
                                    index + 1,
                                    row.nama_pasien,
                                    row.nama_dokter ? row.nama_dokter :
                                    'Belum ada dokter',
                                    row.nama_poli,
                                    row.keluhan.replace(/&amp;/g, '&'),
                                    row.status,
                                    formatDate(row.tanggal_pengajuan),
                                    formatDate(row.tanggal_pemeriksaan)
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
                                doc.save('Data_Pengajuan_Report.pdf');
                            }
                        });
                    }
                });
            });

            function formatDate(dateStr) {
                var tanggal = new Date(dateStr);
                var day = tanggal.getDate().toString().padStart(2, '0');
                var month = (tanggal.getMonth() + 1).toString().padStart(2, '0');
                var year = tanggal.getFullYear();
                return `${day}-${month}-${year}`;
            }
        });


        // Clear form modal add
        $('#modalAdd').on('hidden.bs.modal', function() {
            $(this).find('form')[0].reset();
        });

        // Pengambilan data modal detail
        function modalDetail(nama_pasien, nip_pasien, nama_dokter, nip_dokter, keluhan, status, tanggal_pengajuan,
            tanggal_pemeriksaan, catatan, nama_poli) {
            $('#detailNamaPasien').val(nama_pasien);
            $('#detailNipPasien').val(nip_pasien);
            $('#detailNamaDokter').val(nama_dokter);
            $('#detailNipDokter').val(nip_dokter);
            $('#detailKeluhan').val(keluhan);
            $('#detailStatus').val(status);
            let datePengajuan = new Date(tanggal_pengajuan);
            let dayPengajuan = String(datePengajuan.getDate()).padStart(2, '0');
            let monthPengajuan = String(datePengajuan.getMonth() + 1).padStart(2, '0');
            let yearPengajuan = String(datePengajuan.getFullYear());
            let formattedBirthdatePengajuan = `${dayPengajuan}/${monthPengajuan}/${yearPengajuan}`;
            $('#detailTanggalPengajuan').val(formattedBirthdatePengajuan);
            let datePemeriksaan = new Date(tanggal_pemeriksaan);
            let dayPemeriksaan = String(datePemeriksaan.getDate()).padStart(2, '0');
            let monthPemeriksaan = String(datePemeriksaan.getMonth() + 1).padStart(2, '0');
            let yearPemeriksaan = String(datePemeriksaan.getFullYear());
            let formattedBirthdatePemeriksaan = `${dayPemeriksaan}/${monthPemeriksaan}/${yearPemeriksaan}`;
            $('#detailTanggalPemeriksaan').val(formattedBirthdatePemeriksaan);
            $('#detailCatatan').val(catatan);
            $('#detailNamaPoli').val(nama_poli);
            $('#modalDetail').modal('show');
        }

        // Pengambilan data modal detail QR
        function modalDetailQR(id, status_qrcode) {
            var qrcodeUrl = '{{ asset('storage/qr_codes/') }}' + '/' + id + '.png';
            // Mengatur URL gambar QR Code
            $('#detailQR').attr('src', qrcodeUrl);
            $('#detailStatusQR').val(status_qrcode);
            $('#modalDetailQR').modal('show');
        }

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
                    fetch(`/admin/data-pengajuan-delete/${id}`, {
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
                            tabel.ajax.reload();
                            swalMixinSuccess.fire(
                                'Deleted!',
                                'Pengajuan berhasil dihapus.',
                                'success'
                            );
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            Swal.fire(
                                'Error!',
                                'Error menghapus pengajuan: ' + error.message,
                                'error'
                            );
                        });
                }
            });
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
                            tabel.ajax.reload();
                            swalMixinSuccess.fire(
                                'Saved!',
                                'Pengajuan berhasil diupdate.',
                                'success'
                            );
                        },
                        error: function(xhr) {
                            console.log(xhr.responseJSON.message);
                            Swal.fire(
                                'Error!',
                                'Error mengupdate pengajuan: ' + xhr.responseJSON.message,
                                'error'
                            );
                        }
                    });
                }
            });
        });

        // Pengambilan data old modal edit
        function modalEdit(id, id_pasien, id_dokter, keluhan, status, tanggal_pengajuan, tanggal_pemeriksaan, catatan) {
            $('#id').val(id);
            $('#updateIdPasien').val(id_pasien);
            $('#updateIdDokter').val(id_dokter);
            $('#updateKeluhan').val(keluhan);
            $('#updateStatus').val(status);
            $('#updateTanggalPengajuan').val(tanggal_pengajuan);
            $('#updateTanggalPemeriksaan').val(tanggal_pemeriksaan);
            $('#updateCatatan').val(catatan);
            $('#modalEdit').modal('show');
        }

        // Handler update status
        function updateStatus(id, status) {
            const swalMixinSuccess = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
            });

            const swalConfig = {
                title: 'Apakah Anda yakin?',
                text: `Anda akan mengubah status menjadi ${status}.`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, ubah!',
                cancelButtonText: 'Tidak'
            };

            if (status === 'Ditolak') {
                swalConfig.input = 'textarea';
                swalConfig.inputPlaceholder = 'Masukkan alasan penolakan...';
                swalConfig.inputAttributes = {
                    'aria-label': 'Masukkan alasan penolakan'
                };
                swalConfig.showCancelButton = true;
            }

            Swal.fire(swalConfig).then((result) => {
                if (result.isConfirmed) {
                    const catatan = status === 'Ditolak' ? result.value : '';
                    fetch(`/admin/data-pengajuan-update-status/${id}`, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                                    'content'),
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                status: status,
                                catatan: catatan
                            })
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
                            console.log('Updated:', data);
                            tabel.ajax.reload();
                            swalMixinSuccess.fire(
                                'Berhasil!',
                                `Pengajuan berhasil ${status === 'Diproses' ? 'diproses' : 'ditolak'}.`,
                                'success'
                            );
                        })
                        .catch(error => {
                            console.error('Error:', error);
                            Swal.fire(
                                'Error!',
                                'Error memperbarui status pengajuan: ' + error.message,
                                'error'
                            );
                        });
                }
            });
        }

        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById('bt-tolak-semua').addEventListener('click', function() {
                const swalMixinSuccess = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 4000,
                    timerProgressBar: true,
                });

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Semua pengajuan pada hari ini akan ditolak!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, tolak semua!',
                    cancelButtonText: 'Tidak'
                }).then((result) => {
                    if (result.isConfirmed) {
                        fetch('/admin/tolak-pengajuan-hari-ini', {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector(
                                        'meta[name="csrf-token"]').getAttribute('content'),
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
                                tabel.ajax.reload();
                                swalMixinSuccess.fire(
                                    'Berhasil!',
                                    'Semua pengajuan hari ini berhasil ditolak.',
                                    'success'
                                );
                            })
                            .catch(error => {
                                console.error('Error:', error);
                                Swal.fire(
                                    'Error!',
                                    'Error menolak semua pengajuan: ' + error.message,
                                    'error'
                                );
                            });
                    }
                });
            });
        });
    </script>
@endpush

@push('style')
    <style>
        #bt-download,
        #bt-tolak-semua,
        #TabelPengajuan td,
        #TabelPengajuan th {
            text-align: center;
            white-space: nowrap;
        }

        #TabelPengajuan thead th:first-child {
            cursor: default;
        }

        #TabelPengajuan thead th:first-child::after,
        #TabelPengajuan thead th:first-child::before {
            display: none !important;
            pointer-events: none;
        }

        @media only screen and (max-width: 768px) {
            #TabelPengajuan td {
                white-space: normal;
                word-wrap: break-word;
            }

            #bt-tolak-semua,
            #bt-download {
                white-space: normal;
                word-wrap: break-word;
            }
        }
    </style>
@endpush
