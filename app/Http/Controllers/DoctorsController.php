<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class DoctorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Inertia::render('Doctors/Dashboard');
    }

    public function consultMenu()
    {
        return Inertia::render('Doctors/ConsultMenu');
    }

}