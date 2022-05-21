<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\PainAnalysis;
use Illuminate\Http\Request;
use App\Models\PainAnalysisPost;
use Illuminate\Support\Facades\Auth;

class PatientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()    
    {   
       $countEntries = PainAnalysis::where('user_id', Auth::id())->get();
       $latestEntry = PainAnalysis::where('user_id', Auth::id())->latest()->first();
        
        return Inertia::render('Patients/Dashboard',[
            'journalCount' => count($countEntries),
            'latestEntry' => $latestEntry,
        ]);      
    }
}