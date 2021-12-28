@extends('layouts.layoutAdmin')
@section('menu')
<?php $item = 'insidenHandling'; ?>
@endsection
@section('content')
<div id="content" class="app-content">
  <div class="p-3 d-flex align-items-center">
    <a href="javascript:window.history.back();" class="btn btn-outline-default text-nowrap btn-sm px-3 rounded-pill"><i
        class="fa fa-arrow-left me-1 ms-n1"></i> Back</a>
  </div>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-12">
        <div class="row">
          <div class="card">
            <div class="card-body">
              <h2>Detail <small>Insiden Handling</small></h2>
              <hr />
              <div class="row">
                <div class="col-md-8 right-margin">
                  <div class="mb-3">
                    <label>Nama</label>
                    <input type="email" class="form-control" value="{{$incident->nama}}" readonly>
                  </div>
                  <div class="mb-3">
                    <label>Perangkat Daerah</label>
                    <input type="text" class="form-control" value="{{$incident->nama_ins}}" readonly>
                  </div>
                  <div class="mb-3">
                    <label>Keterangan Insiden</label>
                    <textarea class="form-control" readonly> {{$incident->ket_pelapor}}</textarea>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-arrow">
              <div class="card-arrow-top-left"></div>
              <div class="card-arrow-top-right"></div>
              <div class="card-arrow-bottom-left"></div>
              <div class="card-arrow-bottom-right"></div>
            </div>
          </div>

          <div class="col-xl-12">
            <div class="row">
              <div class="card">
                <div class="card-body">
                  <h2>Screenshoot <small> atau photo </small></h2>
                  <hr />
                  <div class="row">
                    @php
                    $index = 0;
                    @endphp
                    @foreach ($images as $image)
                    @php
                    $index = $index + 1;
                    @endphp
                    <div class="col-md-55">
                      <a href="{{ $image->path }}" target="_blank">
                        <div class="thumbnail">
                          <div class="image view view-first">
                            <img style="width: 20%; display: block;" src="{{ $image->path }}" alt="image" />
                          </div>
                        </div>
                      </a>
                    </div>
                    @endforeach
                  </div>
                  @if ($incident->stat == 1)
                  <a href="/admin/IncidentHandling/lapor/aplikasi/{{$id}}"
                    class="btn btn-round btn-info btn-md">Laporkan
                    Ke
                    Teknisi Aplikasi</a>
                  <a href="/admin/IncidentHandling/lapor/jaringan/{{$id}}"
                    class="btn btn-round btn-info btn-md">Laporkan
                    Ke
                    Teknisi Jaringan</a>
                  @endif
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


{{-- modal detail --}}
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="detail">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Detail Pengajuan Layanan Jamming</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal form-label-right">
          <div class="form-group">
            <label class="control-label col-md-3" for="last-name">Nama <span class="required">*</span>
            </label>
            <div class="col-md-7">
              <input type="text" id="nama" name="lokasi" required="required" class="form-control col-md-7 col-xs-12"
                readonly>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3" for="last-name">Instansi <span class="required">*</span>
            </label>
            <div class="col-md-7">
              <input type="text" id="instansi" name="lokasi" required="required" class="form-control col-md-7 col-xs-12"
                readonly>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3" for="last-name">Waktu Mulai <span class="required">*</span>
            </label>
            <div class="col-md-7">
              <input type="text" id="tgl_mulai" name="tgl_mulai" required="required"
                class="form-control col-md-7 col-xs-12" readonly>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3" for="last-name">Waktu Akhir <span class="required">*</span>
            </label>
            <div class="col-md-7">
              <input type="text" id="tgl_akhir" name="tgl_akhir" required="required"
                class="form-control col-md-7 col-xs-12" readonly>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3" for="last-name">Lokasi Ruangan <span class="required">*</span>
            </label>
            <div class="col-md-7">
              <input type="text" id="lokasi_ruangan" name="lokasi_ruangan" required="required"
                class="form-control col-md-7 col-xs-12" readonly>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3" for="last-name">Luas Ruangan (m2)<span class="required">*</span>
            </label>
            <div class="col-md-7">
              <input type="text" id="luas_ruangan" name="luas" required="required"
                class="form-control col-md-7 col-xs-12" readonly>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-md-3" for="last-name">Keterangan Kegiatan <span class="required">*</span>
            </label>
            <div class="col-md-7">
              <textarea id="kegiatan" required="required" class="form-control" name="kegiatan"
                data-parsley-trigger="keyup" data-parsley-minlength="3" data-parsley-maxlength="100"
                data-parsley-minlength-message="Come on! You need to enter at least a 5 caracters long comment.."
                data-parsley-validation-threshold="10" readonly></textarea>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
        </form>
      </div>
    </div>
  </div>
</div>

{{-- modal finish --}}
<div class="modal fade bs-example-modal-lg" id="finish" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Insiden Sudah ditangani</h4>
      </div>
      <div class="modal-body">
        Anda Yakin Insiden Sudah ditangani ?
        <form class="form-horizontal form-label-left" action="{{route('incidentfinish')}}" method="POST">
          {{ csrf_field() }}
          <input type="hidden" id="idfinish" name="idfinish">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
        <button type="submit" class="btn btn-danger">Ya</button>
        </form>
      </div>

    </div>
  </div>
</div>


@endsection

@section('script')
<script src="{{asset('gente/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('gente/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('gente/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('gente/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
<script src="{{asset('gente/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('gente/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('gente/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('gente/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
<script src="{{asset('gente/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
<script src="{{asset('gente/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('gente/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
<script src="{{asset('gente/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
<script src="{{asset('gente/vendors/jszip/dist/jszip.min.js')}}"></script>
<script src="{{asset('gente/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
<script src="{{asset('gente/vendors/pdfmake/build/vfs_fonts.js')}}"></script>
<!-- Dropzone.js -->
<script src="{{asset('gente/vendors/dropzone/dist/min/dropzone.min.js')}}"></script>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/fileinput.min.js"></script>
<!-- following theme script is needed to use the Font Awesome 5.x theme (`fas`) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/themes/fas/theme.min.js"></script>
<!-- optionally if you need translation for your language then include the locale file as mentioned below (replace LANG.js with your language locale) -->
{{--
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/locales/LANG.js"></script>
--}}
<script>
  $("#input-24").fileinput({
    showUpload: false,
    fileActionSettings: { 'showUpload': false },
    uploadUrl: '/',
    previewFileType: 'any'
  });

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
      { data: 'created_at', name: 'pencabutan_ses.created_at' },
      { data: 'status', name: 'status', orderable: false, searchable: false },
      { data: 'action', name: 'action', orderable: false, searchable: false }
    ]
  });
</script>
@endsection