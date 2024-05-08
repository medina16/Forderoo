<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\AdminAccount;
use App\Models\MenuItem;
use App\Models\FavListItem;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\CustomerAccount;

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

        CustomerAccount::create([
            'email' => 'mau.tau167@gmail.com',
            'password' => bcrypt("16jul2003"),
            'name' => 'Medina Fitri'
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

        FavListItem::create([
            'id_menuItem' => '1',
            'id_customer' => '1'
        ]);

        Order::create([
            'id_customer' => '1',
            'note' => 'Sambal matahnya jangan yang abal :('
        ]);

        OrderItem::create([
            'id_order' => '1',
            'id_menuItem' => '1',
            'quantity' => '10'
        ]);
    
    }
}
