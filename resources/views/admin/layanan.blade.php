@extends('layouts.layoutAdmin')
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
              Pengajuan Layanan Jamming
            </h3>
            <button type="button" class="btn btn-theme" data-bs-toggle="modal" data-bs-target="#print"><i
                class="fa fa-print"></i>
              Print Data Layanan Jamming</button>
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

{{-- modal detail --}}
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="detail">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Detail Pengajuan Layanan Jamming</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
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
          <div class="form-group alasan-penolakan">
            <label for="#" class="control-label col-md-3">Alasan Penolakan</label>
            <div class="col-md-7">
              <p id="display-alasan-penolakan"></p>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-bs-dismiss="modal">Keluar</button>
        </form>
      </div>
    </div>
  </div>
</div>

{{-- modal print --}}
<div id="print" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Print Daftar Permintaan Jamming</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal form-label-left" action="{{route('laporanJammingInput')}}" method="POST"
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
        <form class="form-horizontal form-label-left" action="{{route('layananaprove')}}" method="POST">
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

{{-- modal denied --}}
<div class="modal fade bs-example-modal-lg" id="denied" tabindex="-1" role="dialog" aria-hidden="true">
  <form class="form-horizontal form-label-left" action="{{route('layanandenied')}}" method="POST">

    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel">Tolak Permohonan</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <p>Anda Yakin Ingin Menolak Permohonan ?</p>
          <label>Masukan alasan penolakan*</label>
          <textarea name="alasan_penolakan" class="form-control"></textarea>
          {{ csrf_field() }}
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
        <h5 class="modal-title" id="exampleModalLabel">Alasan Penolakan</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="display-reason">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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

    $(document).on('click', '#bdetail', function () {
      var nama = $(this).data('nama');
      var instansi = $(this).data('instansi');
      var tgl_mulai = $(this).data('tgl_mulai');
      var tgl_akhir = $(this).data('tgl_akhir');
      var lokasi_ruangan = $(this).data('lokasi_ruangan');
      var luas_ruangan = $(this).data('luas_ruangan');
      var kegiatan = $(this).data('kegiatan');
      var alasan = $(this).data('alasan_penolakan');


      $('#nama').val(nama);
      $('#instansi').val(instansi);
      $('#tgl_mulai').val(tgl_mulai);
      $('#tgl_akhir').val(tgl_akhir);
      $('#lokasi_ruangan').val(lokasi_ruangan);
      $('#luas_ruangan').val(luas_ruangan);
      $('#kegiatan').val(kegiatan);
      $('#display-alasan-penolakan').html(alasan);
      if (alasan.length < 1) {
        $('.alasan-penolakan').hide()
      }
      else {
        $('.alasan-penolakan').show()
      }
    });

    $(document).on('click', '#baproved', function () {
      var id = $(this).data('id');
      $('#idaprove').val(id);
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
      ajax: '{{URL::to("/admin/layananjamming/getdata")}}',
      columns: [
        { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
        { data: 'nama', name: 'users.nama' },
        { data: 'nama_ins', name: 'instansis.nama_ins' },
        { data: 'created_at', name: 'jammings.created_at' },
        {
          data: 'path', name: 'path', render: function (data, type, row) {
            return "<a href=" + row.path + ">download</a>"
          }
        },
        { data: 'status', name: 'status', orderable: false, searchable: false },
        { data: 'action', name: 'action', orderable: false, searchable: false }
      ]
    });

  </script>
  @endsection