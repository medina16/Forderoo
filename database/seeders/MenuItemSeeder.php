<?php

namespace Database\Seeders;

use App\Models\MenuItem;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MenuItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MenuItem::create([
            'id_category' => '1',
            'name' => 'Menu A',
            'description' => 'Ayam sambal matah terlezat yang pernah medina rasakan :)',
            'price' => '30000',
            'isAvailable' => 'true',
            'photo_filename' => "/menuimg/menua",
            'sales' => '10'
        ]);
    }
}
