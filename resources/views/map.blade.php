<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maps</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <style>
        #map {
            height: 500px;
            width: 100%;
        }
    </style>
</head>
<body>
    <h1>Cari menggunakan Maps</h1>
    <div id="map"></div>
    <script>
        // Inisialisasi peta
        const map = L.map('map').setView([-6.974682, 107.630250], 16); // Koordinat Telkom University

        // Tambahkan layer peta dari OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: ''
        }).addTo(map);

        // Tambahkan marker di lokasi Telkom University
        L.marker([-6.974682, 107.630250]).addTo(map)
            .bindPopup('<b>Telkom University</b><br>Bandung.')
            .openPopup();
    </script>
</body>
</html>
