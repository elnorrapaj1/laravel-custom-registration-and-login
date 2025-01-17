<?php

namespace App\Http\Controllers;

use App\Models\Arketim;
use App\Models\Shpenzim;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        $totalArketim = Arketim::sum('amount');
        $totalShpenzim = Shpenzim::sum('amount');

        return view('welcome', compact('totalArketim', 'totalShpenzim'));
    }
}
