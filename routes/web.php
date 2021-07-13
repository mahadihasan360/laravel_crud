<?php

use Illuminate\Support\Facades\Route;

/**
 * For Student
 */
Route::get("/student",[App\Http\Controllers\studentcontroller::class,"index"]) -> name("student.index");
Route::get("/student/create",[App\Http\Controllers\studentcontroller::class,"create"]) -> name("student.create");
Route::get("/student/show/{id}",[App\Http\Controllers\studentcontroller::class,"show"]) -> name("student.show");
Route::get("/student/edit/{id}",[App\Http\Controllers\studentcontroller::class,"edit"]) -> name("student.edit");
Route::get("/student/destroy/{id}",[App\Http\Controllers\studentcontroller::class,"destroy"]) -> name("student.destroy");
Route::post("/student/store",[App\Http\Controllers\studentcontroller::class,"store"]) -> name("student.store");
Route::post("/student/update/{id}",[App\Http\Controllers\studentcontroller::class,"update"]) -> name("student.update");

/**
 * For Teacher
 */

 Route::get("/teacher",[App\Http\Controllers\teachercontroller::class,"index"]) -> name("teacher.index");
 Route::get("/teacher/create",[App\Http\Controllers\teachercontroller::class,"create"]) -> name("teacher.create");
 Route::post("/teacher/store",[App\Http\Controllers\teachercontroller::class,"store"]) -> name("teacher.store");
 Route::get("/teacher/show/{id}",[App\Http\Controllers\teachercontroller::class,"show"]) -> name("teacher.show");
 Route::get("/teacher/edit/{id}",[App\Http\Controllers\teachercontroller::class,"edit"]) -> name("teacher.edit");
 Route::post("/teacher/update/{id}",[App\Http\Controllers\teachercontroller::class,"update"]) -> name("teacher.update");
 Route::get("/teacher/destroy/{id}",[App\Http\Controllers\teachercontroller::class,"destroy"]) -> name("teacher.destroy");
