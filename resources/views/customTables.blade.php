@extends('layouts.layout')

@section('title', 'Custom Table Management')

@section('content')
<div class="container mt-5">
    <h2>Add New Entry</h2>
    <form action="{{ route('customTables.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <label for="column1" class="form-label">Column 1</label>
                <input type="text" class="form-control" id="column1" name="column1" required>
            </div>
            <div class="col">
                <label for="column2" class="form-label">Column 2</label>
                <input type="text" class="form-control" id="column2" name="column2" required>
            </div>
            <div class="col">
                <label for="column3" class="form-label">Column 3</label>
                <input type="text" class="form-control" id="column3" name="column3" required>
            </div>
            <div class="col">
                <label for="column4" class="form-label">Column 4</label>
                <input type="text" class="form-control" id="column4" name="column4" required>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Add Entry</button>
    </form>

    <h2 class="mt-5">Entries List</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Column 1</th>
                <th>Column 2</th>
                <th>Column 3</th>
                <th>Column 4</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customTables as $customTable)
            <tr>
                <td>{{ $customTable->id }}</td>
                <td>{{ $customTable->column1 }}</td>
                <td>{{ $customTable->column2 }}</td>
                <td>{{ $customTable->column3 }}</td>
                <td>{{ $customTable->column4 }}</td>
                <td>
                    <form action="{{ route('customTables.destroy', $customTable->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection