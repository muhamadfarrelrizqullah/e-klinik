@extends('admin.template.main')

@section('title', 'Data Pengaturan Halaman - E Klinik PAL')

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-gray-900 fw-bold fs-8 flex-column justify-content-center my-0">
                        Data Pengaturan Halaman</h1>
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted fs-8">Admin - Pengaturan Halaman</li>
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
                                    <table id="TabelPengaturanHalaman"
                                        class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4"
                                        style="width: 100%">
                                        <thead class="thead-dark">
                                            <tr class="fw-bold text-muted">
                                                <th>Atribut</th>
                                                <th>Data</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><span class="text-gray-900 fw-bold fs-6">Header Main</span></td>
                                                <td><span class="text-gray-900 fw-bold fs-6" id="main_page_header"></span>
                                                </td>
                                                <td><a onclick="modalEdit('main_page_header', 'Header Main', $('#main_page_header').text())"
                                                        class="btn btn-icon btn-light-info btn-xl me-2"
                                                        data-bs-toggle="modal" data-bs-target="#modalEdit">
                                                        <i class="ki-duotone ki-wrench fs-2">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                    </a></td>
                                            </tr>
                                            <tr>
                                                <td><span class="text-gray-900 fw-bold fs-6">Judul Main</span></td>
                                                <td><span class="text-gray-900 fw-bold fs-6" id="main_page_title"></span>
                                                </td>
                                                <td><a onclick="modalEdit('main_page_title', 'Judul Main', $('#main_page_title').text())"
                                                        class="btn btn-icon btn-light-info btn-xl me-2"
                                                        data-bs-toggle="modal" data-bs-target="#modalEdit">
                                                        <i class="ki-duotone ki-wrench fs-2">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                    </a></td>
                                            </tr>
                                            <tr>
                                                <td><span class="text-gray-900 fw-bold fs-6">Header Second</span></td>
                                                <td><span class="text-gray-900 fw-bold fs-6" id="second_page_header"></span>
                                                </td>
                                                <td><a onclick="modalEdit('second_page_header', 'Header Second', $('#second_page_header').text())"
                                                        class="btn btn-icon btn-light-info btn-xl me-2"
                                                        data-bs-toggle="modal" data-bs-target="#modalEdit">
                                                        <i class="ki-duotone ki-wrench fs-2">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                    </a></td>
                                            </tr>
                                            <tr>
                                                <td><span class="text-gray-900 fw-bold fs-6">Judul Second</span></td>
                                                <td><span class="text-gray-900 fw-bold fs-6" id="second_page_title"></span>
                                                </td>
                                                <td><a onclick="modalEdit('second_page_title', 'Judul Second', $('#second_page_title').text())"
                                                        class="btn btn-icon btn-light-info btn-xl me-2"
                                                        data-bs-toggle="modal" data-bs-target="#modalEdit">
                                                        <i class="ki-duotone ki-wrench fs-2">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                    </a></td>
                                            </tr>
                                            <tr>
                                                <td><span class="text-gray-900 fw-bold fs-6">Deskripsi Second</span></td>
                                                <td><span class="text-gray-900 fw-bold fs-6" id="second_page_desc"></span>
                                                </td>
                                                <td><a onclick="modalEdit('second_page_desc', 'Deskripsi Second', $('#second_page_desc').text())"
                                                        class="btn btn-icon btn-light-info btn-xl me-2"
                                                        data-bs-toggle="modal" data-bs-target="#modalEdit">
                                                        <i class="ki-duotone ki-wrench fs-2">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                    </a></td>
                                            </tr>
                                            <tr>
                                                <td><span class="text-gray-900 fw-bold fs-6">Header Third</span></td>
                                                <td><span class="text-gray-900 fw-bold fs-6" id="third_page_header"></span>
                                                </td>
                                                <td><a onclick="modalEdit('third_page_header', 'Header Third', $('#third_page_header').text())"
                                                        class="btn btn-icon btn-light-info btn-xl me-2"
                                                        data-bs-toggle="modal" data-bs-target="#modalEdit">
                                                        <i class="ki-duotone ki-wrench fs-2">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                    </a></td>
                                            </tr>
                                            <tr>
                                                <td><span class="text-gray-900 fw-bold fs-6">Judul Third</span></td>
                                                <td><span class="text-gray-900 fw-bold fs-6" id="third_page_title"></span>
                                                </td>
                                                <td><a onclick="modalEdit('third_page_title', 'Judul Third', $('#third_page_title').text())"
                                                        class="btn btn-icon btn-light-info btn-xl me-2"
                                                        data-bs-toggle="modal" data-bs-target="#modalEdit">
                                                        <i class="ki-duotone ki-wrench fs-2">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                    </a></td>
                                            </tr>
                                            <tr>
                                                <td><span class="text-gray-900 fw-bold fs-6">Deskripsi Third</span></td>
                                                <td><span class="text-gray-900 fw-bold fs-6" id="third_page_desc"></span>
                                                </td>
                                                <td><a onclick="modalEdit('third_page_desc', 'Deskripsi Third', $('#third_page_desc').text())"
                                                        class="btn btn-icon btn-light-info btn-xl me-2"
                                                        data-bs-toggle="modal" data-bs-target="#modalEdit">
                                                        <i class="ki-duotone ki-wrench fs-2">
                                                            <span class="path1"></span>
                                                            <span class="path2"></span>
                                                        </i>
                                                    </a></td>
                                            </tr>
                                        </tbody>
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
    <div id="modalEdit" class="modal fade" tabindex="-1" aria-hidden="true" aria-labelledby="modalEditLabel">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Edit Pengaturan Halaman</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-duotone ki-cross fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </div>
                </div>
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <form id="formEdit" class="form">
                        @csrf
                        <input type="hidden" id="field" name="field">
                        <input type="hidden" id="id" name="id" value="1">
                        <div class="d-flex flex-column mb-7 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
                                <span id="fieldLabel" class="required"></span>
                            </label>
                            <input type="text" class="form-control form-control-solid" id="value" name="value">
                        </div>
                        <div class="text-end pt-15">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
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
        // Mengambil data dari server
        $(document).ready(function() {
            $.ajax({
                url: "{{ route('admin-datapengaturanhalaman') }}",
                type: 'GET',
                success: function(response) {
                    const data = response.data[0];
                    $('#main_page_header').text(data.main_page_header);
                    $('#main_page_title').text(data.main_page_title);
                    $('#second_page_header').text(data.second_page_header);
                    $('#second_page_title').text(data.second_page_title);
                    $('#second_page_desc').text(data.second_page_desc || 'Tidak Ada');
                    $('#third_page_header').text(data.third_page_header);
                    $('#third_page_title').text(data.third_page_title);
                    $('#third_page_desc').text(data.third_page_desc || 'Tidak Ada');
                },
                error: function() {
                    alert('Gagal memuat data.');
                }
            });
        });

        // Pengambilan data modal edit
        function modalEdit(field, label, value) {
            $('#field').val(field);
            $('#fieldLabel').text(label);
            $('#value').val(value);
        }

        // Penangaan form modal edit
        $('#formEdit').submit(function(e) {
            e.preventDefault();
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
                    const swalMixinSuccess = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 4000,
                        timerProgressBar: true,
                    });
                    $.ajax({
                        url: "{{ route('admin-datapengaturanhalaman-edit') }}",
                        type: 'PUT',
                        data: $(this).serialize(),
                        success: function(response) {
                            if (response.success) {
                                swalMixinSuccess.fire(
                                    'Saved!',
                                    'Pengaturan Halaman berhasil diupdate.',
                                    'success'
                                );
                                location.reload();
                            } else {
                                Swal.fire(
                                    'Error!',
                                    response.message ||
                                    'Terjadi kesalahan saat memperbarui data.',
                                    'error'
                                );
                            }
                        },
                        error: function(xhr, status, error) {
                            Swal.fire(
                                'Error!',
                                'Gagal memperbarui data: ' + (xhr.responseJSON?.message ||
                                    error),
                                'error'
                            );
                        }
                    });
                }
            });
        });
    </script>
@endpush

@push('style')
    <style>
        #bt-download,
        #TabelPengaturanHalaman td,
        #TabelPengaturanHalaman th {
            text-align: center;
            white-space: nowrap;
        }

        #TabelPengaturanHalaman thead th:first-child {
            cursor: default;
        }

        #TabelPengaturanHalaman thead th:first-child::after,
        #TabelPengaturanHalaman thead th:first-child::before {
            display: none !important;
            pointer-events: none;
        }

        @media only screen and (max-width: 768px) {
            #TabelPengaturanHalaman td {
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
