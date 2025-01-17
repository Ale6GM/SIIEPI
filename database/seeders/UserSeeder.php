<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Administrador',
            'email' => 'Admin@gmail.com',
            'password' => bcrypt('12345678')
        ])->assignRole('Administrador');
        
        User::factory(20)->create();
    }

    
}
