@extends('layouts.employee')

@section('title', 'My Attendance')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="font-weight-bold mb-0">
            My Attendance
        </h2>

        <small class="text-muted">
            View your attendance records
        </small>

    </div>

</div>

<div class="card shadow border-0">

    <div class="card-body p-0">

        <table class="table table-hover mb-0">

            <thead class="bg-dark text-white">

                <tr>

                    <th>ID</th>

                    <th>Date</th>

                    <th>Status</th>

                </tr>

            </thead>

            <tbody>

                @forelse($attendances as $index => $attendance)

                    <tr>

                        <td>{{ $index + 1 }}</td>

                        <td>

                            {{ $attendance->attendance_date }}

                        </td>

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

                        <td colspan="3"
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