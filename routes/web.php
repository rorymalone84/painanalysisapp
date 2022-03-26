<?php

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorsController;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\Auth\LoginController;

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'create')->name('login');
    Route::post('/login','store');
    Route::post('/logout','logout')->middleware('auth');
});


// Authorizes Admin 'role_id = 2' routes
Route::middleware('auth','admin:2')->group(function(){
    
    // Admin is responsible for registering patients and doctors    
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

// controls authenticated doctor 'role_id = 1' routes
Route::middleware('auth', 'doctor:1')->group(function(){     
    Route::controller(DoctorsController::class)->group(function () {
        Route::get('/doctors/dashboard', 'index');     
    });
});

// controls authenticated Patient 'role_id = 0' routes
Route::middleware('auth','patient:0')->group(function(){        
    Route::controller(PatientsController::class)->group(function () {
        Route::get('/patients/home', 'index');     
    });
});

//