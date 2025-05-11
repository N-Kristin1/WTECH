<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'name' => 'White T-Shirt',
                'description' => 'Classic white cotton t-shirt.',
                'price' => 19.99,
                'color' => 'White',
                'stock' => 20,
                'category' => 'Tshirts',
                'image' => 'images/whiteshirt.webp',
                'image2' => 'images/whiteshirt2.webp',
            ],
            [
                'name' => 'Green T-Shirt',
                'description' => 'Comfortable green shirt for everyday wear.',
                'price' => 19.99,
                'color' => 'Green',
                'stock' => 20,
                'category' => 'Tshirts',
                'image' => 'images/greenshirt.webp',
                'image2' => 'images/greenshirt2.webp',
            ],
            [
                'name' => 'Purple Sweater',
                'description' => 'Warm and stylish purple sweater.',
                'price' => 34.99,
                'color' => 'Purple',
                'stock' => 15,
                'category' => 'Jackets',
                'image' => 'images/purplesweat.webp',
                'image2' => 'images/purplesweat2.webp',
            ],
            [
                'name' => 'Leather Jacket',
                'description' => 'Genuine leather jacket with timeless design.',
                'price' => 89.99,
                'color' => 'Brown',
                'stock' => 8,
                'category' => 'Jackets',
                'image' => 'images/leatherjacket.jpg',
                'image2' => 'images/leatherjacket2.webp',
            ],
            [
                'name' => 'Blue Jeans',
                'description' => 'Durable and fashionable blue jeans.',
                'price' => 49.99,
                'color' => 'Blue',
                'stock' => 12,
                'category' => 'Pants',
                'image' => 'images/bluejeans.webp',
                'image2' => 'images/bluejeans2.webp',
            ],
            [
                'name' => 'White Shoes',
                'description' => 'Comfortable white shoes for everyday use.',
                'price' => 59.99,
                'color' => 'White',
                'stock' => 10,
                'category' => 'Shoes',
                'image' => 'images/whiteshoes.webp',
                'image2' => 'images/whiteshoes2.webp',
            ],
            [
                'name' => 'Black Boots',
                'description' => 'Sturdy black boots for all terrains.',
                'price' => 79.99,
                'color' => 'Black',
                'stock' => 5,
                'category' => 'Shoes',
                'image' => 'images/blackboots.webp',
                'image2' => 'images/blackboots2.webp',
            ],
            [
                'name' => 'Red Hat',
                'description' => 'Stylish red beanie hat.',
                'price' => 14.99,
                'color' => 'Red',
                'stock' => 25,
                'category' => 'Headwear',
                'image' => 'images/beanie.webp',
                'image2' => 'images/beanie2.webp',
            ],
            [
                'name' => 'Green Cap',
                'description' => 'Breathable green cap perfect for sunny days.',
                'price' => 12.99,
                'color' => 'Green',
                'stock' => 30,
                'category' => 'Headwear',
                'image' => 'images/greencap.webp',
                'image2' => 'images/greencap2.webp',
            ],
            [
                'name' => 'Green Jacket',
                'description' => 'Weather-resistant green jacket with zipper pockets.',
                'price' => 69.99,
                'color' => 'Green',
                'stock' => 10,
                'category' => 'Jackets',
                'image' => 'images/greenjacket.webp',
                'image2' => 'images/greenjacket2.webp',
            ],
            [
                'name' => 'Black Trousers',
                'description' => 'Elegant black trousers for formal and casual wear.',
                'price' => 39.99,
                'color' => 'Black',
                'stock' => 18,
                'category' => 'Pants',
                'image' => 'images/blacktrousers.webp',
                'image2' => 'images/blacktrousers2.webp',
            ],
            [
                'name' => 'Blue Shorts',
                'description' => 'Lightweight blue shorts ideal for summer.',
                'price' => 24.99,
                'color' => 'Blue',
                'stock' => 22,
                'category' => 'Shorts',
                'image' => 'images/blueshorts.webp',
                'image2' => 'images/blueshorts2.webp',
            ],
            [
                'name' => 'Purple T-Shirt',
                'description' => 'Vibrant purple t-shirt made of soft fabric.',
                'price' => 21.99,
                'color' => 'Purple',
                'stock' => 16,
                'category' => 'Tshirts',
                'image' => 'images/purpletshirt.webp',
                'image2' => 'images/purpletshirt2.webp',
            ],
            [
                'name' => 'Red Shoes',
                'description' => 'Sporty red shoes with cushioned soles.',
                'price' => 64.99,
                'color' => 'Red',
                'stock' => 9,
                'category' => 'Shoes',
                'image' => 'images/redshoes.webp',
                'image2' => 'images/redshoes2.webp',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
