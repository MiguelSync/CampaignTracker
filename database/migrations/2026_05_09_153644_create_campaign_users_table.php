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
        Schema::create('campaign_users', function (Blueprint $table) {
            $table->id();
            $table->foreignUlid('users_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignUlid('campaigns_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->smallInteger('role');
            $table->smallInteger('status');
            $table->timestamps();
        });

        DB::statement('
            ALTER TABLE campaign_users
            ADD CONSTRAINT role_check
            CHECK (role IN (1, 2))
        ');

        DB::statement('
            ALTER TABLE campaign_users
            ADD CONSTRAINT status_check
            CHECK (status IN (1, 2))
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaign_users');
    }
};
