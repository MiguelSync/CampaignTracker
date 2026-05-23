<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['user_id', 'connection_id', 'description'])]
class UserConnection extends Model
{
    public function user(): BelongsTo {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function connection(): BelongsTo {
        return $this->belongsTo(Connection::class, 'connection_id');
    }
}
