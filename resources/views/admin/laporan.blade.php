@extends('layouts.layoutAdmin')
@section('menu')
<?php $item = 'laporanInsiden'; ?>
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
<div class="right_col" role="main">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="fa fa-print"></i> Print Laporan Insiden Handling</button>
    <br>
    @if(session('error'))
      <div class="alert alert-danger alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <strong>{{session('error')}}</strong>
      </div>
      @endif
    @if(session('success'))
      <div class="alert alert-success alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <strong>{{session('success')}}</strong>
      </div>
    @endif
    <div class="x_panel">
        <div class="x_title">
          <h2>Laporan Insiden</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <table id= "members-table" class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Instansi</th>
                <th>Tanggal Laporan</th>
                <th>Action</th>
              </tr>
            </thead>
          </table>
        </div>
    </div>         
</div>

{{-- modal print --}}
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Print</h4>
      </div>
      <div class="modal-body">
        <form class="form-horizontal form-label-left" action="{{route('laporanprint')}}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="form-group">
              <label class="control-label col-md-3" for="last-name">Dari Tanggal - <span class="required">*</span>
              </label>
              <div class="col-md-7">
              <input type="date" id="last-name2" name="startdate" required="required" class="form-control col-md-7 col-xs-12">
              </div>
          </div>
          <div class="form-group">
              <label class="control-label col-md-3" for="last-name">Sampai Tanggal - <span class="required">*</span>
              </label>
              <div class="col-md-7">
              <input type="date" id="last-name2" name="enddate" required="required" class="form-control col-md-7 col-xs-12">
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
        <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
        <button type="submit" class="btn btn-primary">Print</button>
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
            ajax: '{{URL::to("admin/LaporanIncident/getdata")}}',
            columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false},
            {data: 'nama', name: 'users.nama'},
            {data: 'nama_ins', name: 'instansis.nama_ins'},
            {data: 'created_at', name: 'pencabutan_ses.created_at'},
            {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
  }); 
</script>
@endsection