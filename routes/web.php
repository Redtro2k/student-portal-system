<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
//        auth()->user()->assignRole('admin');
        return Inertia::render('Dashboard');
    })->name('dashboard');
    Route::middleware(['role:admin'])->group(function(){
        Route::resource('admin', \App\Http\Controllers\AdminController::class);
        Route::resource('teachers', \App\Http\Controllers\TeacherController::class);
        Route::resource('course', \App\Http\Controllers\CourseController::class);
            Route::controller(\App\Http\Controllers\SchoolController::class)->group(function(){
                Route::get('school', 'index');
                Route::get('/school/create', 'create');
                Route::post('/school', 'store');
                Route::get('/school/delete/{id}', 'destroy');
                Route::get('/school/{id}/edit', 'edit');
                Route::post('/school/update/{token}', 'update');
            });
            Route::controller(App\Http\Controllers\Shared\ScheduleController::class)->group(function(){
                Route::get('schedules/{id}/edit', 'edit');
                Route::post('schedules/update/{id}', 'update');
            });
        Route::resource('subject', \App\Http\Controllers\SubjectController::class);
        Route::controller(\App\Http\Controllers\UsersController::class)->group(function() {
             Route::get('/users', 'index');
             Route::get('/users/show/{id}', 'show');
        });
    });

});
