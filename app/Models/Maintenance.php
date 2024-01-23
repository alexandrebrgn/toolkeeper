<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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

//    public static function create($params)
//    {
//        $maintenance = parent::create($params);
//        $maintenance->tool->update([
//            'dateNextOperation' => $params->query('dateNextOperation')
//        ]);
//
//    }

    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tool() : BelongsTo
    {
        return $this->belongsTo(Tool::class);
    }
}
