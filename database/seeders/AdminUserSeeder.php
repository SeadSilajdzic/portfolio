<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

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
            'name' => 'Sead Silajdzic',
            'email' => 'silajdzic.dev@gmail.com',
            'password' => bcrypt('SeadSila998'),
        ]);
    }
}
