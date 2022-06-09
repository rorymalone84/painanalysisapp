<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consult extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'doctor_id',
        'request_id',
        'diagnosis',
        'prescription',  
        'checkup'
    ];

    public function consultRequests() {
        return $this->belongsTo('App\Models\RequestConsult');
    }
}