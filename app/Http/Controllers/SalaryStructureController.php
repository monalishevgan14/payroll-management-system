<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\SalaryStructure;

class SalaryStructureController extends Controller
{
    /**
     * Display salary structure list
     */
    public function index()
    {
        $salaryStructures = SalaryStructure::with('user')->get();

        return view(
            'salary-structures.index',
            compact('salaryStructures')
        );
    }

    /**
     * Show create form
     */
    public function create()
    {
        $employees = User::where('role', 'employee')
                        ->whereNull('deleted_at')
                        ->get();

        return view(
            'salary-structures.create',
            compact('employees')
        );
    }

    /**
     * Store salary structure
     */
    public function store(Request $request)
    {
        $request->validate([

            'user_id' => 'required',

            'basic_salary' => 'required',

        ]);

        SalaryStructure::create([

            'user_id' => $request->user_id,

            'basic_salary' => $request->basic_salary,

            'hra' => $request->hra,

            'allowance' => $request->allowance,

            'deduction' => $request->deduction,

        ]);

        return redirect()
                ->route('salary-structures.index')
                ->with(
                    'success',
                    'Salary Structure Added Successfully'
                );
    }

    /**
     * Show edit form
     */
    public function edit(string $id)
    {
        $salary = SalaryStructure::findOrFail($id);

        $employees = User::where('role', 'employee')
                        ->whereNull('deleted_at')
                        ->get();

        return view(
            'salary-structures.edit',
            compact('salary', 'employees')
        );
    }

    /**
     * Update salary structure
     */
    public function update(Request $request, string $id)
    {
        $salary = SalaryStructure::findOrFail($id);

        $salary->update([

            'user_id' => $request->user_id,

            'basic_salary' => $request->basic_salary,

            'hra' => $request->hra,

            'allowance' => $request->allowance,

            'deduction' => $request->deduction,

        ]);

        return redirect()
                ->route('salary-structures.index')
                ->with(
                    'success',
                    'Salary Structure Updated Successfully'
                );
    }
    /**
     * Delete salary structure
     */
    public function destroy(string $id)
    {
        $salary = SalaryStructure::findOrFail($id);

        $salary->delete();

        return redirect()
                ->route('salary-structures.index')
                ->with(
                    'success',
                    'Salary Structure Deleted Successfully'
                );
    }
}