@extends('admin.layout.main')

@section('title', 'Master User')

@section('content')
<div class="container-fluid">

    {{-- Tombol Tambah User --}}
    <div class="row">
        <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box" style="cursor: pointer;" onclick="tampilUserModal()">
                <span class="info-box-icon bg-dark">
                    <i class="fas fa-plus"></i>
                </span>

                <div class="info-box-content d-flex align-items-center justify-content-center">
                    <span class="info-box-text">Tambah User</span>
                </div>
            </div>
        </div>
    </div>

    {{-- Tabel User --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama User</th>
                                <th>Alamat</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Role</th>
                                <th style="width: 100px;">Gambar</th>
                                <th style="width: 100px;">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($users as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td class="nama-user">
                                    {{ $item->nama }}
                                </td>

                                <td>
                                    {{ $item->alamat }}
                                </td>

                                <td>
                                    {{ $item->email }}
                                </td>

                                {{-- Status --}}
                                <td class="text-center">
                                    <span
                                        class="badge badge-{{ $item->is_active == 1 ? 'primary' : 'danger' }}">
                                        {{ $item->is_active == 1 ? 'Aktif' : 'Tidak Aktif' }}
                                    </span>
                                </td>

                                {{-- Role --}}
                                <td class="text-center">
                                    <span
                                        class="badge badge-{{ $item->role_id == 1 ? 'success' : 'warning' }}">
                                        {{ $item->role_id == 1 ? 'Administrator' : 'Member' }}
                                    </span>
                                </td>

                                {{-- Gambar --}}
                                <td class="text-center">
                                    @if ($item->image)
                                    <img src="{{ asset('storage/' . $item->image) }}"
                                        alt="User Image"
                                        width="70%">
                                    @else
                                    <span class="text-muted">
                                        Tidak ada gambar
                                    </span>
                                    @endif
                                </td>

                                {{-- Aksi --}}
                                <td>

                                    {{-- Detail --}}
                                    <button type="button"
                                        class="btn btn-xs btn-primary"
                                        data-toggle="tooltip"
                                        data-placement="top"
                                        title="Detail"
                                        onclick="tampilUserModal('{{ $item->id }}', this)">
                                        <i class="fas fa-eye"></i>
                                    </button>

                                    {{-- Edit --}}
                                    <button type="button"
                                        class="btn btn-xs btn-warning"
                                        data-toggle="tooltip"
                                        data-placement="top"
                                        title="Edit"
                                        onclick="tampilUserModal('{{ $item->id }}', this)">
                                        <i class="fas fa-edit"></i>
                                    </button>

                                    {{-- Hapus --}}
                                    <form action="{{ route('admin.master.user.destroy', $item->id) }}"
                                        method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')

                                        <button type="button"
                                            class="btn btn-xs btn-danger hapus-data"
                                            data-toggle="tooltip"
                                            data-placement="top"
                                            title="Hapus">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>

                                    <div class="d-inline">
                                        <form action="{{ route('admin.master.user.resetPassword', $item->id) }}"
                                            method="POST" class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            <button type="button" class="btn btn-xs btn-info reset-password" data
                                                toggle="tooltip" data-placement="top"
                                                title="Reset Password">
                                                <i class="fas fa-unlock"></i>
                                            </button>
                                        </form>
                                    </div>

                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Nama User</th>
                                <th>Alamat</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Role</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>

</div>

{{-- ========================================================= --}}
{{-- MODAL TAMBAH / EDIT / DETAIL USER --}}
{{-- ========================================================= --}}

<div class="modal fade"
    id="userModal"
    data-backdrop="static"
    tabindex="-1"
    role="dialog"
    aria-labelledby="userModalLabel"
    aria-hidden="true">

    <div class="modal-dialog" role="document">
        <div class="modal-content">

            {{-- Modal Header --}}
            <div class="modal-header">
                <h4 class="modal-title" id="userModalLabel">
                    Tambah User Baru
                </h4>

                <button type="button"
                    class="close"
                    data-dismiss="modal"
                    aria-label="Close">

                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            {{-- Form --}}
            <form action="{{ route('admin.master.user.store') }}"
                data-store-url="{{ route('admin.master.user.store') }}"
                data-base-url="{{ url('admin/master/user') }}"
                method="POST"
                id="userForm"
                enctype="multipart/form-data">

                @csrf

                <input type="hidden"
                    name="_method"
                    id="formMethod"
                    value="POST">

                <div class="modal-body">

                    <input type="hidden"
                        name="id"
                        id="id"
                        value="">

                    {{-- Nama --}}
                    <div class="form-group">
                        <label for="nama">Nama User</label>

                        <input type="text"
                            class="form-control"
                            id="nama"
                            name="nama"
                            placeholder="Isikan nama user"
                            required>
                    </div>

                    {{-- Alamat --}}
                    <div class="form-group">
                        <label for="alamat">Alamat</label>

                        <input type="text"
                            class="form-control"
                            id="alamat"
                            name="alamat"
                            placeholder="Isikan alamat"
                            required>
                    </div>

                    {{-- Email --}}
                    <div class="form-group">
                        <label for="email">Email</label>

                        <input type="email"
                            class="form-control"
                            id="email"
                            name="email"
                            placeholder="Isikan email"
                            required>
                    </div>

                    {{-- Status --}}
                    <div class="form-group d-none" id="status">
                        <label>Status</label>

                        <div class="form-group clearfix">

                            <div class="icheck-primary d-inline pr-4">
                                <input type="radio"
                                    id="aktif"
                                    name="status"
                                    value="1">

                                <label for="aktif">
                                    Aktif
                                </label>
                            </div>

                            <div class="icheck-primary d-inline">
                                <input type="radio"
                                    id="tidak_aktif"
                                    name="status"
                                    value="0">

                                <label for="tidak_aktif">
                                    Tidak Aktif
                                </label>
                            </div>

                        </div>
                    </div>

                    {{-- Role --}}
                    <div class="form-group">
                        <label for="role_id">Role</label>

                        <div class="form-group clearfix">

                            <div class="icheck-primary d-inline pr-4">
                                <input type="radio"
                                    id="role_admin"
                                    name="role_id"
                                    value="1"
                                    required>

                                <label for="role_admin">
                                    Administrator
                                </label>
                            </div>

                            <div class="icheck-primary d-inline">
                                <input type="radio"
                                    id="role_anggota"
                                    name="role_id"
                                    value="2">

                                <label for="role_anggota">
                                    Anggota
                                </label>
                            </div>

                        </div>
                    </div>

                    {{-- Gambar --}}
                    <div class="form-group">
                        <div class="input-group">

                            <label for="image">
                                Gambar
                            </label>

                            <a href="#"
                                class="d-none ml-2"
                                onclick="resetImage()"
                                id="reset">
                                [ Reset Image ]
                            </a>

                            <img class="img-preview img-fluid mb-3 d-block"
                                src=""
                                style="width: 100%;">

                            <div class="custom-file">

                                <input type="hidden"
                                    name="oldImage"
                                    value=""
                                    id="oldImage">

                                <input type="file"
                                    class="custom-file-input"
                                    id="image"
                                    name="image"
                                    accept="image/png,image/jpg,image/jpeg"
                                    onchange="previewImage()">

                                <label class="custom-file-label"
                                    for="image">
                                    Pilih file...
                                </label>

                            </div>
                        </div>
                    </div>

                </div>

                {{-- Modal Footer --}}
                <div class="modal-footer">

                    <button type="button"
                        class="btn btn-secondary"
                        data-dismiss="modal">
                        Tutup
                    </button>

                    <button type="submit"
                        class="btn btn-primary simpan-ubah">
                        Simpan
                    </button>

                </div>

            </form>

        </div>
    </div>

</div>
@endsection

@push('scripts')

<script>
    // =========================================================
    // DATATABLE
    // =========================================================

    $(document).ready(function() {

        $("#example1").DataTable({
            responsive: true,
            autoWidth: false
        });

        $('[data-toggle="tooltip"]').tooltip();

    });


    // =========================================================
    // MODAL USER
    // =========================================================

    function tampilUserModal(id = null, element = null) {

        let $userModal = $('#userModal');
        let $form = $('#userForm');
        let $formMethod = $('#formMethod');
        let $status = $('#status');
        let $actionButton = $userModal.find('.simpan-ubah');

        let title = element ?
            $(element).attr('title') :
            null;

        $userModal.modal('show');


        // -----------------------------------------------------
        // Set Data Form
        // -----------------------------------------------------

        function setFormData(data, isReadOnly) {

            $('#id').val(data.id || '');

            $('#nama')
                .val(data.nama || '')
                .prop('readonly', isReadOnly);

            $('#alamat')
                .val(data.alamat || '')
                .prop('readonly', isReadOnly);

            $('#email')
                .val(data.email || '')
                .prop('readonly', isReadOnly);

            $('input[name="status"]')
                .prop('disabled', isReadOnly);

            $('input[name="role_id"]')
                .prop('disabled', isReadOnly);


            // Status
            if (data.is_active == 1) {
                $('#aktif').prop('checked', true);
            } else {
                $('#tidak_aktif').prop('checked', true);
            }


            // Role
            if (data.role_id == 1) {
                $('#role_admin').prop('checked', true);
            } else {
                $('#role_anggota').prop('checked', true);
            }


            // Gambar
            if (data.image) {
                $('.img-preview').attr(
                    'src',
                    APP_URL + '/storage/' + data.image
                );
            } else {
                $('.img-preview').attr('src', '');
            }

            $('#oldImage').val(data.image || '');

            $('#image').prop('disabled', isReadOnly);

            if (isReadOnly) {
                $('.custom-file-label').hide();
                $('#reset').addClass('d-none');
            } else {
                $('.custom-file-label').show();
            }

            $('.custom-file-label').text('Pilih file...');

        }


        // -----------------------------------------------------
        // TAMBAH USER
        // -----------------------------------------------------

        if (id === null) {

            $('#userModalLabel').text('Tambah User Baru');

            setFormData({}, false);

            $actionButton
                .text('Simpan')
                .show();

            $form.attr('action', $form.data('store-url'));

            $formMethod.val('POST');

            $status.addClass('d-none');

            $('#email').prop('readonly', false);

            $('input[name="status"]')
                .prop('disabled', false);

            $('input[name="role_id"]')
                .prop('disabled', false);

            return;
        }


        // -----------------------------------------------------
        // DETAIL / EDIT USER
        // -----------------------------------------------------

        let isReadOnly = title === 'Detail';

        $('#userModalLabel').text(
            isReadOnly ?
            'Detail User' :
            'Edit User'
        );

        $status.removeClass('d-none');


        // -----------------------------------------------------
        // AJAX GET USER  (route: admin.master.user.show)
        // -----------------------------------------------------

        $.ajax({

            url: $form.data('base-url') + '/' + id,

            type: 'GET',

            dataType: 'json',

            success: function(data) {

                setFormData(data, isReadOnly);


                // DETAIL
                if (isReadOnly) {

                    $actionButton.hide();

                    $form.attr('action', '');

                }

                // EDIT  (route: admin.master.user.update)
                else {

                    $actionButton
                        .text('Ubah')
                        .show();

                    $form.attr(
                        'action',
                        $form.data('base-url') + '/' + id
                    );

                    $formMethod.val('PUT');

                }

            },

            error: function() {

                toastr.error(
                    'Server error occurred',
                    'Error', {
                        closeButton: true,
                        progressBar: true
                    }
                );

            }

        });

    }


    // =========================================================
    // PREVIEW IMAGE
    // =========================================================

    function previewImage() {

        const image = $('#image');
        const imgPreview = $('.img-preview');
        const file = image[0].files[0];

        if (!file) {
            return;
        }

        const reader = new FileReader();

        reader.onload = function(event) {

            imgPreview.attr(
                'src',
                event.target.result
            );

        };

        reader.readAsDataURL(file);

        $('.custom-file-label').text(file.name);

        $('#reset').removeClass('d-none');

    }


    // =========================================================
    // RESET IMAGE
    // =========================================================

    function resetImage() {

        const imgPreview = $('.img-preview');
        const oldImage = $('#oldImage').val();

        if (oldImage) {

            imgPreview.attr(
                'src',
                APP_URL + '/storage/' + oldImage
            );

        } else {

            imgPreview.attr('src', '');

        }

        $('#image').val('');

        $('.custom-file-label').text(
            'Pilih file...'
        );

        $('#reset').addClass('d-none');

    }


    // =========================================================
    // HAPUS USER
    // =========================================================

    $(document).on('click', '.hapus-data', function() {

        let form = $(this).closest('form');

        let namaUser = $(this)
            .closest('tr')
            .find('.nama-user')
            .text()
            .trim();

        if (
            confirm(
                'Yakin ingin menghapus data user ' +
                namaUser +
                '?'
            )
        ) {

            form.submit();

        }

    });


    // =========================================================
    // ERROR VALIDASI
    // =========================================================

    @error('image')
    toastr.error('{{ $message }}');
    @enderror

    @error('email')
    toastr.error('{{ $message }}');
    @enderror
</script>

@endpush