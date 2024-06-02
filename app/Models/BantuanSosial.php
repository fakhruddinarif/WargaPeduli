<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BantuanSosial extends Model
{
    use HasFactory;

    protected $table = "bantuan_sosial";
    protected $primaryKey = "id";
    protected $keyType = "int";
    public $timestamps = true;
    public $incrementing = true;

    protected $fillable = ['tanggal_mulai', 'tanggal_selesai', 'jenis', 'kapasitas'];

    public function detailBantuanSosial() : HasMany
    {
        return $this->hasMany(DetailBantuanSosial::class, 'bansos_id', 'id');
    }
}
