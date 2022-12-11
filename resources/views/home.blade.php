@extends('baseguest')

@section('css')
    @vite(['resources/css/style1.css', 'resources/css/style2.css'])
@endsection

@section('content')
    <div class="body">
        <img class="img-body" src="{{ asset('images/3616.jpg') }}"alt="">
    </div>

    
@endsection
