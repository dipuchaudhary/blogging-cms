<?php

use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\SiteSetting::create([
            'site_name' => "Laravel's Blog",
            'email' => 'example@laravel.io',
            'contact' => '7784 248 254 245',
            'address' => 'kathmandu, Nepal'
        ]);
    }
}
