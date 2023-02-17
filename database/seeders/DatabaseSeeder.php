<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       // \App\Models\User::factory(10)->create();
       DB::table('users')->insert([
        'name' => 'Marlon Oliveira',
        'telefone' => '999999999',
        'cpf' => '11835953604',
        'email' => 'marlon81785@gmail.com',
        'password' => bcrypt('12345678'),
        ]);

    }
}
