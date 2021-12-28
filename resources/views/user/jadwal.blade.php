@extends('layouts.layoutUser')
@section('menu')
<?php $item = 'permintaanLayanan'; ?>
@endsection

@section('css')
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@5.5.1/main.min.css' rel='stylesheet' />
<style>
    #calendar {
        width: 100%;
        margin: 10px auto;

        position: inherit;
    }
</style>
@endsection
@section('content')
<div id="content" class="app-content">

    <div class="container">
        <div class="row justify-content-center">

            <div class="row">
                <div class="col-md-12">
                    <a href="{{route('layanan')}}" class="btn btn-default">
                        << Kembali </a>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-md-6">
                    <div id="calendar" class="center"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@5.5.1/main.min.js'></script>

<script>
    $(document).ready(function () {
        $.get(window.origin + '/user/layanan/getSchedule', function (data) {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                events: JSON.parse(data)
            });

            calendar.render();
        })
    })
</script>
@endsection