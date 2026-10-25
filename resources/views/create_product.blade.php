<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Produk</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow-md">
        <h2 class="text-2xl font-bold text-gray-900 mb-6">Tambah Produk Baru</h2>
        
        <!-- WAJIB ADA enctype="multipart/form-data" AGAR BISA UPLOAD FOTO -->
        <form action="{{ url('/admin/tambah-produk') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Nama Barang</label>
                <input type="text" name="name" required class="w-full border rounded-lg px-3 py-2">
            </div>

            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Kategori</label>
                    <select name="category_id" class="w-full border rounded-lg px-3 py-2">
                        @foreach ($categories as $kategori)
                            <option value="{{ $kategori->id }}">{{ $kategori->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-sm font-bold text-indigo-600 mb-1">Foto Produk Asli</label>
                    <input type="file" name="image" accept="image/*" class="w-full border rounded-lg px-3 py-1 bg-gray-50">
                </div>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium mb-1">Deskripsi Singkat</label>
                <textarea name="description" rows="3" required class="w-full border rounded-lg px-3 py-2"></textarea>
            </div>

            <div class="grid grid-cols-2 gap-4 mb-6">
                <div>
                    <label class="block text-sm font-medium mb-1">Harga (Rp)</label>
                    <input type="number" name="price" required class="w-full border rounded-lg px-3 py-2">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Stok Awal</label>
                    <input type="number" name="stock" required class="w-full border rounded-lg px-3 py-2">
                </div>
            </div>

            <div class="flex justify-end gap-4">
                <a href="{{ url('/admin') }}" class="py-2 px-4 text-gray-600">Batal</a>
                <button type="submit" class="bg-indigo-600 text-white font-bold py-2 px-6 rounded-lg">Simpan Produk</button>
            </div>
        </form>
    </div>
</body>
</html>