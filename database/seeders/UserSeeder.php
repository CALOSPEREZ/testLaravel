<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Carlos',
            'email' => 'carlos@gmail.test',
            'password' => Hash::make('Pass'),
        ])->assignRole('Empleado');
   

    }
}
