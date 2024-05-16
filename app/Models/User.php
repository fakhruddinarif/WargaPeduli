<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User extends Model
{
    use HasFactory, HasUuids;

    protected $table = "user";
    protected $primaryKey = "id";
    public $incrementing = false;
    protected $keyType = "string";
    public $timestamps = true;

    protected $fillable = ['username', 'password', 'level_id', 'keluarga_id'];

    public function level() : BelongsTo
    {
        return $this->belongsTo(User::class, 'level_id', 'id');
    }

    public function keluarga() : BelongsTo
    {
        return $this->belongsTo(User::class, 'keluarga_id', 'id');
    }
}
