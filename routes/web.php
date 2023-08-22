<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ParticipantController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('home', [PagesController::class, 'home'])->name('homepage');
Route::get('admin/login', [PagesController::class, 'signup'])->name('signup');
Route::get('admin/forgot_password', [PagesController::class, 'fpassd'])->name('forgotpasswd');

Route::get('members/', [UserController::class, 'display'])->name('members/all');
Route::get('members/registration', [UserController::class, 'form'])->name('members/add');
Route::get('members/show/{id}', [UserController::class, 'show'])->name('members/edit');
Route::post('members/', [UserController::class, 'create'])->name('members/create');
Route::post('members/update', [UserController::class, 'update'])->name('members/update');
Route::post('members/delete', [UserController::class, 'delete'])->name('members/delete');
Route::post('login/check', [UserController::class, 'validatelogin'])->name('login');

Route::get('events/', [EventController::class, 'display'])->name('events/all');
Route::get('events/registration', [EventController::class, 'form'])->name('events/add');
Route::get('events/show/{id}', [EventController::class, 'show'])->name('events/edit');
Route::post('events/', [EventController::class, 'create'])->name('events/create');
Route::post('events/update', [EventController::class, 'update'])->name('events/update');
Route::post('events/delete', [EventController::class, 'delete'])->name('events/delete');

Route::get('events/participants/{id}', [ParticipantController::class, 'index'])->name('events/participants');
Route::post('events/participants/{id}', [ParticipantController::class, 'remove'])->name('events/participants/remove');
Route::post('events/participants/{id}', [ParticipantController::class, 'add'])->name('events/participants/add');
