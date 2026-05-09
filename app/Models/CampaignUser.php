<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CampaignUser extends Model
{
    protected $fillable = [
        'users_id',
        'campaigns_id',
        'role',
        'status'
    ];
}
