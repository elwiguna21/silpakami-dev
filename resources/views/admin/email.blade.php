@extends('layouts.layoutAdmin')

@section('menu')
<?php $item = 'pembuatanEmail'; ?>
@endsection

@section('css')
<!-- Datatables -->
<link href="{{asset('hud/plugins/datatables.net-bs5/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
<link href="{{asset('hud/plugins/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css')}}" rel="stylesheet" />
<link href="{{asset('hud/plugins/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css')}}"
  rel="stylesheet" />
<link href="{{asset('hud/plugins/bootstrap-table/dist/bootstrap-table.min.css')}}" rel="stylesheet" />
<!-- Dropzone.js -->
<link href="{{asset ('gente/vendors/dropzone/dist/min/dropzone.min.css')}}" rel="stylesheet">
<!-- bootstrap-datetimepicker -->
<link href="{{asset ('gente//vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css')}}"
  rel="stylesheet">
<!--file input-->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/css/fileinput.min.css" media="all"
  rel="stylesheet" type="text/css" />
{{-- Select2--}}
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"
  type="text/css" />
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
            <h3 class="page-header">
              Pengajuan Pembuatan Email</small>
            </h3>
            <button type="button" class="btn btn-theme" data-bs-toggle="modal" data-bs-target="#print"><i
                class="fa fa-print"></i>
              Print Pembuatan Email</button>
            <hr class="mb-4" />
            <div id="datatable" class="mb-5">
              <div class="card">
                <div class="card-body">
                  <table id="members-table" class="table table-responsive">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Nama Pemohon</th>
                        <th>Instansi</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Dokumen</th>
                        <th>Status</th>
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



{{-- modal approve --}}
<div class="modal fade bs-example-modal-lg" id="aproved" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Ijinkan Permohonan</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        Anda Yakin Ingin Mengijinkan Permohonan ?
        <form class="form-horizontal form-label-left" action="{{route('emailaprove')}}" method="POST">
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
</div>

{{-- modal print --}}
<div id="print" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Print</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal form-label-left" action="{{route('laporanSeInput')}}" method="POST"
          enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
            <label class="control-label col-md-3" for="last-name">Dari Tanggal - <span class="required">*</span>
            </label>
            <div class="col-md-7">
              <input type="date" id="last-name2" name="startdate" required="required"
                class="form-control col-md-7 col-xs-12">
              <input type="hidden" id="jenis" name="jenis" required="required" class="form-control col-md-7 col-xs-12"
                value="pembuatan">
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

{{-- modal denied --}}
<div class="modal fade bs-example-modal-lg" id="denied" tabindex="-1" role="dialog" aria-hidden="true">
  <form class="form-horizontal form-label-left" action="{{route('emaildenied')}}" method="POST">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Tolak Permohonan</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <p>Anda Yakin Ingin Menolak Permohonan ?</p>

          {{ csrf_field() }}
          <label>Masukan Alasan Penolakan*</label>
          <textarea required name="alasan_penolakan" id="alasan_penolakan" class="form-control"></textarea>
          <input type="hidden" id="iddenied" name="iddenied">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-bs-dismiss="modal">Tidak</button>
          <button type="submit" class="btn btn-danger">Ya</button>
        </div>

      </div>
    </div>
  </form>

</div>



{{--Modal Alasan Penolakan--}}
<div class="modal fade" id="modalReason" tabindex="-1" role="dialog" aria-labelledby="modalReason" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Alasan Penolakan</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body" id="display-reason">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


{{-- modal published --}}
<div class="modal fade bs-example-modal-lg" id="published" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Terbitkan Permohonan</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        Anda Yakin Ingin Menerbitkan Permohonan ?
        <form class="form-horizontal form-label-left" action="{{route('emailpublished')}}" method="POST">
          {{ csrf_field() }}
          <input type="hidden" id="idpublished" name="idpublished">
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
  if ($('#input-24').length) {
    $("#input-24").fileinput({
      showUpload: false,
      fileActionSettings: { 'showUpload': false },
      uploadUrl: '/',
      previewFileType: 'any'
    });
  }


  $(document).on('click', '#baproved', function () {
    var id = $(this).data('id');
    $('#idaprove').val(id);
  });
  $(document).on('click', '#bdenied', function () {
    var id = $(this).data('id');
    $('#iddenied').val(id);
  });
  $(document).on('click', '#bpublished', function () {
    var id = $(this).data('id');
    $('#idpublished').val(id);
  });

  $(document).on('click', '.btn-reason', function () {
    $('#modalReason').modal('show');
    $('#display-reason').html($(this).data('reason'))
  });

  $('#members-table').DataTable({
    destroy: true,
    processing: true,
    serverSide: true,
    method: 'GET',
    ajax: '{{URL::to("/admin/email/getdata")}}',
    columns: [
      { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
      { data: 'nama_pemohon', name: 'nama_pemohon' },
      { data: 'nama_ins', name: 'instansis.nama_ins' },
      { data: 'created_at', name: 'emails.created_at' },
      {
        data: 'path', name: 'path', render: function (data, type, row) {
          return "<a href=" + row.path + ">Download</a>"
        }
      },
      // {
      //   data: 'ktp_path', name: 'ktp_path', render: function (data, type, row) {
      //     return "<a href=" + row.ktp_path + ">download</a>"
      //   }
      // },
      { data: 'status', name: 'status', orderable: false, searchable: false },
      { data: 'action', name: 'action', orderable: false, searchable: false }
    ]
  });
</script>
@endsection
