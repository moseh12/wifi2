<?php

namespace Database\Seeders;  // Correct namespace for Laravel 8+

use Illuminate\Database\Seeder;
use App\Models\User;  // Ensure the correct path to the User model

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'fullName' => 'Mchumasoftwares',
            'username' => 'mchuma',
            'email' => 'developermoses0@gmail.com',
            'phone_num' => '0759548159',
            'type' => 'A',
            'status' => 'A',
            'email_verified_at' => now(),
            'password' => bcrypt('@Phenmos12'),
        ]);
    }
}
