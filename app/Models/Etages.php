<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Etages extends Model
{
    use HasFactory;

    public function salles(): HasMany
    {
        return $this->hasMany(Salles::class, 'etage_id', 'id');
    }

    public function chambres(): HasMany
    {
        return $this->hasMany(Chambres::class, 'etage_id', 'id');
    }

    public function hotel(): BelongsTo
    {
        return $this->belongsTo(Hotel::class);
    }
}
