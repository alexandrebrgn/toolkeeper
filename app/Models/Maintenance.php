<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Maintenance extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'report',
        'user_id',
        'tool_id',
    ];

    protected $hidden = [
        'created_at',
        'updated-at'
    ];

    public function users() : HasMany
    {
        return $this->hasMany(User::class);
    }

    public function tools() : HasMany
    {
        return $this->hasMany(Tool::class);
    }
}
