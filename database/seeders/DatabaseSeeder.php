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
            'category_id' => '2',
            'name' => 'Pudding',
            'description' => 'Pudding is a type of food. It can be either a dessert, served after the main meal, or a savoury dish, served as part of the main meal.',
            'price' => '30000',
            'isAvailable' => '0',
            'photo_filename' => "/menuimg/puding.jpg",
            'sales' => '9'
        ]);

        MenuItem::create([
            'category_id' => '2',
            'name' => 'Kue',
            'description' => 'Cake is a flour confection made from flour, sugar, and other ingredients and is usually baked. In their oldest forms, cakes were modifications of bread.',
            'price' => '25000',
            'isAvailable' => '1',
            'photo_filename' => "/menuimg/kue.jpg",
            'sales' => '5'
        ]);

        MenuItem::create([
            'category_id' => '4',
            'name' => 'Soda',
            'description' => 'A soft drink (see § Terminology for other names) is any water-based flavored drink, usually but not necessarily carbonated, and typically including added sweetener.',
            'price' => '20000',
            'isAvailable' => '1',
            'photo_filename' => "/menuimg/soda.jpg",
            'sales' => '10'
        ]);

        MenuItem::create([
            'category_id' => '1',
            'name' => 'Burger',
            'description' => 'A hamburger, also called a burger, is a food consisting of fillings—usually a patty of ground meat, typically beef—placed inside a sliced bun or bread roll.',
            'price' => '60000',
            'isAvailable' => '1',
            'photo_filename' => "/menuimg/burger.jpg",
            'sales' => '15'
        ]);

        MenuItem::create([
            'category_id' => '3',
            'name' => 'Sambal Matah',
            'description' => 'Sambal matah merupakan sambal tradisional khas Bali yang cukup populer. Matah berarti mentah, sehingga sambal ini menggunakan bahan mentah.',
            'price' => '10000',
            'isAvailable' => '1',
            'photo_filename' => "/menuimg/matah.jpg",
            'sales' => '13'
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
            'table_number' => '20',
        ]);

        Order::create([
            'customer_account_id' => '1',
            'table_number' => '17',
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
