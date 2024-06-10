<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatWarga extends Model
{
    use HasFactory, HasUuids;

    protected $table = "riwayat_warga";
    protected $primaryKey = "id";
    protected $keyType = "string";
    public $timestamps = true;
    public $incrementing = false;

    protected $fillable = ['warga_id', 'status', 'surat', 'tanggal'];

    public function warga()
    {
        return $this->belongsTo(Warga::class, 'warga_id', 'id');
    }
}
