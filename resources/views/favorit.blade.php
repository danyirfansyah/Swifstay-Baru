{{-- @if (!Session::has('id'))
    @endif --}}
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Favorit</title>
        <link rel="stylesheet" href="{{ asset('/css/homepage-style.css') }}">
    </head>
    <header>
        <div class="logo-header">
            <img src="{{ asset('assets/logo.png') }}" alt="">
            <h1>SWIFTSTAY</h1>
        </div>
        <div class="search-nav">
            <div class="search">
                <input type="search" placeholder="Mau ngekost dimana?">
                <button class="searchbtn" type="submit" name="submit"><img src="{{ asset('assets/search-icon.png') }}" alt=""></button>
            </div>
            <nav class="navbar">
                <ul>
                    <li class="beranda"><a href="{{ route('homepage') }}">Beranda</a></li>
                    @if ($datarole['role'] == "Pemilik")
                        <li class="pemesanan"><a href="{{ route('insertKost') }}">Tambah Kos</a></li>
                    @endif
                    <li class="favorit"><a href="{{ route('favorit') }}">Favorit</a></li>
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
            </div>
        </div>
    </header>

    <div class="page-name">
        <h1 style="padding-top: 180px; padding-left: 60px;">Favorit</h1>
        <img src="{{ asset('assets/line.png') }}" alt="" style="padding-top: 6px; padding-left: 55px;">
    </div>

    <div class="card">
        @foreach ($data as $row)
            @if (Auth::id() == $row->id_user)
                <div class="product">
                    <a href="{{ route('detailKos', ['id' => $row->id_kos]) }}">
                        <img src="{{ asset('storage/public/fileimg/' . $row->kost->Gambar) }}" alt="" style="width:370px;height:448px;object-fit:cover">
                    </a>
                    <br/>
                    <form action="{{ route('unlist', ['id' => $row->id_kos]) }}" method="POST">
                        @csrf
                        <button class="love" type="submit" name="unlist"><img src="{{ asset('assets/heart.png') }}" alt=""></button>
                    </form>
                    <h1 style="font-size: 17px;">{{ $row->kost->Nama}}</h1>
                    <p style="font-weight: 500;">{{ $row->kost->Lokasi }}</p>
                    <p style="color: #999999">{{ $row->kost->Fasilitas }}</p>
                    <p style="font-weight: 500;">{{ "Rp " . $row->kost->Harga }}</p>
                </div>
            @endif
        @endforeach
    </div>


@section('footer')
    <footer>
        <div class="logo-footer">
            <img src="{{ asset('assets/logo.png') }}" alt="">
        </div>

        <div class="textfoot">
            SwiftStay adalah web pencarian dan pemesanan 
            kost bagi mahasiswa. Web ini memiliki fitur 
            utama yaitu informasi kost terdiri dari foto, 
            deskripsi, kelas, ukuran, fasilitas, harga, akses 
            kendaraan, dan ulasan. 
        </div>

        <div class="mediaSocial">
            <p>Ikuti Kami</p>
            <div class="img-med">
                <img src="{{ asset('assets/instagram.png') }}" alt="">
                <img src="{{ asset('assets/facebook.png') }}" alt="">
                <img src="{{ asset('assets/twitter.png') }}" alt="">   
            </div>
        </div>
        
        <div class="contact">
            <p>Kontak</p>
            <p><a href="https://wa.me/+628113650922" style="text-decoration: none; color: white;">0811-3650-911 (Dinda)</a></p> 
            <p>swiftstay@gmail.com</p>
        </div>
    </footer>
    </html>