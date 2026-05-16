@extends('layouts.admin')

@section('title', 'Mark Attendance')

@section('content')

<div class="card shadow border-0">

    <div class="card-header bg-white">

        <h4 class="mb-0">
            Mark Attendance
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

        <form action="{{ route('attendances.store') }}"
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

            <!-- Attendance Date -->
            <div class="form-group">

                <label>Attendance Date</label>

                <input type="date"
                       name="attendance_date"
                       class="form-control">

            </div>

            <!-- Status -->
            <div class="form-group">

                <label>Status</label>

                <select name="status"
                        class="form-control">

                    <option value="">
                        Select Status
                    </option>

                    <option value="Present">
                        Present
                    </option>

                    <option value="Absent">
                        Absent
                    </option>

                    <option value="Leave">
                        Leave
                    </option>

                </select>

            </div>

            <button type="submit"
                    class="btn btn-success">

                Save Attendance

            </button>

        </form>

    </div>

</div>

@endsection