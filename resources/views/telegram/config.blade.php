@extends('layouts.layoutAdmin')
@section('menu')
<?php $item = 'konfigurasiTelegram'; ?>
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
                    <div class="card">
                        <div class="card-body">
                            <form action="{{route('telegram.config.update')}}" method="post" id="form-add">
                                {{csrf_field()}}
                                <input name="id" value="{{$config['id']}}" type="hidden">
                                <input name="redirect" value="telegram.config.update" type="hidden">
                                <div class="right_col" role="main">
                                    <div class="container">
                                        <div class="mb-3">
                                            <h3>Konfigurasi Telegram</h3>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="mb-3">
                                                    <label for="bot_id">BOT ID</label>
                                                    <input class="form-control" type="text" name="bot_id"
                                                        value="{{$config['bot_id']}}">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="bot_id">Token</label>
                                                    <input class="form-control" type="text" name="token"
                                                        value="{{$config['token']}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <button class="btn btn-theme"> Perbarui</button>
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
@endsection