@extends('layouts.layoutAdminprint')
@section('content')
          <h1>SILPa KAMI KABUPATEN SUMEDANG</h1>
          <h2>Laporan Insiden Handling </h2>
          <div class="clearfix"></div>
            <div class="row">
                <div class="col-sm-4">
                 Jumlah Incident : {{$incident_count}}
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
          <h2>Laporan Insiden</h2>
          <div class="clearfix"></div>
          <table id= "members-table" class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Pelapor</th>
                <th>Instansi</th>
                <th>Tanggal Laporan</th>
                <th>Teknisi</th>
                <th>Keterangan</th>
              </tr>
            </thead>
            <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($incidents as $incident)
              <tr>
                <td>{{$no++}} </td>
                <td>{{$incident->nama}} </td>
                <td>{{$incident->nama_ins}} </td>
                <td>{{$incident->created_at}} </td>
                <td>{{$incident->hand}} </td>
                <td>{{$incident->ket_pelapor}} </td>
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