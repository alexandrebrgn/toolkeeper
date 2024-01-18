<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Datatool extends Model
{
    use HasFactory;

    protected $fillable = [
        'value',
        'tool_id',
        'dataCategory_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function tools() : HasMany
    {
        return $this->hasMany(Tool::class);
    }

    public function datacategories() : HasMany
    {
        return $this->hasMany(Datacategory::class);
    }
}
