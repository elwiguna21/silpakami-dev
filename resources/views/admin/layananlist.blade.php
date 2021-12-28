@extends('layouts.layoutAdmin')
@section('content')
<div class="right_col" role="main">
    <div class="x_panel">
        <div class="x_title">
          <h2>Daftar Layanan Jamming</h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <table id= "datatable" class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Tanggal Pengajuan</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>2019/08/31</td>
                <td><button type="button" class="btn btn-primary btn-xs">Detail</button></td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>2019/08/31</td>
                <td><button type="button" class="btn btn-primary btn-xs">Detail</button></td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>2019/08/31</td>
                <td><button type="button" class="btn btn-primary btn-xs">Detail</button></td>
              </tr>
            </tbody>
          </table>
        </div>
    </div>         
</div>

{{-- modal ajukan --}}
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">Pengajuan Layanan Jamming</h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal form-label-left">
                    <div class="form-group">
                        <label class="control-label col-md-3" for="first-name">Email yang bisa dihubungi <span class="required">*</span>
                        </label>
                        <div class="col-md-7">
                        <input type="text" id="first-name2" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3" for="last-name">Tanggal dan waktu pemesanan <span class="required">*</span>
                        </label>
                        <div class="col-md-7">
                            <div class="controls">
                                <div class="input-prepend input-group">
                                    <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
                                    <input type="text" name="reservation-time" id="reservation-time" class="form-control" value="01/01/2016 - 01/25/2016" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3" for="last-name">Lokasi Ruangan <span class="required">*</span>
                        </label>
                        <div class="col-md-7">
                        <input type="text" id="last-name2" name="last-name" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3" for="last-name">Keperluan <span class="required">*</span>
                        </label>
                        <div class="col-md-7">
                        <textarea id="message" required="required" class="form-control" name="message" data-parsley-trigger="keyup" data-parsley-minlength="3" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 5 caracters long comment.." data-parsley-validation-threshold="10"></textarea>
                        </div>
                    </div>
                </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
          <button type="button" class="btn btn-primary">Ajukan</button>
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
@endsection