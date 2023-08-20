<?php

use App\Http\Controllers\KelasController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('subject', [SubjectController::class, 'index']);
Route::post('subject/store', [SubjectController::class, 'store']);
Route::get('subject/show/{id}', [SubjectController::class, 'show']);
Route::post('subject/update/{id}', [SubjectController::class, 'update']);
Route::get('subject/destroy/{id}', [SubjectController::class, 'destroy']);

Route::get('schoolclass', [KelasController::class, 'index']);
Route::post('schoolclass/store', [KelasController::class, 'store']);
Route::get('schoolclass/show/{id}', [KelasController::class, 'show']);
Route::post('schoolclass/update/{id}', [KelasController::class, 'update']);
Route::get('schoolclass/destroy/{id}', [KelasController::class, 'destroy']);

Route::get('student', [StudentController::class, 'index']);
Route::post('student/store', [StudentController::class, 'store']);
Route::get('student/show/{id}', [StudentController::class, 'show']);
Route::post('student/update/{id}', [StudentController::class, 'update']);
Route::get('student/destroy/{id}', [StudentController::class, 'destroy']);
