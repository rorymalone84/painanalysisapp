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

Route::middleware('auth')->group(function(){
    // controls authenticated Admin 'user_role = 2' routes
    // responsible for registering patients and doctors    
    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin/dashboard', 'index');
        /*
        user and doctor lists
        */
        Route::get('/admin/patientsList', 'patientsList')->name('patients.list')->middleware('can:create, App\Models\User');
        Route::get('/admin/doctorsList', 'doctorsList')->name('doctors.list');        
        /*
        user crud routes
        */
        Route::get('/admin/createUser', 'createUser')->middleware('can:create, App\Models\User');
        Route::post('/admin/createUser', 'storeUser');
        Route::get('/admin/show/{user}', 'showUser')->name('show.user')->middleware('can:create, App\Models\User');
        Route::get('/admin/editUser/{user}', 'editUser')->name('edit.user')->middleware('can:create, App\Models\User');
        Route::put('/admin/editUser/{user}', 'updateUser')->name('update.user');
        Route::get('/admin/deleteUser/{user}', 'deleteUserPrompt')->name('deletePrompt.user');
        Route::delete('/admin/deleteUser/{user}','deleteUser')->name('delete.user');
        /*
        doctor crud routes
        */
        Route::get('/admin/createDoctor', 'createDoctor')->middleware('can:create, App\Models\User');
        Route::post('/admin/createDoctor', 'storeDoctor');
        Route::get('/admin/showDoctor/{doctor}', 'showDoctor')->name('show.doctor')->middleware('can:create, App\Models\User');
        Route::get('/admin/editDoctor/{doctor}', 'editDoctor')->name('edit.doctor')->middleware('can:create, App\Models\User');
        Route::put('/admin/editDoctor/{doctor}', 'updateDoctor')->name('update.doctor');        
        Route::get('/admin/deleteDoctor/{doctor}', 'deleteDoctorPrompt')->name('doctor.deletePrompt');//route name inconsistency due to ziggy route issue
        Route::delete('/admin/deleteDoctor/{doctor}', 'deleteDoctor')->name('delete.doctor');        
    });

    Route::controller(PatientsController::class)->group(function () {
        Route::get('/patients/home', 'index');
        Route::get('/patients/analysisForm', 'analysisForm');
        Route::post('/patients/analysisForm', 'analysisForm');
        Route::get('/patients/journalEntries');
    });

    Route::get('/', function () {
        return Inertia::render('Home');
    });
    
    Route::get('/settings', function () {
        return Inertia::render('Settings');
    });

});
//