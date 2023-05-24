<?php

namespace App\Models;

use App\Models\ChambresPs;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TypesChambres extends Model
{
    use HasFactory;

    public function chambres_pr(): HasOne
    {
        return $this->hasOne(ChambresPr::class, 'types_chambre_id');
    }

    public function chambres_ps(): HasOne
    {
        return $this->hasOne(ChambresPs::class, 'types_chambre_id');
    }
    
    public function chambres(): HasMany
    {
        return $this->hasMany(Chambres::class, 'types_chambre_id', 'id');
    }
}
