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
            $table->uuid('id')->primary();
            $table->string('name');
            $table->integer('type_user')->default(0);
            $table->string('image')->default('profile.jpg');
            $table->string('address')->nullable()->default('Syria');
            $table->integer('age')->nullable();
            $table->integer('status')->default(1);
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        // Administrative users must be provisioned explicitly through a
        // controlled setup/seeding process. Database migrations must never
        // create a predictable privileged account with public credentials.
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
