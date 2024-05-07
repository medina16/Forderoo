<?php

namespace Database\Seeders;

use App\Models\AdminAccount;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AdminAccount::create([
            'username' => 'medinamedina',
            'password' => bcrypt("16jul2003")
        ]);
    }
}
