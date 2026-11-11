<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AuthController,DashboardController,JobController,ApplicationController,ProfileController};
Route::get('/', fn() => view('welcome'))->name('home');
Route::get('/vacantes',[JobController::class,'index'])->name('jobs.index');
Route::get('/vacantes/{job}',[JobController::class,'show'])->name('jobs.show');
Route::middleware('guest')->group(function(){ Route::get('/registro',[AuthController::class,'showRegister'])->name('register'); Route::post('/registro',[AuthController::class,'register'])->name('register.store'); Route::get('/ingresar',[AuthController::class,'showLogin'])->name('login'); Route::post('/ingresar',[AuthController::class,'login'])->name('login.store'); });
Route::middleware('auth')->group(function(){
 Route::post('/salir',[AuthController::class,'logout'])->name('logout');
 Route::get('/panel',DashboardController::class)->name('dashboard');
 Route::get('/mi-perfil',[ProfileController::class,'edit'])->name('profile.edit'); Route::put('/mi-perfil',[ProfileController::class,'update'])->name('profile.update');
 Route::get('/mis-postulaciones',[ApplicationController::class,'index'])->name('applications.index');
 Route::post('/vacantes/{job}/postular',[ApplicationController::class,'store'])->name('applications.store');
 Route::patch('/postulaciones/{application}/estado',[ApplicationController::class,'updateStatus'])->name('applications.status');
 Route::resource('empresa/vacantes',JobController::class)->parameters(['vacantes'=>'job'])->names('company.jobs')->except(['index','show']);
});
