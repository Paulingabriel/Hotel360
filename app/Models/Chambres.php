<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Chambres extends Model
{
    use HasFactory;

    protected $fillable = ['active'];

    public function types_chambre(): BelongsTo
    {
        return $this->belongsTo(TypesChambres::class);
    }

    public function etage(): BelongsTo
    {
        return $this->belongsTo(Etages::class);
    }

    public function res_chambres(): HasMany
    {
        return $this->hasMany(ResChambres::class,'chambre_id','id');
    }
    public function hotel(): BelongsTo
    {
        return $this->belongsTo(Hotel::class);
    }

}
