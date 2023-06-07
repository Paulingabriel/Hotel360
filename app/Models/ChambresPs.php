<?php

namespace App\Models;

use App\Models\TypesChambres;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChambresPs extends Model
{
    use HasFactory;

    public function types_chambre(): BelongsTo
    {
        return $this->belongsTo(TypesChambres::class, 'types_chambre_id', 'id');
    }
    public function res_chambre(): BelongsTo
    {
        return $this->belongsTo(ResChambres::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
