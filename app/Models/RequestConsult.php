<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestConsult extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'patient_id',
        'doctor_id',
        'duration',
        'comments',        
    ];

    public function users() {
        return $this->belongsTo('App\Models\User');
    }
}