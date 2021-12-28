@extends('layouts.layoutUser')
@section('menu')
<?php $item = 'permintaanLayanan'; ?>
@endsection
@section('css')
<!-- Datatables -->
<link href="{{asset('hud/plugins/datatables.net-bs5/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
<link href="{{asset('hud/plugins/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css')}}" rel="stylesheet" />
<link href="{{asset('hud/plugins/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css')}}"
  rel="stylesheet" />
<link href="{{asset('hud/plugins/bootstrap-table/dist/bootstrap-table.min.css')}}" rel="stylesheet" />

<link href="{{asset('hud/plugins/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet" />


{{-- Select2--}}
<!-- <link href="{{asset('hud/css/select2.css')}}" rel="stylesheet"/> -->
<link href="{{asset('hud/css/select2.min.css')}}" rel="stylesheet" />
<!--file input-->
<link href="{{asset('hud/css/fileinput.min.css')}}" rel="stylesheet" />

<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/css/fileinput.min.css" media="all"
  rel="stylesheet" type="text/css" /> -->
<!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"
  type="text/css" /> -->

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

          @if (count($errors) > 0)
          <div class="alert alert-success alert-dismissable fade show p-3">
            <button type="button" class="close pull-right" data-bs-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <p>Perhatian!</p>
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
              @endforeach
            </ul>
          </div>
          @endif


          <div class="col-xl-12">
            <button type="button" class="btn btn-theme" data-bs-toggle="modal" data-bs-target="#ajukan">Ajukan
              Permohonan
              Jamming</button>
            <!-- <a href="{{route('jamming.display_schedule')}}" class="btn btn-success" id="btn-jaming">Tampilkan Jadwal
              Jamming</a> -->
            <hr class="mb-4" />

            <h3 class="page-header">
              Layanan Jamming <small>per SKPD</small></h3>
            <hr class="mb-4" />

            <div id="datatable" class="mb-5">
              <div class="card">
                <div class="card-body">
                  <table id="members-table" class="table table-responsive">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Kegiatan</th>
                        <th>Status</th>
                        <th>Alasan Penolakan (Jika ditolak)</th>
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
<div id="ajukan" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form class="form-horizontal form-label-left" action="{{route('layananinsert')}}" method="POST"
        enctype="multipart/form-data">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Pengajuan Permohonan Layanan Jamming</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          {{ csrf_field() }}
          <div class="mb-3 row">
            <label class="control-label col-md-3" for="last-name">Tanggal dan waktu pemesanan <span
                class="required">*</span></label>
            <div class="col-md-9">
              <div class="input-group" id="default-daterange" >
                <input type="text" name="tgl" class="form-control" />
                <label class="input-group-text"><i class="fa fa-calendar"></i></label>
              </div>
            </div>
          </div>
          <div class="mb-3 row">
            <label class="control-label col-md-3" for="last-name">Lokasi Ruangan <span class="required">*</span>
            </label>
            <div class="col-md-9">
              <input type="text" id="last-name2" name="lokasi" required="required"
                class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="mb-3 row">
            <label class="control-label col-md-3" for="last-name">Luas Ruangan (m2)<span class="required">*</span>
            </label>
            <div class="col-md-9">
              <input type="text" id="last-name2" name="luas" required="required"
                class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="mb-3 row">
            <label class="control-label col-md-3" for="last-name">Keterangan Kegiatan <span class="required">*</span>
            </label>
            <div class="col-md-9">
              <textarea id="message" required="required" class="form-control" name="kegiatan"
                data-parsley-trigger="keyup" data-parsley-minlength="3" data-parsley-maxlength="100"
                data-parsley-minlength-message="Come on! You need to enter at least a 5 caracters long comment.."
                data-parsley-validation-threshold="10"></textarea>
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Upload Dokumen Permohonan Layanan Jamming [PDF]</label>
            <div class="col-sm-9">
              <input id="input-24" name="files" type="file" required="required">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-bs-dismiss="modal">Keluar</button>
          <button type="submit" class="btn btn-primary">Ajukan</button>
        </div>
      </form>
    </div>
  </div>
</div>

{{-- modal cancel --}}
<div class="modal fade bs-example-modal-lg" id="cancle" tabindex="-1" role="dialog" aria-hidden="true">
  <form class="form-horizontal form-label-left" action="{{route('layanancancel')}}" method="POST">

    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Batalkan Permohonan</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          Anda Yakin Ingin Membatalkan Permohonan ?
          {{ csrf_field() }}
          <input type="hidden" id="idcancel" name="idcancel">
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

<script src="{{asset('hud/plugins/moment/min/moment.min.js')}}"></script>
<script src="{{asset('hud/plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

<script src="{{asset('hud/js/cloudflare/select2.min.js')}}"></script>
<script src="{{asset('hud/js/cloudflare/fileinput.min.js')}}"></script>

<!-- Page script -->
<!-- piexif.min.js is needed for auto orienting image files OR when restoring exif data in resized images and when you
      wish to resize images before upload. This must be loaded before fileinput.min.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/plugins/piexif.min.js"
  type="text/javascript"></script>
<!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview.
                This must be loaded before fileinput.min.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/plugins/sortable.min.js"
  type="text/javascript"></script>
<!-- purify.min.js is only needed if you wish to purify HTML content in your preview for
                HTML files. This must be loaded before fileinput.min.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/plugins/purify.min.js"
  type="text/javascript"></script>
<!-- popper.min.js below is needed if you use bootstrap 4.x (for popover and tooltips). You can also use the bootstrap js
                3.3.x versions without popper.min.js. -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<!-- the main fileinput plugin file -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/fileinput.min.js"></script> -->
<!-- following theme script is needed to use the Font Awesome 5.x theme (`fas`) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/themes/fas/theme.min.js"></script>

<script>
  $('#default-daterange').daterangepicker({
    opens: 'right',
    timePicker: true,
    timePickerIncrement: 30,
    locale: {
      format: 'MM/DD/YYYY h:mm A'
    },
    separator: ' to ',
    startDate: moment(),
    endDate: moment(),
  },
    function (start, end) {
      $('#default-daterange input').val(start.format('MM/DD/YYYY h:mm A') + ' - ' + end.format('MM/DD/YYYY h:mm A'));
    }
  );

  $("#input-24").fileinput({
    showUpload: false,
    dropZoneEnabled: false,
    previewFileType: ["pdf"],
    allowedFileExtensions: ["pdf"],
    layoutTemplates: {
      main1: "{preview}\n" +
        "<div class=\'input-group {class}\'>\n" +
        "   <div class=\'input-group-btn\ input-group-prepend'>\n" +
        "       {browse}\n" +
        "       {upload}\n" +
        "       {remove}\n" +
        "   </div>\n" +
        "   {caption}\n" +
        "</div>"
    }
  });

  $(document).on('click', '#bcancel', function () {
    var id = $(this).data('id');
    $('#idcancel').val(id);
  });

  $('#members-table').DataTable({
    destroy: true,
    processing: true,
    serverSide: true,
    method: 'GET',
    ajax: '{{URL::to("/user/layanan/getdata")}}',
    columns: [
      { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
      { data: 'nama', name: 'users.nama' },
      { data: 'created_at', name: 'jammings.created_at' },
      { data: 'kegiatan', name: 'kegiatan' },
      { data: 'status', name: 'status', orderable: false, searchable: false },
      { data: 'alasan_penolakan', name: 'alasan_penolakan', orderable: false, searchable: false },
      { data: 'action', name: 'action', orderable: false, searchable: false }
    ]
  });

</script>
@endsection