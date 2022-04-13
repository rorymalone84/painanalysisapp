<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\PainAnalysis;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PainAnalysisController extends Controller
{
    public function form()
   {
       return Inertia::render('PainAnalysis/Form',[
           'user' => [
                'user_id' => Auth::id(),
           ],
           //checkbox input values and label names for v-for loop
           'question1_values' => [
               'Aching' => "Sore",
               'Throbbing' => "Throbbing",
               'Sharp' => "Sharp",
               'Stabbing' => "Stabbing",
               'Shooting' => "Shooting",
               'Gnawing' => "Gnawing",
               'Tender' => "Tender",
               'Burning' => "Burning",
               'Tiring' => "Tiring",
               'Penetrating' => "Penetrating",
               'Nagging' => "Nagging",
               'Numb' => "Numb",
               'Unbearable' => "Unbearable",
               'Constant' => "Constant",
               'Intermittent' => "Intermittenet"
           ],
           'question2_values' => [
                'face' => "face",
                'back' => "back",
           ],
           'question3_values' => [
                'Morning' => "Morning",
                'Afternoon' => "Afternoon",
                'Evening' => "Evening",
                'Night' => "Night",
                'It varies' => 'It varies',
                   'Nothing today' => "Nothing today"
            ],
            'question4_values' => [
                'Occasional' => "Occasional",
                'Frequent' => "Frequent",
                'Often' => "Often",
                'Constant' => "Constant",
                'It varies' => "It varies",
                'Nothing today' => "Nothing today"
            ],
           'question9_values' => [
                'None' => 'None',
                'Fentanyl' => "Fentanyl",
                'Morphine' => "Morphine",
                'Hyrdocone' => "Hydrocone",            
                'Codeine' => "Codeine",
                'Paracetomol' => "Paracetomol",            
                'Oxymorphone' => "Oxymorphone",
            ]
       ]);
   }

   public function store(Request $request)
   {
       
    $user_id = Auth::id();
    
    $this->validate($request, [
        'question_1' => 'required',
        'question_2' => 'required',
        'question_3' => 'required',
        'question_4' => 'required',
        'question_5' => 'required',
        'question_6' => 'required',
        'question_7' => 'required',
        'question_8' => 'required',
        'question_9' => 'required',
        'question_10'=> 'required',
        'question_11'=>'required',
        'question_12' => 'required'
        ]);

    PainAnalysis::create([ 
        'question_1' => $request->question_1,
        'question_2' => $request->question_2,
        'question_3' => $request->question_3,
        'question_4' => $request->question_4,
        'question_5' => $request->question_5,
        'question_6' => $request->question_6,
        'question_7' => $request->question_7,
        'question_8' => $request->question_8,
        'question_9' => $request->question_9,
        'question_10' => $request->question_10,
        'question_11' => $request->question_11,
        'question_12' => $request->question_12,
        'user_id' => $user_id              
       ]);

        return Redirect::route('patients.home');
   }

   public function journalIndex()
    {          
        return Inertia::render('Patients/Journal', [
            'painAnalyses' => PainAnalysis::where('user_id', Auth::id())->get()
        ]);
    }

    public function showEntry(PainAnalysis $painAnalysis)
    {           
        return Inertia::render('PainAnalysis/ShowEntry', [
            'painAnalysis' => [
                'id' => $painAnalysis->id,
                'question_1' => $painAnalysis->question_1,
                'question_2' => $painAnalysis->question_2,
                'question_9' => $painAnalysis->question_9,
            ]
        ]);
    }

    public function deletePrompt(PainAnalysis $painAnalysis)
    {           
        return Inertia::render('Patients/EditEntry', [
            'painAnalyses' => PainAnalysis::all()
        ]);
    }

}