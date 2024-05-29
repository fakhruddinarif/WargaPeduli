<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Level extends Model
{
    use HasFactory;

    protected $table = 'level';
    protected $primaryKey = 'id';
    protected $keyType = "int";
    public $incrementing = true;

    protected $fillable = ['nama'];

    public function user() : HasMany
    {
        return $this->hasMany(User::class, 'level_id', 'id');
    }
}
