<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SallesPs extends Model
{
    use HasFactory;

    public function types_salle(): BelongsTo
    {
        return $this->belongsTo(TypesSalles::class, 'types_salle_id', 'id');
    }

    public function salle(): BelongsTo
    {
        return $this->belongsTo(Salles::class);
    }


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
