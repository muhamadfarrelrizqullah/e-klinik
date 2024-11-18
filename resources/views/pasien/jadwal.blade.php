@extends('pasien.template.main')

@section('title', 'Data Jadwal Dokter - E Klinik PAL')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-3 flex-column justify-content-center my-0">
                        Data Jadwal Dokter</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">Home</li>
                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-500 w-5px h-2px"></span>
                        </li>
                        <li class="breadcrumb-item text-muted">Jadwal Dokter</li>
                    </ul>
                </div>
                <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <div class="m-0">
                        <a href="#" class="btn btn-sm btn-flex btn-light-secondary fw-bold"
                            data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                            <i class="ki-duotone ki-filter fs-6 text-muted me-1">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>Filter</a>
                        <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true"
                            id="kt_menu_658cdae763501">
                            <div class="px-7 py-5">
                                <div class="fs-5 text-gray-900 fw-bold">Filter Jadwal</div>
                            </div>
                            <div class="separator border-gray-200"></div>
                            <div class="px-7 py-5">
                                <div class="mb-10">
                                    <label class="form-label fw-semibold">Nama Dokter:</label>
                                    <select class="form-select form-select-solid" data-placeholder=""
                                        data-hide-search="true" id="filterNama" name="nama">
                                        <option value="" selected disabled>Pilih nama dokter</option>
                                        @foreach ($dokters as $dokter)
                                            <option value="{{ $dokter->id }}">{{ $dokter->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-10">
                                    <label class="form-label fw-semibold">Hari:</label>
                                    <select class="form-select form-select-solid" data-placeholder=""
                                        data-hide-search="true" id="filterHari" name="hari">
                                        <option value="" selected disabled>Pilih hari jadwal</option>
                                        <option value="Senin">Senin</option>
                                        <option value="Selasa">Selasa</option>
                                        <option value="Rabu">Rabu</option>
                                        <option value="Kamis">Kamis</option>
                                        <option value="Jumat">Jumat</option>
                                    </select>
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
                                    <table id="TabelJadwal"
                                        class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4"
                                        style="width: 100%">
                                        <thead class="thead-dark">
                                            <tr class="fw-bold text-muted">
                                                <th>No</th>
                                                <th>Nama Dokter</th>
                                                <th>Hari</th>
                                                <th>Jam Mulai</th>
                                                <th>Jam Selesai</th>
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

@push('script')
    <script>
        // Inisialisasi datatable
        $(document).ready(function() {
            tabel = $('#TabelJadwal').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('pasien-datajadwaldokter') }}",
                    data: function(d) {
                        d.id_dokter = $('#filterNama').val();
                        d.data_hari = $('#filterHari').val();
                    }
                },
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
                        data: 'nama',
                        name: 'nama',
                        orderable: true,
                        render: function(data, type, row, meta) {
                            return `<span class="text-gray-900 fw-bold fs-6">${data}</span>`;
                        }
                    },
                    {
                        data: 'hari',
                        name: 'hari',
                        orderable: true,
                        render: function(data, type, row, meta) {
                            if (data === 'Senin') {
                                return `<span class="badge badge-light-success">${data}</span>`;
                            } else if (data === 'Selasa') {
                                return `<span class="badge badge-light-warning">${data}</span>`;
                            } else if (data === 'Rabu') {
                                return `<span class="badge badge-light-primary">${data}</span>`;
                            } else if (data === 'Kamis') {
                                return `<span class="badge badge-light-secondary">${data}</span>`;
                            } else {
                                return `<span class="badge badge-light-danger">${data}</span>`;
                            }
                        }
                    },
                    {
                        data: 'jam_mulai',
                        name: 'jam_mulai',
                        orderable: true,
                        render: function(data, type, row, meta) {
                            const jamMenitMulai = data.slice(0, 5);
                            return `<span class="text-gray-900 fw-bold fs-6">${jamMenitMulai}</span>`;
                        }
                    },
                    {
                        data: 'jam_selesai',
                        name: 'jam_selesai',
                        orderable: true,
                        render: function(data, type, row, meta) {
                            const jamMenitSelesai = data.slice(0, 5);
                            return `<span class="text-gray-900 fw-bold fs-6">${jamMenitSelesai}</span>`;
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
            $('#filterHari').on('change', function() {
                tabel.ajax.reload();
            });

            // Event listener untuk reset filter
            document.querySelector('button[type="reset"]').addEventListener('click', function() {
                document.getElementById('filterNama').value = '';
                document.getElementById('filterHari').value = '';
                $('#TabelJadwal').DataTable().ajax.reload();
            });

            // Fix tampilan tabel berubah setelah dilakukan responsif
            $(window).resize(function() {
                tabel.columns.adjust().responsive.recalc();
            });
        });
    </script>
@endpush

@push('style')
    <style>
        #bt-download,
        #TabelJadwal td,
        #TabelJadwal th {
            text-align: center;
            white-space: nowrap;
        }

        #TabelJadwal thead th:first-child {
            cursor: default;
        }

        #TabelJadwal thead th:first-child::after,
        #TabelJadwal thead th:first-child::before {
            display: none !important;
            pointer-events: none;
        }

        @media only screen and (max-width: 768px) {
            #TabelJadwal td {
                white-space: normal;
                word-wrap: break-word;
            }
        }
    </style>
@endpush
