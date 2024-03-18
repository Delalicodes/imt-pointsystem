<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable=[

      'name'
    ];


    public function members()
    {
        return $this->hasMany(Member::class);
    }
}
