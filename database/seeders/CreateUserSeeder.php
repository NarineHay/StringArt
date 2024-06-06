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
        $email = env('B_EMAIL');
        $password = env('B_PASSWORD');
        $user = User::where('email', $email)->first();

        if(!$user){
            $user = User::updateOrCreate(
              ['email' => $email],
              [
                'name' => 'Admin',
                'password' => bcrypt($password)
              ]);
        }

    }
}
