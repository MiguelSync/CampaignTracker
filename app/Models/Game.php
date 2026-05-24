<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Game extends Model
{
    use HasFactory;

    public function campaigns(): BelongsToMany {
        return $this->belongsToMany(Campaign::class, 'campaign_id');
    }

    protected $fillable = [
        'name',
        'url_image'
    ];
}
