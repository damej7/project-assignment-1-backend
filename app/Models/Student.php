<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Student extends Eloquent
{
    use HasFactory;

    protected $collection = 'student';

    protected $primaryKey = "_id";

    protected $fillable = [
        'name',
        'nis',
        'address',
        'mapel_diambil',
        'latihan_soal_1',
        'latihan_soal_2',
        'latihan_soal_3',
        'latihan_soal_4',
        'ulangan_harian_1',
        'ulangan_harian_2',
        'ulangan_tengah_semester',
        'ulangan_akhir_semester',
    ];
}
