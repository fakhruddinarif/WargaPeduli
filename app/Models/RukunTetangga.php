<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RukunTetangga extends Model
{
    use HasFactory;

    protected $table = "rukun_tetangga";
    protected $primaryKey = "id";
    protected $keyType = "int";
    public $timestamps = true;
    public $incrementing = true;

    protected $fillable = ['nomor'];

    public function wargas() : HasMany
    {
        return $this->hasMany(Warga::class, 'rt_id', 'id');
    }
}
