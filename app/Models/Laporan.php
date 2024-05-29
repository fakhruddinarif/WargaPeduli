<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Laporan extends Model
{
    use HasFactory;

    protected $table = "laporan";
    protected $primaryKey = "id";
    protected $keyType = "int";
    public $timestamps = true;
    public $incrementing = true;

    protected $fillable = ['tanggal', 'keterangan', 'bukti', 'status', 'user_id'];

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function scopeSearch($query, $value)
    {
        $query->where('keterangan', 'like', "%{$value}%");
    }
}
