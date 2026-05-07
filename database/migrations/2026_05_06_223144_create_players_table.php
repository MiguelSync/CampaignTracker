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
        Schema::create('players', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('name', 100);
            $table->string('bio', 255)->nullable();
            $table->string('email', 100)->unique();
            $table->smallInteger('playstyle');
            $table->timestamps();
        });

        DB::statement('ALTER TABLE players ADD CONSTRAINT ck_playstyle CHECK (playstyle IN (1,2))');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
