<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;


class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', 'admin@gmail.com')->first();

        if(!$user){
            $user = User::updateOrCreate(
              ['email' => 'admin@gmail.com'],
              [
                'name' => 'Admin',
                'password' => bcrypt('123456')
              ]);
        }

    }
}
