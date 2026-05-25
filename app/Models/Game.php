<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Game extends Model
{
    use HasFactory;

    public function campaigns(): HasMany {
        return $this->hasMany(Campaign::class);
    }

    protected $fillable = [
        'name',
        'url_image'
    ];
}
