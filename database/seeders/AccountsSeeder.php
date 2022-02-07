<?php

namespace Database\Seeders;

use App\Models\Accounts as ModelsAccounts;
use Illuminate\Database\Seeder;

class AccountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelsAccounts::insert([
            [
                'category' => 'Runescape',
                'title' => 'All weapons upgraded',
                'description' => 'Supplier account',
                'price' => 50.00,
                'status' => 1,
                'user_id' => 1
            ],
            [
                'category' => '“League Of Legends',
                'title' => '“Level 30 ready for ranked”',
                'description' => 'Supplier',
                'price' => 30.00,
                'status' => 1,
                'user_id' => 1
            ],
            [
                'category' => 'Fortnite',
                'title' => 'Epic Skins',
                'description' => 'Supplier account',
                'price' => 25.00,
                'status' => 1,
                'user_id' => 1
            ],
            [
                'category' => 'Clash of Clans',
                'title' => 'Town Hall level 11',
                'description' => 'Pre-Owned accoun',
                'price' => 80.00,
                'status' => 1,
                'user_id' => 1
            ],
        ]);
    }
}
