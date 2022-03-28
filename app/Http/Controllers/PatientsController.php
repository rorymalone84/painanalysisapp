<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Patients/Dashboard');      
    }

   public function painAnalysisForm()
   {
       return Inertia::render('Patients/PainAnalysisForm');
   }

    
}