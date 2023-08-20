<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $collection = 'subject';

    protected $primaryKey = "_id";

    protected $fillable = [
        'name',
        'school_year',
    ];
}
