<?php

namespace App\Models;

use Database\Seeders\CategorySeeder;
use http\QueryString;
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


    public function datatools() : HasMany
    {
        return $this->hasMany(Datatool::class);
    }


    public function categories() : BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
