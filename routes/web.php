<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\UserController;

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
Route::get('/', [AuthController::class, "login"])->name("auth.login");
Route::post('/signin', [AuthController::class, "signin"])->name("auth.signin");
Route::get('/signout', [AuthController::class, "signout"])->name("auth.signout");

Route::get('/projects/me/c/{id}', [ProjectController::class, "getMyProjectsCategory"])->name("get-my-projects-category");
Route::get('/projects/c/{id}', [ProjectController::class, "getProjectsCategory"])->name("get-projects-category");
Route::get('/project/{id}', [ProjectController::class, "detailproject"])->name("projects.detailproject");
Route::get('/projects/me', [ProjectController::class, "myprojects"])->name("projects.me");
Route::get('/download', [ProjectController::class, "download"])->name("download");

Route::resource('users', UserController::class);
Route::middleware("userverified")->resource('projects', ProjectController::class);

