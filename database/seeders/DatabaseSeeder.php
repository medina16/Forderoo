<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\AdminAccount;
use App\Models\MenuItem;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        AdminAccount::create([
            'username' => 'medinamedina',
            'password' => bcrypt("16jul2003")
        ]);

        Category::create([
            'name' => 'Appetizer',
        ]);

        Category::create([
            'name' => 'Dessert',
        ]);

        Category::create([
            'name' => 'Main Course',
        ]);

        Category::create([
            'name' => 'Drink',
        ]);

        MenuItem::create([
            'id_category' => '1',
            'name' => 'Menu A',
            'description' => 'Ayam sambal matah terlezat yang pernah medina rasakan :)',
            'price' => '30000',
            'isAvailable' => '1',
            'photo_filename' => "/public/menuimg/menua.jpe",
            'sales' => '10'
        ]);
    
    }
}
