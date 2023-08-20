<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Schoolclass extends Eloquent
{
    use HasFactory;

    protected $collection = 'school_class';

    protected $primaryKey = "_id";

    protected $fillable = [
        'name',
        'school_year',
        'teacher_name',
    ];
}
