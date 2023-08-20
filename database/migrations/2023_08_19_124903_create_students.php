<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('nis');
            $table->string('address');
            $table->string('mapel_diambil');
            $table->integer('latihan_soal_1');
            $table->integer('latihan_soal_2');
            $table->integer('latihan_soal_3');
            $table->integer('latihan_soal_4');
            $table->integer('ulangan_harian_1');
            $table->integer('ulangan_harian_2');
            $table->integer('ulangan_tengah_semester');
            $table->integer('ulangan_akhir_semester');
            // $table->integer('nilai_akhir');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student');
    }
}
