<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('webs', function (Blueprint $table) {
            $table->id();
            $table->string('introduction')->default('http://127.0.0.1:8000 ');
            $table->string('youtube')->default('http://127.0.0.1:8000 ');
            $table->string('facebook')->default('http://127.0.0.1:8000');
            $table->string('linkedin')->default('http://127.0.0.1:8000 ');
            $table->string('phone')->default('099999999 ');
            $table->string('gmail')->default('http://127.0.0.1:8000 ');

            $table->timestamps();
        });
        DB::table('webs')->insert([
            [
                'introduction' => 'http://127.0.0.1:8000',
                'youtube' => 'http://127.0.0.1:8000',
                'facebook' => 'http://127.0.0.1:8000',
                'linkedin' => 'http://127.0.0.1:8000',
                'phone' => '099999999',
                'gmail' => 'http://127.0.0.1:8000',
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('webs');
    }
};
