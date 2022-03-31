<?php

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorsController;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PainAnalysisController;

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'create')->name('login');
    Route::post('/login','store');
    Route::post('/logout','logout')->middleware('auth');
});


// Authorizes Admin 'role_id = 3' routes
Route::middleware('auth','admin:3')->group(function(){
    
    // Admin is responsible for registering patients and doctors, and their interactions   
    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin/dashboard', 'index');
        /*
        user and doctor lists
        */
        Route::get('/admin/patientsList', 'patientsList')->name('patients.list');
        Route::get('/admin/doctorsList', 'doctorsList')->name('doctors.list');        
        /*
        user crud routes
        */
        Route::get('/admin/createUser', 'createUser');
        Route::post('/admin/createUser', 'storeUser');
        Route::get('/admin/show/{user}', 'showUser')->name('show.user');
        Route::get('/admin/editUser/{user}', 'editUser')->name('edit.user');
        Route::put('/admin/editUser/{user}', 'updateUser')->name('update.user');
        Route::get('/admin/deleteUser/{user}', 'deleteUserPrompt')->name('deletePrompt.user');
        Route::delete('/admin/deleteUser/{user}','deleteUser')->name('delete.user');        
    });
 

    Route::get('/', function () {
        return Inertia::render('Home');
    });
    
    Route::get('/settings', function () {
        return Inertia::render('Settings');
    });

});

// Authenticates doctor 'role_id = 2' routes
Route::middleware('auth', 'doctor:2')->group(function(){     
    Route::controller(DoctorsController::class)->group(function () {
        Route::get('/doctors/dashboard', 'index');     
    });
});

// Authenticates Patient 'role_id = 1' routes
Route::middleware('auth','patient:1')->group(function(){        
    Route::controller(PatientsController::class)->group(function () {
        Route::get('/patients/home', 'index')->name('patients.home');         
    });

    Route::controller(PainAnalysisController::class)->group(function () {
        Route::get('/patients/form', 'painAnalysisForm');
        Route::post('/patients/form', 'store')->name('store.form');
    });    
});

//