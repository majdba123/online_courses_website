<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * يشغّل سيدر واحد يملأ كل بيانات الموقع ببيانات حقيقية احترافية.
     */
    public function run(): void
    {
        $this->call(FullSiteSeeder::class);
    }
}
