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

    public function getDateNextOperation() : string
    {
        return $this->dateNextOperation;
    }


    public function datatools() : HasMany
    {
        return $this->hasMany(Datatool::class);
    }

    public function operations() : HasMany
    {
        return $this->hasMany(Operation::class);
    }

    public function tags() : BelongsTo
    {
        return $this->belongsTo(Tag::class);
    }

    public function category() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
