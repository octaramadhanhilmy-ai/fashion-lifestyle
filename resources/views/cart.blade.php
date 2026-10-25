<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Keranjang Belanja - KampusStyle</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans antialiased">

    <nav class="bg-white shadow-md py-4 px-8 flex justify-between items-center">
        <h1 class="text-2xl font-bold text-indigo-600">KampusStyle.</h1>
        <a href="{{ url('/') }}" class="text-gray-700 font-semibold hover:text-indigo-600">← Lanjut Belanja</a>
    </nav>

    <main class="max-w-4xl mx-auto px-4 py-12">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Keranjang Belanja Anda</h2>

        @php $total = 0; @endphp

        @if(session('cart') && count(session('cart')) > 0)
            <div class="bg-white rounded-xl shadow-md overflow-hidden mb-6">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">Produk</th>
                            <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase">Harga</th>
                            <th class="px-6 py-3 text-center text-xs font-bold text-gray-500 uppercase">Jumlah</th>
                            <th class="px-6 py-3 text-right text-xs font-bold text-gray-500 uppercase">Subtotal</th>
                            <th class="px-6 py-3 text-center text-xs font-bold text-gray-500 uppercase">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach(session('cart') as $id => $details)
                            @php 
                                $subtotal = $details['price'] * $details['quantity'];
                                $total += $subtotal; 
                            @endphp
                            <tr>
                                <td class="px-6 py-4 flex items-center gap-4">
                                    @if($details['image'])
                                        <img src="{{ asset('storage/' . $details['image']) }}" class="w-12 h-12 object-cover rounded">
                                    @else
                                        <div class="w-12 h-12 bg-gray-200 rounded"></div>
                                    @endif
                                    <span class="font-bold text-gray-800">{{ $details['name'] }}</span>
                                </td>
                                <td class="px-6 py-4 text-gray-600">Rp {{ number_format($details['price'], 0, ',', '.') }}</td>
                                <td class="px-6 py-4 text-center font-semibold">{{ $details['quantity'] }}</td>
                                <td class="px-6 py-4 text-right font-bold text-indigo-600">Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                                <td class="px-6 py-4 text-center">
                                    <a href="{{ url('/cart/remove/' . $id) }}" class="text-red-600 hover:text-red-800 text-sm font-bold">Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Bagian Total & Tombol Checkout -->
            <div class="bg-white rounded-xl shadow-md p-6 flex justify-between items-center">
                <div>
                    <span class="text-gray-500 text-sm">Total Keseluruhan:</span>
                    <h3 class="text-2xl font-extrabold text-indigo-600">Rp {{ number_format($total, 0, ',', '.') }}</h3>
                </div>
                <a href="{{ url('/checkout-cart') }}" class="bg-indigo-600 text-white font-bold px-8 py-3 rounded-lg hover:bg-indigo-700 shadow">
                    Lanjut ke Checkout Pesanan →
                </a>
            </div>
        @else
            <div class="bg-white rounded-xl shadow-md p-12 text-center">
                <p class="text-gray-500 mb-4">Keranjang belanjaan kamu masih kosong.</p>
                <a href="{{ url('/') }}" class="bg-indigo-600 text-white px-6 py-2 rounded-lg font-bold">Mulai Belanja</a>
            </div>
        @endif
    </main>

</body>
</html>