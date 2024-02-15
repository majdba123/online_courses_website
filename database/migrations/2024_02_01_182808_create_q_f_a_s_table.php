<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Web;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('q_f_a_s', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('quastion');
            $table->string('answee');
            $table->foreignIdFor(Web::class)->constrained()->cascadeOnDelete()->cascadeOnUpdate()->defult(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('q_f_a_s');
    }
};
