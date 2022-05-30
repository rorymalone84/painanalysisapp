<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Consult;
use App\Models\RequestConsult;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class RequestConsultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createRequest(User $user)
    {
        return Inertia::render('RequestConsults/CreateRequest',[
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

    public function consultRequests(RequestConsult $requestConsult, User $user )
    {
        return Inertia::render('Consults/ConsultRequests',[
            'consultRequests' => RequestConsult::where('doctor_id', Auth::id())
            ->get(['id', 'created_at','patient_id']),           
        ]);
    }
}