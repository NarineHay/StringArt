<?php

namespace Database\Seeders;

use App\Models\Turnstile;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


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
