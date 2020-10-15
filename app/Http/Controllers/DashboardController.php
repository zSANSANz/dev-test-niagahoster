<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\paket;

class DashboardController extends Controller
{
    public function index()
    {
        $data = paket::all();
        return view('dashboard', compact('data'));
    
    }
    
}
