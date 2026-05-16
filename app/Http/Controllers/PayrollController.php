<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalaryStructure;
use App\Models\Attendance;
use Barryvdh\DomPDF\Facade\Pdf;

class PayrollController extends Controller
{
    public function index_old()
    {
        $salaryStructures = SalaryStructure::with('user')->get();

        $payrolls = [];

        foreach ($salaryStructures as $salary) {

            // Total Salary
            $totalSalary =
                $salary->basic_salary +
                $salary->hra +
                $salary->allowance -
                $salary->deduction;

            // Count Absent Days
            $absentDays = Attendance::where(
                                'user_id',
                                $salary->user_id
                            )
                            ->where('status', 'Absent')
                            ->count();

            // Per Day Salary
            $perDaySalary = $totalSalary / 30;

            // Absent Deduction
            $absentDeduction =
                $perDaySalary * $absentDays;

            // Final Salary
            $finalSalary =
                $totalSalary - $absentDeduction;

            $payrolls[] = [

                'id' => $salary->id,

                'employee' => $salary->user->name,

                'total_salary' => $totalSalary,

                'absent_days' => $absentDays,

                'final_salary' => round($finalSalary),

            ];
        }

        return view(
            'payroll.index',
            compact('payrolls')
        );
    }

    public function index()
    {
        $salaryStructures = SalaryStructure::with('user')->get();

        $payrolls = [];

        foreach ($salaryStructures as $salary) {

            // Total Salary
            $totalSalary =
                $salary->basic_salary +
                $salary->hra +
                $salary->allowance -
                $salary->deduction;

            // Count Absent Days
            $absentDays = Attendance::where(
                                'user_id',
                                $salary->user_id
                            )
                            ->where('status', 'Absent')
                            ->count();

            // Per Day Salary
            $perDaySalary = $totalSalary / 30;

            // Absent Deduction
            $absentDeduction =
                $perDaySalary * $absentDays;

            // Final Salary Before Tax
            $finalSalary =
                $totalSalary - $absentDeduction;

            // Tax Calculation
            $taxPercentage = 0;

            if ($finalSalary >= 50000 && $finalSalary < 100000) {

                $taxPercentage = 10;

            }
            elseif ($finalSalary >= 100000) {

                $taxPercentage = 20;

            }

            // Tax Amount
            $tax =
                ($finalSalary * $taxPercentage) / 100;

            // Net Salary After Tax
            $netSalary = $finalSalary - $tax;

            $payrolls[] = [

                'id' => $salary->id,

                'employee' => $salary->user->name,

                'total_salary' => round($totalSalary),

                'absent_days' => $absentDays,

                'final_salary' => round($finalSalary),

                'tax_percentage' => $taxPercentage,

                'tax' => round($tax),

                'net_salary' => round($netSalary),

            ];
        }

        return view(
            'payroll.index',
            compact('payrolls')
        );
    }

    public function payslip($id)
    {
        $salary = SalaryStructure::with('user')
                    ->findOrFail($id);

        $totalSalary =
            $salary->basic_salary +
            $salary->hra +
            $salary->allowance -
            $salary->deduction;

        $absentDays = Attendance::where(
                            'user_id',
                            $salary->user_id
                        )
                        ->where('status', 'Absent')
                        ->count();

        $leaveDays = Attendance::where(
                    'user_id',
                    $salary->user_id
                )
                ->where('status', 'Leave')
                ->count();

        $perDaySalary = $totalSalary / 30;

        $absentDeduction =
            $perDaySalary * $absentDays;

        $finalSalary =
            $totalSalary - $absentDeduction;

        return view(
            'payroll.payslip',
            compact(
                'salary',
                'totalSalary',
                'absentDays',
                'leaveDays',
                'finalSalary'
            )
        );
    }

    public function downloadPdf($id)
    {
        $salary = SalaryStructure::with('user')
                    ->findOrFail($id);

        $totalSalary =
            $salary->basic_salary +
            $salary->hra +
            $salary->allowance -
            $salary->deduction;

        $absentDays = Attendance::where(
                            'user_id',
                            $salary->user_id
                        )
                        ->where('status', 'Absent')
                        ->count();

        $perDaySalary = $totalSalary / 30;

        $absentDeduction =
            $perDaySalary * $absentDays;

        $finalSalary =
            $totalSalary - $absentDeduction;

        $pdf = Pdf::loadView(
            'payroll.payslip-pdf',
            compact(
                'salary',
                'totalSalary',
                'absentDays',
                'finalSalary'
            )
        );

        return $pdf->download('payslip.pdf');
    }
}