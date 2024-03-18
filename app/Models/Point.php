<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    use HasFactory;

    protected $fillable=[

        'member_id',
        'point'

    ];



    public function member()
    {
        return $this->belongsTo(Member::class);
    }




}
