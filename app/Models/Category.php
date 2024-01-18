<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'isLegal',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function tools() : BelongsTo
    {
        return $this->belongsTo(Tool::class);
    }

    public function datacategories() : BelongsTo
    {
        return $this->belongsTo(Datacategory::class);
    }
}
