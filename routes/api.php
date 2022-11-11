<?php

use App\Http\Controllers\CourseCategoryController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseDurationController;
use App\Http\Controllers\CoursePriceController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ScholarshipController;
use App\Http\Controllers\ScholarshipCourseController;
use App\Http\Controllers\ScholarshipStudentController;
use App\Http\Controllers\StaffAssignedCourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('users',UserController::class);
Route::apiResource('course-categories',CourseCategoryController::class);
Route::apiResource('courses',CourseController::class);
Route::apiResource('course-prices',CoursePriceController::class);
Route::apiResource('students',StudentController::class);
Route::apiResource('departments',DepartmentController::class);
Route::apiResource('scholarship-students',ScholarshipStudentController::class);
Route::apiResource('staff-assigned-courses',StaffAssignedCourseController::class);
Route::apiResource('course-durations',CourseDurationController::class);
Route::apiResource('roles',RoleController::class);
Route::apiResource('scholarship-courses',ScholarshipCourseController::class);
Route::apiResource('scholarships',ScholarshipController::class);
Route::get('students/{id}/{status}/{targetc}',[StudentController::class,'statusSetter']);


