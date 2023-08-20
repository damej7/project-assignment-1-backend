<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectTableSeeder extends Seeder
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
            ['name' => 'Bahasa Indonesia', 'school_year' => '2023/2024'],
            ['name' => 'Bahasa Inggris', 'school_year' => '2023/2024'],
            ['name' => 'Matematika', 'school_year' => '2023/2024'],
            ['name' => 'Olahraga', 'school_year' => '2023/2024'],
            ['name' => 'Pendidikan Kewarganegaraan', 'school_year' => '2023/2024'],
        ];
        foreach ($datas as $data) {
            Subject::create($data);
        }
    }
}
