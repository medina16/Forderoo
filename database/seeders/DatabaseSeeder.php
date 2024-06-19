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
            'name' => 'Medina Fitri',
            'phone_number' => '085692563276'
        ]);

        Category::create([
            'name' => 'Nasi',
        ]);

        Category::create([
            'name' => 'Sop',
        ]);

        Category::create([
            'name' => 'Minuman',
        ]);

        Category::create([
            'name' => 'Gorengan',
        ]);

        # MENU
        MenuItem::create([
            'category_id' => '1',
            'name' => 'Nasi Goreng Biasa',
            'description' => 'Nasi goreng biasa',
            'price' => '15000',
            'isAvailable' => '1',
            'photo_filename' => "/menuimg/nasgor_biasa.png",
            'sales' => '30'
        ]);

        MenuItem::create([
            'category_id' => '1',
            'name' => 'Nasi Goreng Bakso',
            'description' => 'Nasi goreng yang dilengkapi dengan bakso',
            'price' => '17000',
            'isAvailable' => '1',
            'photo_filename' => "/menuimg/nasgor_bakso.png",
            'sales' => '25'
        ]);

        MenuItem::create([
            'category_id' => '1',
            'name' => 'Nasi Goreng Telur',
            'description' => 'Nasi goreng dengan telur ceplok',
            'price' => '18000',
            'isAvailable' => '0',
            'photo_filename' => "/menuimg/nasgor_telur.png",
            'sales' => '26'
        ]);

        MenuItem::create([
            'category_id' => '1',
            'name' => 'Nasi Goreng Seafood',
            'description' => 'Nasi goreng yang dilengkapi dengan cumi dan udang',
            'price' => '22000',
            'isAvailable' => '1',
            'photo_filename' => "/menuimg/nasgor_seafood.png",
            'sales' => '19'
        ]);

        MenuItem::create([
            'category_id' => '1',
            'name' => 'Nasi Goreng Spesial',
            'description' => 'Nasi goreng yang dilengkapi dengan ayam dan telur',
            'price' => '25000',
            'isAvailable' => '1',
            'photo_filename' => "/menuimg/nasgor_spesial.png",
            'sales' => '15'
        ]);


        MenuItem::create([
            'category_id' => '2',
            'name' => 'Sop Ayam',
            'description' => 'Sop ayam dengan nasi',
            'price' => '15000',
            'isAvailable' => '1',
            'photo_filename' => "/menuimg/sop_ayam.png",
            'sales' => '24'
        ]);

        MenuItem::create([
            'category_id' => '2',
            'name' => 'Sop Kambing',
            'description' => 'Sop kambing dengan nasi',
            'price' => '23000',
            'isAvailable' => '1',
            'photo_filename' => "/menuimg/sop_kambing.png",
            'sales' => '15'
        ]);

        MenuItem::create([
            'category_id' => '2',
            'name' => 'Sop Kikil',
            'description' => 'Sop kikil dengan nasi',
            'price' => '20000',
            'isAvailable' => '1',
            'photo_filename' => "/menuimg/sop_kikil.png",
            'sales' => '16'
        ]);

        MenuItem::create([
            'category_id' => '2',
            'name' => 'Sop Iga',
            'description' => 'Sop iga dengan nasi',
            'price' => '23000',
            'isAvailable' => '1',
            'photo_filename' => "/menuimg/sop_iga.png",
            'sales' => '12'
        ]);

        MenuItem::create([
            'category_id' => '2',
            'name' => 'Sop Buntut',
            'description' => 'Sop buntut dengan nasi',
            'price' => '21000',
            'isAvailable' => '1',
            'photo_filename' => "/menuimg/sop_buntut.png",
            'sales' => '10'
        ]);


        MenuItem::create([
            'category_id' => '3',
            'name' => 'Teh Manis',
            'description' => 'Bisa dingin atau panas',
            'price' => '5000',
            'isAvailable' => '1',
            'photo_filename' => "/menuimg/tehmanis.png",
            'sales' => '40'
        ]);

        MenuItem::create([
            'category_id' => '3',
            'name' => 'Jeruk',
            'description' => 'Bisa dingin atau panas',
            'price' => '5000',
            'isAvailable' => '1',
            'photo_filename' => "/menuimg/jeruk.png",
            'sales' => '32'
        ]);

        MenuItem::create([
            'category_id' => '3',
            'name' => 'Air Mineral',
            'description' => 'Air mineral 600ml',
            'price' => '5000',
            'isAvailable' => '1',
            'photo_filename' => "/menuimg/airmineral.png",
            'sales' => '53'
        ]);

        MenuItem::create([
            'category_id' => '3',
            'name' => 'Fanta',
            'description' => 'Fanta 500ml',
            'price' => '7000',
            'isAvailable' => '1',
            'photo_filename' => "/menuimg/fanta.png",
            'sales' => '37'
        ]);

        MenuItem::create([
            'category_id' => '3',
            'name' => 'Es Kelapa',
            'description' => 'Es kelapa porsi gelas',
            'price' => '7000',
            'isAvailable' => '1',
            'photo_filename' => "/menuimg/eskelapa.png",
            'sales' => '29'
        ]);

        MenuItem::create([
            'category_id' => '4',
            'name' => 'Bakwan',
            'description' => 'Bakwan isi 3',
            'price' => '3000',
            'isAvailable' => '1',
            'photo_filename' => "/menuimg/bakwan.png",
            'sales' => '45'
        ]);

        MenuItem::create([
            'category_id' => '4',
            'name' => 'Tempe Goreng',
            'description' => 'Tempe goreng isi 3',
            'price' => '3000',
            'isAvailable' => '1',
            'photo_filename' => "/menuimg/tempe.png",
            'sales' => '68'
        ]);

        MenuItem::create([
            'category_id' => '4',
            'name' => 'Tahu Goreng',
            'description' => 'Tahu goreng isi 3',
            'price' => '4000',
            'isAvailable' => '1',
            'photo_filename' => "/menuimg/tahugoreng.png",
            'sales' => '54'
        ]);

        MenuItem::create([
            'category_id' => '4',
            'name' => 'Pisang Goreng',
            'description' => 'Pisang goreng isi 3',
            'price' => '5000',
            'isAvailable' => '1',
            'photo_filename' => "/menuimg/pisanggoreng.png",
            'sales' => '47'
        ]);

        MenuItem::create([
            'category_id' => '4',
            'name' => 'Risol',
            'description' => 'Risol isi 3',
            'price' => '7000',
            'isAvailable' => '1',
            'photo_filename' => "/menuimg/risol.png",
            'sales' => '41'
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
