@extends('dokter.template.main')

@section('title', 'Data Resep - E Klinik PAL')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-8 flex-column justify-content-center my-0">
                        Data Resep</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted fs-8">Dokter - Resep</li>
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
                                    <table id="TabelResep"
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

    <div id="modalAddResep" class="modal fade" tabindex="-1" aria-hidden="true" aria-labelledby="modalAddResepLabel">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Tambah Resep</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1"></i>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <form class="form" action="{{ route('dokter-dataresep-tambah') }}" method="POST"
                        id="formAddResep">
                        @csrf
                        <input type="hidden" id="detId" name="id_pengajuan">
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
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span>Keluhan</span>
                            </label>
                            <input type="text" class="form-control form-control-solid" placeholder="" id="detKeluhan"
                                readonly>
                        </div>
                        <div id="obatContainer">
                            <div class="row g-9 mb-8" id="row_0">
                                <div class="col-md-8 fv-row">
                                    <label for="obat_0"
                                        class="d-flex align-items-center fs-6 fw-semibold form-label mb-2 required">Pilih
                                        Obat</label>
                                    <select name="obat[0][id_obat]" class="form-select form-select-solid"
                                        data-placeholder="" data-hide-search="true">
                                        <option value="" selected disabled>Masukkan jenis obat</option>
                                        @foreach ($obats as $obat)
                                            <option value="{{ $obat->id }}">{{ $obat->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3 fv-row">
                                    <label for="jumlah_0"
                                        class="d-flex align-items-center fs-6 fw-semibold form-label mb-2 required">Jumlah</label>
                                    <input type="text" id="addJumlah" name="obat[0][jumlah]"
                                        class="form-control form-control-solid" placeholder="0">
                                </div>
                                <div class="col-md-1 d-flex align-items-end">
                                    <button type="button" class="btn btn-danger btn-sm remove-row">X</button>
                                </div>
                            </div>
                        </div>
                        <div class="text-end pt-15">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                            <button type="button" id="addObatRow" class="btn btn-success">Tambah Obat</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        // Tambahkan baris obat baru
        $(document).ready(function() {
            let obatIndex = 1;
            // Event untuk menambahkan baris obat
            $('#addObatRow').click(function() {
                let newRow = `
                    <div class="row g-9 mb-8" id="row_${obatIndex}">
                        <div class="col-md-8 fv-row">
                            <label for="obat_${obatIndex}" class="d-flex align-items-center fs-6 fw-semibold form-label mb-2 required">Pilih Obat</label>
                            <select name="obat[${obatIndex}][id_obat]" class="form-select form-select-solid" data-placeholder="" data-hide-search="true">
                                <option value="" selected disabled>Masukkan jenis obat</option>
                                @foreach ($obats as $obat)
                                    <option value="{{ $obat->id }}">{{ $obat->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 fv-row">
                            <label for="jumlah_${obatIndex}" class="d-flex align-items-center fs-6 fw-semibold form-label mb-2 required">Jumlah</label>
                            <input type="text" name="obat[${obatIndex}][jumlah]" class="form-control form-control-solid" placeholder="0">
                        </div>
                        <div class="col-md-1 d-flex align-items-end">
                            <button type="button" class="btn btn-danger btn-sm remove-row">X</button>
                        </div>
                    </div>`;
                $('#obatContainer').append(newRow);
                obatIndex++;
            });
            // Event untuk menghapus baris obat
            $(document).on('click', '.remove-row', function() {
                $(this).closest('.row').remove();
            });
            // Reset form ketika modal ditutup
            $('#modalAddResep').on('hidden.bs.modal', function() {
                $('#obatContainer').html(`
                    <div class="row g-9 mb-8" id="row_0">
                        <div class="col-md-8 fv-row">
                            <label for="obat_0" class="d-flex align-items-center fs-6 fw-semibold form-label mb-2 required">Pilih Obat</label>
                            <select name="obat[0][id_obat]" class="form-select form-select-solid" data-placeholder="" data-hide-search="true">
                                <option value="" selected disabled>Masukkan jenis obat</option>
                                @foreach ($obats as $obat)
                                    <option value="{{ $obat->id }}">{{ $obat->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 fv-row">
                            <label for="jumlah_0" class="d-flex align-items-center fs-6 fw-semibold form-label mb-2 required">Jumlah</label>
                            <input type="text" name="obat[0][jumlah]" class="form-control form-control-solid" placeholder="0">
                        </div>
                        <div class="col-md-1 d-flex align-items-end">
                            <button type="button" class="btn btn-danger btn-sm remove-row">X</button>
                        </div>
                    </div>
                `);
                obatIndex = 1;
            });
        });

        // Regex input qty
        function restrictInputToNumbers(event) {
            event.target.value = event.target.value.replace(/[^0-9]/g, '');
        }
        const inputs = document.querySelectorAll(
            'input[id="addJumlah"]');
        inputs.forEach(input => {
            input.addEventListener('input', restrictInputToNumbers);
        });

        // Inisialisasi datatable
        $(document).ready(function() {
            tabel = $('#TabelResep').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('dokter-dataresep') }}",
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
                                <a onclick="modalAddResep('${row.id}', '${row.nip_pasien}', '${row.nama_pasien}', '${row.keluhan}')" class="btn btn-icon btn-light-success btn-xl" data-bs-toggle="modal" data-bs-target="#modalAddResep">
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
                $('#TabelResep').DataTable().ajax.reload();
            });

            // Fix tampilan tabel berubah setelah dilakukan responsif
            $(window).resize(function() {
                tabel.columns.adjust().responsive.recalc();
            });
        });

        // Clear form modal add catatan
        $('#modalAddResep').on('hidden.bs.modal', function() {
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
            let formattedPengajuan = `${dayPengajuan}/${monthPengajuan}/${yearPengajuan}`;
            $('#detailTanggalPengajuan').val(formattedPengajuan);
            let datePemeriksaan = new Date(tanggal_pemeriksaan);
            let dayPemeriksaan = String(datePemeriksaan.getDate()).padStart(2, '0');
            let monthPemeriksaan = String(datePemeriksaan.getMonth() + 1).padStart(2, '0');
            let yearPemeriksaan = String(datePemeriksaan.getFullYear());
            let formattedPemeriksaan = `${dayPemeriksaan}/${monthPemeriksaan}/${yearPemeriksaan}`;
            $('#detailTanggalPemeriksaan').val(formattedPemeriksaan);
            $('#detailCatatan').val(catatan);
            $('#detailNamaPoli').val(nama_poli);
            $('#modalDetail').modal('show');
        }

        function modalAddResep(id, nip_pasien, nama_pasien, keluhan) {
            $('#detId').val(id);
            $('#detNamaPasien').val(nama_pasien);
            $('#detNipPasien').val(nip_pasien);
            $('#detKeluhan').val(keluhan);
            $('#modalAddResep').modal('show');
        }

        // Menangani penanganan form modal add
        $('#modalAddResep form').on('submit', function(e) {
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
                    $('#modalAddResep').modal('hide');
                    tabel.ajax.reload();
                    swalMixinSuccess.fire(
                        'Success!',
                        'Resep berhasil ditambah.',
                        'success'
                    );
                },
                error: function(xhr) {
                    // console.log(xhr.responseJSON.message);
                    Swal.fire(
                        'Error!',
                        'Error menambahkan resep: ' + xhr.responseJSON.message,
                        'error'
                    );
                }
            });
        });
    </script>
@endpush

@push('style')
    <style>
        #bt-download,
        #TabelResep td,
        #TabelResep th {
            text-align: center;
            white-space: nowrap;
        }

        #TabelResep thead th:first-child {
            cursor: default;
        }

        #TabelResep thead th:first-child::after,
        #TabelResep thead th:first-child::before {
            display: none !important;
            pointer-events: none;
        }

        @media only screen and (max-width: 768px) {
            #TabelResep td {
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
