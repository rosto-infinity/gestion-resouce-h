<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmploiGrade extends Model
{
    protected $fillable =[
        'grade_level',
        'lowest_salary',
        'highest_salary'

    ];
}
 