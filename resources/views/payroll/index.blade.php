@extends('layouts.admin')

@section('title', 'Payroll Calculation')

@section('content')

<div class="mb-4">

    <h2 class="font-weight-bold mb-0">
        Payroll Calculation
    </h2>

    <small class="text-muted">
        Automatic salary calculation using attendance
    </small>

</div>

<div class="row">

    <!-- Payroll Table -->
    <div class="col-lg-10">

        <div class="card shadow border-0">

            <div class="card-body p-0">

                <table class="table table-hover mb-0">

                    <thead class="bg-dark text-white">

                        <tr>

                            <th>ID</th>

                            <th>Employee</th>

                            <th>Total Salary</th>

                            <th>Absent Days</th>

                            <th>Final Salary</th>

                            <th>Tax Rule</th>

                            <th>Tax Amount</th>

                            <th>Net Salary</th>

                            <th>Action</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($payrolls as $index => $payroll)

                            <tr>

                                <td>{{ $index + 1 }}</td>

                                <td>{{ $payroll['employee'] }}</td>

                                <td>

                                    ₹ {{ $payroll['total_salary'] }}

                                </td>

                                <td>

                                    {{ $payroll['absent_days'] }}

                                </td>

                                <td>

                                    <strong class="text-success">

                                        ₹ {{ $payroll['final_salary'] }}

                                    </strong>

                                </td>

                                <td>

                                    {{ $payroll['tax_percentage'] }} %

                                </td>

                                <td>

                                    ₹ {{ $payroll['tax'] }}

                                </td>

                                <td>

                                    <strong class="text-primary">

                                        ₹ {{ $payroll['net_salary'] }}

                                    </strong>

                                </td>

                                <td>

                                    <a href="{{ route('payslip', $payroll['id']) }}"
                                       class="btn btn-primary btn-sm">

                                        View Payslip

                                    </a>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="9"
                                    class="text-center py-4 text-muted">

                                    No Payroll Data Found

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

    <!-- Tax Rules -->
    <div class="col-lg-2">

        <div class="card shadow border-0">

            <div class="card-header bg-info text-white">

                <h5 class="mb-0">
                    Tax Rules
                </h5>

            </div>

            <div class="card-body p-0">

                <table class="table table-bordered mb-0">

                    <thead class="bg-light">

                        <tr>

                            <th>Salary</th>

                            <th>Tax</th>

                        </tr>

                    </thead>

                    <tbody>

                        <tr>

                            <td>
                                Below 50k
                            </td>

                            <td>
                                0%
                            </td>

                        </tr>

                        <tr>

                            <td>
                                50k - 1L
                            </td>

                            <td>
                                10%
                            </td>

                        </tr>

                        <tr>

                            <td>
                                Above 1L
                            </td>

                            <td>
                                20%
                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection