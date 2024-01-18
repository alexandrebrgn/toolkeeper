<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'label',
        'tool_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function tools() : HasMany
    {
        return $this->hasMany(Tool::class);
    }
}
