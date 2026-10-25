<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang - MyStyle Store</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="bg-slate-900 text-white min-h-screen flex flex-col justify-between antialiased relative overflow-hidden">

    <!-- Aksen Background -->
    <div class="absolute -top-32 -left-32 w-96 h-96 bg-indigo-600/30 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-32 -right-32 w-96 h-96 bg-violet-600/30 rounded-full blur-3xl pointer-events-none"></div>

    <!-- Navbar -->
    <nav class="relative z-10 p-6 md:px-12 flex justify-between items-center max-w-7xl mx-auto w-full">
        <div class="flex items-center gap-2">
            <span class="bg-indigo-600 text-white font-extrabold text-xl px-3 py-1 rounded-xl shadow-lg">M</span>
            <h1 class="text-xl font-extrabold tracking-tight">MyStyle<span class="text-indigo-400">Store.</span></h1>
        </div>
        <div>
            <a href="{{ url('/login') }}" class="text-sm font-semibold text-slate-300 hover:text-white transition">Login Admin</a>
        </div>
    </nav>

    <!-- Konten Utama (TIDAK ADA KATALOG DI SINI) -->
    <main class="relative z-10 max-w-3xl mx-auto px-6 text-center py-20 flex flex-col items-center justify-center flex-grow">
        <span class="bg-indigo-500/20 text-indigo-300 text-xs font-bold px-4 py-1.5 rounded-full uppercase tracking-wider mb-6 border border-indigo-500/30">
            ✨ Exclusive Fashion 
        </span>
        <h2 class="text-4xl md:text-6xl font-extrabold tracking-tight leading-tight mb-6">
            Gaya Maksimal, <br><span class="text-indigo-400">Harga Ramah Di Kantong</span>
        </h2>
        <p class="text-slate-400 text-base md:text-lg mb-10 max-w-xl leading-relaxed">
            Platform belanja kebutuhan fashion,dan aksesoris kekinian di masa kini serta terpercaya.
        </p>
        
        <!-- Tombol yang PASTI pindah halaman -->
        <div class="flex flex-col sm:flex-row gap-4 w-full justify-center">
            <a href="{{ url('/katalog') }}" class="bg-indigo-600 hover:bg-indigo-500 text-white font-bold px-8 py-4 rounded-2xl shadow-xl shadow-indigo-600/30 transition-all text-base flex items-center justify-center gap-2 transform hover:scale-105">
                <span>Masuk ke Katalog Toko</span>
                <span>➔</span>
            </a>
        </div>
    </main>

    <!-- Footer -->
    <footer class="relative z-10 py-6 text-center text-xs text-slate-500 border-t border-slate-800/60">
        <p>&copy; 2026 MyStyleStore.</p>
    </footer>

</body>
</html>