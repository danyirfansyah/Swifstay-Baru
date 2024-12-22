<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <link rel="stylesheet" href="{{ asset('/css/homepage-style.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <header>
        <div class="logo-header">
            <img src="{{ asset('assets/logo.png') }}" alt="SwiftStay Logo">
            <h1>SWIFTSTAY</h1>
        </div>

        <div class="search-nav">
            <form action="{{ route('homepage') }}" method="GET">
                <div class="search">
                    <input type="search" name="keyword" placeholder="Mau ngekost dimana?"
                        value="{{ request('keyword') }}">
                    <button class="searchbtn" type="submit"><img src="{{ asset('assets/search-icon.png') }}"
                            alt=""></button>
                </div>
            </form>
            <nav class="navbar">
                <ul>
                    <li class="beranda"><a href="#">Beranda</a></li>
                    @if ($role == 'Pemilik')
                        <li class="pemesanan"><a href="{{ route('insertKost') }}">Tambah Kos</a></li>
                    @endif
                    <li class="favorit"><a href="/favorit">Favorit</a></li>
                    <li class="map"><a href="/map">Maps</a></li>
                </ul>
            </nav>
        </div>

        <div class="masuk">
            <div class="user">
                <p>Welcome, {{ $user }}</p>
            </div>
            <button class="usn">
                <a href="/profile">
                    <img src="{{ asset('assets/user.jpg') }}" alt="Profile Image">
                </a>
            </button>
            <div class="iconlogout">
                <form METHOD="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="menu"><img class="" src="{{ asset('assets/logout.png') }}"></button>
                </form>
                {{-- <a href="{{ route('logout') }}"><button class="menu"><img src="{{ asset('assets/logout.png') }}" alt="Logout Icon" style="width: 45px;"></button></a> --}}
            </div>
        </div>
    </header>

    <div class="page-name">
        <h1 style="padding-top: 180px; padding-left: 60px;">Beranda</h1>
        <img src="{{ asset('assets/line.png') }}" alt="" style="padding-top: 6px; padding-left: 55px;">
    </div>

    <div class="card">
        @foreach ($kosts as $kost)
            <div class="product">
                {{-- <a href="{{ route('detail', ['id' => $kost->id]) }}"> --}}

                <img src="{{ asset('storage/public/fileimg/' . $kost->Gambar) }}" alt=""
                    style="width:370px;height:448px;object-fit:cover">
                </a>
                <form action="{{ route('tambahFavorit', ['id' => $kost->id]) }}" method="post">
                    @csrf
                    <button class="love" type="submit"><img src="{{ asset('assets/heart-outline.png') }}" alt="Add to Favorit"></button>
                </form>
                {{-- <form method="POST" action=></form> --}}
                <a href="{{ route('detailKos', ['id' => $kost->id]) }}">
                    <h1 style="font-weight: 700;">{{ $kost->Nama }}</h1>
                    <p style="font-weight: 500;">{{ $kost->Lokasi }}</p>
                    <p style="color: #999999">{{ $kost->Fasilitas }}</p>
                    <p style="font-weight: 500;">Rp. {{ number_format($kost->Harga, 2, ',', '.') }}</p>
                </a>
            </div>
        @endforeach
    </div>
</body>

<footer>
    <div class="logo-footer">
        <img src="{{ asset('assets/logo.png') }}" alt="SwiftStay Logo">
    </div>

    <div class="textfoot">
        SwiftStay adalah web pencarian dan pemesanan kost bagi mahasiswa. Web ini memiliki fitur utama yaitu informasi
        kost terdiri dari foto, deskripsi, kelas, ukuran, fasilitas, harga, akses kendaraan, dan ulasan.
    </div>

    <div class="mediaSocial">
        <p>Ikuti Kami</p>
        <div class="img-med">
            <img src="{{ asset('assets/instagram.png') }}" alt="Instagram">
            <img src="{{ asset('assets/facebook.png') }}" alt="Facebook">
            <img src="{{ asset('assets/twitter.png') }}" alt="Twitter">
        </div>
    </div>

    <div class="contact">
        <p>Kontak</p>
        <p><a href="https://wa.me/+628113650922" style="text-decoration: none; color: white;">0811-3650-911 (Dinda)</a>
        </p>
        <p>swiftstay@gmail.com</p>
    </div>
</footer>

</html>
