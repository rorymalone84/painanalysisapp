<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PainAnalysis extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_1',
        'question_2',
        'question_3',
        'question_4',
        'question_5',
        'question_6',
        'question_7',
        'question_8',
        'question_9',
        'question_10',
        'question_11',
        'question_12',        
        'user_id'        
    ];

    protected $casts = [
        'question_1' => 'array',
        'question_2' => 'array',
        'question_3' => 'array',
        'question_4' => 'array',
        'question_9' => 'array',
    ];

    public function users() {
        return $this->belongsTo('App\User');
    }
}