@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('content')

<div class="row">

    <!-- Total Employees -->
    <div class="col-md-4 mb-4">

        <div class="card shadow border-0">

            <div class="card-body text-center">

                <h5 class="text-muted">
                    Total Employees
                </h5>

                <h2 class="font-weight-bold text-primary">

                    {{ \App\Models\User::where('role', 'employee')->count() }}

                </h2>

            </div>

        </div>

    </div>

    <!-- Active Employees -->
    <div class="col-md-4 mb-4">

        <div class="card shadow border-0">

            <div class="card-body text-center">

                <h5 class="text-muted">
                    Active Employees
                </h5>

                <h2 class="font-weight-bold text-success">

                    {{ \App\Models\User::where('role', 'employee')->whereNull('deleted_at')->count() }}

                </h2>

            </div>

        </div>

    </div>

    <!-- Deleted Employees -->
    <div class="col-md-4 mb-4">

        <div class="card shadow border-0">

            <div class="card-body text-center">

                <h5 class="text-muted">
                    Deleted Employees
                </h5>

                <h2 class="font-weight-bold text-danger">

                    {{ \App\Models\User::onlyTrashed()->where('role', 'employee')->count() }}

                </h2>

            </div>

        </div>

    </div>

</div>

<!-- Quick Actions -->
<div class="card shadow border-0">

    <div class="card-header bg-white">

        <h4 class="mb-0">
            Quick Actions
        </h4>

    </div>

    <div class="card-body">

        <a href="{{ route('employees.index') }}"
           class="btn btn-primary mr-2">

            Employee List

        </a>

        <a href="{{ route('employees.create') }}"
           class="btn btn-success">

            Add Employee

        </a>

    </div>

</div>

@endsection