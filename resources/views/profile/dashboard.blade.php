<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cari Kos</title>
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <!-- Header -->
    <header class="bg-white shadow p-4">
        <div class="container mx-auto flex items-center justify-between">
            <a href="#" class="text-orange-500 font-bold text-xl">Swiftstay.com</a>
            <div class="flex items-center space-x-5">
                <a href="#" class="text-gray-600">Daftar</a>
                <a href="#" class="text-gray-600">Masuk</a>
                <button>
                    <img class="w-8 h-8" src="/assets/user.jpg" alt="">
                </button>                
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="bg-cover bg-center h-80 flex items-center justify-center"
        style="background-image: url('/assets/bg-image.jpg');">
        <div class="text-center text-white">
            <h1 class="text-3xl font-bold text-black">CARI KOS TERDEKAT CEPAT DAN MUDAH</h1>
            <button class="mt-4 bg-blue-500 px-4 py-2 rounded ">Cari Sekarang</button>
        </div>
    </section>

    <!-- Search Bar -->
    <div class="container mx-auto mt-8 px-4">
        <div class="bg-white rounded shadow p-4 flex items-center space-x-2">
            <input type="text" placeholder="Ketik Lokasi atau Nama Kos" class="w-full px-4 py-2 border rounded">
            <button class="bg-orange-500 text-white px-4 py-2 rounded">Cari Kos</button>
        </div>
    </div>

    <!-- Premium Kos Section -->
    <section class="container mx-auto mt-10 px-4">
        <h2 class="text-2xl font-bold mb-4">KOS</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- First Kos Card -->
            <div>
                <img src="/assets/kos1.jpg" alt="Kos Hajiten" class="h-80 w-80 object-cover">
                <div class="p-4">
                    <span class="bg-red-500 text-white text-xs font-semibold px-2 py-1 rounded">PREMIUM</span>
                    <h3 class="text-lg font-bold mt-2">Kost Hajiten</h3>
                    <p class="text-gray-500 mt-1">Rp 2.300.000 / Bulan</p>
                    <p class="text-gray-400 text-sm mt-1">📍 Jl. Kemanggisan Bulog Blok B no 30, DKI Jakarta</p>
                </div>
            </div>

            <!-- Second Kos Card -->
            <div>
                <img src="/assets/kos2.jpg" alt="Kos Modern Grogol" class="h-80 w-80 object-cover">
                <div class="p-4">
                    <span class="bg-red-500 text-white text-xs font-semibold px-2 py-1 rounded">PREMIUM</span>
                    <h3 class="text-lg font-bold mt-2">Kos/ Kos modern Grogol dekat Trisakti, UNTAR, mall</h3>
                    <p class="text-gray-500 mt-1">Rp 1.900.000 / Bulan</p>
                    <p class="text-gray-400 text-sm mt-1">📍 Jl. Grogol, Jakarta Barat</p>
                </div>
            </div>
        </div>
    </section>

    <section class="container mx-auto mt-10 px-4">
        <h2 class="text-2xl font-bold mb-4"></h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- First Kos Card -->
            <div>
                <img src="/assets/kos3.jpg" alt="Kos Hajiten" class="h-80 w-80 object-cover">
                <div class="p-4">
                    <span class="bg-red-500 text-white text-xs font-semibold px-2 py-1 rounded">PREMIUM</span>
                    <h3 class="text-lg font-bold mt-2">Kost Hajiten</h3>
                    <p class="text-gray-500 mt-1">Rp 2.300.000 / Bulan</p>
                    <p class="text-gray-400 text-sm mt-1">📍 Jl. Kemanggisan Bulog Blok B no 30, DKI Jakarta</p>
                </div>
            </div>

            <!-- Second Kos Card -->
            <div>
                <img src="/assets/kos4.jpg" alt="Kos Modern Grogol" class="h-80 w-80 object-cover">
                <div class="p-4">
                    <span class="bg-red-500 text-white text-xs font-semibold px-2 py-1 rounded">PREMIUM</span>
                    <h3 class="text-lg font-bold mt-2">Kos/ Kos modern Grogol dekat Trisakti, UNTAR, mall</h3>
                    <p class="text-gray-500 mt-1">Rp 1.900.000 / Bulan</p>
                    <p class="text-gray-400 text-sm mt-1">📍 Jl. Grogol, Jakarta Barat</p>
                </div>
            </div>
        </div>
    </section>

</body>

</html>
