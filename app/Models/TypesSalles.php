<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TypesSalles extends Model
{
    use HasFactory;

    public function salles_pr(): HasOne
    {
        return $this->hasOne(SallesPr::class, 'types_chambre_id');
    }

    public function salles_ps(): HasOne
    {
        return $this->hasOne(SallesPs::class, 'types_chambre_id');
    }

    public function salles(): HasMany
    {
        return $this->hasMany(Salles::class, 'types_salle_id', 'id');
    }
}
