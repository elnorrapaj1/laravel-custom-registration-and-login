<?php

namespace App\Http\Controllers;

use App\Models\Arketim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArketimController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0',
            'client_name' => 'required|string|max:255',
        ]);

        Arketim::create([
            'amount' => $request->amount,
            'client_name' => $request->client_name,
            'user_id' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Arketim added successfully.');
    }
}