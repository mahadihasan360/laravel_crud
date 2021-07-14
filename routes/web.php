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

 /**
  * For Staff
  */

  Route::get("/staff",[App\Http\Controllers\staffcontroller::class,"index"]) -> name("staff.index");
  Route::get("/staff/create",[App\Http\Controllers\staffcontroller::class,"create"]) -> name("staff.create");
  Route::post("/staff/store",[App\Http\Controllers\staffcontroller::class,"store"]) -> name("staff.store");
  Route::get("/staff/show/{id}",[App\Http\Controllers\staffcontroller::class,"show"]) -> name("staff.show");
  Route::get("/staff/edit/{id}",[App\Http\Controllers\staffcontroller::class,"edit"]) -> name("staff.edit");
  Route::post("/staff/update/{id}",[App\Http\Controllers\staffcontroller::class,"update"]) -> name("staff.update");
  Route::get("/staff/destroy/{id}",[App\Http\Controllers\staffcontroller::class,"destroy"]) -> name("staff.destroy");