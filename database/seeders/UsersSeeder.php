<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Leonardo Ferreira',
            'gender' => 'Male',
            'email' => 'teste@teste.com.br',
            'password' => bcrypt('123qwe.'),
            'phone' => '21955487853',
            'birthday' => '1900/01/01',
            'address' => 'Av. Test',
            'address_number' => '48',
        ]);
    }
}
