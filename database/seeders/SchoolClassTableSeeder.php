<?php

namespace Database\Seeders;

use App\Models\Schoolclass;
use Illuminate\Database\Seeder;

class SchoolClassTableSeeder extends Seeder
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
            ['name' => 'Bahasa Indonesia', 'school_year' => '2023/2024', 'teacher_name' => 'Handoko'],
            ['name' => 'Bahasa Inggris', 'school_year' => '2023/2024', 'teacher_name' => 'Trevor'],
            ['name' => 'Matematika', 'school_year' => '2023/2024', 'teacher_name' => 'Selena'],
            ['name' => 'Olahraga', 'school_year' => '2023/2024', 'teacher_name' => 'Kyle'],
            ['name' => 'Pendidikan Kewarganegaraan', 'school_year' => '2023/2024', 'teacher_name' => 'Bella'],
        ];
        foreach ($datas as $data) {
            Schoolclass::create($data);
        }
    }
}
