@extends('layouts.layoutUser')
@section('menu')
<?php $item = 'perubahanSE'; ?>
@endsection

@section('css')
<!-- Datatables -->
<link href="{{asset('hud/plugins/datatables.net-bs5/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet" />
<link href="{{asset('hud/plugins/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css')}}" rel="stylesheet" />
<link href="{{asset('hud/plugins/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css')}}"
  rel="stylesheet" />
<link href="{{asset('hud/plugins/bootstrap-table/dist/bootstrap-table.min.css')}}" rel="stylesheet" />
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
            <button type="button" class="btn btn-theme" data-bs-toggle="modal" data-bs-target="#ajukan">Ajukan Perubahan
              Sertifikat</button>
            <hr class="mb-4" />

            <h3 class="page-header">
              Pengajuan Perubahan Sertifikat <small>per SKPD</small></h3>
            <hr class="mb-4" />
            <div id="datatable" class="mb-5">
              <div class="card">
                <div class="card-body">
                  <table id="members-table" class="table table-responsive">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Nama Pemohon</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Jabatan Lama</th>
                        <th>Jabatan Baru</th>
                        <th>Instansi Lama</th>
                        <th>Instansi Baru</th>
                        <th>Status</th>
                        <th>Alasan Penolakan (Jika ditolak)</th>
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
<div id="ajukan" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Pengajuan Perubahan Data Sertifikat Elektronik</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <h4>Ikuti Langkah Berikut</h4>
        <p>1. Buat Surat Permohonan perubahan data SE melalui e-office ditujukan ke Diskominfosanditik </p>
        <p> - Contoh Surat Permohonan perubahan data SE <a href="/file/Form Perubahan Data Sertifikat Elektronik.doc">
            [Download Dokumen]</a></p>
        <p>2. Download Surat yang telah di tandatangani oleh kepala SKPD </p>
        <p>3. Lengkapi form berikut dan upload surat yang telah di download </p>
        <br>
        <br>
        <form action="{{Route('perubahanseinsert')}}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="mb-3 row">
            <label class="control-label col-md-3" for="last-name">Nama Pemohon <span class="required">*</span>
            </label>
            <div class="col-md-9">
              <select class="form-control" style="width: 100%" name="select_nama_pegawai"
                id="select-nama-pegawai"></select>
              <input type="hidden" id="nama_pemohon" name="nama_pemohon" required="required"
                class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="mb-3 row">
            <label class="control-label col-md-3" for="last-name">NIP<span class="required">*</span>
            </label>
            <div class="col-md-9">
              <input type="text" id="nip" name="nip" required="required" class="form-control col-md-7 col-xs-12">
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Dinas Lama</label>
            <div class="col-sm-9">
              <input id="dinaslama" class="form-control" name="dinaslama" type="text">
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Dinas Baru</label>
            <div class="col-sm-9">
              <input id="dinasbaru" class="form-control" name="dinasbaru" type="text">
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Jabatan Lama</label>
            <div class="col-sm-9">
              <input id="jablama" class="form-control" name="jablama" type="text">
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Jabatan Baru</label>
            <div class="col-sm-9">
              <input id="jabbaru" class="form-control" name="jabbaru" type="text">
            </div>
          </div>
          <div class="mb-3 row">
            <label class="col-sm-3 col-form-label">Upload Dokumen Perubahan [PDF]</label>
            <div class="col-sm-9">
              <input id="input-24" name="files" type="file">
            </div>
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Keluar</button>
        <button type="submit" class="btn btn-theme">Ajukan</button>
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
<script src="{{asset('hud/js/cloudflare/select2.min.js')}}"></script>
<script src="{{asset('hud/js/cloudflare/fileinput.min.js')}}"></script>
<!--file input-->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/css/fileinput.min.css" media="all"
  rel="stylesheet" type="text/css" />
<!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script> -->
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

  $('#members-table').DataTable({
    destroy: true,
    processing: true,
    serverSide: true,
    method: 'GET',
    ajax: '{{URL::to("/user/perubahan_se/getdata")}}',
    columns: [
      { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
      { data: 'nama_pemohon', name: 'nama_pemohon' },
      { data: 'created_at', name: 'perubahan_ses.created_at' },
      { data: 'jabatan_lama', name: 'perubahan_ses.jabatan_lama' },
      { data: 'jabatan_baru', name: 'perubahan_ses.jabatan_baru' },
      { data: 'instansi_lama', name: 'perubahan_ses.instansi_lama' },
      { data: 'instansi_baru', name: 'perubahan_ses.instansi_baru' },
      { data: 'status', name: 'status', orderable: false, searchable: false },
      { data: 'alasan_penolakan', name: 'alasan_penolakan', orderable: false, searchable: false }
    ]
  });
  $(document).ready(function () {
    $('#select-nama-pegawai').select2({
      dropdownParent: $('#ajukan'),
      ajax: {
        delay: 250,
        methods: 'get',
        minimumInputLength: 3,
        url: '{{route('api.pegawai.search')}}',
        dataType: 'json',
        data: function (params) {
          var query = {
            search: params.term,
          }
          return query;
        },
        processResults: function (data) {
          return {
            results: jQuery.map(data, function (item) {
              return {
                id: item.id,
                text: item.text
              }
            })
          };
        },
      },
      templateSelection: templateSelection,
      tags: true,
      createTag: function (tag) {
        return {
          id: '',
          text: tag.term,
          name: tag.term,
          isNew: true
        };
      }
    });

    function templateSelection(state) {
      $('#nip').val(state.id);
      $('#nama_pemohon').val(state.text);
      return state.text;
    }
  });

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
</script>
@endsection