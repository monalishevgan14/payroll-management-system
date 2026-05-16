@extends('layouts.admin')

@section('title', 'Attendance List')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="font-weight-bold mb-0">
            Attendance List
        </h2>

        <small class="text-muted">
            Manage employee attendance
        </small>

    </div>

    <a href="{{ route('attendances.create') }}"
       class="btn btn-success">

        + Mark Attendance

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

                    <th>Employee</th>

                    <th>Date</th>

                    <th>Status</th>

                </tr>

            </thead>

            <tbody>

                @forelse($attendances as $attendance)

                    <tr>

                        <td>{{ $attendance->id }}</td>

                        <td>{{ $attendance->user->name }}</td>

                        <td>{{ $attendance->attendance_date }}</td>

                        <td>

                            @if($attendance->status == 'Present')

                                <span class="badge badge-success">

                                    Present

                                </span>

                            @elseif($attendance->status == 'Absent')

                                <span class="badge badge-danger">

                                    Absent

                                </span>

                            @else

                                <span class="badge badge-warning">

                                    Leave

                                </span>

                            @endif

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="4"
                            class="text-center py-4 text-muted">

                            No Attendance Found

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection