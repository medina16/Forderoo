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
            'category_id' => '1',
            'name' => 'Menu A',
            'description' => 'Ayam sambal matah terlezat yang pernah medina rasakan :)',
            'price' => '30000',
            'isAvailable' => '1',
            'photo_filename' => "/menuimg/matah.jpg",
            'sales' => '10'
        ]);

        MenuItem::create([
            'category_id' => '2',
            'name' => 'Menu B',
            'description' => 'SDGERBERBEBREBRBTRB',
            'price' => '20000',
            'isAvailable' => '1',
            'photo_filename' => "/menuimg/matah.jpg",
            'sales' => '10'
        ]);

        MenuItem::create([
            'category_id' => '2',
            'name' => 'Menu C',
            'description' => 'EERBEBEGTETGRET5G3',
            'price' => '20000',
            'isAvailable' => '1',
            'photo_filename' => "/menuimg/matah.jpg",
            'sales' => '10'
        ]);

        FavListItem::create([
            'menu_item_id' => '1',
            'customer_account_id' => '1'
        ]);

        FavListItem::create([
            'menu_item_id' => '2',
            'customer_account_id' => '1'
        ]);

        Order::create([
            'customer_account_id' => '1',
            'note' => 'Sambal matahnya jangan yang abal :('
        ]);

        Order::create([
            'customer_account_id' => '1',
            'note' => 'Sambal matahnya jangan pake bawang'
        ]);

        OrderItem::create([
            'order_id' => '1',
            'menu_item_id' => '1',
            'quantity' => '10'
        ]);

        OrderItem::create([
            'order_id' => '1',
            'menu_item_id' => '2',
            'quantity' => '2'
        ]);

        OrderItem::create([
            'order_id' => '1',
            'menu_item_id' => '3',
            'quantity' => '4'
        ]);

        OrderItem::create([
            'order_id' => '2',
            'menu_item_id' => '1',
            'quantity' => '1'
        ]);
    
    }
}
