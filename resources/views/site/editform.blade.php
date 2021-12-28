@extends('layouts.layoutAdmin')
@section('menu')
<?php $item = 'daftarWebsite'; ?>
@endsection
@section('css')
<link href="{{asset('hud/plugins/tag-it/css/jquery.tagit.css')}}" rel="stylesheet" />
<link href="{{asset('hud/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}" rel="stylesheet" />
<link href="{{asset('hud/plugins/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet" />
<link href="{{asset('hud/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css')}}" rel="stylesheet" />
<link href="{{asset('hud/plugins/bootstrap-slider/dist/css/bootstrap-slider.min.css')}}" rel="stylesheet" />
<link href="{{asset('hud/plugins/blueimp-file-upload/css/jquery.fileupload.css')}}" rel="stylesheet" />
<link href="{{asset('hud/plugins/summernote/dist/summernote-lite.css')}}" rel="stylesheet" />
<link href="{{asset('hud/plugins/spectrum-colorpicker2/dist/spectrum.min.css')}}" rel="stylesheet" />
<link href="{{asset('hud/plugins/select-picker/dist/picker.min.css')}}" rel="stylesheet" />

@endsection
@section('content')
<div id="content" class="app-content">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-xl-12">

                <div class="row">

                    <div class="col-xl-12">

                        @if(session()->has('status'))
                        <div class="alert alert-success">
                            {{ session()->get('status') }}
                            <a href="{{route('sites')}}"> Lihat Daftar</a>
                        </div>
                        @endif
                        <h3>Daftar Monitoring Website</h3>
                        <hr class="mb-4" />
                        <div class="card">
                            <div class="card-body">
                                <form action="{{route('site.update')}}" method="post" id="form-add">
                                    {{csrf_field()}}
                                    <input value="{{$site['id']}}" name="id" hidden>
                                    <input name="redirect" value="site.editform" hidden>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="">Website Name</label>
                                                <input type="text" name="name" class="form-control" type="text"
                                                    @if(old('name')) value="{{old('name')}}" @else
                                                    value="{{$site['name']}}" @endif>
                                                @error('name')
                                                <p class="text-danger">{{$message}}</p>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="">URL</label>
                                                <input type="text" name="url" class="form-control" @if(old('url'))
                                                    value="{{old('url')}}" @else value="{{$site['url']}}" @endif>
                                                @error('url')
                                                <p class="text-danger">{{$message}}</p>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Judul Website</label>
                                                <input type="text" name="page_title" class="form-control"
                                                    @if(old('page_title')) value="{{old('page_title')}}" @else
                                                    value="{{$site['page_title']}}" @endif>
                                                @error('page_title')
                                                <p class="text-danger">{{$message}}</p>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label for="">Notifikasi Telegram</label>
                                                <select class="selectpicker form-control" id="ex-multiselect" multiple="multiple" name="telegram_id[]">
                                                    @foreach($telegrams as $telegram)
                                                    @if(in_array($telegram['id'],$site['telegram_ids']))
                                                    <option selected value={{$telegram['id']}}>
                                                        {{$telegram['name']}}
                                                    </option>
                                                    @else
                                                    <option value={{$telegram['id']}}>
                                                        {{$telegram['name']}}
                                                    </option>
                                                    @endif
                                                    @endforeach
                                                </select>
                                                @error('telegram_id')
                                                <p class="text-danger">{{$message}}</p>
                                                @enderror
                                            </div>

                                            <div class="form-inline">
                                                <button class="btn btn-primary"> Simpan </button>
                                                <a href="{{route('sites')}}" class="btn btn-default"> Batal </a>
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
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{asset('hud/plugFins/jquery-migrate/dist/jquery-migrate.min.js')}}"></script>
<script src="{{asset('hud/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('hud/plugins/moment/min/moment.min.js')}}"></script>
<script src="{{asset('hud/plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('hud/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js')}}"></script>
<script src="{{asset('hud/plugins/bootstrap-slider/dist/bootstrap-slider.min.js')}}"></script>
<script src="{{asset('hud/plugins/bootstrap-3-typeahead/bootstrap3-typeahead.js')}}"></script>
<script src="{{asset('hud/plugins/jquery.maskedinput/src/jquery.maskedinput.js')}}"></script>
<script src="{{asset('hud/plugins/tag-it/js/tag-it.min.js')}}"></script>
<script src="{{asset('hud/plugins/blueimp-file-upload/js/vendor/jquery.ui.widget.js')}}"></script>
<script src="{{asset('hud/plugins/blueimp-tmpl/js/tmpl.min.js')}}"></script>
<script src="{{asset('hud/plugins/blueimp-load-image/js/load-image.all.min.js')}}"></script>
<script src="{{asset('hud/plugins/blueimp-canvas-to-blob/js/canvas-to-blob.min.js')}}"></script>
<script src="{{asset('hud/plugins/blueimp-gallery/js/jquery.blueimp-gallery.min.js')}}"></script>
<script src="{{asset('hud/plugins/blueimp-file-upload/js/jquery.iframe-transport.js')}}"></script>
<script src="{{asset('hud/plugins/blueimp-file-upload/js/jquery.fileupload.js')}}"></script>
<script src="{{asset('hud/plugins/blueimp-file-upload/js/jquery.fileupload-process.js')}}"></script>
<script src="{{asset('hud/plugins/blueimp-file-upload/js/jquery.fileupload-image.js')}}"></script>
<script src="{{asset('hud/plugins/blueimp-file-upload/js/jquery.fileupload-audio.js')}}"></script>
<script src="{{asset('hud/plugins/blueimp-file-upload/js/jquery.fileupload-video.js')}}"></script>
<script src="{{asset('hud/plugins/blueimp-file-upload/js/jquery.fileupload-validate.js')}}"></script>
<script src="{{asset('hud/plugins/blueimp-file-upload/js/jquery.fileupload-ui.js')}}"></script>
<script src="{{asset('hud/plugins/summernote/dist/summernote-lite.min.js')}}"></script>
<script src="{{asset('hud/plugins/spectrum-colorpicker2/dist/spectrum.min.js')}}"></script>
<script src="{{asset('hud/plugins/select-picker/dist/picker.min.js')}}"></script>
<script src="{{asset('hud/plugins/highlight.js/highlight.min.js')}}"></script>
<script src="{{asset('hud/js/demo/highlightjs.demo.js')}}"></script>
<script src="{{asset('hud/js/demo/form-plugins.demo.js')}}"></script>

<script src="{{asset('hud/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js')}}"
    data-cf-settings="7d8dca569be9f03cf67a4562-|49" defer=""></script>

@endsection