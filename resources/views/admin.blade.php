<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - MyStyleStore</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans antialiased">

    <!-- Navbar Admin -->
    <nav class="bg-indigo-900 text-white shadow-md py-4 px-8 flex justify-between items-center">
        <h1 class="text-xl font-bold">MyStyleStore Admin Panel</h1>
        <div>
            <a href="{{ url('/') }}" class="text-indigo-200 hover:text-white font-semibold mr-4">Lihat Toko ➔</a>
            <a href="{{ url('/logout') }}" class="bg-red-600 text-white px-3 py-1.5 rounded text-sm hover:bg-red-700">Logout</a>
        </div>
    </nav>

    <!-- Konten Dashboard -->
    <main class="max-w-7xl mx-auto px-4 py-8">
        
        <!-- ================= BAGIAN 1: MANAJEMEN PRODUK ================= -->
        <div class="flex justify-between items-center mb-4 mt-4">
            <h2 class="text-2xl font-bold text-gray-900">Katalog Produk Saya</h2>
            <a href="{{ url('/admin/tambah-produk') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg font-bold hover:bg-indigo-700 shadow">
                + Tambah Produk Baru
            </a>
        </div>
        
        <div class="bg-white rounded-lg shadow overflow-hidden mb-12 border border-gray-200">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-indigo-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-bold text-indigo-900 uppercase">Foto</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-indigo-900 uppercase">Nama Produk</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-indigo-900 uppercase">Harga</th>
                        <th class="px-6 py-3 text-left text-xs font-bold text-indigo-900 uppercase">Stok</th>
                        <th class="px-6 py-3 text-center text-xs font-bold text-indigo-900 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($products as $item)
                        <tr>
                            <!-- Kolom 1: FOTO -->
                            <td class="px-6 py-3 whitespace-nowrap">
                                @if($item->image)
                                    <img src="{{ asset('storage/' . $item->image) }}" class="h-12 w-12 object-cover rounded shadow-sm">
                                @else
                                    <div class="h-12 w-12 bg-gray-200 rounded flex items-center justify-center text-xs text-gray-500">Tanpa Foto</div>
                                @endif
                            </td>
                            
                            <!-- Kolom 2: NAMA PRODUK -->
                            <td class="px-6 py-3 whitespace-nowrap font-bold text-gray-900">{{ $item->name }}</td>
                            
                            <!-- Kolom 3: HARGA -->
                            <td class="px-6 py-3 whitespace-nowrap text-sm text-green-600 font-bold">Rp {{ number_format($item->price, 0, ',', '.') }}</td>
                            
                            <!-- Kolom 4: STOK -->
                            <td class="px-6 py-3 whitespace-nowrap text-sm text-gray-500">{{ $item->stock }} Pcs</td>
                            
                            <!-- Kolom 5: AKSI (Edit & Hapus Berdampingan) -->
                            <td class="px-6 py-3 whitespace-nowrap text-center space-x-2">
                                <a href="{{ url('/admin/edit-produk/' . $item->id) }}" class="text-blue-600 hover:text-blue-900 font-bold bg-blue-50 hover:bg-blue-100 px-3 py-1.5 rounded transition">
                                    Edit
                                </a>
                                
                                <a href="{{ url('/admin/hapus-produk/' . $item->id) }}" onclick="return confirm('Apakah kamu yakin ingin menghapus produk ini secara permanen?')" class="text-red-600 hover:text-red-900 font-bold bg-red-50 hover:bg-red-100 px-3 py-1.5 rounded transition">
                                    Hapus
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">Belum ada produk di toko.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- ================= BAGIAN 2: DAFTAR PESANAN ================= -->
        <h2 class="text-2xl font-bold text-gray-900 mb-4 border-t pt-8">Daftar Pesanan Masuk</h2>
        
        <div class="bg-white rounded-lg shadow overflow-hidden border border-gray-200">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Pembeli</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">No. WhatsApp</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Area Kampus</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total Belanja</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($orders as $order)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $order->created_at->format('d M Y, H:i') }}</td>
                            <td class="px-6 py-4 whitespace-nowrap font-bold text-gray-900">{{ $order->customer_name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                <a href="https://wa.me/{{ $order->customer_phone }}" target="_blank" class="text-indigo-600 hover:underline">{{ $order->customer_phone }}</a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $order->university_area }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-green-600">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">Belum ada pesanan masuk.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>

</body>
</html>