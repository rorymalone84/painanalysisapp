<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\PainAnalysis;
use Request;
use App\Models\PainAnalysisPost;
use Illuminate\Support\Facades\Auth;

class PatientsController extends Controller
{
    public function index()    
    {   
       $countEntries = PainAnalysis::where('user_id', Auth::id())->get();
       $latestEntry = PainAnalysis::where('user_id', Auth::id())->latest()->first();
        
        return Inertia::render('Patients/Dashboard',[
            'journalCount' => count($countEntries),
            'latestEntry' => $latestEntry,
        ]);      
    }

    public function consultMenu(){
        return Inertia::render('Patients/ConsultMenu');
    }

    //Where the Patient selects a doctor for consultation
    public function doctorIndex()
    {
        return Inertia::render('RequestConsults/Index', [
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