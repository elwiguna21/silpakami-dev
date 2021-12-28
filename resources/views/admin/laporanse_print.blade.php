@extends('layouts.layoutAdminprint')
@section('content')
          <h1>SILPa KAMI KABUPATEN SUMEDANG</h1>
          @if ($jenis == "pembuatan")
            <h2>Laporan Pengajuan Pendafaran Sertifikat Elektronik </h2>
          @elseif ($jenis == "perubahan")
            <h2>Laporan Pengajuan Perubahan Sertifikat Elektronik </h2>
          @else
            <h2>Laporan Pengajuan Pencabutan Sertifikat Elektronik </h2>
          @endif          
          <div class="clearfix"></div>
            <div class="row">
                <div class="col-sm-4">
                 Jumlah Pengajuan : {{$se_count}}
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                 Dari Tanggal : <p>{{$tglmul}}</p>
                </div>
                <div class="col-sm-4">
                    Hingga Tanggal : <p>{{$tglakh}}</p>
                </div>
            </div>
          
          <div class="clearfix"></div>
          <h2>Daftar Pengajuan</h2>
          <table id= "members-table" class="table table-striped">
            <thead>
              <tr>
              @if ($jenis == "pembuatan")
                <th>#</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Dinas</th>
                <th>Jabatan</th>
                <th>Unit Kerja </th>
                <th>Tgl Pembuatan</th>
                <th>Tgl Kadaluarsa</th>
              @elseif ($jenis == "pencabutan")
                <th>#</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Dinas</th>
                <th>Jabatan</th>
                <th>Unit Kerja </th>
                <th>Tgl Pencabutan</th>
              @else
                <th>#</th>
                <th>NIP</th>
                <th>Nama</th>
                <th>Dinas Lama</th>
                <th>Dinas Baru</th>
                <th>Jabatan Lama </th>
                <th>Jabatan Baru</th>
                <th>Tgl Pengajuan</th>
              @endif
              </tr>
            </thead>
            <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($ses as $se)
              <tr>
              @if ($jenis == "pembuatan")
                <td>{{$no++}} </td>
                <td>{{$se->nip}} </td>
                <td>{{$se->nama}} </td>
                <td>{{$se->nama_ins}} </td>
                <td>{{$se->nama_jab}} </td>
                <td>{{$se->nama_unker}} </td>
                <td>{{$se->date}} </td>
                <td>{{$se->kadaluarsa}} </td>
              @elseif ($jenis == "pencabutan")
                <td>{{$no++}} </td>
                <td>{{$se->nip}} </td>
                <td>{{$se->nama}} </td>
                <td>{{$se->nama_ins}} </td>
                <td>{{$se->nama_jab}} </td>
                <td>{{$se->nama_unker}} </td>
                <td>{{$se->date}} </td>
              @else
                <td>{{$no++}} </td>
                <td>{{$se->nip}} </td>
                <td>{{$se->nama}} </td>
                <td>{{$se->instansi_lama}} </td>
                <td>{{$se->instansi_baru}} </td>
                <td>{{$se->jabatan_lama}} </td>
                <td>{{$se->jabatan_baru}} </td>
                <td>{{$se->date}} </td>
              @endif
                
              </tr>  
            @endforeach
            </tbody>
          </table>

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

</script>
@endsection