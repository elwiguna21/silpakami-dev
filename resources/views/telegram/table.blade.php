@extends('layouts.layoutAdmin')
@section('menu')
<?php $item = 'daftarTelegram'; ?>
@endsection

@section('css')
<!-- Datatables -->
<link href="{{asset('hud/plugins/datatables.net-bs5/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
<link href="{{asset('hud/plugins/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css')}}" rel="stylesheet" />
<link href="{{asset('hud/plugins/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css')}}"
    rel="stylesheet" />
<link href="{{asset('hud/plugins/bootstrap-table/dist/bootstrap-table.min.css')}}" rel="stylesheet" />
@endsection
@section('content')
<div id="content" class="app-content">
    <div class="container">

        <div class="row">
            <div class="mb-3">
                <div class="form-group">
                    <a href="{{route('telegram.addform')}}" class="btn btn-theme">
                        Tambah Nomor
                    </a>
                </div>
            </div>
            <div class="mb-3">
                <h3>Daftar Nomor Telegram</h3>
            </div>

            <div class="mb-3">

                <form action="" method="get">
                    <div class="pull-right form-group">
                        <input type="text" name="search" class="form-control" value="{{$search}}"
                            placeholder="Cari Telegram">
                    </div>
                </form>
            </div>
            <div class="col md-12">
                <div id="datatable" class="mb-5">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-responsive">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Nomor</th>
                                        <th>Chat ID</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                @foreach($telegrams as $telegram)
                                <tbody>
                                    <tr class="row-clicked">
                                        <td>{{$telegram['name']}}</td>
                                        <td>{{$telegram['number']}}</td>
                                        <td>{{$telegram['chat_id']}}</td>
                                        <td>
                                            <a class="btn btn-outline-warning"
                                                href="{{route('telegram.editform',['id'=>$telegram['id']])}}">
                                                <i class="fa fa-edit"></i>
                                                Edit
                                            </a>
                                            <a href="#" class="btn btn-outline-danger"
                                                onclick="showDeleteModal({{$telegram['id']}})">
                                                <i class="fa fa-trash"></i>
                                                Hapus
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>

                                @endforeach
                            </table>
                        </div>
                        <div class="card-arrow">
                            <div class="card-arrow-top-left"></div>
                            <div class="card-arrow-top-right"></div>
                            <div class="card-arrow-bottom-left"></div>
                            <div class="card-arrow-bottom-right"></div>
                        </div>
                        <div class="card-body text-center">
                            {{$telegrams->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- modal delete --}}
<div class="modal fade bs-example-modal-lg" id="delete" tabindex="-1" role="dialog" aria-hidden="true">
    <form class="form-horizontal form-label-left" action="/admin/telegram/delete" method="GET">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Hapus Nomor Telegram</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    Anda Yakin Ingin Menghapus Nomor Telegram ?
                    {{ csrf_field() }}
                    <input type="hidden" id="id" name="id">
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

<script>
    function showDeleteModal(id) {
        $('#id').val(id);
        $('#delete').modal('show');
    }
</script>