<?php

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorsController;
use App\Http\Controllers\PatientsController;
use App\Http\Controllers\Auth\LoginController;

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

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'create')->name('login');
    Route::post('/login','store');
    Route::post('/logout','logout')->middleware('auth');
});

Route::middleware('auth')->group(function(){

    // controls authenticated Admin 'user_role = 2' routes
    Route::controller(AdminController::class)->group(function () {
        Route::get('/admin/dashboard', 'index');
        /*
        user lists
        */
        Route::get('/admin/patientsList', 'patientsList')->name('patients.list')->middleware('can:create, App\Models\User');
        Route::get('/admin/doctorsList', 'doctorsList')->name('doctors.list');
        /*
        create and store user
        */
        Route::get('/admin/createUser', 'createUser')->middleware('can:create, App\Models\User');
        Route::post('/admin/createUser', 'storeUser');
        /*
        view/edit user details
        */
        Route::get('/admin/show/{user}', 'showUser')->name('show.user')->middleware('can:create, App\Models\User');
        Route::get('/admin/editUser/{user}', 'editUser')->name('edit.user')->middleware('can:create, App\Models\User');
        Route::put('/admin/editUser/{user}', 'updateUser')->name('update.user');
        /*
        delete user
        */
        Route::delete('/destroy/{user}', [AdminController::class, 'destroy'])->name('users.destroy');
    });

    //Where admins assign a user to doctor
    //Route::controller(AssignmentController::class)->group(function () {
    //    Route::get('/admin/patientGroups/', 'showPatientGroup')->name('show.patientGroup')->middleware('can:create, App\Models\User');
    //    Route::get('/admin/assignPatient/', 'assignPatient')->name('assign.patient')->middleware('can:create, App\Models\User');
    //    Route::get('/admin/assignPatient/', 'assignPatient')->name('assign.patient')->middleware('can:create, App\Models\User');
    //};

    // controls authenticated Doctors 'user_role = 1' routes
    Route::controller(DoctorsController::class)->group(function () {
        Route::get('/doctors/dashboard', 'index');
        Route::get('/doctors/details', 'createDetails');
        Route::get('/doctors/details', 'showDetails');
        Route::get('/doctors/details', 'editDetails');
        Route::get('/doctors/patients', 'patientList');
        Route::get('/doctors/appointments');
    });

    Route::controller(PatientsController::class)->group(function () {
        Route::get('/patients/dashboard', 'index');
        Route::get('/patients/painAnalysisForm', 'painAnalysisForm');
        Route::post('/patients/painAnalysisForm', 'entryForm');
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