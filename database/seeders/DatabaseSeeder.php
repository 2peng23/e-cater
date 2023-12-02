<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Cake;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'user@user.com',
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'usertype' => 1,
            'email' => 'admin@admin.com',
        ]);
        $wedding_cake = File::get(public_path('data/weddingCake.json'));
        $w_cake = json_decode($wedding_cake, true);
        foreach ($w_cake as $cake) {
            Cake::create([
                'category' => $cake['category'],
                'image' => $cake['image'],
                'price' => $cake['price'],
            ]);
        }

        $categories = [
            'Wedding Cakes',
            'Drip Cakes',
            'Floral Cakes',
            'Fondant Cakes',
            'Minimalist Cakes',
            'Money Cakes',
            'Number Cakes',
            'Themed Cakes'
        ];
        foreach ($categories as $category) {
            Category::create([
                'category_name' => $category
            ]);
        }
    }
}
