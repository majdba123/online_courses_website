<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InquireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Inquire::factory(50)->create();
    }
}
