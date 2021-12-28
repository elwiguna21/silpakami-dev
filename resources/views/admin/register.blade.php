@extends('layouts.layoutAdmin')

@section('menu')
<?php $item = 'akun'; ?>
@endsection

@section('css')
<!-- Datatables -->
<link href="{{asset('hud/plugins/datatables.net-bs5/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
<link href="{{asset('hud/plugins/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css')}}" rel="stylesheet" />
<link href="{{asset('hud/plugins/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css')}}"
    rel="stylesheet" />
<link href="{{asset('hud/plugins/bootstrap-table/dist/bootstrap-table.min.css')}}" rel="stylesheet" />
<link href="{{asset('hud/plugins/select-picker/dist/picker.min.css')}}" rel="stylesheet" />

@endsection

@section('content')

<div id="content" class="app-content">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-xl-12">

                <div class="row">

                    @if(session('error'))
                    <div class="alert alert-danger alert-dismissable fade show p-3">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        <strong>Error!</strong> Data gagal terkirim
                    </div>
                    @endif
                    @if(session('success'))
                    <div class="alert alert-success alert-dismissable fade show p-3">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        <strong>Sukses!</strong> Data berhasil terkirim
                    </div>
                    @endif


                    <div class="col-xl-12">
                        <button type="button" onclick="showModal()" class="btn btn-theme">Tambah Akun</button>
                        <hr />
                        <h3 class="page-header">
                            Registrasi Akun Pengguna <small>per SKPD</small>
                        </h3>
                        <hr class="mb-4" />
                        <div id="datatable" class="mb-5">
                            <div class="card">
                                <div class="card-body">
                                    <table id="members-table" class="table table-responsive">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama</th>
                                                <th>SKPD</th>
                                                <th>Jabatan</th>
                                                <th>Last Login</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="card-arrow">
                                    <div class="card-arrow-top-left"></div>
                                    <div class="card-arrow-top-right"></div>
                                    <div class="card-arrow-bottom-left"></div>
                                    <div class="card-arrow-bottom-right"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- modal ajukan --}}
<div id="tambah" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Register Pengguna</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form class="form-horizontal form-label-left" action="{{route('register.user')}}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">

                    <div class="row">
                        <div class="col-xl-6">
                            <div class="form-group mb-3">
                                <label class="control-label col-md-3" for="first-name">NIP <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-11">
                                    <input type="text" id="nip" name="nip" required="required"
                                        class="form-control col-md-7 col-xs-12">
                                    <input type="hidden" id="id_user" name="id" required="required"
                                        class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="control-label col-md-3" for="first-name">NIK <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-11">
                                    <input type="text" id="nik" name="nik" required="required"
                                        class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="control-label col-md-3" for="first-name">Nama <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-11">
                                    <input type="text" id="nama" name="nama" required="required"
                                        class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="control-label col-md-3" for="first-name">Jenis Kelamin <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-11">
                                    <select id="jk" name="jenis_kelamin" class="form-control"
                                        style="width:100%;background-color: #1f2a35;" required>
                                        <option value="1">Laki - Laki</option>
                                        <option value="2">Perempuan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="control-label col-md-3" for="first-name">Email <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-11">
                                    <input type="email" id="email" name="email" required="required"
                                        class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="control-label col-md-3" for="first-name">No Hp <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-11">
                                    <input type="text" id="nohp" name="hp" required="required"
                                        class="form-control col-md-7 col-xs-12">
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <div class="form-group mb-3">
                                <label class="control-label col-md-3" for="first-name">Golongan 
                                </label>
                                <div class="col-md-11">
                                    <select id="gol" name="golongan_id" class="form-control"
                                        style="width:100%;background-color: #1f2a35;">
                                        <option value="">Choose..</option>
                                        @foreach($golongan as $key => $p)
                                        <option value="{!!$key!!}">{!!$p!!}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="control-label col-md-3" for="first-name">Password <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-11">
                                    <input type="password" id="password" autocomplete="set_no_password" name="password"
                                        class="form-control col-md-7 col-xs-12">
                                    <span class="text-info warning-password">
                                        * Biarkan kosong jika tidak ingin diganti
                                    </span>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="control-label col-md-3" for="first-name">Instansi<span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-11">
                                    <select id="unker" name="unit_kerja_id" class="form-control"
                                        style="width:100%;background-color: #1f2a35;" required>
                                        <option value="">Pilih unit..</option>
                                        @foreach($unit as $key => $p)
                                        <option value="{!!$key!!}">{!!$p!!}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="control-label col-md-3" for="first-name">Jabatan <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-11">
                                    <select id="jab" name="jabatan_id" class="form-control">
                                        <option value="">Pilih Jabatan..</option>
                                        @foreach($jabatan as $key => $p)
                                        <option value="{!!$key!!}">{!!$p!!}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="control-label col-md-3" for="first-name">Role <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-11">
                                    <select id="role" name="role" class="form-control"
                                        style="width:100%;background-color: #1f2a35;" required>
                                        <option value="">Pilih Role..</option>
                                        @foreach($role as $key => $p)
                                        <option value="{!!$key!!}">{!!$p!!}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Keluar</button>
                    <input type="submit" class="btn btn-theme" value="OK">
                </div>
            </form>
        </div>
    </div>
</div>




{{-- modal delete --}}
<div class="modal fade bs-example-modal-lg" id="delete" tabindex="-1" role="dialog" aria-hidden="true">
    <form class="form-horizontal form-label-left" action="/admin/register/delete" method="POST">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Hapus Akun</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    Anda Yakin Ingin Menghapus Akun ?
                    {{ csrf_field() }}
                    <input type="hidden" id="idd" name="idd">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-danger">Ya</button>
                </div>
            </div>
        </div>
    </form>
</div>

@endsection

@section('script')
<!-- <script src="{{asset('hud/plugins/highlight.js/highlight.min.js')}}" ></script> -->
<!-- <script src="{{asset('hud/js/demo/highlightjs.demo.js')}}" ></script> -->
<script src="{{asset('hud/plugins/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('hud/plugins/datatables.net-bs5/js/dataTables.bootstrap5.min.js')}}"></script>
<script src="{{asset('hud/plugins/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('hud/plugins/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
<script src="{{asset('hud/plugins/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('hud/plugins/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('hud/plugins/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('hud/plugins/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js')}}"></script>
<script src="{{asset('hud/plugins/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('hud/plugins/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js')}}"></script>
<script src="{{asset('hud/plugins/bootstrap-table/dist/bootstrap-table.min.js')}}"></script>
<script src="{{asset('hud/js/demo/table-plugins.demo.js')}}"></script>
<script src="{{asset('hud/plugins/select-picker/dist/picker.min.js')}}"></script>


<script>
    // $(document).ready(function () {
    //     $('select').attr('style', 'width:100%');
    //     $('select').select2({
    //         dropdownParent: $('#tambah')
    //     });
    // })
    function showEditModal(id) {
        $.getJSON('register/getDataById/' + id, function (response) {
            if (response) {
                $('#id_user').val(response.id);
                $('#nip').val(response.nip);
                $('#nik').val(response.nik);
                $('#nama').val(response.nama);
                $("#gol").val(response.golonganid).change();
                $("#role").val(response.rolesid).change();
                $("#jab").val(response.jabatanid).picker({ search: true });
                $('#nohp').val(response.hp);
                $("#jk").val(response.jenis_kelamin).change();
                $("#ins").val(response.instansiid).change();
                $("#unker").val(response.unitid).change();
                $('#email').val(response.email);
                $(".warning-password").show();
                $("input[name=password]").val('');

            }
        });
        $('#tambah').modal('show');
    }

    function showModal() {
        $('#id_user').val('');
        $('#nip').val('');
        $('#nik').val('');
        $('#nama').val('');
        $("#gol").val('').change();
        $("#role").val('').change();
        $("#jab").val('').change().picker({ search: true });
        $('#nohp').val('');
        $("#jk").val('').change();
        $("#ins").val('').change();
        $("#unker").val('').change();
        $('#email').val('');
        $(".warning-password").hide();
        $("input[name=password]").val('');
        $('#tambah').modal('show');
    }

    function showDeleteModal(id) {
        $.getJSON('/admin/register/getDataById/' + id, function (response) {
            if (response) {
                $('#idd').val(response.id);
            }
        });
        $('#delete').modal('show');
    }


    $('#members-table').DataTable({
        destroy: true,
        processing: true,
        serverSide: true,
        method: 'GET',
        ajax: '{{URL::to("/admin/register/getdata")}}',
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
            { data: 'nama', name: 'nama' },
            { data: 'instansi', name: 'instansi' },
            { data: 'jabatan', name: 'jabatan' },
            { data: 'last_login', name: 'last_login' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });

</script>
@endsection