<?php

namespace App\Http\Controllers;


use Inertia\Inertia;
use App\Models\Consult;
use Illuminate\Http\Request;
use App\Models\RequestConsult;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Redirect;

class RequestConsultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Consults/Index', [
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createRequest(User $user)
    {
        return Inertia::render('Consults/CreateRequest',[
            'doctor' => [
                'id' => $user->id,
                'name' => $user->name,
                'email'=> $user->email, 
                'role_id' => $user->role_id,
             ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'patient_id' => 'required',
            'doctor_id' => 'required',
            'duration' => 'required',
            'comments' => 'required'
            ]);
    
        RequestConsult::create([ 
            'patient_id' => $request->patient_id,
            'doctor_id' => $request->doctor_id,
            'duration' => $request->duration,
            'comments' => $request->comments,            
           ]);

           return Redirect::route('patients.home');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Consult  $consult
     * @return \Illuminate\Http\Response
     */
    public function show(Consult $consult)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Consult  $consult
     * @return \Illuminate\Http\Response
     */
    public function edit(Consult $consult)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Consult  $consult
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Consult $consult)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Consult  $consult
     * @return \Illuminate\Http\Response
     */
    public function destroy(Consult $consult)
    {
        //
    }
}