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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('type_user')->default(0);
            $table->string('image')->nullable();
            $table->string('address')->nullable();
            $table->integer('age')->nullable();
            $table->integer('status')->default(1);
            $table->bigInteger('phone')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

        });
        DB::table('users')->insert([
            [
                'name' => 'robert',
                'type_user' => 1,
                'status' => 1,
                'email' => 'admin@gmail.com',
                'password' => bcrypt('12345678'),
                'email_verified_at'=> now()
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
