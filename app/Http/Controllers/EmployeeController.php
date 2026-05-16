<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Attendance;
use Illuminate\Support\Facades\Auth;
use App\Models\SalaryStructure;
use Barryvdh\DomPDF\Facade\Pdf;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index1()
    {
        $employees = User::where('role', 'employee')->get();

         return view('employees.index', compact('employees'));
    }

    public function index()
    {
        $employees = User::withTrashed()
                        ->where('role', 'employee')
                        ->get();

        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required',

            'email' => 'required|email|unique:users',

            'phone' => 'required',

            'department' => 'required',

            'designation' => 'required',

            'salary' => 'required',

            'joining_date' => 'required',

            'password' => 'required|min:3',

        ]);

        User::create([

            'name' => $request->name,

            'email' => $request->email,

            'phone' => $request->phone,

            'department' => $request->department,

            'designation' => $request->designation,

            'salary' => $request->salary,

            'joining_date' => $request->joining_date,

            'role' => 'employee',

            'password' => Hash::make($request->password),

        ]);

        return redirect('/employees')
                ->with('success', 'Employee Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = User::findOrFail($id);

        return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([

            'name' => 'required',

            'email' => 'required|email|unique:users,email,' . $id,

            'phone' => 'required',

            'department' => 'required',

            'designation' => 'required',

            'salary' => 'required',

            'joining_date' => 'required',

        ]);

        $employee = User::findOrFail($id);

        $employee->update([

            'name' => $request->name,

            'email' => $request->email,

            'phone' => $request->phone,

            'department' => $request->department,

            'designation' => $request->designation,

            'salary' => $request->salary,

            'joining_date' => $request->joining_date,

        ]);

        return redirect('/employees')
                ->with('success', 'Employee Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = User::findOrFail($id);

        $employee->delete();

        return redirect('/employees')
                ->with('success', 'Employee Deleted Successfully');
    }

    public function restore($id)
    {
        User::withTrashed()
            ->findOrFail($id)
            ->restore();

        return redirect('/employees')
                ->with('success', 'Employee Restored Successfully');
    }

    public function myAttendance()
    {
        $attendances = Attendance::where(
                            'user_id',
                            Auth::id()
                        )
                        ->latest()
                        ->get();

        return view(
            'employee.attendance',
            compact('attendances')
        );
    }

    public function myPayslips()
    {
        $salary = SalaryStructure::where(
                        'user_id',
                        Auth::id()
                    )->first();

        if (!$salary) {

            return back()->with(
                'error',
                'Salary structure not found'
            );
        }

        // Get Attendance
        $attendances = Attendance::where(
                                'user_id',
                                Auth::id()
                            )->get();

        // Group By Month
        $groupedAttendances =
            $attendances->groupBy(function ($attendance) {

                return date(
                    'F Y',
                    strtotime($attendance->attendance_date)
                );
            });

        $payslips = [];

        foreach ($groupedAttendances as $month => $records) {

            // Count Absent
            $absentDays =
                $records->where('status', 'Absent')->count();

            // Count Leave
            $leaveDays =
                $records->where('status', 'Leave')->count();

            // Salary Calculation
            $totalSalary =
                $salary->basic_salary +
                $salary->hra +
                $salary->allowance -
                $salary->deduction;

            $perDaySalary = $totalSalary / 30;

            $absentDeduction =
                $perDaySalary * $absentDays;

            $finalSalary =
                $totalSalary - $absentDeduction;

            $payslips[] = [

                'month' => $month,

                'absent_days' => $absentDays,

                'leave_days' => $leaveDays,

                'salary' => round($finalSalary),

            ];
        }

        return view(
            'employee.payslips',
            compact('payslips')
        );
    }

    public function downloadPayslipPdf()
    {
        $salary = SalaryStructure::where(
                        'user_id',
                        Auth::id()
                    )->first();

        $attendances = Attendance::where(
                                'user_id',
                                Auth::id()
                            )->get();

        $absentDays =
            $attendances->where(
                'status',
                'Absent'
            )->count();

        $leaveDays =
            $attendances->where(
                'status',
                'Leave'
            )->count();

        $totalSalary =
            $salary->basic_salary +
            $salary->hra +
            $salary->allowance -
            $salary->deduction;

        $perDaySalary = $totalSalary / 30;

        $absentDeduction =
            $perDaySalary * $absentDays;

        $finalSalary =
            $totalSalary - $absentDeduction;

        $pdf = Pdf::loadView(
            'employee.payslip-pdf',
            compact(
                'salary',
                'absentDays',
                'leaveDays',
                'finalSalary'
            )
        );

        return $pdf->download('employee-payslip.pdf');
    }

    public function viewPayslip()
    {
        $salary = SalaryStructure::where(
                        'user_id',
                        Auth::id()
                    )->first();

        $attendances = Attendance::where(
                                'user_id',
                                Auth::id()
                            )->get();

        $absentDays =
            $attendances->where(
                'status',
                'Absent'
            )->count();

        $leaveDays =
            $attendances->where(
                'status',
                'Leave'
            )->count();

        $totalSalary =
            $salary->basic_salary +
            $salary->hra +
            $salary->allowance -
            $salary->deduction;

        $perDaySalary = $totalSalary / 30;

        $absentDeduction =
            $perDaySalary * $absentDays;

        $finalSalary =
            $totalSalary - $absentDeduction;

        return view(
            'employee.view-payslip',
            compact(
                'salary',
                'absentDays',
                'leaveDays',
                'finalSalary'
            )
        );
    }

}
