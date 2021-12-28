@extends('layouts.layoutAdmin')
@section('menu')
<?php $item = 'logLaporan'; ?>
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
        <div class="row">
            <h3>Log Check</h3>
        </div>
        <div class="row">
            <div class="mb-3">

                <div class="pull-right">
                    <form method="get" action="">
                        <input type="text" name="search" class="form-control" value="{{$search}}"
                            placeholder="Cari Website">
                    </form>
                </div>
            </div>
            <div class="col md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-responsive">
                            <thead>
                                <th>Time</th>
                                <th>Code</th>
                                <th>Web</th>
                                <th>Status</th>
                            </thead>
                            <tbody>
                                @foreach($logs as $log)
                                <tr>
                                    <td>{{$log['updated_at']}}</td>
                                    <td>{{$log['code']}}</td>
                                    <td>{{$log['site']['url']}}</td>
                                    <td>{{$log['status']}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-arrow">
                        <div class="card-arrow-top-left"></div>
                        <div class="card-arrow-top-right"></div>
                        <div class="card-arrow-bottom-left"></div>
                        <div class="card-arrow-bottom-right"></div>
                    </div>
                    <div class="card-body text-center">
                        {{$logs->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection