<?php

namespace App\Http\Controllers;

use App\Helpers\ApiFormatter;
use App\Models\Subject;
use Exception;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Subject::all();

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
            ]);

            $subject = Subject::create([
                'name' => $request->name,
                'school_year' => $request->school_year
            ]);

            $data = Subject::where('_id', '=', $subject->id)->get();

            if ($data) {
                return ApiFormatter::createApi(200, 'Success, Data Subject berhasil di tambahkan', $data);
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
        $data = Subject::where('_id', '=', $id)->get();

        if ($data) {
            return ApiFormatter::createApi(200, 'Success, Data Subject berhasil di tampilkan', $data);
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
                'name' => 'required'
            ]);

            $subject = Subject::findOrFail($id);

            $subject->update([
                'name' => $request->name,
                'school_year' => $request->school_year
            ]);

            $data = Subject::where('_id', '=', $id)->get();

            if ($data) {
                return ApiFormatter::createApi(200, 'Success, Data Subject berhasil di update', $data);
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
            $subject = Subject::findOrFail($id);

            $data = $subject->delete();

            if ($data) {
                return ApiFormatter::createApi(200, 'Delete Data Subject berhasil');
            } else {
                return ApiFormatter::createApi(400, "Delete gagal");
            }
        } catch (Exception $error) {
            return ApiFormatter::createApi(400, "Failed");
        }
    }
}
