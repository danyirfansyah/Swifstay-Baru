<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Payment</title>
        <style>body {
            background-image: url('/assets/background.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.9);
        }
    </style>
</head>

<body>
    <div class="container mx-auto my-20 p-6 max-w-md bg-gray-10 rounded-2xl shadow-lg">
        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-4">Form Pembayaran</h2>
        <form id="payment-form" class="space-y-4">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nama</label>
                <input type="text" id="name" name="name" required
                    class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" name="email" required
                    class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="phone" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                <input type="text" id="phone" name="phone" required
                    class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <div>
                <label for="amount" class="block text-sm font-medium text-gray-700">Jumlah Pembayaran</label>
                <input type="number" id="amount" name="amount" required
                    class="w-full mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <button type="submit"
                class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
                Bayar
            </button>
        </form>
    </div>

    <script>
        document.getElementById('payment-form').addEventListener('submit', function(e) {
            e.preventDefault();

            let formData = new FormData(this);

            fetch("{{ route('process.payment') }}", {
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.snapToken) {
                        window.snap.pay(data.snapToken);
                    } else {
                        alert("Error: " + data.error);
                    }
                });
        });
    </script>
</body>

</html>
