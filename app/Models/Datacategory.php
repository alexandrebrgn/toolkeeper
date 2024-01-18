<?php

namespace App\Models;

use Database\Seeders\CategorySeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Datacategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'label',
        'type',
        'values',
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


    public function categories() : HasMany
    {
        return $this->hasMany(Category::class);
    }
}
