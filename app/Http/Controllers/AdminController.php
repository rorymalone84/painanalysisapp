<?php

namespace App\Http\Controllers;
use Request;
use App\Models\Role;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Admin;
use App\Models\PainAnalysis;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class AdminController extends Controller
{
    /**
     * Admin resources. - Only admins can create, remove and update the app's user data
    */

    //Admin dashboard
    public function index()    {
        $doctorCount =  User::where('role_id', '=', 2)->get();
        $latestDoctor = User::where('role_id', '=', 2)->latest()->first();
        $patientCount = User::where('role_id', '=', 1)->get();
        $latestPatient = User::where('role_id', '=', 1)->latest()->first();
        $journalEntries = User::with('painAnalysis')->get();
        $latestJournal = PainAnalysis::latest()->first();            
    
        return Inertia::render('Admin/Dashboard',[
            'userCount' => count($doctorCount) + count($patientCount),
            'doctorCount' => count($doctorCount),
            'latestDoctor' => $latestDoctor,
            'patientCount' => count($patientCount),
            'latestPatient' => $latestPatient,
            'journalCount' => count($journalEntries),   
            'latestJournal' => $latestJournal
        ]);
    }

    //create User form
    public function createUser()
    {
        return Inertia::render('Admin/CreateUser');
    }

    //store User
    public function storeUser(Request $request)
    {
        $attributes = Request::validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'role_id' => 'required', 
            'password' => 'required',
        ]);
    
        User::create($attributes);
    
        return Redirect::route('patients.list'); 
    }

    //show a user record
    public function showUser(User $user)
    {   
        return inertia::render('Admin/ShowUser', [
            'user' => [
               'id' => $user->id,
               'name' => $user->name,
               'email'=> $user->email, 
               'role_id' => $user->role_id,
            ]
        ]);
    }
    
    //update user form
    public function editUser(User $user)
    {
        return inertia::render('Admin/EditUser', [
            'user' => [
               'id' => $user->id,
               'name' => $user->name,
               'email'=> $user->email, 
               'role_id' => $user->role_id,
            ]
        ]);
    }

    //update user data function
    public function updateUser(Request $request, User $user)
    {
        $attributes = Request::validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'role_id' => 'required',
        ]);

        // update the user
        $user->update($attributes);
         
        return redirect()->route('patients.list');
    }

    //lists patients with search filter on patients link
    public function patientsList()
    {   
        return Inertia::render('Admin/PatientsList', [
            'users' => User::query()->where('role_id', '=', '1')
                ->when(Request::input('search'), function ($query, $search) {
                    $query->where('name', 'like', "%{$search}%");
                })
                ->paginate(10)
                ->withQueryString()
                ->through(fn($user) => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'role_id' => $user->role_id,
                ]),

            'filters' => Request::only(['search']),
        ]);
    }

     //delete user prompt
     public function deleteUserPrompt(User $user){
        return inertia::render('Admin/DeleteUser', [
           'user' => [
               'id' => $user->id,
               'name' => $user->name
           ]
        ]);
    }

    public function deleteUser(User $user)
    {
        $user->delete();

        return redirect()->route('patients.list');
    }

    //lists doctors with search filter on doctors link
    public function doctorsList()
    {
        return Inertia::render('Admin/DoctorsList', [
            'users' => User::query()->where('role_id', '=', '2')
                ->when(Request::input('search'), function ($query, $search) {
                    $query->where('name', 'like', "%{$search}%");
                })
                ->paginate(10)
                ->withQueryString()
                ->through(fn($user) => [
                    'id' => $user->id,
                    'name' => $user->name,
                ]),
            'filters' => Request::only(['search']),
        ]);
    }
}