<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - MyStyle Store</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans flex items-center justify-center min-h-screen">

    <div class="bg-white p-8 rounded-xl shadow-md w-full max-w-md">
        <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Checkout Pesanan</h2>
        
        <!-- Rincian Produk yang dibeli -->
        <div class="bg-indigo-50 p-4 rounded-lg mb-6 border border-indigo-100">
            <h3 class="font-bold text-indigo-900">{{ $product->name }}</h3>
            <p class="text-indigo-700 font-semibold">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
        </div>

        <!-- Form Data Pembeli -->
        <form action="{{ url('/checkout/' . $product->id) }}" method="POST">
            @csrf
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                <input type="text" name="nama" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-indigo-500">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Nomor WhatsApp Anda</label>
                <input type="number" name="nohp" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-indigo-500">
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-700 mb-1">Area Kampus / Asrama</label>
                <input type="text" name="area" placeholder="Misal: Kosan Pak Edi, Gerbang Depan" required class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-indigo-500">
            </div>

            <button type="submit" class="w-full bg-indigo-600 text-white font-bold py-3 rounded-lg hover:bg-indigo-700 transition">
                Pesan Sekarang via WhatsApp
            </button>
            <a href="{{ url('/') }}" class="block text-center mt-4 text-sm text-gray-500 hover:text-gray-800">Batal & Kembali</a>
        </form>
    </div>

</body>
</html>