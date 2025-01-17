@extends('layouts.layout')

@section('title', 'Application Management')

@section('content')
<div class="container mt-5">
    <h2>Add New Application</h2>
    <form action="{{ route('applications.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <label for="name" class="form-label">Application Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="col">
                <label for="nipt" class="form-label">NIPT</label>
                <input type="text" class="form-control" id="nipt" name="nipt" required>
            </div>
            <div class="col">
                <label for="phone_number" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="phone_number" name="phone_number" required>
            </div>
            <div class="col">
                <label for="payment_type" class="form-label">Payment Type</label>
                <select class="form-control" id="payment_type" name="payment_type" required>
                    <option value="prepaid">Prepaid</option>
                    <option value="postpaid">Postpaid</option>
                </select>
            </div>
            <div class="col">
                <label for="dropdown_id" class="form-label">Select ID</label>
                <select class="form-control" id="dropdown_id" name="dropdown_id" required>
                    <option value="">Select ID</option>
                    @foreach($customTables as $customTable)
                        <option value="{{ $customTable->id }}">{{ $customTable->id }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <label for="dropdown_column" class="form-label">Select Column</label>
                <select class="form-control" id="dropdown_column" name="dropdown_column" required>
                    <option value="">Select Column</option>
                    <option value="column1">Column 1</option>
                    <option value="column2">Column 2</option>
                    <option value="column3">Column 3</option>
                    <option value="column4">Column 4</option>
                </select>
            </div>
            <div class="col">
                <label for="column_value" class="form-label">Column Value</label>
                <input type="text" class="form-control" id="column_value" name="column_value" readonly>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Add Application</button>
    </form>

    <h2 class="mt-5">Applications List</h2>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>NIPT</th>
                <th>Phone Number</th>
                <th>Payment Type</th>
                <th>Selected Value</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($applications as $application)
            <tr>
                <td>{{ $application->id }}</td>
                <td>{{ $application->name }}</td>
                <td>{{ $application->nipt }}</td>
                <td>{{ $application->phone_number }}</td>
                <td>{{ $application->payment_type }}</td>
                <td>{{ $application->dropdown }}</td>
                <td>
                    <form action="{{ route('applications.destroy', $application->id) }}" method="POST">
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

<script>
document.getElementById('dropdown_id').addEventListener('change', function() {
    const id = this.value;
    if (id) {
        fetch(`/custom-table-data/${id}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('dropdown_column').addEventListener('change', function() {
                    const column = this.value;
                    if (column) {
                        document.getElementById('column_value').value = data[column];
                    } else {
                        document.getElementById('column_value').value = '';
                    }
                });
            });
    } else {
        document.getElementById('column_value').value = '';
    }
});
</script>
@endsection