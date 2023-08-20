<?php

namespace App\Http\Controllers;

use App\Helpers\ApiFormatter;
use App\Models\Student;
use Exception;
use Illuminate\Http\Request;
use stdClass;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Student::all();

        if ($data) {
            return ApiFormatter::createApi(200, 'Success', $data);
        } else {
            return ApiFormatter::createApi(400, "Failed");
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        try {
            $request->validate([
                'name' => 'required',
                'nis' => 'required',
                'address' => 'required',
                'mapel_diambil' => 'required',
                'latihan_soal_1' => 'required',
                'latihan_soal_2' => 'required',
                'latihan_soal_3' => 'required',
                'latihan_soal_4' => 'required',
                'ulangan_harian_1' => 'required',
                'ulangan_harian_2' => 'required',
                'ulangan_tengah_semester' => 'required',
                'ulangan_akhir_semester' => 'required',
            ]);

            $student = Student::create([
                'name' => $request->name,
                'nis' => $request->nis,
                'address' => $request->address,
                'mapel_diambil' => $request->mapel_diambil,
                'latihan_soal_1' => $request->latihan_soal_1,
                'latihan_soal_2' => $request->latihan_soal_2,
                'latihan_soal_3' => $request->latihan_soal_3,
                'latihan_soal_4' => $request->latihan_soal_4,
                'ulangan_harian_1' => $request->ulangan_harian_1,
                'ulangan_harian_2' => $request->ulangan_harian_2,
                'ulangan_tengah_semester' => $request->ulangan_tengah_semester,
                'ulangan_akhir_semester' => $request->ulangan_akhir_semester
            ]);

            $data = Student::where('_id', '=', $student->id)->get();

            if ($data) {
                return ApiFormatter::createApi(200, 'Success, Data Siswa berhasil di tambahkan', $data);
            } else {
                return ApiFormatter::createApi(400, 'Failed, Data ga masuk');
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, 'Failed, Error ada sesuatu');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data = Student::where('_id', '=', $id)->get();
        $lat1 = (int)$data[0]['latihan_soal_1'];
        $lat2 = (int)$data[0]['latihan_soal_2'];
        $lat3 = (int)$data[0]['latihan_soal_3'];
        $lat4 = (int)$data[0]['latihan_soal_4'];
        $ratalatihansoal = ($lat1 + $lat2 + $lat3 + $lat4) / 4;
        $nilai_akhir_rata_latihan = ($ratalatihansoal * 15) / 100;
        $tampungLatihanSoal = new stdClass();
        $tampungLatihanSoal->nilai_latihan_soal_1 = $lat1;
        $tampungLatihanSoal->nilai_latihan_soal_2 = $lat2;
        $tampungLatihanSoal->nilai_latihan_soal_3 = $lat3;
        $tampungLatihanSoal->nilai_latihan_soal_4 = $lat4;
        $tampungLatihanSoal->rata_rata_nilai_latihan_soal = $ratalatihansoal;
        $tampungLatihanSoal->nilai_akhir_rata_rata = $nilai_akhir_rata_latihan;

        $uh1 = (int)$data[0]['ulangan_harian_1'];
        $uh2 = (int)$data[0]['ulangan_harian_2'];
        $ratanilaiuh = ($uh1 + $uh2) / 2;
        $nilai_akhir_rata_uh = ($ratanilaiuh * 20) / 100;
        $tampungNilaiuh = new stdClass();
        $tampungNilaiuh->nilai_ulangan_harian_1 = $uh1;
        $tampungNilaiuh->nilai_ulangan_harian_2 = $uh2;
        $tampungNilaiuh->rata_rata_nilai_ulangan_harian = $ratanilaiuh;
        $tampungNilaiuh->nilai_akhir_rata_uh = $nilai_akhir_rata_uh;

        $uts = (int)$data[0]['ulangan_tengah_semester'];
        $uas = (int)$data[0]['ulangan_akhir_semester'];
        $nilaiAkhirUTS = ($uts * 25) / 100;
        $nilaiAkhirUAS = ($uas * 40) / 100;
        $nilaiAkhir = $nilai_akhir_rata_latihan + $nilai_akhir_rata_uh + $nilaiAkhirUTS + $nilaiAkhirUAS;

        $tampungTotalNilai = new stdClass();

        $tampungTotalNilai->rata_rata_nilai_latihan_soal = $ratalatihansoal;
        $tampungTotalNilai->nilai_akhir_latihan_soal = $nilai_akhir_rata_latihan;

        $tampungTotalNilai->rata_rata_nilai_ulangan_harian = $ratanilaiuh;
        $tampungTotalNilai->nilai_akhir_ulangan_harian = $nilai_akhir_rata_uh;

        $tampungTotalNilai->nilai_uts = $uts;
        $tampungTotalNilai->nilai_akhir_uts = $nilaiAkhirUTS;

        $tampungTotalNilai->nilai_uas = $uas;
        $tampungTotalNilai->nilai_akhir_uas = $nilaiAkhirUAS;

        $tampungTotalNilai->nilai_akhir_siswa = $nilaiAkhir;

        $data[0]->{'Nilai latihan soal'} = $tampungLatihanSoal;
        $data[0]->{'Nilai ulangan harian'} = $tampungNilaiuh;
        $data[0]->{'Nilai semester'} = $tampungTotalNilai;

        if ($data) {
            return ApiFormatter::createApi(200, 'Success, Data Siswa berhasil di tampilkan', $data);
        } else {
            return ApiFormatter::createApi(400, "Failed");
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        try {
            $request->validate([
                'name' => 'required',
                'nis' => 'required',
                'address' => 'required',
                'mapel_diambil' => 'required',
                'latihan_soal_1' => 'required',
                'latihan_soal_2' => 'required',
                'latihan_soal_3' => 'required',
                'latihan_soal_4' => 'required',
                'ulangan_harian_1' => 'required',
                'ulangan_harian_2' => 'required',
                'ulangan_tengah_semester' => 'required',
                'ulangan_akhir_semester' => 'required',
            ]);

            $student = Student::findOrFail($id);

            $student->update([
                'name' => $request->name,
                'nis' => $request->nis,
                'address' => $request->address,
                'mapel_diambil' => $request->mapel_diambil,
                'latihan_soal_1' => $request->latihan_soal_1,
                'latihan_soal_2' => $request->latihan_soal_2,
                'latihan_soal_3' => $request->latihan_soal_3,
                'latihan_soal_4' => $request->latihan_soal_4,
                'ulangan_harian_1' => $request->ulangan_harian_1,
                'ulangan_harian_2' => $request->ulangan_harian_2,
                'ulangan_tengah_semester' => $request->ulangan_tengah_semester,
                'ulangan_akhir_semester' => $request->ulangan_akhir_semester
            ]);

            $data = Student::where('_id', '=', $id)->get();

            if ($data) {
                return ApiFormatter::createApi(200, 'Success, Data Siswa berhasil di update', $data);
            } else {
                return ApiFormatter::createApi(400, 'Failed, Data tidak berhasil di update');
            }
        } catch (Exception $error) {
            // throw $error;
            return ApiFormatter::createApi(400, 'Failed, Error ada sesuatu');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        try {
            $student = Student::findOrFail($id);

            $data = $student->delete();

            if ($data) {
                return ApiFormatter::createApi(200, 'Delete Data Siswa berhasil');
            } else {
                return ApiFormatter::createApi(400, "Delete gagal");
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, "Failed");
        }
    }
}
