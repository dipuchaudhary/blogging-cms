<?php

use App\User;
use Illuminate\Database\Seeder;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Dipu',
            'email' => 'chaudharydipu8@gmail.com',
            'password' => bcrypt('12345678')
        ]);
    }
}
