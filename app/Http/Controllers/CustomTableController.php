<?php

namespace App\Http\Controllers;

use App\Models\CustomTable;
use Illuminate\Http\Request;

class CustomTableController extends Controller
{
    public function index()
    {
        $customTables = CustomTable::all();
        return view('customTables', compact('customTables'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'column1' => 'required|string|max:255',
            'column2' => 'required|string|max:255',
            'column3' => 'required|string|max:255',
            'column4' => 'required|string|max:255',
        ]);

        CustomTable::create($request->all());

        return redirect()->route('customTables.index');
    }

    public function destroy(CustomTable $customTable)
    {
        $customTable->delete();

        return redirect()->route('customTables.index');
    }
}
