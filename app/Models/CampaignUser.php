<?php

namespace App\Models;

use App\Enum\CampaignUser\CampaignUserRoleEnum;
use App\Enum\CampaignUser\CampaignUserStatusEnum;
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

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'role'   => CampaignUserRoleEnum::class,
            'status' => CampaignUserStatusEnum::class
        ];
    }

    public function campaign(): BelongsTo {
        return $this->belongsTo(Campaign::class, 'campaign_id');
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }
}
