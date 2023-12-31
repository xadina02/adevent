<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\UserController;
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
Route::get('admin/logout', [PagesController::class, 'logout'])->name('logout');

Route::get('members/', [UserController::class, 'display'])->name('members/all');
Route::get('members/registration', [UserController::class, 'form'])->name('members/add');
Route::get('members/show/{id}', [UserController::class, 'show'])->name('members/edit');
Route::post('members/', [UserController::class, 'create'])->name('members/create');
Route::post('members/update/{id}', [UserController::class, 'update'])->name('members/update');
Route::get('members/remove/{id}', [UserController::class, 'remove'])->name('members/delete');
Route::post('admin/login/check', [UserController::class, 'validatelogin'])->name('login');
Route::post('admin/password/change', [UserController::class, 'newpassword'])->name('password.change');

Route::get('events/', [EventController::class, 'display'])->name('events/all');
Route::get('events/registration', [EventController::class, 'form'])->name('events/add');
Route::get('events/show/{id}', [EventController::class, 'show'])->name('events/edit');
Route::post('events/', [EventController::class, 'create'])->name('events/create');
Route::post('events/update/{id}', [EventController::class, 'update'])->name('events/update');
Route::get('events/delete/{id}', [EventController::class, 'delete'])->name('events/delete');

Route::get('events/participants/{id}', [ParticipantController::class, 'index'])->name('events/participants');
Route::post('events/participants/remove/{id}', [ParticipantController::class, 'remove'])->name('events/participants/remove');
Route::post('events/participants/add/{id}', [ParticipantController::class, 'add'])->name('events/participants/add');

Route::get('mail/send/{name}/{email}', [MailController::class, 'newmember'])->name('mail/send/member');
Route::get('mail/send', [MailController::class, 'newparticipant'])->name('mail/send/event/participant');
Route::get('mail/send2', [MailController::class, 'newparticipantt'])->name('mail/send/add/participant');
