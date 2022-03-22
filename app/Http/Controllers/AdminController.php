<?php

namespace App\Http\Controllers;
use Request;
use App\Models\User;
use App\Models\Admin;
use Inertia\Inertia;
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
        return Inertia::render('Admin/Dashboard',[
                        
        ]
        );
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

    //updates user
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

    //lists doctors with search filter on doctors link
    public function doctorsList()
    {
        return Inertia::render('Admin/DoctorsList', [
            'users' => User::query()->where('user_role', '=', '2')
                ->when(Request::input('search'), function ($query, $search) {
                    $query->where('name', 'like', "%{$search}%");
                })
                ->paginate(10)
                ->withQueryString()
                ->through(fn($user) => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'can' => [
                        'edit' => Auth::user()->can('edit', $user)
                    ]
                ]),

            'filters' => Request::only(['search']),
            'can' => [
                'createUser' => Auth::user()->can('create', User::class)
            ],
        ]);
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

    public function destroy(User $user)
    {
        $user->delete();
    }
}