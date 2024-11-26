@extends('dokter.template.main')

@section('title', 'Data Pemeriksaan - E Klinik PAL')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-8 flex-column justify-content-center my-0">
                        Data Pemeriksaan</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted fs-8">Dokter - Pemeriksaan</li>
                    </ul>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <div class="m-0">
                        <a class="btn btn-sm btn-flex btn-light-secondary fw-bold" data-kt-menu-trigger="click"
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
                                    <table id="TabelPemeriksaan"
                                        class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4"
                                        style="width: 100%">
                                        <thead class="thead-dark">
                                            <tr class="fw-bold text-muted">
                                                <th>No</th>
                                                <th>Nama Pasien</th>
                                                <th>Poli</th>
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

    <div id="modalAddPemeriksaan" class="modal fade" tabindex="-1" aria-hidden="true"
        aria-labelledby="modalAddPemeriksaanLabel">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Tambah Catatan Pemeriksaan</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <form class="form" action="{{ route('dokter-datapemeriksaan-tambah') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="detId" name="id_pengajuan">
                        <input type="hidden" id="detIdDokter" value="{{ $users->id }}" name="id_dokter">
                        <input type="hidden" id="detIdPasien" name="id_pasien">
                        <input type="hidden" id="detDivisiPasien" name="divisi_pasien">
                        <input type="hidden" id="detTanggalLahir" name="tanggal_lahir">
                        <input type="hidden" id="detJabatan" name="jabatan">
                        <div class="row g-9 mb-8">
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>NIP Pasien</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="detNipPasien" readonly>
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>Nama Pasien</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="detNamaPasien" readonly>
                            </div>
                        </div>
                        <div class="row g-9 mb-8">
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>NIP Dokter</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="detNipDokter" value="{{ $users->nip }}" readonly>
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>Nama Dokter</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="detNamaDokter" value="{{ $users->nama }}" readonly>
                            </div>
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span>Keluhan</span>
                            </label>
                            <input type="text" class="form-control form-control-solid" placeholder="" id="detKeluhan"
                                readonly>
                        </div>
                        <div class="row g-9 mb-8">
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>Tanggal Pengajuan</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="detTanggalPengajuan" readonly>
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>Tanggal Pemeriksaan</span>
                                </label>
                                <input type="text" class="form-control form-control-solid" placeholder=""
                                    id="detTanggalPemeriksaan" readonly>
                            </div>
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span>Poli</span>
                            </label>
                            <input type="text" class="form-control form-control-solid" placeholder=""
                                id="detNamaPoli" readonly>
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span class="required">Istirahat Selama (hari)</span>
                            </label>
                            <input type="text" class="form-control form-control-solid"
                                placeholder="Perlu istirahat selama" id="addIstirahatHari" name="istirahat_hari">
                        </div>
                        <div class="row g-9 mb-8">
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>Cost Center</span>
                                </label>
                                <input type="text" class="form-control form-control-solid"
                                    placeholder="Masukkan cost centre" id="addCostCentre" name="cost_centre">
                            </div>
                            <div class="col-md-6 fv-row">
                                <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                    <span>Pangkat/Golongan</span>
                                </label>
                                <input type="text" class="form-control form-control-solid"
                                    placeholder="Masukkan pangkat/golongan" id="addPangkatGolongan"
                                    name="pangkat_golongan" readonly>
                            </div>
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span>Catatan</span>
                            </label>
                            <input type="text" class="form-control form-control-solid"
                                placeholder="Tambahkan catatan pemeriksaan" id="addCatatan" name="catatan">
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="fs-6 fw-semibold mb-2">Surat Perizinan</label>
                            <select class="form-select form-select-solid" data-placeholder="" data-hide-search="true"
                                id="actionSelect" name="surat_perizinan">
                                <option value="" selected disabled>Buat surat perizinan</option>
                                <option value="buat">Buat</option>
                                <option value="tidak">Tidak</option>
                            </select>
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="fs-6 fw-semibold mb-2">Upload Surat Perizinan (PDF)</label>
                            <input type="file" class="form-control form-control-solid" id="suratPerizinan"
                                name="surat_perizinan_file" accept=".pdf">
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
        // Handler select disable ketika tidak dimasukkan hari
        document.addEventListener('DOMContentLoaded', function() {
            const istirahatHariInput = document.getElementById('addIstirahatHari');
            const suratPerizinan = document.getElementById('suratPerizinan');
            const actionSelect = document.getElementById('actionSelect');

            function toggleSelect() {
                if (istirahatHariInput.value.trim() === '') {
                    actionSelect.disabled = true;
                    suratPerizinan.disabled = true;
                } else {
                    actionSelect.disabled = false;
                    suratPerizinan.disabled = false;
                }
            }
            toggleSelect();
            istirahatHariInput.addEventListener('input', toggleSelect);
        });

        // Handler file disable ketika value select tidak buat 
        document.getElementById('actionSelect').addEventListener('change', function() {
            var suratPerizinan = document.getElementById('suratPerizinan');
            if (this.value === 'tidak') {
                suratPerizinan.disabled = true;
            } else {
                suratPerizinan.disabled = false;
            }
        });

        // Inisialisasi datatable
        $(document).ready(function() {
            tabel = $('#TabelPemeriksaan').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('dokter-datapemeriksaan') }}",
                    data: function(d) {
                        d.id_pasien = $('#filterNama').val();
                        d.data_tanggal = $('#filterDataTanggal').val();
                        d.tanggal_setelah = $('#filterTanggalSetelah').val();
                        d.tanggal_sebelum = $('#filterTanggalSebelum').val();
                    }
                },
                order: [
                    [6, 'desc'],
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
                    {
                        data: 'nama_poli',
                        name: 'nama_poli',
                        orderable: true,
                        render: function(data, type, row, meta) {
                            return `<span class="text-gray-900 fw-bold fs-6">${data}</span>`;
                        }
                    },
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
                            if (data === 'Pending') {
                                return `<span class="badge badge-light-secondary">${data}</span>`;
                            } else if (data === 'Ditolak') {
                                return `<span class="badge badge-light-danger">${data}</span>`;
                            } else if (data === 'Diterima') {
                                return `<span class="badge badge-light-info">${data}</span>`;
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
                            return `<div class="d-flex justify-content-center flex-shrink-0">
                                <a onclick="modalDetail('${row.nama_pasien}', '${row.nip_pasien}', '${row.keluhan}', '${row.status}', '${row.tanggal_pengajuan}', '${row.tanggal_pemeriksaan}', '${row.catatan}', '${row.nama_poli}')" class="btn btn-icon btn-light-primary btn-xl me-2" data-bs-toggle="modal" data-bs-target="#modalDetail">
                                    <i class="ki-duotone ki-scroll fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </a>
                                <a onclick="modalAddPemeriksaan('${row.id}', '${row.tanggal_lahir}', '${row.id_pasien}', '${row.nama_pasien}', '${row.divisi_pasien}', '${row.nip_pasien}', '${row.keluhan}', '${row.tanggal_pengajuan}', '${row.tanggal_pemeriksaan}', '${row.nama_poli}', '${row.jabatan}')" class="btn btn-icon btn-light-success btn-xl" data-bs-toggle="modal" data-bs-target="#modalAddPemeriksaan">
                                    <i class="ki-duotone ki-add-files fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                        <span class="path3"></span>
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
                $('#TabelPemeriksaan').DataTable().ajax.reload();
            });

            // Fix tampilan tabel berubah setelah dilakukan responsif
            $(window).resize(function() {
                tabel.columns.adjust().responsive.recalc();
            });
        });

        // Clear form modal add catatan
        $('#modalAddPemeriksaan').on('hidden.bs.modal', function() {
            $(this).find('form')[0].reset();
        });

        // Pengambilan data modal detail
        function modalDetail(nama_pasien, nip_pasien, keluhan, status, tanggal_pengajuan,
            tanggal_pemeriksaan, catatan, nama_poli) {
            $('#detailNamaPasien').val(nama_pasien);
            $('#detailNipPasien').val(nip_pasien);
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

        function modalAddPemeriksaan(id, tanggal_lahir, id_pasien, nama_pasien, divisi_pasien, nip_pasien,
            keluhan, tanggal_pengajuan, tanggal_pemeriksaan, nama_poli, jabatan) {
            $('#detId').val(id);
            let datelahir = new Date(tanggal_lahir);
            let daylahir = String(datelahir.getDate()).padStart(2, '0');
            let monthlahir = String(datelahir.getMonth() + 1).padStart(2, '0');
            let yearlahir = String(datelahir.getFullYear());
            let formattedBirthdatelahir = `${daylahir}/${monthlahir}/${yearlahir}`;
            $('#detTanggalLahir').val(formattedBirthdatelahir);
            $('#detIdPasien').val(id_pasien);
            $('#detNamaPasien').val(nama_pasien);
            $('#detNipPasien').val(nip_pasien);
            $('#detDivisiPasien').val(divisi_pasien);
            $('#detKeluhan').val(keluhan);
            let datePengajuan = new Date(tanggal_pengajuan);
            let dayPengajuan = String(datePengajuan.getDate()).padStart(2, '0');
            let monthPengajuan = String(datePengajuan.getMonth() + 1).padStart(2, '0');
            let yearPengajuan = String(datePengajuan.getFullYear());
            let formattedBirthdatePengajuan = `${dayPengajuan}/${monthPengajuan}/${yearPengajuan}`;
            $('#detTanggalPengajuan').val(formattedBirthdatePengajuan);
            let datePemeriksaan = new Date(tanggal_pemeriksaan);
            let dayPemeriksaan = String(datePemeriksaan.getDate()).padStart(2, '0');
            let monthPemeriksaan = String(datePemeriksaan.getMonth() + 1).padStart(2, '0');
            let yearPemeriksaan = String(datePemeriksaan.getFullYear());
            let formattedBirthdatePemeriksaan = `${dayPemeriksaan}/${monthPemeriksaan}/${yearPemeriksaan}`;
            $('#detTanggalPemeriksaan').val(formattedBirthdatePemeriksaan);
            $('#detNamaPoli').val(nama_poli);
            $('#addPangkatGolongan').val(jabatan);
            $('#modalAddPemeriksaan').modal('show');
        }

        // Menangani penanganan form modal add
        $('#modalAddPemeriksaan form').on('submit', function(e) {
            const swalMixinSuccess = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
            });
            e.preventDefault();
            let form = $(this)[0];
            let data = new FormData(form);
            $.ajax({
                url: $(form).attr('action'),
                type: 'POST',
                data: data,
                contentType: false,
                processData: false,
                success: function(response) {
                    $('#modalAddPemeriksaan').modal('hide');
                    tabel.ajax.reload();
                    swalMixinSuccess.fire(
                        'Success!',
                        'Status pengajuan berhasil diperbarui dan masuk ke rekap.',
                        'success'
                    );
                },
                error: function(xhr) {
                    // console.log(xhr.responseJSON.message);
                    Swal.fire(
                        'Error!',
                        'Error memperbarui pengajuan: ' + xhr.responseJSON.message,
                        'error'
                    );
                }
            });
        });

        // Regex input nip, tinggi badan, berat badan
        function restrictInputToNumbers(event) {
            event.target.value = event.target.value.replace(/[^0-9]/g, '');
        }
        const inputs = document.querySelectorAll(
            'input[name="istirahat_hari"]');
        inputs.forEach(input => {
            input.addEventListener('input', restrictInputToNumbers);
        });

        // Fungsi untuk membuat dan mengunduh PDF
        async function buatSuratPerizinan() {
            const {
                jsPDF
            } = window.jspdf;
            const doc = new jsPDF();

            // Ambil nilai dari input
            const namaPasien = document.getElementById('detNamaPasien').value;
            const nipPasien = document.getElementById('detNipPasien').value;
            const jabatanElement = document.getElementById('detJabatan');
            const jabatan = jabatanElement.value === 'null' || jabatanElement.value === '' ? '-' : jabatanElement.value;
            const tanggalPemeriksaan = document.getElementById('detTanggalPemeriksaan').value;
            const catatan = document.getElementById('addCatatan').value;
            const istirahatHari = parseInt(document.getElementById('addIstirahatHari').value, 10);
            const costCentre = document.getElementById('addCostCentre').value || '-';
            const pangkatGolongan = document.getElementById('addPangkatGolongan').value || '-';
            const namaDokter = document.getElementById('detNamaDokter').value;

            // Get tanggal hari ini
            function getTanggalHariIni() {
                const today = new Date();
                const day = String(today.getDate()).padStart(2, '0');
                const month = String(today.getMonth() + 1).padStart(2, '0');
                const year = today.getFullYear();
                return `${day}/${month}/${year}`;
            }
            const tanggalHariIni = getTanggalHariIni();

            // Fungsi untuk menghitung umur berdasarkan tanggal lahir
            function hitungUmur(tanggalLahir) {
                const [day, month, year] = tanggalLahir.split('/');
                const birthDate = new Date(`${year}-${month}-${day}`);
                const today = new Date();
                let age = today.getFullYear() - birthDate.getFullYear();
                const m = today.getMonth() - birthDate.getMonth();
                if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
                    age--;
                }
                return age;
            }
            const tanggalLahir = document.getElementById('detTanggalLahir').value;
            const umurPasien = hitungUmur(tanggalLahir);

            // Convert no pengajuan
            const pengajuanId = document.getElementById('detId').value;
            const now = new Date();
            const day = String(now.getDate()).padStart(2, '0');
            const month = String(now.getMonth() + 1).padStart(2, '0');
            const year = now.getFullYear();
            const formattedDate = `${day}${month}${year}`;
            const noRekap = `RKP${formattedDate}${pengajuanId}`;

            // Menambahkan kop perusahaan
            const response = await fetch('/logo-base64');
            const logoResponse = await response.json();
            const companyLogo = logoResponse.base64;
            const pageWidth = doc.internal.pageSize.getWidth();
            const logoWidth = 50;
            const centerX = pageWidth / 2;
            doc.addImage(companyLogo, 'PNG', 15, 10, logoWidth, 10);
            doc.setFontSize(16);
            doc.setFont("helvetica", "bold");
            doc.text(`No: ${noRekap}`, 15, 30);

            // Tambahkan Judul
            doc.setFontSize(20);
            doc.setFont("helvetica", "bold");
            const title = `SURAT KETERANGAN DOKTER`;
            const textWidth = doc.getTextWidth(title);
            const textX = centerX - (textWidth / 2);
            const textY = 50;
            doc.text(title, textX, textY);

            // Menambahkan garis bawah
            const lineWidth = textWidth;
            const lineY = textY + 2;
            doc.line(textX, lineY, textX + lineWidth, lineY);

            // Konversi tanggal pemeriksaan dari format dd/mm/yyyy ke yyyy-mm-dd
            const [dayStr, monthStr, yearStr] = tanggalPemeriksaan.split('/');
            const formattedTanggalPemeriksaan = `${yearStr}-${monthStr}-${dayStr}`;
            const startDate = new Date(formattedTanggalPemeriksaan);

            startDate.setDate(startDate.getDate() + istirahatHari);
            const endDay = String(startDate.getDate()).padStart(2, '0');
            const endMonth = String(startDate.getMonth() + 1).padStart(2, '0');
            const endYear = startDate.getFullYear();
            const tanggalSelesai = `${endDay}-${endMonth}-${endYear}`;

            // Menambahkan konten
            doc.setFontSize(12);
            doc.setFont("helvetica", "normal");

            // Atur posisi Y untuk setiap baris
            let posY = 70;
            const lineHeight = 10;
            const labelWidth = 60;

            // Helper 
            function addText(label, text) {
                doc.text(label, 15, posY);
                doc.text(text, 15 + labelWidth, posY);
                posY += lineHeight;
            }

            addText(`MENERANGKAN,`, ``);
            addText(`Nama`, `: ${namaPasien}`);
            addText(`Umur / Tgl Lahir`, `: ${umurPasien} tahun / ${tanggalLahir}`);
            addText(`Pangkat / Gol.`, `: ${pangkatGolongan}`);
            addText(`NRP / NIP`, `: ${nipPasien}`);
            addText(`Jabatan / Bag.`, `: ${jabatan}`);
            addText(`Cost Centre`, `: ${costCentre}`);
            addText(`Perlu mendapat istirahat`, `: ${istirahatHari} hari terhitung dari`);
            addText(`Tanggal`, `: ${tanggalPemeriksaan} s/d ${tanggalSelesai} karena menderita sakit.`);
            addText(`Keterangan lain-lain`, `: ${catatan}`);
            doc.text(`${tanggalHariIni}`, 150, 190);
            doc.text(`Dokter yang memeriksa`, 140, 200);
            doc.text(`${namaDokter}`, 150, 230);

            // Buat file dan simpan ke input
            const pdfBlob = doc.output('blob');
            const file = new File([pdfBlob], `Surat_Perizinan_${noRekap}.pdf`, {
                type: 'application/pdf'
            });
            const inputSuratPerizinan = document.getElementById('suratPerizinan');
            const dataTransfer = new DataTransfer();
            dataTransfer.items.add(file);
            inputSuratPerizinan.files = dataTransfer.files;
        }

        // Event listener untuk select option
        document.getElementById('actionSelect').addEventListener('change', function() {
            if (this.value === 'buat') {
                buatSuratPerizinan();
            }
        });
    </script>
@endpush

@push('style')
    <style>
        #bt-download,
        #TabelPemeriksaan td,
        #TabelPemeriksaan th {
            text-align: center;
            white-space: nowrap;
        }

        #TabelPemeriksaan thead th:first-child {
            cursor: default;
        }

        #TabelPemeriksaan thead th:first-child::after,
        #TabelPemeriksaan thead th:first-child::before {
            display: none !important;
            pointer-events: none;
        }

        @media only screen and (max-width: 768px) {
            #TabelPemeriksaan td {
                white-space: normal;
                word-wrap: break-word;
            }

            .dtr-title {
                text-align: left;
                color: #99a1b7 !important;
            }
        }
    </style>
@endpush
