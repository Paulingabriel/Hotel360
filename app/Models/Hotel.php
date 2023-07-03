<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hotel extends Model
{
    use HasFactory;

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function etages(): HasMany
    {
        return $this->hasMany(Etages::class);
    }

    public function chambres(): HasMany
    {
        return $this->hasMany(Chambres::class);
    }

    public function chambres_prs(): HasMany
    {
        return $this->hasMany(ChambresPr::class);
    }

    public function chambres_ps(): HasMany
    {
        return $this->hasMany(ChambresPs::class);
    }

    public function clients(): HasMany
    {
        return $this->hasMany(Clients::class);
    }

    public function res_chambres(): HasMany
    {
        return $this->hasMany(ResChambres::class);
    }

    public function res_salles(): HasMany
    {
        return $this->hasMany(ResSalles::class);
    }

    public function salles(): HasMany
    {
        return $this->hasMany(Salles::class);
    }

    public function salles_prs(): HasMany
    {
        return $this->hasMany(SallesPr::class);
    }

    public function salles_ps(): HasMany
    {
        return $this->hasMany(SallesPs::class);
    }

    public function types_chambres(): HasMany
    {
        return $this->hasMany(TypesChambres::class);
    }

    public function types_salles(): HasMany
    {
        return $this->hasMany(TypesSalles::class);
    }

}
