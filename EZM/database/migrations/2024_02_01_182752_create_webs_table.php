<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
            $table->string('introduction');
            $table->string('youtube');
            $table->string('facebook');
            $table->string('linkedin');
            $table->string('phone');
            $table->string('gmail');
            $table->timestamps();
        });

        // Demo defaults only. Real contact details belong in application data or
        // environment/deployment configuration, not historical source fixtures.
        DB::table('webs')->insert([
            [
                'introduction' => 'https://www.youtube.com/embed/5aww-Bpgkf4',
                'youtube' => 'https://www.youtube.com/',
                'facebook' => 'https://www.facebook.com/',
                'linkedin' => 'https://www.linkedin.com/',
                'phone' => '0990000000',
                'gmail' => 'contact@example.test',
            ],
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
