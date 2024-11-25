@extends('admin.template.main')

@section('title', 'Data Rating - E Klinik PAL')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-8 flex-column justify-content-center my-0">
                        Data Rating</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted fs-8">Admin - Rating</li>
                    </ul>
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
                                    <table id="TabelRating"
                                        class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4"
                                        style="width: 100%">
                                        <thead class="thead-dark">
                                            <tr class="fw-bold text-muted">
                                                <th>No</th>
                                                {{-- <th>Nama Pasien</th> --}}
                                                <th>Nama Dokter</th>
                                                {{-- <th>Keluhan</th> --}}
                                                <th>Rating</th>
                                                <th>Komentar</th>
                                                {{-- <th>Tanggal Rating</th> --}}
                                                {{-- <th>Aksi</th> --}}
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
    {{-- <div id="modalDetail" class="modal fade" tabindex="-1" aria-hidden="true" aria-labelledby="modalDetailLabel">
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
                            <input type="text" class="form-control form-control-solid" placeholder="" id="detailKeluhan"
                                readonly>
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
                            <input type="text" class="form-control form-control-solid" placeholder="" id="detailCatatan"
                                readonly>
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

    <div id="modalEdit" class="modal fade" tabindex="-1" aria-hidden="true" aria-labelledby="modalEditLabel">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Edit Rating</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <form class="form" action="{{ route('admin-datarating-edit') }}" method="PUT">
                        @csrf
                        <input type="hidden" id="id" name="id">
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span>Rating</span>
                            </label>
                            <input type="number" class="form-control form-control-solid" placeholder=""
                                id="updateRating" name="rating" min="1" max="10">
                            <small class="text-muted">Masukkan berupa Angka 1-10.</small>
                        </div>
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span>Komentar</span>
                            </label>
                            <input type="text" class="form-control form-control-solid" placeholder=""
                                id="updateKomentar" name="komentar">
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
            tabel = $('#TabelRating').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin-datarating') }}",
                order: [
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
                    // {
                    //     data: 'nama_pasien',
                    //     name: 'nama_pasien',
                    //     orderable: true,
                    //     render: function(data, type, row, meta) {
                    //         return `<span class="text-gray-900 fw-bold fs-6">${data}</span>`;
                    //     }
                    // },
                    {
                        data: 'nama_dokter',
                        name: 'nama_dokter',
                        orderable: true,
                        render: function(data, type, row, meta) {
                            if (data) {
                                return `<span class="text-gray-900 fw-bold fs-6">${data}</span>`;
                            } else {
                                return `<span class="text-gray-900 fw-bold fs-6">Belum ada dokter</span>`;
                            }
                        }
                    },
                    // {
                    //     data: 'keluhan',
                    //     name: 'keluhan',
                    //     orderable: true,
                    //     render: function(data, type, row, meta) {
                    //         return `<span class="text-gray-900 fw-bold fs-6">${data}</span>`;
                    //     }
                    // },
                    {
                        data: 'rating',
                        name: 'rating',
                        orderable: true,
                        render: function(data, type, row, meta) {
                            let badgeClass;
                            if (data >= 1 && data <= 4) {
                                badgeClass = 'badge-light-danger';
                            } else if (data >= 5 && data <= 7) {
                                badgeClass = 'badge-light-warning';
                            } else if (data >= 8 && data <= 10) {
                                badgeClass = 'badge-light-primary';
                            } else {
                                badgeClass = 'badge-light-secondary';
                            }
                            return `<span class="badge ${badgeClass}">${data} / 10</span>`;
                        }
                    },
                    {
                        data: 'komentar',
                        name: 'komentar',
                        orderable: true,
                        render: function(data, type, row, meta) {
                            return `<span class="text-gray-900 fw-bold fs-6">${data}</span>`;
                        }
                    },
                    {
                        data: 'tanggal_rating',
                        name: 'tanggal_rating',
                        orderable: true,
                        visible: false,
                        render: function(data, type, row, meta) {
                            const date = new Date(data);
                            const day = ('0' + date.getDate()).slice(-2);
                            const month = ('0' + (date.getMonth() + 1)).slice(-2);
                            const year = date.getFullYear();
                            return `<span class="text-gray-900 fw-bold fs-6">${day}-${month}-${year}</span>`;
                        }
                    },
                    // {
                    //     data: null,
                    //     name: 'aksi',
                    //     orderable: false,
                    //     searchable: false,
                    //     render: function(data, type, row, meta) {
                    //         return `<div class="d-flex justify-content-center flex-shrink-0">
                    //             <a onclick="modalDetail('${row.nama_pasien}', '${row.nip_pasien}', '${row.keluhan}', '${row.status}', '${row.tanggal_pengajuan}', '${row.tanggal_pemeriksaan}', '${row.catatan}', '${row.nama_poli}')" class="btn btn-icon btn-light-primary btn-xl me-2" data-bs-toggle="modal" data-bs-target="#modalDetail">
                    //                 <i class="ki-duotone ki-scroll fs-2">
                    //                     <span class="path1"></span>
                    //                     <span class="path2"></span>
                    //                 </i>
                    //             </a>
                    //             <a onclick="modalEdit('${row.id_rating}', '${row.rating}', '${row.komentar}')" class="btn btn-icon btn-light-info btn-xl me-2" data-bs-toggle="modal" data-bs-target="#modalEdit">
                    //                 <i class="ki-duotone ki-wrench fs-2">
                    //                     <span class="path1"></span>
                    //                     <span class="path2"></span>
                    //                 </i>
                    //             </a>
                    //             <a onclick="deleteData(${row.id_rating})" class="btn btn-icon btn-light-danger btn-xl">
                    //                 <i class="ki-duotone ki-trash fs-2">
                    //                     <span class="path1"></span>
                    //                     <span class="path2"></span>
                    //                     <span class="path3"></span>
                    //                     <span class="path4"></span>
                    //                     <span class="path5"></span>
                    //                 </i>
                    //             </a>
                    //         </div>`;
                    //     }
                    // }
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
                tabel.columns.adjust().responsive.recalc();
            });
        });

        // Pengambilan data modal detail
        // function modalDetail(nama_pasien, nip_pasien, keluhan, status, tanggal_pengajuan,
        //     tanggal_pemeriksaan, catatan, nama_poli) {
        //     $('#detailNamaPasien').val(nama_pasien);
        //     $('#detailNipPasien').val(nip_pasien);
        //     $('#detailKeluhan').val(keluhan);
        //     $('#detailStatus').val(status);
        //     let datePengajuan = new Date(tanggal_pengajuan);
        //     let dayPengajuan = String(datePengajuan.getDate()).padStart(2, '0');
        //     let monthPengajuan = String(datePengajuan.getMonth() + 1).padStart(2, '0');
        //     let yearPengajuan = String(datePengajuan.getFullYear());
        //     let formattedBirthdatePengajuan = `${dayPengajuan}/${monthPengajuan}/${yearPengajuan}`;
        //     $('#detailTanggalPengajuan').val(formattedBirthdatePengajuan);
        //     let datePemeriksaan = new Date(tanggal_pemeriksaan);
        //     let dayPemeriksaan = String(datePemeriksaan.getDate()).padStart(2, '0');
        //     let monthPemeriksaan = String(datePemeriksaan.getMonth() + 1).padStart(2, '0');
        //     let yearPemeriksaan = String(datePemeriksaan.getFullYear());
        //     let formattedBirthdatePemeriksaan = `${dayPemeriksaan}/${monthPemeriksaan}/${yearPemeriksaan}`;
        //     $('#detailTanggalPemeriksaan').val(formattedBirthdatePemeriksaan);
        //     $('#detailCatatan').val(catatan);
        //     $('#detailNamaPoli').val(nama_poli);
        //     $('#modalDetail').modal('show');
        // }

        // Penangaan form modal edit
        // $('#modalEdit form').on('submit', function(e) {
        //     const swalMixinSuccess = Swal.mixin({
        //         toast: true,
        //         position: 'top-end',
        //         showConfirmButton: false,
        //         timer: 4000,
        //         timerProgressBar: true,
        //     });
        //     e.preventDefault();
        //     let data = $(this).serialize();
        //     let form = $(this);
        //     Swal.fire({
        //         title: 'Apakah anda yakin?',
        //         text: "Anda ingin menyimpan perubahan ini?",
        //         icon: 'warning',
        //         showCancelButton: true,
        //         confirmButtonColor: '#3085d6',
        //         cancelButtonColor: '#d33',
        //         confirmButtonText: 'Ya, simpan!',
        //         cancelButtonText: 'Tidak'
        //     }).then((result) => {
        //         if (result.isConfirmed) {
        //             $.ajax({
        //                 url: form.attr('action'),
        //                 type: "PUT",
        //                 data: data,
        //                 success: function(response) {
        //                     console.log(response);
        //                     $('#modalEdit').modal('hide');
        //                     tabel.ajax.reload();
        //                     swalMixinSuccess.fire(
        //                         'Saved!',
        //                         'Poli berhasil diupdate.',
        //                         'success'
        //                     );
        //                 },
        //                 error: function(xhr) {
        //                     console.log(xhr.responseJSON.message);
        //                     Swal.fire(
        //                         'Error!',
        //                         'Error mengupdate rating: ' + xhr.responseJSON.message,
        //                         'error'
        //                     );
        //                 }
        //             });
        //         }
        //     });
        // });

        // Pengambilan data old modal edit
        // function modalEdit(id, rating, komentar) {
        //     $('#id').val(id);
        //     $('#updateRating').val(rating);
        //     $('#updateKomentar').val(komentar);
        //     $('#modalEdit').modal('show');
        // }

        // Menangani penanganan fungsi delete data
        // function deleteData(id) {
        //     const swalMixinSuccess = Swal.mixin({
        //         toast: true,
        //         position: 'top-end',
        //         showConfirmButton: false,
        //         timer: 4000,
        //         timerProgressBar: true,
        //     });
        //     Swal.fire({
        //         title: 'Apakah Anda yakin?',
        //         text: "Anda tidak akan dapat mengembalikan ini!",
        //         icon: 'warning',
        //         showCancelButton: true,
        //         confirmButtonColor: '#3085d6',
        //         cancelButtonColor: '#d33',
        //         confirmButtonText: 'Ya, hapus!',
        //         cancelButtonText: 'Tidak'
        //     }).then((result) => {
        //         if (result.isConfirmed) {
        //             fetch(`/admin/data-rating-delete/${id}`, {
        //                     method: 'DELETE',
        //                     headers: {
        //                         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
        //                             'content'),
        //                         'Content-Type': 'application/json'
        //                     }
        //                 })
        //                 .then(response => {
        //                     if (!response.ok) {
        //                         return response.json().then(errorData => {
        //                             throw new Error(errorData.message);
        //                         });
        //                     }
        //                     return response.json();
        //                 })
        //                 .then(data => {
        //                     console.log('Deleted:', data);
        //                     tabel.ajax.reload();
        //                     swalMixinSuccess.fire(
        //                         'Deleted!',
        //                         'Poli berhasil dihapus.',
        //                         'success'
        //                     );
        //                 })
        //                 .catch(error => {
        //                     console.error('Error:', error);
        //                     Swal.fire(
        //                         'Error!',
        //                         'Error menghapus rating: ' + error.message,
        //                         'error'
        //                     );
        //                 });
        //         }
        //     });
        // }
    </script>
@endpush

@push('style')
    <style>
        #bt-download,
        #TabelRating td,
        #TabelRating th {
            text-align: center;
            white-space: nowrap;
        }

        #TabelRating thead th:first-child {
            cursor: default;
        }

        #TabelRating thead th:first-child::after,
        #TabelRating thead th:first-child::before {
            display: none !important;
            pointer-events: none;
        }

        @media only screen and (max-width: 768px) {
            #TabelRating td {
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
