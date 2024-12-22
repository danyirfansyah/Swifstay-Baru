<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link rel="stylesheet" href="{{ asset('css/homepage-style.css') }}">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap');

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: var(--font-montserrat);
        }

        :root {
            --font-montserrat: 'Montserrat', sans-serif;
        }

        .informasi-pribadi {
            margin-top: 200px;
            text-align: left;
            background-color: #d6f0d4;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            padding-top: 20px;
            padding-left: 15px;
        }

        .upload {
            position: absolute;
            color: transparent;
            width: 150px;
            height: 160px;
            opacity: 0;
            cursor: pointer;
        }

        .div-deg img {
            width: 150px;
            height: 150px;
            border-radius: 100%;
            margin-top: 10px;
            position: absolute;
        }

        .div-deg {
            display: flex;
            justify-content: center;
        }

        .input-nama {
            margin-top: 10%;
        }

        label {
            display: inline-block;
            text-align: left;
            width: 125px;
            padding-top: 20px;
            padding-bottom: 10px;
            margin-top: 10px;
        }

        input[type="text"],
        select,
        input[type="date"],
        input[type="tel"],
        input[type="password"] {
            width: 850px;
            height: 50px;
            padding: 15px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .container {
            margin-top: 50px;
            margin-left: 200px;
            margin-right: 200px;
            background-color: #ffffff;
            border-radius: 10px;
            padding-bottom: 20px;
            border-inline: 1px solid #A9A9A9;
        }

        .btn-primary,
        .btn-secondary {
            text-align: right;
            padding: 10px 20px;
            margin-top: 10px;
            margin-left: 10px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <header>
        <div class="logo-header">
            <img src="{{ asset('assets/logo.png') }}" alt="">
            <h1>SWIFTSTAY</h1>
        </div>

        <div class="search-nav">
            {{-- <form action="{{ route('search') }}" method="post">
            @csrf
            <div class="search">
                <input type="search" name="keyword" placeholder="Mau ngekost dimana?">
                <button class="searchbtn" type="submit"><img src="{{ asset('assets/search-icon.png') }}" alt=""></button>
            </div>
        </form> --}}
            <nav class="navbar">
                <ul>
                    <li class="beranda"><a href="{{ route('homepage') }}">Beranda</a></li>
                    @if (auth()->user()->role === 'Pemilik')
                        <li class="pemesanan"><a href="/insertKost">Tambah Kos</a></li>
                    @endif
                    <li class="favorit"><a href="/favorit">Favorit</a></li>
                </ul>
            </nav>
        </div>
        <div class="masuk">
            <div class="user">
                @if (auth()->check())
                    <p>Welcome {{ $profDat->nama}}</p>
                @endif
            </div>
            <button class="usn">
                {{-- @if (!$profilDefault)
                <a href="{{ route('profile') }}"><img src="{{ asset('profil/Profile.jpeg') }}" alt=""></a>
            @else
                <a href="{{ route('profile') }}"><img src="{{ asset('profil/' . $dataSql->img_prof) }}" alt=""></a>
            @endif --}}
            </button>
            <div class="iconlogout">
                <form METHOD="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="menu"><img class="" src="{{ asset('assets/logout.png') }}"></button>
                </form>
            </div>
        </div>
    </header>

    <center>
        <div class="container">
            <form action="{{ route('proses.profile', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="informasi-pribadi">
                    <h2>Data Pengguna</h2>
                    <br>
                    <div class="div-deg">
                        <img src="{{ $profDat->img_prof ? asset('profil/' . $profDat->img_prof) : asset('assets/user.jpg') }}"
                            alt="Foto Profil" class="foto-profil">
                        <input type="file" class="upload" name="foto">
                    </div>
                </div>

                <div class="input-nama">
                    <label for="nama">Nama</label>
                    <input type="text" value="{{ $profDat->nama }}" id="nama" name="nama">
                </div>

                <div>
                    <label for="jenis-kelamin">Jenis Kelamin</label>
                    <select id="jenis-kelamin" name="jeniskelamin">
                        <option value="laki-laki" @if ($profDat->Jenis_Kelamin === 'Laki-Laki') selected @endif>Laki-laki</option>
                        <option value="perempuan" @if ($profDat->Jenis_Kelamin === 'Perempuan') selected @endif>Perempuan</option>
                    @if ($profDat->Jenis_Kelamin === '-')
                        <option value=""selected disabled hidden>-</option>
                    @endif
                    </select>
                </div>

                <div>
                    <label for="tanggal-lahir">Tanggal Lahir</label>
                    <input type="date" value="{{ $profDat->Tanggal_lahir }}" id="tanggal-lahir" name="tanggallahir">
                </div>

                <div>
                    <label for="nomor-telp">Nomor Telp</label>
                    <input type="tel" value="{{ $profDat->Nomor_Telepon }}" id="nomor-telp" name="nomortelp">
                </div>

                <div>
                    <button type="button" class="btn-primary">Batal</button>
                    <button type="submit" class="btn-secondary">Simpan</button>
                </div>
            </form>
        </div>
    </center>
</body>

</html>
