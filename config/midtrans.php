<?php

return [
    'is_production' => false, // Ubah ke true jika ingin produksi
    'server_key' => env('MIDTRANS_SERVER_KEY', 'your-server-key'),
    'client_key' => env('MIDTRANS_CLIENT_KEY', 'your-client-key'),
];
