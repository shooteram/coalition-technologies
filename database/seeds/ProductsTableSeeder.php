<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                "name" => "Corsair K70 (Keyboard)",
                "quantity" => 240,
                "price" => 80.5
            ],
            [
                "name" => "Logitech G502 (Mouse)",
                "quantity" => 120,
                "price" => 70
            ]
        ];

        foreach ($products as $product) {
            Product::create([
                "name" => $product["name"],
                "quantity" => $product["quantity"],
                "price" => $product["price"]
            ]);
        }

        echo "Two products added to test." . PHP_EOL;
    }
}
