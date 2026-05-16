@extends('layouts.admin')

@section('title', 'Employee Payslip')

@section('content')

@php

    $grossSalary =
        $salary->basic_salary +
        $salary->hra +
        $salary->allowance -
        $salary->deduction;

    $perDaySalary = $grossSalary / 30;

    $absentDeduction =
        $perDaySalary * $absentDays;

    $taxPercentage = 0;

    if ($finalSalary >= 50000 && $finalSalary < 100000) {

        $taxPercentage = 10;

    }
    elseif ($finalSalary >= 100000) {

        $taxPercentage = 20;

    }

    $taxAmount =
        ($finalSalary * $taxPercentage) / 100;

    $netSalary =
        $finalSalary - $taxAmount;

@endphp

<div class="card shadow border-0">

    <div class="card-body p-5">

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-5">

            <div>

                <h2 class="font-weight-bold mb-1">
                    Payroll System
                </h2>

                <small class="text-muted">
                    Employee Salary Payslip
                </small>

            </div>

            <div class="text-right">

                <h5 class="mb-1">

                    {{ $salary->user->name }}

                </h5>

                <small class="text-muted">

                    Generated On:
                    {{ date('d M Y') }}

                </small>

            </div>

        </div>

        <!-- Summary Cards -->
        <div class="row mb-4">

            <div class="col-md-4">

                <div class="border rounded p-3 text-center">

                    <small class="text-muted d-block">
                        Gross Salary
                    </small>

                    <h4 class="text-primary mb-0">

                        Rs. {{ round($grossSalary) }}

                    </h4>

                </div>

            </div>

            <div class="col-md-4">

                <div class="border rounded p-3 text-center">

                    <small class="text-muted d-block">
                        Tax Deduction
                    </small>

                    <h4 class="text-danger mb-0">

                        Rs. {{ round($taxAmount) }}

                    </h4>

                </div>

            </div>

            <div class="col-md-4">

                <div class="border rounded p-3 text-center bg-success text-white">

                    <small class="d-block">
                        Net Salary
                    </small>

                    <h4 class="mb-0">

                        Rs. {{ round($netSalary) }}

                    </h4>

                </div>

            </div>

        </div>

        <div class="row">

            <!-- Earnings -->
            <div class="col-md-6">

                <div class="card border-success">

                    <div class="card-header bg-success text-white">

                        <h5 class="mb-0">
                            Earnings
                        </h5>

                    </div>

                    <div class="card-body p-0">

                        <table class="table mb-0">

                            <tr>

                                <th width="50%">
                                    Basic Salary
                                </th>

                                <td>

                                    Rs. {{ $salary->basic_salary }}

                                </td>

                            </tr>

                            <tr>

                                <th>
                                    HRA
                                </th>

                                <td>

                                    Rs. {{ $salary->hra }}

                                </td>

                            </tr>

                            <tr>

                                <th>
                                    Allowance
                                </th>

                                <td>

                                    Rs. {{ $salary->allowance }}

                                </td>

                            </tr>

                            <tr class="font-weight-bold">

                                <th>
                                    Gross Salary
                                </th>

                                <td>

                                    Rs. {{ round($grossSalary) }}

                                </td>

                            </tr>

                        </table>

                    </div>

                </div>

            </div>

            <!-- Deductions -->
            <div class="col-md-6">

                <div class="card border-danger">

                    <div class="card-header bg-danger text-white">

                        <h5 class="mb-0">
                            Deductions
                        </h5>

                    </div>

                    <div class="card-body p-0">

                        <table class="table mb-0">

                            <tr>

                                <th width="50%">
                                    Absent Days
                                </th>

                                <td>

                                    {{ $absentDays }}

                                </td>

                            </tr>

                             <tr>

                                <th>
                                    Leave Days
                                </th>

                                <td>

                                    {{ $leaveDays }}

                                </td>

                            </tr>

                            <tr>

                                <th>
                                    Attendance Deduction
                                </th>

                                <td>

                                    Rs. {{ round($absentDeduction) }}

                                </td>

                            </tr>

                            <tr>

                                <th>
                                    Tax ({{ $taxPercentage }}%)
                                </th>

                                <td>

                                    Rs. {{ round($taxAmount) }}

                                </td>

                            </tr>

                            <tr class="font-weight-bold text-success">

                                <th>
                                    Net Salary
                                </th>

                                <td>

                                    Rs. {{ round($netSalary) }}

                                </td>

                            </tr>

                        </table>

                    </div>

                </div>

            </div>

        </div>

        <!-- Download Button -->
        <div class="text-right mt-4">

            <a href="{{ route('payslip.pdf', $salary->id) }}"
               class="btn btn-danger">

                Download PDF

            </a>

        </div>

    </div>

</div>

@endsection