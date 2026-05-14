<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CampaignUser extends Model
{
    protected $fillable = [
        'user_id',
        'campaign_id',
        'role',
        'status'
    ];

    public function campaign(): BelongsTo {
        return $this->belongsTo(Campaign::class, 'campaign_id');
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }
}
