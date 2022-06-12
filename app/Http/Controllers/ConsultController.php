<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Consult;
use Illuminate\Http\Request;
use App\Models\RequestConsult;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ConsultController extends Controller
{
    /**
     * Display a listing of consults for the logged in patient.
     *
     * @return \Illuminate\Http\Response
     */
    public function consults()
    {
        return Inertia::render('Patients/Consults',[
            'consults' => Consult::where('patient_id', Auth::id())
            ->join('users', 'users.id', '=', 'doctor_id', 'consults')
            ->get(['consults.id','doctor_id','diagnosis', 'name', 'consults.created_at']),           
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postConsult(Request $request)
    {        
        $this->validate($request, [
            'doctor_id' => 'required',
            'patient_id' => 'required',
            'request_id' => 'required',
            'diagnosis' => 'required',
            'prescription' => 'required',
            'checkup' => 'required',
        ]);

        Consult::create([ 
            'doctor_id' => $request->doctor_id,
            'patient_id' => $request->patient_id,
            'request_id' => $request->request_id,
            'diagnosis' => $request->diagnosis,
            'prescription' => $request->prescription,
            'checkup' => $request->checkup,             
        ]);

        //marks request as 'fulfilled' on the doctor's end
        RequestConsult::where('id', $request->request_id)->update(['request_fulfilled' => 1]);

        return Redirect::route('doctors.home');
    }

    /**
     * Display the consultation from the doctor.
     *
     * @param  \App\Models\Consult  $consult
     * @return \Illuminate\Http\Response
     */
    public function consult(Consult $consult, User $user, RequestConsult $requestConsult)
    {   
        //get the name of the doctor        
        $doctorName = User::where('id', $consult->doctor_id)->pluck('name');
        //get the date of when the patient sent the request
        $requestDate = RequestConsult::where('id', $consult->id)->pluck('created_at');
        
        return Inertia::render('Patients/Consult',[
            'consult' => [
                'name' => $doctorName,
                'requested_at' => $requestDate,
                'doctor_id' => $consult->doctor_id,
                'diagnosis' => $consult->diagnosis,
                'prescription' => $consult->prescription,
                'checkup' => $consult->checkup,
            ],
            
            ]);
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