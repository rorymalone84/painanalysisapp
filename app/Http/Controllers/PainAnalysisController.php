<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\PainAnalysis;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;

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
        $pastWeek = Carbon::now()->subDays(7);
        $pastMonth = Carbon::now()->subDays(30);
        $pastQuarter = Carbon::now()->subDays(90);
        
        return Inertia::render('Patients/Journal', [
            //Journal - weekly tab records and chart data
            'pastWeekAnalyses' => PainAnalysis::where('user_id', Auth::id())
            ->where('created_at', '>=', $pastWeek)->get(['id', 'created_at']),
            'weeklyMeds' => PainAnalysis::where('user_id', Auth::id())->where('created_at', '>=', $pastWeek)
            ->pluck('question_10', 'created_at'),    
            'weeklyPainIntensity' => PainAnalysis::where('user_id', Auth::id())->where('created_at', '>=', $pastWeek)
            ->pluck('question_5', 'created_at'), 
            'weeklyPainRelief' => PainAnalysis::where('user_id', Auth::id())->where('created_at', '>=', $pastWeek)
            ->pluck('question_11', 'created_at'),
            // Monthly...
             'pastMonthAnalyses' => PainAnalysis::where('user_id', Auth::id())
             ->where('created_at', '>=', $pastMonth)->get(['id', 'created_at']),
             'monthlyMeds' => PainAnalysis::where('user_id', Auth::id())->where('created_at', '>=', $pastMonth)
             ->pluck('question_10', 'created_at'),    
             'monthlyPainIntensity' => PainAnalysis::where('user_id', Auth::id())->where('created_at', '>=', $pastMonth)
             ->pluck('question_5', 'created_at'), 
             'monthlyPainRelief' => PainAnalysis::where('user_id', Auth::id())->where('created_at', '>=', $pastMonth)
             ->pluck('question_11', 'created_at'),
             //Quarterly
             'quarterlyAnalyses' => PainAnalysis::where('user_id', Auth::id())
             ->where('created_at', '>=', $pastQuarter)->get(['id', 'created_at']),
             'quarterlyMeds' => PainAnalysis::where('user_id', Auth::id())->where('created_at', '>=', $pastQuarter)
             ->pluck('question_10', 'created_at'),    
             'quarterlyPainIntensity' => PainAnalysis::where('user_id', Auth::id())->where('created_at', '>=', $pastQuarter)
             ->pluck('question_5', 'created_at'), 
             'quarterlyPainRelief' => PainAnalysis::where('user_id', Auth::id())->where('created_at', '>=', $pastQuarter)
             ->pluck('question_11', 'created_at'),
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