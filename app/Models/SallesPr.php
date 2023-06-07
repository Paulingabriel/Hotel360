<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SallesPr extends Model
{
    use HasFactory;

    public function types_salle(): BelongsTo
    {
        return $this->belongsTo(TypesSalles::class);
    }

    public function salle(): BelongsTo
    {
        return $this->belongsTo(Salles::class);
    }

    public function hotel(): BelongsTo
    {
        return $this->belongsTo(Hotel::class);
    }
    // public function res_salle(): BelongsTo
    // {
    //     return $this->belongsTo(ResSalles::class);
    // }
}
