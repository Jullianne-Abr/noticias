<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([ //create vai receber um array
            'name' => 'Administrador',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin')
        ]);
    }
}