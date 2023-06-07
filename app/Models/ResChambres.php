<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ResChambres extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id', 'numres', 'chambre_id','dateres','datedebut', 'datefin', 'option', 'occ', 'adultes', 'enfants', 'chambres_pr_id', 'chambres_ps_id', 'global', 'payement', 'statut'
    ];

    public function chambres(): HasMany
    {
        return $this->hasMany(Chambres::class, 'chambre_id', 'id');
    }

    public function clients(): HasMany
    {
        return $this->hasMany(Clients::class, 'client_id', 'id');
    }

    public function chambres_pr(): HasMany
    {
        return $this->hasMany(ChambresPr::class, 'chambre_pr_id', 'id');
    }

    public function chambres_ps(): HasMany
    {
        return $this->hasMany(ChambresPs::class, 'chambre_ps_id', 'id');
    }
    
    public function hotel(): BelongsTo
    {
        return $this->belongsTo(Hotel::class);
    }
}
