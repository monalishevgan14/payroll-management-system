@extends('layouts.admin')

@section('title', 'Add Salary Structure')

@section('content')

<div class="card shadow border-0">

    <div class="card-header bg-white">

        <h4 class="mb-0">
            Add Salary Structure
        </h4>

    </div>

    <div class="card-body">

        @if ($errors->any())

            <div class="alert alert-danger">

                <ul class="mb-0">

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <form action="{{ route('salary-structures.store') }}"
              method="POST">

            @csrf

            <!-- Employee -->
            <div class="form-group">

                <label>Select Employee</label>

                <select name="user_id"
                        class="form-control">

                    <option value="">
                        Select Employee
                    </option>

                    @foreach($employees as $employee)

                        <option value="{{ $employee->id }}">

                            {{ $employee->name }}

                        </option>

                    @endforeach

                </select>

            </div>

            <!-- Basic Salary -->
            <div class="form-group">

                <label>Basic Salary</label>

                <input type="number"
                       name="basic_salary"
                       class="form-control">

            </div>

            <!-- HRA -->
            <div class="form-group">

                <label>HRA</label>

                <input type="number"
                       name="hra"
                       class="form-control">

            </div>

            <!-- Allowance -->
            <div class="form-group">

                <label>Allowance</label>

                <input type="number"
                       name="allowance"
                       class="form-control">

            </div>

            <!-- Deduction -->
            <div class="form-group">

                <label>Deduction</label>

                <input type="number"
                       name="deduction"
                       class="form-control">

            </div>

            <button type="submit"
                    class="btn btn-success">

                Save Salary Structure

            </button>

        </form>

    </div>

</div>

@endsection