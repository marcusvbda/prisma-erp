<?php

use Illuminate\Database\Seeder;
use App\Http\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table("setting_tenant")->truncate();
        DB::table("settings")->truncate();
        Setting::create([
            "name" => "Logo Pequeno",
            "type" => "image",
        ]);
        Setting::create([
            "name" => "Logo Grande",
            "type" => "image",
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
