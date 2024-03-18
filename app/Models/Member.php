<?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

// class Member extends Model
// {
//     protected $fillable=[
//         'firstname',
//         'surname',
//         'course_id',
//         'phone',
//         'email'
//     ];

//     public function courses()
//     {
//         return $this->belongsTo(Course::class);
//     }

// }

// app/Models/Member.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $fillable = [
        'fullname',
        'course_id',
        'phone',
        'email'
    ];



    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function points()
    {
        return $this->hasMany(Point::class);
    }

}

