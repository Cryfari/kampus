@extends('baseguest')

@section('css')
    @vite(['resources/css/styleberita.css'])
@endsection

@section('content')
    <div class="world-news">
        <div class="row">
            @forelse ($datas as $data)
                <div class="col-lg-3 col-sm-6 mb-5 mb-sm-2 px-5 my-5">
                    <div class="position-relative image-hover">
                        <img src="{{ asset('storage/images/' . $data->image) }}" class="img-fluid" alt="news" />
                    </div>
                    <h5 class="font-weight-bold mt-3">
                        {{ $data->judul }}
                    </h5>
                    <p class="fs-15 font-weight-normal">
                        {{ $data->headline }}
                    </p>
                    <a href="{{ route('tampilberita', $data->id_berita) }}" class="font-weight-bold text-dark pt-2">Baca
                        selengkapnya</a>
                </div>
            @empty
                <center>
                    <h2>Tidak Ada Berita</h2>
                </center>
            @endforelse


        </div>
    </div>
@endsection
