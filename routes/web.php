<?php

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

// --- 1. HALAMAN UTAMA / LANDING PAGE ---
Route::get('/', function () {
    $featuredProducts = Product::orderByDesc('id')->limit(4)->get();

    return view('welcome', compact('featuredProducts'));
})->name('home');

// --- 2. HALAMAN KATALOG PRODUK ---
Route::get('/katalog', function () {
    $products = Product::all();

    return view('catalog', compact('products'));
})->name('catalog.index');

// --- 3. KERANJANG BELANJA (CART) ---
Route::post('/cart/add/{id}', function (Request $request, $id) {
    $product = Product::findOrFail($id);
    $cart = session()->get('cart', []);

    if (isset($cart[$id])) {
        $cart[$id]['quantity']++;
    } else {
        $cart[$id] = [
            'name' => $product->name,
            'price' => $product->price,
            'image' => $product->image,
            'quantity' => 1,
        ];
    }

    session()->put('cart', $cart);

    return redirect('/cart');
});

Route::get('/cart', function () {
    $cart = session()->get('cart', []);

    return view('cart', compact('cart'));
});

Route::get('/cart/remove/{id}', function ($id) {
    $cart = session()->get('cart', []);
    if (isset($cart[$id])) {
        unset($cart[$id]);
        session()->put('cart', $cart);
    }

    return redirect('/cart');
});

// --- 4. CHECKOUT KERANJANG ALA SHOPEE ---
Route::get('/checkout-cart', function () {
    $cart = session()->get('cart', []);
    if (empty($cart)) {
        return redirect('/cart');
    }

    return view('checkout_cart', compact('cart'));
});

Route::post('/checkout-cart', function (Request $request) {
    $cart = session()->get('cart', []);
    if (empty($cart)) {
        return redirect('/cart');
    }

    $totalKeseluruhan = 0;
    foreach ($cart as $item) {
        $totalKeseluruhan += $item['price'] * $item['quantity'];
    }

    // Gabungkan data alamat dan metode pembayaran agar tersimpan di database tanpa error
    $infoPengiriman = $request->area.' | Metode: '.$request->payment_method;

    Order::create([
        'customer_name' => $request->nama,
        'customer_phone' => $request->nohp,
        'university_area' => $infoPengiriman,
        'total_price' => $totalKeseluruhan,
    ]);

    // Simpan info pembayaran sementara untuk halaman QRIS/VA
    $paymentData = [
        'method' => $request->payment_method,
        'total' => $totalKeseluruhan,
        'order_id' => 'KMP-'.rand(10000, 99999), // Buat nomor pesanan acak
    ];

    session()->forget('cart');
    session()->put('payment_data', $paymentData);

    return redirect('/pembayaran');
});

// --- FITUR BARU: HALAMAN KONFIRMASI PEMBAYARAN ---
Route::get('/pembayaran', function () {
    $paymentData = session()->get('payment_data');
    if (! $paymentData) {
        return redirect('/');
    }

    return view('payment', compact('paymentData'));
});
// --- 5. SISTEM LOGIN ADMIN ---
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', function (Request $request) {
    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        $request->session()->regenerate();

        return redirect('/admin');
    }

    return back()->with('error', 'Email atau Password salah!');
});

Route::get('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/');
});

// --- 6. ADMIN PANEL (TERKUNCI) ---
Route::middleware('auth')->group(function () {

    // Halaman Utama Admin
    Route::get('/admin', function () {
        $orders = Order::orderBy('created_at', 'desc')->get();
        $products = Product::orderBy('created_at', 'desc')->get();

        return view('admin', compact('orders', 'products'));
    });

    // Fitur Tambah Produk
    Route::get('/admin/tambah-produk', function () {
        $categories = Category::all();

        return view('create_product', compact('categories'));
    });

    Route::post('/admin/tambah-produk', function (Request $request) {
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('produk', 'public');
        }
        Product::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'image' => $imagePath,
        ]);

        return redirect('/admin');
    });

    // Fitur Edit Produk
    Route::get('/admin/edit-produk/{id}', function ($id) {
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('edit_product', compact('product', 'categories'));
    });

    Route::post('/admin/edit-produk/{id}', function (Request $request, $id) {
        $product = Product::findOrFail($id);
        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $product->image = $request->file('image')->store('produk', 'public');
        }
        $product->category_id = $request->category_id;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->save();

        return redirect('/admin');
    });

    // Fitur Hapus Produk
    Route::get('/admin/hapus-produk/{id}', function ($id) {
        $product = Product::findOrFail($id);
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }
        $product->delete();

        return redirect('/admin');
    });
});
