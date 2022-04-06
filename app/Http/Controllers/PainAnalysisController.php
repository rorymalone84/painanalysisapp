<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\PainAnalysis;
use Illuminate\Http\Request;
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
           'question1_values' => [
               'sore' => "sore",
               'cold' => "cold",
           ],
           'question2_values' => [
            'face' => "face",
            'back' => "back",
           ],
           'question7_values' => [
            'fentanol' => "fentanol",
            'morphine' => "morphine",           
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
        'question_10' => 'required',
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
        'user_id' => $user_id               
       ]);

    return Redirect::route('patients.home');
   }

}