<?php

namespace App\Http\Controllers;
use Request;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Admin;
use App\Models\Doctor;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class AdminController extends Controller
{
    /**
     * Admin resources. - Only admins can create, remove and update the app's user data
    */

    //Admin dashboard
    public function index()
    {
        return Inertia::render('Admin/Dashboard');
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
            'user_role' => 'required', 
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
               'user_role' => $user->user_role,
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
               'user_role' => $user->user_role,
            ]
        ]);
    }

    //update user data function
    public function updateUser(Request $request, User $user)
    {
        $attributes = Request::validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'user_role' => 'required',
        ]);

        // update the user
        $user->update($attributes);
         
        return redirect()->route('patients.list');
    }

    //lists patients with search filter on patients link
    public function patientsList()
    {   
        return Inertia::render('Admin/PatientsList', [
            'users' => User::query()->where('user_role', '=', '0')
                ->when(Request::input('search'), function ($query, $search) {
                    $query->where('name', 'like', "%{$search}%");
                })
                ->paginate(10)
                ->withQueryString()
                ->through(fn($user) => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'user_role' => $user->user_role,
                    'can' => [
                        'edit' => Auth::user()->can('edit', $user)
                    ],
                ]),

            'filters' => Request::only(['search']),
            'can' => [
                'createUser' => Auth::user()->can('create', User::class)
            ]
        ]);
    }

     //delete doctor prompt
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

    //Doctor resources

    //lists doctors with search filter on doctors link
    public function doctorsList()
    {
        return Inertia::render('Admin/DoctorsList', [
            'doctors' => Doctor::query()
                ->when(Request::input('search'), function ($query, $search) {
                    $query->where('name', 'like', "%{$search}%");
                })
                ->paginate(10)
                ->withQueryString()
                ->through(fn($doctor) => [
                    'id' => $doctor->id,
                    'name' => $doctor->name,
                    'can' => [
                        'edit' => Auth::user()->can('edit', $doctor)
                    ]
                ]),
            'filters' => Request::only(['search']),
            'can' => [
                'createUser' => Auth::user()->can('create', Doctor::class)
            ],
        ]);
    }

    public function createDoctor()
    {
        return Inertia::render('Admin/CreateDoctor');
    }

    public function storeDoctor()
    {
        $attributes = Request::validate([
            'name' => 'required',
            'email' => ['required', 'email'], 
            'password' => 'required',
        ]);
    
        Doctor::create($attributes);
    
        return Redirect::route('doctors.list'); 
    }

    public function showDoctor(Doctor $doctor)
    {
        return inertia::render('Admin/ShowDoctor', [
            'doctor' => [
               'id' => $doctor->id,
               'name' => $doctor->name,
               'email'=> $doctor->email, 
            ]
        ]); 
    }

    public function editDoctor(Doctor $doctor)
    {
        return inertia::render('Admin/EditDoctor', [
            'doctor' => [
               'id' => $doctor->id,
               'name' => $doctor->name,
               'email'=> $doctor->email, 
            ]
        ]);
    }

    //update doctor
    public function updateDoctor(Request $request, Doctor $doctor)
    {
        $attributes = Request::validate([
            'name' => 'required',
            'email' => ['required', 'email'],
        ]);

        // update the user
        $doctor->update($attributes);
         
        return redirect()->route('doctors.list');
    }

    //delete doctor prompt
    public function deleteDoctorPrompt(Doctor $doctor){
        return inertia::render('Admin/DeleteDoctor', [
           'doctor' => [
               'id' => $doctor->id,
               'name' => $doctor->name
           ]
        ]);
    }

    //delete doctor function
    public function deleteDoctor(Doctor $doctor)
    {
        $doctor->delete();

        return redirect()->route('doctors.list');
    }
}