<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use RealRashid\SweetAlert\Facades\Alert;

class Chambres extends Model
{
    use HasFactory;

    public function types_chambre(): BelongsTo
    {
        return $this->belongsTo(TypesChambres::class);
    }

    public function etage(): BelongsTo
    {
        return $this->belongsTo(Etages::class);
    }
}
