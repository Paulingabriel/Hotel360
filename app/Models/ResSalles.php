<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ResSalles extends Model
{
    use HasFactory;


    protected $fillable = [
        'client_id', 'numres', 'salle_id','dateres','datedebut', 'datefin', 'occ', 'salles_pr_id', 'salles_ps_id', 'global', 'payement', 'statut'
    ];

    public function salles(): HasMany
    {
        return $this->hasMany(Salles::class, 'salle_id', 'id');
    }

    // public function clients(): HasMany
    // {
    //     return $this->hasMany(Clients::class, 'client_id', 'id');
    // }

    // public function salles_pr(): HasMany
    // {
    //     return $this->hasMany(SallesPr::class, 'salle_pr_id', 'id');
    // }

    // public function salles_ps(): HasMany
    // {
    //     return $this->hasMany(SallesPs::class, 'salle_ps_id', 'id');
    // }

    // public function salle(): BelongsTo
    // {
    //     return $this->belongsTo(Salles::class);
    // }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
