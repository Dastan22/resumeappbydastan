<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\User\Profile;
use App\Http\Controllers\UserDetailController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ResumerController;
use App\Http\Controllers\ReloadController;


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
    return view('index');
});



Route::resource('user/resume', UserDetailController::class);
Route::resource('user/education', EducationController::class);
Route::resource('user/experience', ExperienceController::class);
Route::resource('user/skill', SkillController::class);
Route::get('/resume', ResumerController::class)->name('resume.index');
Route::get('/resume/download', ReloadController::class)->name('resume.index');


//Route::post('resume/create', 'UserDetailController@create');

Route::prefix('auth')->middleware(['auth'])->name('user.')->group(function () {
    Route::get('profile', Profile::class)->name('profile');

});

Route::prefix('admin')->middleware(['auth', 'auth.isAdmin'])->name('admin.')->group(function () {

    Route::resource('/admin/users', UserController::class);



});
