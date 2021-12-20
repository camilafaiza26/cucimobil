<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'direktur',
            'email' => 'direktur@gmail.com',
            'password' => bcrypt('password'),
            'username' => 'direktur26',
            'nohp' => '08123456789',
            'alamat' => 'Andalas',
            'isDirectur'=> 1,
        ]);
    }
}
