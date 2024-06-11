<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pengajuan extends Model
{
    use HasFactory, HasUuids;
    protected $table = "pengajuan";
    protected $primaryKey = "id";
    public $incrementing = false;
    protected $keyType = "string";
    public $timestamps = true;

    protected $fillable = ['nkk', 'dokumen_kk', 'nik', 'dokumen_ktp', 'nama', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'ibu_kandung', 'status_warga', 'status_keluarga', 'telepon', 'rt_id', 'status', 'username', 'password'];

    public function rukunTetangga() : BelongsTo
    {
        return $this->belongsTo(RukunTetangga::class, 'rt_id', 'id');
    }

}
