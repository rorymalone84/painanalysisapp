<?php

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ConsultController;
use App\Http\Controllers\DoctorsController;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PainAnalysisController;
use App\Http\Controllers\RequestConsultController;

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'create')->name('login');
    Route::post('/login','store');
    Route::post('/logout','logout')->middleware('auth');
});


// Authorizes Admin 'role_id = 3' routes
Route::middleware('auth','admin:3')->group(function(){
    
    // Admin is responsible for registering patients and doctors   
    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin/dashboard', 'index')->name('dashboard.admin');
        /*
        user and doctor lists
        */
        Route::get('/admin/patientsList', 'patientsList')->name('patients.list');
        Route::get('/admin/doctorsList', 'doctorsList')->name('doctors.list');        
        /*
        registration crud routes
        */
        Route::get('/admin/createUser', 'createUser');
        Route::post('/admin/createUser', 'storeUser');
        Route::get('/admin/show/{user}', 'showUser')->name('show.user');
        Route::get('/admin/editUser/{user}', 'editUser')->name('edit.user');
        Route::put('/admin/editUser/{user}', 'updateUser')->name('update.user');
        Route::get('/admin/deleteUser/{user}', 'deleteUserPrompt')->name('deletePrompt.user');
        Route::delete('/admin/deleteUser/{user}','deleteUser')->name('delete.user');        
    });
 

    
    
    Route::get('/settings', function () {
        return Inertia::render('Settings');
    });

});

// Authenticates doctor 'role_id = 2' routes
Route::middleware('auth', 'doctor:2')->group(function(){     
    Route::controller(DoctorsController::class)->group(function () {
        Route::get('/doctors/dashboard', 'index');
        Route::get('/doctors/consults', 'consults');
        Route::get('/doctors/consults/requests', 'consultRequests');
        Route::get('/doctors/consults/fulfilled', 'fulfilledConsults');                  
    });

    
    Route::controller(RequestConsultController::class)->group(function () {
        Route::get('/doctors/consults', 'consults');
        Route::get('/doctors/consults/requests', 'consultRequests');
        Route::get('/doctors/consults/fulfilled', 'fulfilledConsults');                  
    });
});

// Authenticates Patient 'role_id = 1' routes
Route::middleware('auth','patient:1')->group(function(){        
    Route::controller(PatientsController::class)->group(function () {
        Route::get('/patients/home', 'index')->name('patients.home');
        Route::get('/patients/consultMenu', 'consultMenu')->name('patients.consultMenu');
        Route::get('/patients/doctorIndex', 'doctorIndex')->name('doctor.index');
    });

    //used for the patient to request a consultation from a doctor
    Route::controller(RequestConsultController::class)->group(function(){
        Route::get('/patients/requestConsult/{user}', 'createRequest')->name('request.consult');
        Route::post('/patients/requestConsult/{user}', 'store')->name('store.consult');
    });

    Route::controller(PainAnalysisController::class)->group(function () {
        Route::get('/patients/form', 'form');
        Route::post('/patients/form', 'store')->name('store.form');
        Route::get('/patients/journal', 'journalIndex')->name('journal');
        Route::get('/patients/showEntry/{painAnalysis}', 'showEntry')->name('show.entry');
        Route::get('/patients/editEntry/{painAnalysis}', 'editEntry')->name('edit.entry');
        Route::get('/patients/deleteEntry/{painAnalysis}', 'deletePrompt')->name('deletePrompt.entry');
        Route::delete('/admin/deleteEntry/{painAnalysis}','deleteEntry')->name('delete.entry'); 
    }); 
});

//