<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Informasi extends Model
{
    use HasFactory;

    protected $table = "informasi";
    protected $primaryKey = "id";
    protected $keyType = "int";
    public $timestamps = true;
    public $incrementing = true;

    protected $fillable = ['tanggal', 'judul', 'konten', 'gambar', 'jenis'];

    public function scopeSearch($query, $value)
    {
        $query->where('judul', 'like', "%{$value}%");
    }
}
