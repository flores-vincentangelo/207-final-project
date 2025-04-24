<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        DB::table("users")->truncate();
        DB::table("products")->truncate();

        User::factory()->create([
            'name' => 'Vincent',
            'email' => 'vincentflores88@gmail.com',
            'password'=> bcrypt('123'),
        ]);

        Product::factory()->create([
            "name"=> "Bamboo Toothbrush",
            "description"=> "A biodegradable toothbrush with a 100% bamboo handle and BPA-free nylon bristles.",
            "price"=>120,
            "quantity"=> 100,
            "image"=>"images/products/bamboo-toothbrush.jpeg"
        ]);

        Product::factory()->create([
            "name"=> "Metal Straw Set",
            "description"=> "A stainless steel straw set with a cleaning brush and pouch — perfect for reducing plastic waste.",
            "price"=> 150,
            "quantity"=> 100,
            "image"=>"images/products/metal-straws.jpg"
        ]);
        Product::factory()->create([
            "name"=> "Refillable Liquid Hand Soap (500ml)",
            "description"=> "Lavender-scented, non-toxic, cruelty-free hand soap in a refillable glass bottle.",
            "price"=> 280,
            "quantity"=> 100,
            "image"=>"images/products/hand-soap.jpeg"

        ]);
        Product::factory()->create([
            "name"=> "Natural Laundry Detergent (1kg)",
            "description"=> "Plant-based, hypoallergenic detergent with zero synthetic fragrances — safe for babies and sensitive skin.",
            "price"=> 380,
            "quantity"=> 100,
            "image"=>"images/products/laundry-detergent.webp"            
        ]);
        Product::factory()->create([
            "name"=> "Natural Deodorant Stick",
            "description"=> "Aluminum-free, all-natural deodorant in a compostable or refillable container.",
            "price"=> 320,
            "quantity"=> 100,
            "image"=>"images/products/deo.jpg"            
        ]);
        Product::factory()->create([
            "name"=> "Solar-Powered LED Lantern",
            "description"=> "Portable and collapsible lantern ideal for camping or emergencies. Charges via sunlight.",
            "price"=> 550,
            "quantity"=> 100,
            "image"=>"images/products/lantern.jpeg"            
        ]);
        Product::factory()->create([
            "name"=> "Upcycled Denim Tote Bag",
            "description"=> "Handmade from repurposed denim jeans. Stylish, durable, and one-of-a-kind.",
            "price"=> 690,
            "quantity"=> 100,
            "image"=>"images/products/tote.jpg"            
        ]);
    }
}

// Bamboo Toothbrush
// Description: A biodegradable toothbrush with a 100% bamboo handle and BPA-free nylon bristles.
// Unit Price: ₱120

// Metal Straw Set
// Description: A stainless steel straw set with a cleaning brush and pouch — perfect for reducing plastic waste.
// Unit Price: ₱150


// Refillable Liquid Hand Soap (500ml)
// Description: Lavender-scented, non-toxic, cruelty-free hand soap in a refillable glass bottle.
// Unit Price: ₱280

// Natural Laundry Detergent (1kg)
// Description: Plant-based, hypoallergenic detergent with zero synthetic fragrances — safe for babies and sensitive skin.
// Unit Price: ₱380

// Natural Deodorant Stick
// Aluminum-free, all-natural deodorant in a compostable or refillable container.
// 320.00 each

// Solar-Powered LED Lantern
// Portable and collapsible lantern ideal for camping or emergencies. Charges via sunlight.
// 550.00 each

// Upcycled Denim Tote Bag
// Handmade from repurposed denim jeans. Stylish, durable, and one-of-a-kind.
// 690.00 each