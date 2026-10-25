<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat akun Admin
        User::create([
            'name' => 'Admin Nabil',
            'email' => 'admin@fashion.com',
            'password' => bcrypt('password123'),
        ]);

        // 2. Buat Kategori
        $kat1 = Category::create(['name' => 'Pakaian']);
        $kat2 = Category::create(['name' => 'Aksesoris']);

        // 3. Buat Produk Contoh
        Product::create([
            'category_id' => $kat1->id,
            'name' => 'Kaos Oversize Mahasiswa',
            'description' => 'Kaos nyaman dan trendi untuk dipakai ke kampus seharian.',
            'price' => 75000,
            'stock' => 20,
        ]);

        Product::create([
            'category_id' => $kat2->id,
            'name' => 'Tote Bag Kanvas',
            'description' => 'Tas serbaguna andalan mahasiswa.',
            'price' => 45000,
            'stock' => 15,
        ]);
    }
}