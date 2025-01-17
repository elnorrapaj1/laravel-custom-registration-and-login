<?php
namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\CustomTable;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index()
    {
        $applications = Application::all();
        $customTables = CustomTable::all();
        return view('application', compact('applications', 'customTables'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nipt' => 'required|string|max:20|unique:applications,nipt',
            'phone_number' => 'required|string|max:15',
            'payment_type' => 'required|in:prepaid,postpaid',
            'dropdown_id' => 'required|exists:custom_tables,id',
            'dropdown_column' => 'required|in:column1,column2,column3,column4',
        ]);

        $customTable = CustomTable::find($request->dropdown_id);
        $dropdownValue = $customTable->{$request->dropdown_column};

        $application = new Application();
        $application->name = $request->name;
        $application->nipt = $request->nipt;
        $application->phone_number = $request->phone_number;
        $application->payment_type = $request->payment_type;
        $application->dropdown = $dropdownValue;

        $application->save();

        return redirect()->route('applications.index')->with('success', 'Application created successfully.');
    }

    public function destroy(Application $application)
    {
        $application->delete();

        return redirect()->route('applications.index');
    }

    public function createCustomTable()
    {
        CustomTable::create(['column1' => 'Value 1', 'column2' => 'Value 2', 'column3' => 'Value 4']);
        return redirect()->route('applications.index')->with('success', 'Custom table created successfully.');
    }

    public function getCustomTableData($id)
    {
        $customTable = CustomTable::find($id);
        return response()->json($customTable);
    }
}