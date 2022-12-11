<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <title>{{ config('app.name', 'Laravel') }}</title>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="atas"></div>
            <div class="tengah">
                <div class="logo">
                    <img src="{{ asset('images/unsap.png') }}" alt="">
                </div>
                <div class="unsap">Universitas Sebelas April</div>
            </div>

            <div class="bawah">
                <ul>
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('berita') }}">Berita</a></li>
                </ul>
            </div>
        </div>

        @yield('content')

    </div>
    <div class="footer">
        <div class="body-footer">

            <div class="kontak">
                <p>Kontak</p>
                <ul>
                    <li><i class="fa-solid fa-house"></i>Unsap</li>
                    <li><i class="fa-solid fa-location-dot"></i>Jl.Angkrek Situ No.19 Sumedang </li>
                    <li><i class="fa-solid fa-envelope"></i>Unsap@sumedang</li>
                    <li><i class="fa-solid fa-phone"></i>08123456789</li>
                </ul>
            </div>

            <div class="medsos">
                <p>Social Media</p>
                <ul>
                    <li><i class="fa-brands fa-square-instagram"></i></li>
                    <li><i class="fa-brands fa-square-facebook"></i></li>
                    <li><i class="fa-brands fa-square-twitter"></i></li>
                    <li><i class="fa-brands fa-youtube"></i></li>
                </ul>
            </div>

        </div>
        <div class="bawah-footer">
            <p class="copy">@2022. Kelompok 1.</p>
        </div>

    </div>

</body>

</html>
