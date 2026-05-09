<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasUlids;

    protected $fillable = [
        'name',
        'bio',
        'email',
        'playstyle'
    ];
}
