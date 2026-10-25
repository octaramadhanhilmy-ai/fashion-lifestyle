<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Pesanan - KampusStyle</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="bg-gray-100 antialiased pb-24">

    <!-- Header -->
    <nav class="bg-white shadow-sm py-4 px-6 md:px-12 flex items-center gap-4 sticky top-0 z-50">
        <h1 class="text-2xl font-extrabold text-indigo-600 border-r-2 pr-4 border-gray-200">KampusStyle</h1>
        <span class="text-lg font-bold text-gray-700">Checkout</span>
    </nav>

    <form action="{{ url('/checkout-cart') }}" method="POST" class="max-w-5xl mx-auto px-4 mt-6">
        @csrf
        
        <!-- 1. Alamat Pengiriman -->
        <div class="bg-white p-6 rounded-lg shadow-sm border-t-4 border-indigo-500 mb-4">
            <h3 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
                📍 Alamat Pengiriman
            </h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Penerima</label>
                    <input type="text" name="nama" required class="w-full border rounded-lg px-3 py-2 bg-gray-50 outline-none focus:border-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">No. Handphone (WA)</label>
                    <input type="text" name="nohp" required class="w-full border rounded-lg px-3 py-2 bg-gray-50 outline-none focus:border-indigo-500">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Area Kampus / Detail Alamat</label>
                    <input type="text" name="area" required class="w-full border rounded-lg px-3 py-2 bg-gray-50 outline-none focus:border-indigo-500">
                </div>
            </div>
        </div>

        <!-- 2. Produk Dipesan -->
        <div class="bg-white p-6 rounded-lg shadow-sm mb-4">
            <h3 class="text-lg font-bold text-gray-900 mb-4">Produk Dipesan</h3>
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="text-gray-400 text-sm border-b">
                        <th class="pb-2 font-medium">Produk</th>
                        <th class="pb-2 font-medium text-center">Harga Satuan</th>
                        <th class="pb-2 font-medium text-center">Jumlah</th>
                        <th class="pb-2 font-medium text-right">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach($cart as $item)
                        @php 
                            $subtotal = $item['price'] * $item['quantity'];
                            $total += $subtotal; 
                        @endphp
                        <tr class="border-b border-gray-100">
                            <td class="py-4 flex items-center gap-4">
                                <img src="{{ asset('storage/' . $item['image']) }}" class="w-12 h-12 object-cover rounded border">
                                <span class="font-bold text-gray-800">{{ $item['name'] }}</span>
                            </td>
                            <td class="py-4 text-center text-gray-600">Rp {{ number_format($item['price'], 0, ',', '.') }}</td>
                            <td class="py-4 text-center text-gray-600">{{ $item['quantity'] }}</td>
                            <td class="py-4 text-right font-bold text-gray-800">Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            <div class="flex justify-between items-center mt-4 bg-indigo-50 p-4 rounded-lg border border-indigo-100">
                <span class="font-semibold text-gray-700">Opsi Pengiriman: Reguler (Area Kampus)</span>
                <span class="font-bold text-green-600">GRATIS</span>
            </div>
        </div>

        <!-- 3. Metode Pembayaran -->
        <div class="bg-white p-6 rounded-lg shadow-sm mb-6 border border-gray-200">
            <h3 class="text-lg font-bold text-gray-900 mb-4">Metode Pembayaran</h3>
            <div class="flex flex-col md:flex-row gap-4">
                <label class="flex-1 cursor-pointer">
                    <input type="radio" name="payment_method" value="QRIS" checked class="peer hidden">
                    <div class="border-2 border-gray-200 rounded-lg p-4 text-center peer-checked:border-indigo-600 peer-checked:bg-indigo-50 transition">
                        <span class="block font-bold text-gray-800 mb-1">QRIS (OVO/Dana/Gopay)</span>
                        <span class="text-xs text-gray-500">Scan kode QR otomatis</span>
                    </div>
                </label>

                <label class="flex-1 cursor-pointer">
                    <input type="radio" name="payment_method" value="Transfer Bank (VA)" class="peer hidden">
                    <div class="border-2 border-gray-200 rounded-lg p-4 text-center peer-checked:border-indigo-600 peer-checked:bg-indigo-50 transition">
                        <span class="block font-bold text-gray-800 mb-1">Transfer Bank (VA)</span>
                        <span class="text-xs text-gray-500">BCA, Mandiri, BNI, BRI</span>
                    </div>
                </label>

                <label class="flex-1 cursor-pointer">
                    <input type="radio" name="payment_method" value="COD (Bayar di Tempat)" class="peer hidden">
                    <div class="border-2 border-gray-200 rounded-lg p-4 text-center peer-checked:border-indigo-600 peer-checked:bg-indigo-50 transition">
                        <span class="block font-bold text-gray-800 mb-1">COD (Bayar di Tempat)</span>
                        <span class="text-xs text-gray-500">Bayar saat kurir datang</span>
                    </div>
                </label>
            </div>
        </div>

        <!-- Bottom Checkout Bar -->
        <div class="fixed bottom-0 left-0 w-full bg-white shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.05)] border-t py-4 px-6 md:px-12 flex justify-end items-center gap-6 z-50">
            <div class="text-right">
                <span class="text-sm text-gray-500">Total Pembayaran:</span>
                <div class="text-2xl font-extrabold text-indigo-600">Rp {{ number_format($total, 0, ',', '.') }}</div>
            </div>
            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold text-lg px-10 py-3 rounded-lg shadow-lg transition transform hover:scale-105">
                Buat Pesanan
            </button>
        </div>
    </form>

</body>
</html>