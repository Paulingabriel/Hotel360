<?php

namespace App\Models;

use App\Models\TypesChambres;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChambresPr extends Model
{
    use HasFactory;

    public function types_chambre(): BelongsTo
    {
        return $this->belongsTo(TypesChambres::class);
    }


}