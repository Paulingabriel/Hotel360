<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Hotel;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function hotel(): BelongsTo
    {
        return $this->belongsTo(Hotel::class);
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
