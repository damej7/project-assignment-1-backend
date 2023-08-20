<?php

namespace App\Http\Controllers;

use App\Helpers\ApiFormatter;
use App\Models\Schoolclass;
use Exception;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $data = Schoolclass::all();

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
                'school_year' => 'required',
                'teacher_name' => 'required',
            ]);

            $kelas = Schoolclass::create([
                'name' => $request->name,
                'school_year' => $request->school_year,
                'teacher_name' => $request->teacher_name
            ]);

            $data = Schoolclass::where('_id', '=', $kelas->id)->get();

            if ($data) {
                return ApiFormatter::createApi(200, 'Success, Data kelas berhasil di tambahkan', $data);
            } else {
                return ApiFormatter::createApi(400, 'Failed, Data ga masuk');
            }
        } catch (Exception $error) {
            // throw $error;
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
        $data = Schoolclass::where('_id', '=', $id)->get();

        if ($data) {
            return ApiFormatter::createApi(200, 'Success, Data Kelas berhasil di tampilkan', $data);
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
                'school_year' => 'required',
                'teacher_name' => 'required',
            ]);

            $kelas = Schoolclass::findOrFail($id);

            $kelas->update([
                'name' => $request->name,
                'school_year' => $request->school_year,
                'teacher_name' => $request->teacher_name,
            ]);

            $data = Schoolclass::where('_id', '=', $id)->get();

            if ($data) {
                return ApiFormatter::createApi(200, 'Success, Data Kelas berhasil di update', $data);
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
            $kelas = Schoolclass::findOrFail($id);

            $data = $kelas->delete();

            if ($data) {
                return ApiFormatter::createApi(200, 'Delete Data Kelas berhasil');
            } else {
                return ApiFormatter::createApi(400, "Delete gagal");
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, "Failed");
        }
    }
}
