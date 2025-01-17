<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::all();
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:clients',
            'phone_number' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'unique_number' => 'required|string|max:255|unique:clients',
            'city' => 'nullable|string|max:255',
            'service_price' => 'nullable|numeric',
            'equipment_price' => 'nullable|numeric',
            'payment_method' => 'nullable|in:cash,bank',
            'plan' => 'nullable|string|max:255',
        ]);

        Client::create($request->all());

        return redirect()->route('clients.index')->with('success', 'Client created successfully.');
    }

    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:clients,email,' . $client->id,
            'phone_number' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'unique_number' => 'required|string|max:255|unique:clients,unique_number,' . $client->id,
            'trade_name' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'service_price' => 'nullable|numeric',
            'equipment_price' => 'nullable|numeric',
            'payment_method' => 'nullable|in:cash,bank',
            'plan' => 'nullable|string|max:255',
        ]);

        $client->update($request->all());

        return redirect()->route('clients.index')->with('success', 'Client updated successfully.');
    }

    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('clients.index')->with('success', 'Client deleted successfully.');
    }
}