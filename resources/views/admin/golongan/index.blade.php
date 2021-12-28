@extends('layouts.layoutAdmin')
@section('menu')
<?php $item = 'golongan'; ?>
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

    <div class="row justify-content-center">

      <div class="col-xl-12">

        <div class="row">

          @if(session('error'))
          <div class="alert alert-danger alert-dismissable fade show p-3">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>{{session('error')}}</strong>
          </div>
          @endif
          @if(session('success'))
          <div class="alert alert-success alert-dismissable fade show p-3">
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            <strong>{{session('success')}}</strong>
          </div>
          @endif
          <div class="col-xl-12">
            <button type="button" onclick="showModal()" class="btn btn-theme">Tambah Golongan</button>
            <hr />
            <h4 class="page-header">
              Master Golongan
            </h4>
            <!-- <a href="{{ route('golongan_sync') }}" type="button" class="btn btn-theme" >
            <i class="fa fa-refresh" aria-hidden="true"></i> Sync</a>
            </a> -->
            <hr />
            <div id="datatable" class="mb-5">
              <div class="card">
                <div class="card-body">
                  <table id="members-table" class="table table-responsive">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Nama Golongan</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    </tbody>
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
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
       <h4 class="modal-title" id="myModalLabel">Golongan</h4>
       <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal form-label-left" action="{{route('golongan_post')}}" method="POST">
          {{ csrf_field() }}
          <div class="form-group">
            <label class="control-label col-md-3" for="first-name">Nama Golongan<span class="required">*</span>
            </label>
            <div class="col-md-7">
              <input type="text" id="nama_gol" name="nama_gol" required="required"
                class="form-control col-md-7 col-xs-12">
              <input type="hidden" id="id_table" name="id" required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Keluar</button>
        <input type="submit" class="btn btn-theme" value="OK">
        </form>
      </div>

    </div>
  </div>
</div>

{{-- modal delete --}}
<div class="modal fade bs-example-modal-lg" id="delete" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
       <h4 class="modal-title" id="myModalLabel">Hapus</h4>
       <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        Anda Yakin Ingin Menghapus ?
        <form class="form-horizontal form-label-left" action="/admin/golongan/delete" method="POST">
          {{ csrf_field() }}
          <input type="hidden" id="idd" name="idd">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Tidak</button>
        <button type="submit" class="btn btn-danger">Ya</button>
        </form>
      </div>

    </div>
  </div>
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

  function showEditModal(id) {
    $.getJSON('/admin/golongan/getDataById/' + id, function (response) {
      if (response) {
        $('#id_table').val(response.id);
        $('#nama_gol').val(response.nama_gol);
      }
    });
    $('#tambah').modal('show');
  }

  function showDeleteModal(id) {
    $.getJSON('/admin/golongan/getDataById/' + id, function (response) {
      if (response) {
        $('#idd').val(response.id);
      }
    });
    $('#delete').modal('show');
  }

  function showModal() {
    $('#id_table').val('');
    $('#nama_gol').val('');
    $('#tambah').modal('show');
  }


  $('#members-table').DataTable({
    destroy: true,
    processing: true,
    serverSide: true,
    method: 'GET',
    ajax: '{{URL::to("/admin/golongan/getdata")}}',
    columns: [
      { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
      { data: 'nama_gol', name: 'nama_gol' },
      { data: 'action', name: 'action', orderable: false, searchable: false }
    ]
  });
</script>
@endsection