<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Profile extends Model
{
    protected $fillable = [
        'description',
        'phone'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsto(User::class);
    }
}
