<?php

namespace App\Http\Controllers;

use App\Models\Consult;
use Illuminate\Http\Request;
use App\Models\RequestConsult;
use Illuminate\Support\Facades\Redirect;

class ConsultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function consults()
    {
        //
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

        return Redirect::route('doctors.home');
    }

    /**
     * Display the consultation from the doctor.
     *
     * @param  \App\Models\Consult  $consult
     * @return \Illuminate\Http\Response
     */
    public function showConsult(Consult $consult)
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