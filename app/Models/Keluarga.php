<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Keluarga extends Model
{
    use HasFactory, HasUuids;

    protected $table = "keluarga";
    protected $primaryKey = "id";
    public $incrementing = false;
    protected $keyType = "string";
    public $timestamps = true;

    protected $fillable = ['nkk', 'dokumen', 'pendapatan', 'luas_bangunan', 'jumlah_tanggungan', 'pajak_bumi'];
    public function users() : HasMany
    {
        return $this->hasMany(User::class, 'keluarga_id', 'id');
    }

    public function scopeSearch($query, $value)
    {
        $query->where('nkk', 'like', "%{$value}%");
    }
}