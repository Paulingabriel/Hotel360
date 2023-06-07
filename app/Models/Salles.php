<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Salles extends Model
{
    use HasFactory;

    public function salles_prs(): HasMany
    {
        return $this->hasMany(SallesPr::class, 'salle_id', 'id');
    }

    public function salles_ps(): HasMany
    {
        return $this->hasMany(SallesPs::class, 'salle_id', '');
    }

    public function types_salle(): BelongsTo
    {
        return $this->belongsTo(TypesSalles::class);
    }

    public function etage(): BelongsTo
    {
        return $this->belongsTo(Etages::class);
    }

    public function res_salle(): BelongsTo
    {
        return $this->belongsTo(ResSalles::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
