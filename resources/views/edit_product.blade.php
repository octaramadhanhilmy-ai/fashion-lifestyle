<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk - KampusStyle</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans antialiased py-12">

    <div class="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow-md border border-gray-200">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-900">✏️ Edit Data Produk</h2>
            <a href="{{ url('/admin') }}" class="text-gray-500 hover:text-indigo-600 font-semibold">← Batal</a>
        </div>
        
        <form action="{{ url('/admin/edit-produk/' . $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="mb-4">
                <label class="block text-sm font-bold text-gray-700 mb-2">Kategori Produk</label>
                <select name="category_id" required class="w-full border rounded-lg px-4 py-2 bg-gray-50 focus:ring-2 focus:ring-indigo-200 outline-none">
                    @foreach($categories as $kategori)
                        <!-- Akan otomatis memilih kategori yang sudah tersimpan sebelumnya -->
                        <option value="{{ $kategori->id }}" {{ $product->category_id == $kategori->id ? 'selected' : '' }}>
                            {{ $kategori->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-bold text-gray-700 mb-2">Nama Produk</label>
                <input type="text" name="name" value="{{ $product->name }}" required class="w-full border rounded-lg px-4 py-2 bg-gray-50 focus:ring-2 focus:ring-indigo-200 outline-none">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-bold text-gray-700 mb-2">Deskripsi Singkat</label>
                <textarea name="description" required class="w-full border rounded-lg px-4 py-2 bg-gray-50 focus:ring-2 focus:ring-indigo-200 outline-none h-24">{{ $product->description }}</textarea>
            </div>

            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Harga (Rp)</label>
                    <input type="number" name="price" value="{{ $product->price }}" required class="w-full border rounded-lg px-4 py-2 bg-gray-50 focus:ring-2 focus:ring-indigo-200 outline-none">
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">Sisa Stok</label>
                    <input type="number" name="stock" value="{{ $product->stock }}" required class="w-full border rounded-lg px-4 py-2 bg-gray-50 focus:ring-2 focus:ring-indigo-200 outline-none">
                </div>
            </div>

            <div class="mb-6 p-4 border border-dashed border-gray-300 rounded-lg bg-gray-50">
                <label class="block text-sm font-bold text-gray-700 mb-2">Ubah Foto Produk (Opsional)</label>
                @if($product->image)
                    <div class="mb-3 flex items-center gap-3">
                        <img src="{{ asset('storage/' . $product->image) }}" class="w-16 h-16 object-cover rounded border">
                        <span class="text-xs text-gray-500">Foto saat ini. Biarkan kosong jika tidak ingin mengubah foto.</span>
                    </div>
                @endif
                <input type="file" name="image" accept="image/*" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white font-bold px-6 py-3 rounded-xl hover:bg-blue-700 shadow-md transition">
                Simpan Perubahan ➔
            </button>
        </form>
    </div>

</body>
</html>