<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/student', [StudentController::class, 'index'])->name('student.index');
Route::get('/student/create', [StudentController::class, 'studentcreate'])->name('student.studentcreate');
Route::post('/student', [StudentController::class, 'store'])->name('student.store');
Route::get('/student/{student}/edit', [StudentController::class, 'edit'])->name('student.edit');
Route::put('/student/{student}/update', [StudentController::class, 'update'])->name('student.update');
Route::delete('/student/{student}/delete', [StudentController::class, 'delete'])->name('student.delete');