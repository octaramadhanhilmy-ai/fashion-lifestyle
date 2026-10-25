<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran Pesanan - KampusStyle</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen py-10 px-4">

    <div class="bg-white max-w-lg w-full rounded-2xl shadow-xl overflow-hidden border border-gray-100">
        
        <!-- Header Invoice -->
        <div class="bg-indigo-600 p-6 text-center text-white">
            <h2 class="text-2xl font-extrabold mb-1">Menunggu Pembayaran</h2>
            <p class="text-indigo-200 text-sm">Selesaikan pembayaran agar pesanan segera diproses.</p>
        </div>

        <div class="p-8">
            <div class="flex justify-between items-center mb-6 pb-6 border-b border-gray-100">
                <span class="text-gray-500 font-medium">Total Tagihan</span>
                <span class="text-2xl font-extrabold text-indigo-600">Rp {{ number_format($paymentData['total'], 0, ',', '.') }}</span>
            </div>

            <!-- LOGIKA METODE PEMBAYARAN -->
            <div class="text-center mb-8">
                @if($paymentData['method'] == 'QRIS')
                    <p class="font-bold text-gray-800 mb-2">Scan QRIS Berikut:</p>
                    <p class="text-xs text-gray-500 mb-4">Gunakan OVO, Dana, Gopay, atau Mobile Banking.</p>
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=Pembayaran_Pesanan_{{ $paymentData['order_id'] }}" alt="QRIS" class="mx-auto border p-2 rounded-xl shadow-sm mb-4">
                    <p class="text-sm font-semibold text-gray-600">Order ID: {{ $paymentData['order_id'] }}</p>

                @elseif($paymentData['method'] == 'Transfer Bank (VA)')
                    <p class="font-bold text-gray-800 mb-2">Transfer ke Virtual Account:</p>
                    <div class="bg-blue-50 border border-blue-200 p-4 rounded-xl mt-4">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/e/e0/BCA_logo.svg" alt="BCA" class="h-6 mx-auto mb-2">
                        <p class="text-xs text-gray-500">Nomor Virtual Account Bank BCA</p>
                        <p class="text-2xl font-extrabold text-gray-900 tracking-widest mt-1">3901 0812 3456</p>
                    </div>

                @elseif($paymentData['method'] == 'COD (Bayar di Tempat)')
                    <div class="bg-green-50 border border-green-200 p-6 rounded-xl mt-4">
                        <span class="text-4xl block mb-2">📦</span>
                        <p class="font-bold text-green-800 text-lg mb-1">Pesanan Berhasil Dibuat!</p>
                        <p class="text-sm text-green-700">Kurir KampusStyle akan mengirimkan pesananmu ke alamat yang dicantumkan. Siapkan uang tunai pas saat barang tiba.</p>
                    </div>
                @endif
            </div>

            <a href="{{ url('/') }}" class="block w-full bg-slate-100 hover:bg-slate-200 text-slate-700 text-center font-bold px-6 py-3 rounded-xl transition">
                Saya Sudah Bayar / Kembali ke Beranda
            </a>
        </div>
    </div>

</body>
</html>