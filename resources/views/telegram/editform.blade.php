@extends('layouts.layoutAdmin')
@section('menu')
<?php $item = 'daftarTelegram'; ?>
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
                            <a href="{{route('telegrams')}}"> Lihat Daftar</a>
                        </div>
                        @endif

                        <h3>Edit Data Telegram</h3>
                        <hr class="mb-4" />
                        <div class="card">
                            <div class="card-body">

                                <form action="{{route('telegram.update')}}" method="post" id="form-add">
                                    {{csrf_field()}}
                                    <input name="id" value="{{$telegram['id']}}" type="hidden">
                                    <input name="redirect" value="telegram.editform" type="hidden">

                                    <div class="row">
                                        <div class="col-md-12">


                                            <div class="mb-3">
                                                <label for="">Nama</label>
                                                <input type="text" @if(old('name')) value="{{old('name')}}" @else
                                                    value="{{$telegram['name']}}" @endif name="name"
                                                    class="form-control">
                                                @error('name')
                                                <p class="text-danger">{{$message}}</p>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Nomor</label>
                                                <input type="text" name="number" @if(old('number'))
                                                    value="{{old('number')}}" @else value="{{$telegram['number']}}"
                                                    @endif class="form-control">
                                                @error('number')
                                                <p class="text-danger">{{$message}}</p>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="">Chat Id</label>
                                                <input type="text" name="chat_id" @if(old('chat_id'))
                                                    value="{{old('chat_id')}}" @else value="{{$telegram['chat_id']}}"
                                                    @endif class="form-control">
                                                @error('chat_id')
                                                <p class="text-danger">{{$message}}</p>
                                                @enderror
                                            </div>

                                            <div class="form-inline">
                                                <button class="btn btn-primary"> Simpan </button>
                                                <a href="{{route('telegrams')}}" class="btn btn-default"> Kembali </a>
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