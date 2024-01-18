<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tool extends Model
{
    use HasFactory;

    protected $fillable = [
        'number',
        'serialId',
        'isActive',
        'localisation',
        'dateNextOperation',
        'toDo',
        'category_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function datatools() : BelongsTo
    {
        return $this->belongsTo(Datatool::class);
    }

    public function maintenances() : BelongsTo
    {
        return $this->belongsTo(Maintenance::class);
    }

    public function tags() : BelongsTo
    {
        return $this->belongsTo(Tag::class);
    }

    public function categories() : HasMany
    {
        return $this->hasMany(Category::class);
    }
}
