<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $datas = [
            ['name' => 'Budiman', 'nis' => "08230001", 'address' => 'Pakuwon City, Surabaya', 'mapel_diambil' => 'Bahasa Indonesia', 'latihan_soal_1' => '70', 'latihan_soal_2' => '75', 'latihan_soal_3' => '80', 'latihan_soal_4' => '80', 'ulangan_harian_1' => '85', 'ulangan_harian_2' => '80', 'ulangan_tengah_semester' => '80', 'ulangan_akhir_semester' => '85'],
            ['name' => 'Jennifer', 'nis' => "08230002", 'address' => 'Wonocolo, Surabaya', 'mapel_diambil' => 'Bahasa Indonesia', 'latihan_soal_1' => '75', 'latihan_soal_2' => '80', 'latihan_soal_3' => '85', 'latihan_soal_4' => '80', 'ulangan_harian_1' => '85', 'ulangan_harian_2' => '80', 'ulangan_tengah_semester' => '80', 'ulangan_akhir_semester' => '80'],
            ['name' => 'Justin', 'nis' => "08230003", 'address' => 'Embong Malang, Surabaya', 'mapel_diambil' => 'Bahasa Indonesia', 'latihan_soal_1' => '80', 'latihan_soal_2' => '80', 'latihan_soal_3' => '85', 'latihan_soal_4' => '75', 'ulangan_harian_1' => '85', 'ulangan_harian_2' => '80', 'ulangan_tengah_semester' => '80', 'ulangan_akhir_semester' => '75'],
            ['name' => 'Arik', 'nis' => "08230004", 'address' => 'Asem Rowo, Surabaya', 'mapel_diambil' => 'Bahasa Inggris', 'latihan_soal_1' => '90', 'latihan_soal_2' => '85', 'latihan_soal_3' => '80', 'latihan_soal_4' => '85', 'ulangan_harian_1' => '80', 'ulangan_harian_2' => '80', 'ulangan_tengah_semester' => '85', 'ulangan_akhir_semester' => '90'],
            ['name' => 'Gempita', 'nis' => "08230005", 'address' => 'Darmo, Surabaya', 'mapel_diambil' => 'Bahasa Inggris', 'latihan_soal_1' => '95', 'latihan_soal_2' => '90', 'latihan_soal_3' => '80', 'latihan_soal_4' => '85', 'ulangan_harian_1' => '90', 'ulangan_harian_2' => '80', 'ulangan_tengah_semester' => '85', 'ulangan_akhir_semester' => '90'],
            ['name' => 'Fredrinn', 'nis' => "08230006", 'address' => 'Semolowaru, Surabaya', 'mapel_diambil' => 'Bahasa Inggris', 'latihan_soal_1' => '85', 'latihan_soal_2' => '80', 'latihan_soal_3' => '85', 'latihan_soal_4' => '80', 'ulangan_harian_1' => '85', 'ulangan_harian_2' => '80', 'ulangan_tengah_semester' => '85', 'ulangan_akhir_semester' => '90'],
            ['name' => 'Rylai', 'nis' => "08230007", 'address' => 'Tebu ireng, Surabaya', 'mapel_diambil' => 'Matematika', 'latihan_soal_1' => '80', 'latihan_soal_2' => '85', 'latihan_soal_3' => '90', 'latihan_soal_4' => '80', 'ulangan_harian_1' => '80', 'ulangan_harian_2' => '80', 'ulangan_tengah_semester' => '80', 'ulangan_akhir_semester' => '80'],
            ['name' => 'Akasha', 'nis' => "08230008", 'address' => 'Sukolilo, Surabaya', 'mapel_diambil' => 'Matematika', 'latihan_soal_1' => '85', 'latihan_soal_2' => '85', 'latihan_soal_3' => '90', 'latihan_soal_4' => '80', 'ulangan_harian_1' => '80', 'ulangan_harian_2' => '80', 'ulangan_tengah_semester' => '80', 'ulangan_akhir_semester' => '80'],
            ['name' => 'Lanaya', 'nis' => "08230009", 'address' => 'Keputih, Surabaya', 'mapel_diambil' => 'Matematika', 'latihan_soal_1' => '80', 'latihan_soal_2' => '85', 'latihan_soal_3' => '90', 'latihan_soal_4' => '80', 'ulangan_harian_1' => '80', 'ulangan_harian_2' => '80', 'ulangan_tengah_semester' => '80', 'ulangan_akhir_semester' => '80'],
            ['name' => 'Tanto', 'nis' => "08230010", 'address' => 'Gebang, Surabaya', 'mapel_diambil' => 'Olahraga', 'latihan_soal_1' => '70', 'latihan_soal_2' => '80', 'latihan_soal_3' => '80', 'latihan_soal_4' => '85', 'ulangan_harian_1' => '90', 'ulangan_harian_2' => '80', 'ulangan_tengah_semester' => '85', 'ulangan_akhir_semester' => '90'],
            ['name' => 'Tanti', 'nis' => "08230011", 'address' => 'Rungkut, Surabaya', 'mapel_diambil' => 'Olahraga', 'latihan_soal_1' => '75', 'latihan_soal_2' => '80', 'latihan_soal_3' => '80', 'latihan_soal_4' => '85', 'ulangan_harian_1' => '90', 'ulangan_harian_2' => '80', 'ulangan_tengah_semester' => '85', 'ulangan_akhir_semester' => '90'],
            ['name' => 'Bunga', 'nis' => "08230012", 'address' => 'Tenggilis, Surabaya', 'mapel_diambil' => 'Olahraga', 'latihan_soal_1' => '80', 'latihan_soal_2' => '85', 'latihan_soal_3' => '80', 'latihan_soal_4' => '80', 'ulangan_harian_1' => '90', 'ulangan_harian_2' => '80', 'ulangan_tengah_semester' => '85', 'ulangan_akhir_semester' => '90'],
            ['name' => 'Nana', 'nis' => "08230013", 'address' => 'Panjang Jiwo, Surabaya', 'mapel_diambil' => 'Pendidikan Kewarganegaraan', 'latihan_soal_1' => '85', 'latihan_soal_2' => '90', 'latihan_soal_3' => '90', 'latihan_soal_4' => '85', 'ulangan_harian_1' => '85', 'ulangan_harian_2' => '80', 'ulangan_tengah_semester' => '85', 'ulangan_akhir_semester' => '85'],
            ['name' => 'Angela', 'nis' => "08230014", 'address' => 'Jemur Sari, Surabaya', 'mapel_diambil' => 'Pendidikan Kewarganegaraan', 'latihan_soal_1' => '85', 'latihan_soal_2' => '90', 'latihan_soal_3' => '90', 'latihan_soal_4' => '85', 'ulangan_harian_1' => '85', 'ulangan_harian_2' => '80', 'ulangan_tengah_semester' => '85', 'ulangan_akhir_semester' => '85'],
            ['name' => 'Floryn', 'nis' => "08230015", 'address' => 'Semolowaru, Surabaya', 'mapel_diambil' => 'Pendidikan Kewarganegaraan', 'latihan_soal_1' => '80', 'latihan_soal_2' => '95', 'latihan_soal_3' => '90', 'latihan_soal_4' => '85', 'ulangan_harian_1' => '85', 'ulangan_harian_2' => '80', 'ulangan_tengah_semester' => '85', 'ulangan_akhir_semester' => '85'],
        ];
        foreach ($datas as $data) {
            Student::create($data);
        }
    }
}
