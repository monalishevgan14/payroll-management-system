@extends('layouts.admin')

@section('title', 'Edit Salary Structure')

@section('content')

<div class="card shadow border-0">

    <div class="card-header bg-white">

        <h4>Edit Salary Structure</h4>

    </div>

    <div class="card-body">

        <form action="{{ route('salary-structures.update', $salary->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <!-- Employee -->
            <div class="form-group">

                <label>Employee</label>

                <select name="user_id"
                        class="form-control">

                    @foreach($employees as $employee)

                        <option value="{{ $employee->id }}"
                            {{ $salary->user_id == $employee->id ? 'selected' : '' }}>

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
                       class="form-control"
                       value="{{ $salary->basic_salary }}">

            </div>

            <!-- HRA -->
            <div class="form-group">

                <label>HRA</label>

                <input type="number"
                       name="hra"
                       class="form-control"
                       value="{{ $salary->hra }}">

            </div>

            <!-- Allowance -->
            <div class="form-group">

                <label>Allowance</label>

                <input type="number"
                       name="allowance"
                       class="form-control"
                       value="{{ $salary->allowance }}">

            </div>

            <!-- Deduction -->
            <div class="form-group">

                <label>Deduction</label>

                <input type="number"
                       name="deduction"
                       class="form-control"
                       value="{{ $salary->deduction }}">

            </div>

            <button type="submit"
                    class="btn btn-primary">

                Update Salary Structure

            </button>

        </form>

    </div>

</div>

@endsection