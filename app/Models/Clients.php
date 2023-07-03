<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Clients extends Model
{
    use HasFactory;

    public function hotel(): BelongsTo
    {
        return $this->belongsTo(Hotel::class);
    }
}
