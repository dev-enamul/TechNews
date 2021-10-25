<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'system_name' => "Online News Paper",
            'fabIcon' => "fav.png", 
            'fontLogo' => "fontlogo.png", 
            'adminLogo' => "adminlogo.png", 
        ]
    );
    }
}
