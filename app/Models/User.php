<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, HasUuids;

    protected $table = "user";
    protected $primaryKey = "id";
    public $incrementing = false;
    protected $keyType = "string";
    public $timestamps = true;

    protected $fillable = ['username', 'password', 'level_id', 'keluarga_id'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function level() : BelongsTo
    {
        return $this->belongsTo(Level::class, 'level_id', 'id');
    }

    public function keluarga() : BelongsTo
    {
        return $this->belongsTo(Keluarga::class, 'keluarga_id', 'id');
    }

    public function laporan() : HasMany
    {
        return $this->hasMany(Laporan::class, 'user_id', 'id');
    }

    public function detailBantuanSosial() : HasMany
    {
        return $this->hasMany(DetailBantuanSosial::class, 'user_id', 'id');
    }

    public function scopeSearch($query, $value)
    {
        $query->where('username', 'like', "%{$value}%");
    }
}
