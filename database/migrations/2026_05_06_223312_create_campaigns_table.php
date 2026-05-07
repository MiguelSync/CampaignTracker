<?php

use App\Enum\CampaignEnum;
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
    Schema::create('campaigns', function (Blueprint $table) {
        $table->ulid('id')->primary();
        $table->string('title');
        $table->text('description');
        $table->smallInteger('status')->default(CampaignEnum::STATUS_PENDING);
        $table->timestamp('started_at');
        $table->timestamp('ended_at')->nullable();
        $table->timestamps();
    });

    DB::statement('
        ALTER TABLE campaigns
        ADD CONSTRAINT status_check
        CHECK (status IN (1, 2))
    ');
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaigns');
    }
};