<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Warga extends Model
{
    use HasFactory, HasUuids;

    protected $table = "warga";
    protected $primaryKey = "id";
    protected $keyType = "string";
    public $timestamps = true;

    protected $fillable = ['nik', 'nama', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'status_warga', 'status_keluarga', 'telepon', 'dokumen', 'rt_id', 'keluarga_id', 'ibu_kandung'];

    public function rukunTetangga() : BelongsTo
    {
        return $this->belongsTo(Warga::class, 'rt_id', 'id');
    }

    public function keluarga() : BelongsTo
    {
        return $this->belongsTo(Warga::class, 'keluarga_id', 'id');
    }

    public function scopeSearch($query, $value)
    {
        $query->where('nik', 'like', "%{$value}%")->orWhere('nama', 'like', "%{$value}%")->orWhere('status_keluarga', 'like', "%{$value}%")->orWhere('status_warga', 'like', "%{$value}%");
    }
}
