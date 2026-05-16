@extends('layouts.admin')

@section('title', 'Salary Structures')

@section('content')

<!-- Page Header -->
<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="font-weight-bold mb-0">
            Salary Structure List
        </h2>

        <small class="text-muted">
            Manage employee salary structures
        </small>

    </div>

    <a href="{{ route('salary-structures.create') }}"
       class="btn btn-success">

        + Add Salary Structure

    </a>

</div>

<!-- Success Message -->
@if(session('success'))

    <div class="alert alert-success alert-dismissible fade show">

        {{ session('success') }}

        <button type="button"
                class="close"
                data-dismiss="alert">

            <span>&times;</span>

        </button>

    </div>

@endif

<!-- Salary Table -->
<div class="card shadow border-0">

    <div class="card-body p-0">

        <table class="table table-hover mb-0">

            <thead class="bg-dark text-white">

                <tr>

                    <th>ID</th>

                    <th>Employee</th>

                    <th>Basic Salary</th>

                    <th>HRA</th>

                    <th>Allowance</th>

                    <th>Deduction</th>

                    <th>Total Salary</th>

                    <th width="180">Action</th>

                </tr>

            </thead>

            <tbody>

                @forelse($salaryStructures as $salary)

                    <tr>

                        <td>{{ $salary->id }}</td>

                        <td>

                            {{ $salary->user->name }}

                        </td>

                        <td>

                            ₹ {{ $salary->basic_salary }}

                        </td>

                        <td>

                            ₹ {{ $salary->hra }}

                        </td>

                        <td>

                            ₹ {{ $salary->allowance }}

                        </td>

                        <td>

                            ₹ {{ $salary->deduction }}

                        </td>

                        <td>

                            ₹ {{
                                ($salary->basic_salary +
                                $salary->hra +
                                $salary->allowance)
                                -
                                $salary->deduction
                            }}

                        </td>

                        <td>

                            <!-- Edit -->
                            <a href="{{ route('salary-structures.edit', $salary->id) }}"
                            class="btn btn-warning btn-sm">

                                Edit

                            </a>

                            <!-- Delete -->
                            <form action="{{ route('salary-structures.destroy', $salary->id) }}"
                                method="POST"
                                class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure?')">

                                    Delete

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="8"
                            class="text-center text-muted py-4">

                            No Salary Structures Found

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection