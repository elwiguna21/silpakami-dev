@extends('layouts.layoutAdmin')
@section('menu')
<?php $item = 'insidenHandling'; ?>
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
            <h3 class="page-header">
              Laporan Insiden
            </h3>
            <button type="button" class="btn btn-theme" data-bs-toggle="modal" data-bs-target="#print"><i
                class="fa fa-print"></i>
              Print Data Insiden</button>
            <hr class="mb-4" />
            <div id="datatable" class="mb-5">
              <div class="card">
                <div class="card-body">
                  <table id="members-table" class="table table-responsive">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Instansi</th>
                        <th>Tanggal Laporan</th>
                        <th>Status</th>
                        <th style="width:160px ;">Action</th>
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

{{-- modal finish --}}
<div class="modal fade bs-example-modal-lg" id="finish" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Insiden Sudah ditangani</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        Anda Yakin Insiden Sudah ditangani ?
        <form class="form-horizontal form-label-left" action="{{route('incidentfinish')}}" method="POST">
          {{ csrf_field() }}
          <input type="hidden" id="idfinish" name="idfinish">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Tidak</button>
        <button type="submit" class="btn btn-danger">Ya</button>
        </form>
      </div>

    </div>
  </div>
</div>

{{-- modal approve --}}
{{-- <div class="modal fade bs-example-modal-lg" id="aproved" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Proses Laporan</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        Anda Yakin Ingin Memproses Laporan ?
        <form class="form-horizontal form-label-left" action="{{route('incidentaprove')}}" method="POST">
          {{ csrf_field() }}
          <input type="hidden" id="idaprove" name="idaprove">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Tidak</button>
        <button type="submit" class="btn btn-danger">Ya</button>
        </form>
      </div>

    </div>
  </div>
</div> --}}

{{-- modal denied --}}
<div class="modal fade bs-example-modal-lg" id="denied" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Tolak Laporan</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        Anda Yakin Ingin Menolak Laporan ?
        <form class="form-horizontal form-label-left" action="{{route('incidentdenied')}}" method="POST">
          {{ csrf_field() }}
          <input type="hidden" id="iddenied" name="iddenied">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Tidak</button>
        <button type="submit" class="btn btn-danger">Ya</button>
        </form>
      </div>

    </div>
  </div>
</div>

{{-- modal print --}}
<div class="modal fade print" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Print</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal form-label-left" action="{{route('laporanprint')}}" method="POST"
          enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
            <label class="control-label col-md-3" for="last-name">Dari Tanggal - <span class="required">*</span>
            </label>
            <div class="col-md-7">
              <input type="date" id="last-name2" name="startdate" required="required"
                class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3" for="last-name">Sampai Tanggal - <span class="required">*</span>
            </label>
            <div class="col-md-7">
              <input type="date" id="last-name2" name="enddate" required="required"
                class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3" for="last-name">Pilih SKPD <span class="required">*</span>
            </label>
            <div class="col-md-7">
              <select id="instansi" name="instansi" class="form-control" required>
                <option value="semua">semua</option>
                @foreach($instansi as $key => $p)
                <option value="{!!$key!!}">{!!$p!!}</option>
                @endforeach
              </select>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Keluar</button>
        <button type="submit" class="btn btn-theme">Print</button>
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
<!-- <script src="{{asset('hud/js/demo/table-plugins.demo.js')}}"></script> -->
<script>

  $(document).on('click', '#bdetail', function () {
    var nama = $(this).data('nama');
    var instansi = $(this).data('instansi');
    var tgl_mulai = $(this).data('tgl_mulai');
    var tgl_akhir = $(this).data('tgl_akhir');
    var lokasi_ruangan = $(this).data('lokasi_ruangan');
    var luas_ruangan = $(this).data('luas_ruangan');
    var kegiatan = $(this).data('kegiatan');

    $('#nama').val(nama);
    $('#instansi').val(instansi);
    $('#tgl_mulai').val(tgl_mulai);
    $('#tgl_akhir').val(tgl_akhir);
    $('#lokasi_ruangan').val(lokasi_ruangan);
    $('#luas_ruangan').val(luas_ruangan);
    $('#kegiatan').val(kegiatan);

  });

  $(document).on('click', '#baproved', function () {
    var id = $(this).data('id');
    $('#idaprove').val(id);
  });

  $(document).on('click', '#bfinish', function () {
    var id = $(this).data('id');
    $('#idfinish').val(id);
  });

  $(document).on('click', '#bdenied', function () {
    var id = $(this).data('id');
    $('#iddenied').val(id);
  });

  $('#members-table').DataTable({
    destroy: true,
    processing: true,
    serverSide: true,
    method: 'GET',
    ajax: '{{URL::to("/admin/IncidentHandling/getdata")}}',
    columns: [
      { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
      { data: 'nama', name: 'users.nama' },
      { data: 'nama_ins', name: 'instansis.nama_ins' },
      { data: 'created_at', name: 'incidents.created_at' },
      { data: 'status', name: 'status', orderable: false, searchable: false },
      { data: 'action', name: 'action', orderable: false, searchable: false }
    ]
  });
</script>
@endsection