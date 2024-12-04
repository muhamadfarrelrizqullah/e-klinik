@extends('admin.template.main')

@section('title', 'Pengaturan Halaman - E Klinik PAL')

@section('content')
    <!-- Konten HTML Anda -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Company Profile</h2>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Atribut</th>
                            <th>Nilai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($companyProfiles as $item)
                            <tr>
                                <td>
                                    {{ ucwords(str_replace('_', ' ', 'main_page_header')) }}
                                </td>
                                <td>
                                    {{ $item->main_page_header }}
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-info"
                                        onclick="openEditModal('main_page_header', '{{ addslashes($item->main_page_header) }}')">
                                        Edit
                                    </button>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    {{ ucwords(str_replace('_', ' ', 'main_page_title')) }}
                                </td>
                                <td>
                                    {{ $item->main_page_title }}
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-info"
                                        onclick="openEditModal('main_page_title', '{{ addslashes($item->main_page_title) }}')">
                                        Edit
                                    </button>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    {{ ucwords(str_replace('_', ' ', 'second_page_header')) }}
                                </td>
                                <td>
                                    {{ $item->second_page_header }}
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-info"
                                        onclick="openEditModal('second_page_header', '{{ addslashes($item->second_page_header) }}')">
                                        Edit
                                    </button>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    {{ ucwords(str_replace('_', ' ', 'second_page_title')) }}
                                </td>
                                <td>
                                    {{ $item->second_page_title }}
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-info"
                                        onclick="openEditModal('second_page_title', '{{ addslashes($item->second_page_title) }}')">
                                        Edit
                                    </button>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    {{ ucwords(str_replace('_', ' ', 'second_page_desc')) }}
                                </td>
                                <td>
                                    {{ $item->second_page_desc }}
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-info"
                                        onclick="openEditModal('second_page_desc', '{{ addslashes($item->second_page_desc) }}')">
                                        Edit
                                    </button>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    {{ ucwords(str_replace('_', ' ', 'third_page_header')) }}
                                </td>
                                <td>
                                    {{ $item->third_page_header }}
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-info"
                                        onclick="openEditModal('third_page_header', '{{ addslashes($item->third_page_header) }}')">
                                        Edit
                                    </button>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    {{ ucwords(str_replace('_', ' ', 'third_page_title')) }}
                                </td>
                                <td>
                                    {{ $item->third_page_title }}
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-info"
                                        onclick="openEditModal('third_page_title', '{{ addslashes($item->third_page_title) }}')">
                                        Edit
                                    </button>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    {{ ucwords(str_replace('_', ' ', 'third_page_desc')) }}
                                </td>
                                <td>
                                    {{ $item->third_page_desc }}
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-info"
                                        onclick="openEditModal('third_page_desc', '{{ addslashes($item->third_page_desc) }}')">
                                        Edit
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal untuk Edit -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('admin-company-profile.update') }}">
                @csrf
                @method('PUT')
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="attribute" id="modalAttribute">
                        <div class="mb-3">
                            <label for="modalValue" class="form-label">Nilai</label>
                            <input type="text" class="form-control" id="modalValue" name="value">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    function openEditModal(attribute, value) {
        console.log("Editing:", attribute, value); // Debugging line to ensure it's being triggered
        document.getElementById('modalAttribute').value = attribute;
        document.getElementById('modalValue').value = value;
        var myModal = new bootstrap.Modal(document.getElementById('editModal'));
        myModal.show();
    }
</script>
@endpush
