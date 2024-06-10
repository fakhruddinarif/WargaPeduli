<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatKeluarga extends Model
{
    use HasFactory, HasUuids;

    protected $table = "riwayat_keluarga";
    protected $primaryKey = "id";
    protected $keyType = "string";
    public $timestamps = true;

    public $incrementing = false;

    protected $fillable = ['keluarga_id', 'status', 'surat', 'tanggal'];

    public function keluarga()
    {
        return $this->belongsTo(Keluarga::class, 'keluarga_id', 'id');
    }
}
