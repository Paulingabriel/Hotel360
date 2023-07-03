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
        'client_id','chambre_id','dateres','datedebut', 'datefin', 'option', 'occ', 'adultes', 'enfants', 'chambres_pr_id','total', 'payement'
    ];

    public function chambre(): BelongsTo
    {
        return $this->belongsTo(Chambres::class);
    }

    public function client(): BelongsTo
    {
        return $this->belongsTo(Clients::class);
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
