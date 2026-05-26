<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Campaign extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = [
        'title',
        'description',
        'status',
        'started_at',
        'ended_at',
        'game_id',
    ];

    public function game(): BelongsTo {
        return $this->belongsTo(Game::class, 'game_id');
    }

    public function campaignUsers() {
        return $this->hasMany(CampaignUser::class);
    }
}