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
        $user = User::create([
            'name' => 'Dipu',
            'email' => 'chaudharydipu8@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 'admin'
        ]);

        \App\Profile::create([
            'user_id' => $user->id,
            'avatar' => '/avatar/avatar.png',
            'about' => 'Nunc sed turpis. Phasellus blandit leo ut odio. Nunc interdum lacus sit amet orci. Etiam sit amet orci eget eros faucibus tincidunt.',
            'facebook' => 'facebook.com',
        ]);

    }
}
