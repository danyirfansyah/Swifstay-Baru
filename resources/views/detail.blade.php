{{-- resources/views/detail-product.blade.php --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Product</title>
    <link rel="stylesheet" href="{{ asset('css/detail-style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/homepage-style.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');
        /* Additional CSS styling here */
    </style>
</head>

<body>
    <header>
        <div class="logo-header">
            <img src="{{ asset('assets/logo.png') }}" alt="">
            <h1>SWIFTSTAY</h1>
        </div>
        <div class="search-nav">
            <div class="search">
                <input type="search" placeholder="Mau ngekost dimana?">
                <button class="searchbtn" type="submit" name="submit"><img src="{{ asset('assets/search-icon.png') }}"
                        alt=""></button>
            </div>
            <nav class="navbar">
                <ul>
                    <li class="beranda"><a href="{{ route('homepage') }}">Beranda</a></li>
                    @if (auth()->user()->role == 'Pemilik')
                        <li class="pemesanan"><a href="{{ route('insertKost') }}">Tambah Kos</a></li>
                    @endif
                    <li class="favorit"><a href="{{ route('favorit') }}">Favorit</a></li>
                    <li class="map"><a href="/map">Maps</a></li>
                </ul>
            </nav>
        </div>
        <div class="masuk">
            <div class="user" name="user">
                <p>Welcome {{ $data->user->profile->nama }}</p>
            </div>
            <button name="usn" class="usn">
                <a href="{{ route('profile') }}">
                    <img src="{{ $datarole->profile->img_prof ? asset('profil/' . $datarole->profile->img_prof) : asset('assets/user.jpg') }}"
                        alt="">
                </a>
            </button>
            <div class="iconlogout">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="menu"><img class="" src="{{ asset('assets/logout.png') }}"></button>
                </form>
                </form>
            </div>
        </div>
    </header>

    <div class="page-name">
        <h1 class="font-bold" style="padding-top: 180px; padding-left: 60px;">Detail Kost</h1>
        <img src="{{ asset('assets/line.png') }}" alt="" style="padding-top: 6px; padding-left: 55px;">
    </div>

    <div class="small-container">
        <div class="row">
            <div class="col-2">
                <img src="{{ asset('/storage/public/fileimg/' . $data->Gambar) }}" width="100%">

                <div class="small-img-row">
                    <div class="small-img-col">
                        <img src="{{ asset('assets/kos5.jpg') }}" width="0%" alt="">
                    </div>
                </div>
            </div>

            <div class="col-2">
                <h1 class="font-bold">{{ $data->Nama }}</h1>
                <div class="ulasan" style="display: flex; align-items: center; gap: 5px">
                    <h2>★</h2>
                    <p>{{ number_format($hasil, 1, ".", ".") }}</p>
                </div>

                <h2 class="font-bold">{{ number_format($data->Harga, 2, ',', '.') }}</h2><br>

                <h3 class="font-bold">Deskripsi</h3>
                <p>{{ $data->Deskripsi }}</p><br>

                <h3 class="font-bold">Lokasi</h3>
                <p>{{ $data->Lokasi }}</p><br>

                <h3 class="font-bold">Kelas</h3>
                <p>{{ $data->Kelas }}</p><br>

                <h3 class="font-bold">Ukuran</h3>
                <p>{{ $data->Ukuran }}</p><br>

                <h3 class="font-bold">Fasilitas</h3>
                <ul>
                    @foreach (explode(',', $data->Fasilitas) as $fasilitas)
                        <li>{{ $fasilitas }}</li>
                    @endforeach
                </ul><br>

                <h3 class="font-bold">Akses Kendaraan</h3>
                <ul>
                    @foreach (explode(',', $data->Akses_Kendaraan) as $akses)
                        <li>{{ $akses }}</li>
                    @endforeach
                </ul>

                <a href="{{ url('/payment') }}">
                    <button class="btn">Pesan</button>
                </a>
                <a
                    href="https://api.whatsapp.com/send/?phone={{ $data->No_telp }}&text&type=phone_number&app_absent=0">
                    <button class="btn">Chat</button>
                </a>
            </div>
        </div>

        <div class="rating">
            <h2 class="font-bold">Ulasan</h2>
        </div>
        <form action="{{ route('prosesUlasan', ['id' => $data->id]) }}" method="POST">
            @csrf
            <div>
                <label for="nilai">Rating:</label>
                <select name="nilai" id="nilai">
                    <option value="1">★</option>
                    <option value="2">★★</option>
                    <option value="3">★★★</option>
                    <option value="4">★★★★</option>
                    <option value="5">★★★★★</option>
                </select>
            </div>
            <div>
                <label for="ulasan">Ulasan:</label>
                <textarea class="w-full h-24 border border-gray-600 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none" id="ulasan" name="ulasan" placeholder="Tulis pengalamanmu di sini" required></textarea>
            </div>
            <button class="w-full border border-gray-300 text-gray-700 py-2 px-4 rounded-md transition-colors duration-200 
             hover:bg-blue-500 hover:text-white active:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-300"" type="submit">Simpan</button>
        </form>        
    </div>

    <footer>
        <div class="logo-footer">
            <img src="{{ asset('assets/logo.png') }}" alt="">
        </div>

        <div class="textfoot">
            SwiftStay adalah web pencarian dan pemesanan kost bagi mahasiswa. Web ini memiliki fitur utama yaitu
            informasi kost terdiri dari foto, deskripsi, kelas, ukuran, fasilitas, harga, akses kendaraan, dan ulasan.
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
            <p><a href="https://wa.me/+628113650922" style="text-decoration: none; color: white;">0811-3650-911
                    (Dinda)</a></p>
            <p>swiftstay@gmail.com</p>
        </div>
    </footer>
</body>

</html>
