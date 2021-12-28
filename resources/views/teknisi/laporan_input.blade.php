@extends('layouts.layoutTeknisi')
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
{{-- Select2--}}
<!-- <link href="{{asset('hud/css/select2.css')}}" rel="stylesheet"/> -->
<link href="{{asset('hud/css/select2.min.css')}}" rel="stylesheet" />
<!--file input-->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/css/fileinput.min.css" media="all"
  rel="stylesheet" type="text/css" />
<!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"
  type="text/css" /> -->
@endsection

@section('content')
<div id="content" class="app-content">
  <div class="row">

    <div class="col-xl-12">
      <div class="card mb-3">
        <div class="card-body">
          <h2>Detail <small>Insiden Handling</small></h2>
          <hr />
          <div class="row">
            <div class="col-md-8 right-margin">
              <div class="form-group mb-3">

                <label>Nama</label>
                <input type="email" class="form-control" value="{{$incident->nama}}" readonly>
              </div>
              <div class="form-group mb-3">

                <label>Perangkat Daerah</label>
                <input type="text" class="form-control" value="{{$incident->nama_ins}}" readonly>
              </div>
              <div class="form-group mb-3">

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
    </div>

    <div class="col-xl-12">
      <div class="card mb-3">
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
                  <div class="caption">
                    <p>Image {{$index}}</p>
                  </div>
                </div>
              </a>
            </div>
            @endforeach
          </div>
        </div>
        <div class="card-arrow">
          <div class="card-arrow-top-left"></div>
          <div class="card-arrow-top-right"></div>
          <div class="card-arrow-bottom-left"></div>
          <div class="card-arrow-bottom-right"></div>
        </div>
      </div>
    </div>


    <div class="col-xl-12">
      <div class="card mb-3">
        <div class="card-body pb-2">
          <h2>Input Laporan <small>Insiden Handling</small></h2>
          <hr />
          <form class="form-horizontal form-label-left" action="{{route('incident_store_report')}}" method="POST">
            {{ csrf_field() }}
            <div class="row">
              <div class="col-xl-6">
                <input type="hidden" name="idlaporan" class="form-control" value="{{$id}}">
                <div class="form-group mb-3">
                  <label>Jenis Insiden</label>
                  <input type="text" name="jenis_insiden" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                  <label>Cakupan Insiden</label>
                  <select id="gol" name="cakupan_insiden" class="form-control" required>
                    <option value="">Choose..</option>
                    <option value="Kritis">Kritis</option>
                    <option value="Sedang">Sedang</option>
                    <option value="Besar">Besar</option>
                    <option value="Kecil">Kecil</option>
                  </select>
                </div>
                <div class="form-group mb-3">
                  <label>Jumlah Sistem Yang Terkena Dampak</label>
                  <input type="number" name="jumlah_sistem" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                  <label>Jumlah Pengguna Yang Terkena Dampak</label>
                  <input type="number" name="jumlah_pengguna" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                  <label>Pihak Ketiga Yang Terkena Dampak</label>
                  <input type="text" name="pihak_ketiga" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                  <label>Dampak Insiden</label>
                  <textarea class="form-control" name="dampak_insiden" required></textarea>
                </div>
                <div class="form-group mb-3">
                  <label>Sensitivitas Informasi</label>
                  <textarea class="form-control" name="sensitivita_informasi" required></textarea>
                </div>
                <div class="form-group mb-3">
                  <label>Data Dienkripsi </label>
                  <select id="gol" name="data_enkripsi" class="form-control" required>
                    <option value="">Choose..</option>
                    <option value="Ya">Ya</option>
                    <option value="Tidak">Tidak</option>
                  </select>
                </div>
                <div class="form-group mb-3">
                  <label>Besar Data Terkena Dampak</label>
                  <input type="number" name="besar_data" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                  <label>Sumber Serangan</label>
                  <input type="text" name="sumber_serangan" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                  <label>Tujuan Serangan </label>
                  <input type="text" name="tujuan_serangan" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                  <label>Alamat IP Sistem</label>
                  <input type="text" name="ip_sistem" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                  <label>Nama Domain Sistem</label>
                  <input type="text" name="domain_sistem" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                  <input type="submit" class="btn btn-primary" value="Input Laporan">
                </div>
              </div>
              <div class="col-xl-6">
                <div class="form-group mb-3">
                  <label>Fungsi Dari Sistem (webserver)</label>
                  <input type="text" name="fungsi" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                  <label>Sistem Operasi</label>
                  <input type="text" name="so" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                  <label>Level Patching</label>
                  <input type="text" name="patching_level" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                  <label>Perangkat Lunak Sekuriti</label>
                  <input type="text" name="security_sistem" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                  <label>Lokasi Fisik</label>
                  <input type="text" name="lokasi" class="form-control" required>
                </div>
                <div class="form-group mb-3">
                  <label>Level Hak Akses Pengguna</label>
                  <textarea name="level_hak_akses" class="form-control" required></textarea>
                </div>
                <div class="form-group mb-3">
                  <label>Tindakan Identifikasi</label>
                  <textarea class="form-control" required> </textarea>
                </div>
                <div class="form-group mb-3">
                  <label>Tindakan Pemulihan Insiden</label>
                  <textarea name="tindakan_identifikasi" class="form-control" required> </textarea>
                </div>
                <div class="form-group mb-3">
                  <label>Tindakan Pencegahan</label>
                  <textarea name="tindakan_pemulihan" class="form-control" required> </textarea>
                </div>
                <div class="form-group mb-3">
                  <label>Keterangan Insiden</label>
                  <textarea name="tindakan_pencegahan" class="form-control" required></textarea>
                </div>
                <div class="form-group mb-3">
                  <label>Tanggal Ditangani</label>
                  <input type="date" name="tgl_ditangani" class="form-control" required>
                </div>
              </div>
            </div>
          </form>
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



@endsection

@section('script')
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
<script src="{{asset('hud/js/select2.min.js')}}"></script>

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/locales/LANG.js"></script> --}}
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
      { data: 'created_at', name: 'pencabutan_ses.created_at' },
      { data: 'status', name: 'status', orderable: false, searchable: false },
      { data: 'action', name: 'action', orderable: false, searchable: false }
    ]
  });
</script>
@endsection