@extends('layouts.admin')

@section('title', 'Employee List')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="font-weight-bold mb-0">
            Employee List
        </h2>

        <small class="text-muted">
            Manage all employees here
        </small>

    </div>

    <a href="{{ route('employees.create') }}"
       class="btn btn-success">

        + Add Employee

    </a>

</div>

@if(session('success'))

    <div class="alert alert-success">

        {{ session('success') }}

    </div>

@endif

<div class="card shadow border-0">

    <div class="card-body p-0">

        <table class="table table-hover mb-0">

            <thead class="bg-dark text-white">

                <tr>

                    <th>ID</th>

                    <th>Name</th>

                    <th>Email</th>

                    <th>Phone</th>

                    <th>Department</th>

                    <th>Designation</th>

                    <th>Salary</th>

                    <th>Status</th>

                    <th>Action</th>

                </tr>

            </thead>

            <tbody>

                @foreach($employees as $employee)

                    <tr>

                        <td>{{ $employee->id }}</td>

                        <td>{{ $employee->name }}</td>

                        <td>{{ $employee->email }}</td>

                        <td>{{ $employee->phone }}</td>

                        <td>{{ $employee->department }}</td>

                        <td>{{ $employee->designation }}</td>

                        <td>₹ {{ $employee->salary }}</td>

                        <td>

                            @if($employee->deleted_at)

                                <span class="badge badge-danger">
                                    Deleted
                                </span>

                            @else

                                <span class="badge badge-success">
                                    Active
                                </span>

                            @endif

                        </td>

                        <td>

                            @if(!$employee->deleted_at)

                                <!-- Edit Button -->
                                <a href="{{ route('employees.edit', $employee->id) }}"
                                class="btn btn-warning btn-sm">

                                    Edit

                                </a>

                                <!-- Delete Button -->
                                <form action="{{ route('employees.destroy', $employee->id) }}"
                                    method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this employee?')">

                                        Delete

                                    </button>

                                </form>

                            @else

                                <!-- Restore Button -->
                                <a href="{{ route('employees.restore', $employee->id) }}"
                                class="btn btn-success btn-sm">

                                    Restore

                                </a>

                            @endif

                        </td>

                    </tr>

                @endforeach

            </tbody>

        </table>

    </div>

</div>

@endsection