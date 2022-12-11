@extends('baseguest')
@section('css')
    @vite(['resources/css/styletampil.css'])
@endsection

@section('content')
    <div class="body">
        <div class="content cf">
            <div class="main">
                <h2>{{ $data->judul }}</h2>
                <p class="penulis">ditulis oleh <span>{{ $data->pengirim }}</span>. <i>pada {{ $data->updated_at }}</i></p>
                {!! $data->isi !!}

            </div>
        </div>
    </div>
@endsection
