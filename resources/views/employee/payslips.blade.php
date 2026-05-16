@extends('layouts.employee')

@section('title', 'My Payslips')

@section('content')

<div class="mb-4">

    <h2 class="font-weight-bold mb-0">
        My Payslips
    </h2>

    <small class="text-muted">
        Monthly salary slips
    </small>

</div>

<div class="card shadow border-0">

    <div class="card-body p-0">

        <table class="table table-hover mb-0">

            <thead class="bg-dark text-white">

                <tr>

                    <th>ID</th>

                    <th>Month</th>

                    <th>Absent Days</th>

                    <th>Leave Days</th>

                    <th>Net Salary</th>

                    <th>Download</th>

                </tr>

            </thead>

            <tbody>

                @forelse($payslips as $index => $payslip)

                    <tr>

                        <td>{{ $index + 1 }}</td>

                        <td>

                            {{ $payslip['month'] }}

                        </td>

                        <td>

                            {{ $payslip['absent_days'] }}

                        </td>

                        <td>

                            {{ $payslip['leave_days'] }}

                        </td>

                        <td>

                            <strong class="text-success">

                                ₹ {{ $payslip['salary'] }}

                            </strong>

                        </td>

                        <td>
                            <a href="{{ route('employee.view.payslip') }}"
                                class="btn btn-primary btn-sm">

                                View Slip

                            </a>


                            <a href="{{ route('employee.payslip.pdf') }}"
                                class="btn btn-danger btn-sm">

                                    Download PDF

                            </a>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6"
                            class="text-center py-4">

                            No Payslips Found

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection