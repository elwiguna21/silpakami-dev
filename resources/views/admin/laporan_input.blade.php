@extends('layouts.layoutAdmin')
@section('content')
<div class="right_col" role="main">
    
    <div class="x_panel">
        <div class="x_title">
          <h2>Detail <small>Insiden Handling</small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <div class="col-md-8 right-margin">
              <div class="form-group">
                <label>Nama</label>
              <input type="text" class="form-control" value="{{$incident->nama}}" readonly>
              </div>
              <div class="form-group">
                <label>Perangkat Daerah</label>
                <input type="text" class="form-control" value="{{$incident->nama_ins}}" readonly>
              </div>
              <div class="form-group">
                <label>Keterangan Insiden</label>
                <textarea class="form-control" readonly> {{$incident->ket_pelapor}}</textarea>
              </div>
          </div>
        </div>
      </div>

      <div class="col-md-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Screenshoot <small> atau photo </small></h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
            <div class="row">
             @php
              $index = 0;    
             @endphp
              @foreach ($images as $image)
               @php
                   $index = $index + 1;
               @endphp
                <div class="col-md-55">
                    <div class="thumbnail">
                    <div class="image view view-first">
                        <img style="width: 100%; display: block;" src="{{ $image->path }}" alt="image" />
                    </div>
                    <div class="caption">
                        <p>Image {{$index}}</p>
                    </div>
                    </div>
                </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>

      <div class="x_panel">
        <div class="x_title">
          <h2>Input Laporan <small>Insiden Handling</small></h2>
          <ul class="nav navbar-right panel_toolbox">
            <li><a class="close-link"><i class="fa fa-close"></i></a>
            </li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
        <form class="form-horizontal form-label-left" action="{{route('laporaninput')}}" method="POST">
              {{ csrf_field() }}
          <div class="col-md-8 right-margin">
              <input type="hidden" name="idlaporan" class="form-control" value="{{$id}}">
              <div class="form-group">
                <label>Jenis Insiden</label>
               <input type="text" name="jenis_insiden" class="form-control" required>
              </div>
              <div class="form-group">
               <label>Cakupan Insiden</label>
                <select id="gol" name="cakupan_insiden" class="form-control" required>
                    <option value="">Choose..</option>
                    <option value="Kritis">Kritis</option>
                    <option value="Sedang">Sedang</option>
                    <option value="Besar">Besar</option>
                    <option value="Kecil">Kecil</option>
                </select>
              </div>
              <div class="form-group">
                <label>Jumlah Sistem Yang Terkena Dampak</label>
               <input type="number" name="jumlah_sistem" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Jumlah Pengguna Yang Terkena Dampak</label>
               <input type="number" name="jumlah_pengguna" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Pihak Ketiga Yang Terkena Dampak</label>
               <input type="text" name="pihak_ketiga" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Dampak Insiden</label>
                <textarea class="form-control" name="dampak_insiden" required></textarea>
              </div>
              <div class="form-group">
                <label>Sensitivitas Informasi</label>
                <textarea class="form-control" name="sensitivita_informasi" required></textarea>
              </div>
              <div class="form-group">
                <label>Data Dienkripsi </label>
                  <select id="gol" name="data_enkripsi" class="form-control" required>
                      <option value="">Choose..</option>
                      <option value="Ya">Ya</option>
                      <option value="Tidak">Tidak</option>
                  </select>
              </div>
              <div class="form-group">
                <label>Besar Data Terkena Dampak</label>
                <input type="number" name="besar_data" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Sumber Serangan</label>
               <input type="text" name="sumber_serangan" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Tujuan Serangan </label>
               <input type="text" name="tujuan_serangan" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Alamat IP Sistem</label>
               <input type="text" name="ip_sistem" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Nama Domain Sistem</label>
               <input type="text" name="domain_sistem" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Fungsi Dari Sistem (webserver)</label>
               <input type="text" name="fungsi" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Sistem Operasi</label>
               <input type="text" name="so" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Level Patching</label>
               <input type="text" name="patching_level" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Perangkat Lunak Sekuriti</label>
               <input type="text" name="security_sistem" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Lokasi Fisik</label>
               <input type="text" name="lokasi" class="form-control" required>
              </div>
              <div class="form-group">
                <label>Level Hak Akses Pengguna</label>
                <textarea name="level_hak_akses" class="form-control" required></textarea>
              </div>
              <div class="form-group">
                <label>Tindakan Identifikasi</label>
                <textarea class="form-control" required> </textarea>
              </div>
              <div class="form-group">
                <label>Tindakan Pemulihan Insiden</label>
                <textarea name="tindakan_identifikasi" class="form-control" required> </textarea>
              </div>
              <div class="form-group">
                <label>Tindakan Pencegahan</label>
                <textarea name="tindakan_pemulihan" class="form-control" required> </textarea>
              </div>
              <div class="form-group">
                <label>Keterangan Insiden</label>
                <textarea name="tindakan_pencegahan" class="form-control" required></textarea>
              </div>
              <div class="form-group">
                  <label>Tanggal Ditangani</label>
                  <input type="date" name="tgl_ditangani" class="form-control" required>
                </div>
              <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Input Laporan">
              </div>
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
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/plugins/piexif.min.js" type="text/javascript"></script>
      <!-- sortable.min.js is only needed if you wish to sort / rearrange files in initial preview. 
        This must be loaded before fileinput.min.js -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/plugins/sortable.min.js" type="text/javascript"></script>
      <!-- purify.min.js is only needed if you wish to purify HTML content in your preview for 
        HTML files. This must be loaded before fileinput.min.js -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/plugins/purify.min.js" type="text/javascript"></script>
      <!-- popper.min.js below is needed if you use bootstrap 4.x (for popover and tooltips). You can also use the bootstrap js 
        3.3.x versions without popper.min.js. -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <!-- the main fileinput plugin file -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/fileinput.min.js"></script>
      <!-- following theme script is needed to use the Font Awesome 5.x theme (`fas`) -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/themes/fas/theme.min.js"></script>
      <!-- optionally if you need translation for your language then include the locale file as mentioned below (replace LANG.js with your language locale) -->
      {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/5.0.1/js/locales/LANG.js"></script> --}}
<script>

  $(document).on('click', '#bdetail', function(){   
    var nama =$(this).data('nama');
		var instansi =$(this).data('instansi');
		var tgl_mulai =$(this).data('tgl_mulai');
		var tgl_akhir =$(this).data('tgl_akhir');
		var lokasi_ruangan =$(this).data('lokasi_ruangan');
		var luas_ruangan =$(this).data('luas_ruangan');
		var kegiatan =$(this).data('kegiatan');
		
    $('#nama').val(nama);
    $('#instansi').val(instansi);
    $('#tgl_mulai').val(tgl_mulai);
    $('#tgl_akhir').val(tgl_akhir);
    $('#lokasi_ruangan').val(lokasi_ruangan);
    $('#luas_ruangan').val(luas_ruangan);
    $('#kegiatan').val(kegiatan);

	});

  $(document).on('click', '#baproved', function(){   
    var id =$(this).data('id');
		$('#idaprove').val(id);
	});

    $(document).on('click', '#bfinish', function(){   
    var id =$(this).data('id');
		$('#idfinish').val(id);
	});

  $(document).on('click', '#bdenied', function(){   
		var id =$(this).data('id');
		$('#iddenied').val(id);
	});

  $('#members-table').DataTable({
            destroy: true,
            processing: true,
            serverSide: true,
            method : 'GET',
            ajax: '{{URL::to("/admin/IncidentHandling/getdata")}}',
            columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
            {data: 'nama', name: 'users.nama'},
            {data: 'nama_ins', name: 'instansis.nama_ins'},
            {data: 'created_at', name: 'pencabutan_ses.created_at'},
            {data: 'status', name: 'status', orderable: false, searchable: false},
            {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
  }); 
</script>
@endsection