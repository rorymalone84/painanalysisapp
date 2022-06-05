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
     * Lets the patient look up a doctor to request a consultation from.
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
     * Stores a consultation request from the patient to the doctor.
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
     * Displays the patients requests to the doctor.
     */

    public function requests()
    {
        return Inertia::render('Doctors/ConsultRequests',[
            'requestConsults' => RequestConsult::where('doctor_id', Auth::id())
            ->join('users', 'users.id', '=', 'patient_id', 'consult_requests')
            ->get(['consult_requests.id','patient_id','comments', 'name', 'consult_requests.created_at']),           
        ]);
    }

    public function showRequest(RequestConsult $requestConsult){
        return Inertia::render('Doctors/ShowRequest', [
            'consultRequest' => [
                'id' => $requestConsult->id,
                'duration' => $requestConsult->duration,
                'comments' => $requestConsult->comments,
            ]
        ]);
    }
}