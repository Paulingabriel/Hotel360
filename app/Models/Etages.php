<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Etages extends Model
{
    use HasFactory;

    public function salles(): HasMany
    {
        return $this->hasMany(Salles::class, 'types_salle_id', 'id');
    }

    public function chambres(): HasMany
    {
        return $this->hasMany(Chambres::class, 'types_chambre_id', 'id');
    }
}
