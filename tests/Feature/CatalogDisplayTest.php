<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class CatalogDisplayTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_homepage_shows_the_previous_landing_page_and_links_to_the_catalog(): void
    {
        $category = Category::create(['name' => 'Fashion']);

        Product::create([
            'category_id' => $category->id,
            'name' => 'Produk unggulan',
            'description' => 'Produk pilihan kampus.',
            'price' => 50000,
            'stock' => 10,
        ]);

        $response = $this->get('/');

        $response->assertOk();
        $response->assertSee('<title>Selamat Datang - MyStyle Store</title>', false);
        $response->assertSee('Gaya Maksimal');
        $response->assertSee('Harga Ramah Di Kantong');
        $response->assertSee('Masuk ke Katalog Toko');
        $response->assertSee('href="'.route('catalog.index').'"', false);
        $response->assertDontSee('Produk unggulan');
    }

    public function test_homepage_does_not_show_a_catalog_empty_state_when_no_products_are_available(): void
    {
        $response = $this->get('/');

        $response->assertOk();
        $response->assertSee('Masuk ke Katalog Toko');
        $response->assertDontSee('Belum ada produk yang tersedia. Cek lagi nanti, ya!');
    }

    public function test_catalog_page_displays_the_full_product_collection(): void
    {
        $category = Category::create(['name' => 'Fashion']);
        $productNames = [];

        foreach (range(1, 5) as $number) {
            $productNames[] = "Produk {$number}";

            Product::create([
                'category_id' => $category->id,
                'name' => "Produk {$number}",
                'description' => 'Produk pilihan kampus.',
                'price' => 50000,
                'stock' => 10,
            ]);
        }

        $response = $this->get('/katalog');

        $response->assertOk();
        $response->assertSee('<a href="'.route('catalog.index').'">Koleksi</a>', false);
        $response->assertSee(
            '<a href="#koleksi" class="hero-cta">Explore the collection',
            false,
        );
        $response->assertSee('<section class="catalog" id="koleksi"', false);
        foreach ($productNames as $productName) {
            $response->assertSee($productName);
        }
    }
}
