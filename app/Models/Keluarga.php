<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Keluarga extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $table = "keluarga";
    protected $primaryKey = "id";
    public $incrementing = false;
    protected $keyType = "string";
    public $timestamps = true;

    protected $fillable = ['nkk', 'dokumen', 'pendapatan', 'luas_bangunan', 'jumlah_tanggungan', 'pajak_bumi', 'tagihan_listrik'];

    public function warga() : HasMany
    {
        return $this->hasMany(Warga::class, 'keluarga_id', 'id');
    }

    public function user() : HasMany
    {
        return $this->hasMany(User::class, 'keluarga_id', 'id');
    }

    public function riwayatKeluarga()
    {
        return $this->hasMany(RiwayatKeluarga::class, 'keluarga_id', 'id');
    }


    public function scopeSearch($query, $value)
    {
        $query->where('nkk', 'like', "%{$value}%");
    }

}
