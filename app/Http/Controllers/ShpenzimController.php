<?php

namespace App\Http\Controllers;

use App\Models\Shpenzim;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShpenzimController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0',
            'description' => 'required|string|max:255',
        ]);

        Shpenzim::create([
            'amount' => $request->amount,
            'description' => $request->description,
            'user_id' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Shpenzim added successfully.');
    }
}
