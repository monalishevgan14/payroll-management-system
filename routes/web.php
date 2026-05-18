<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\SalaryStructureController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\PayrollController;

use Illuminate\Support\Facades\Artisan;


/*
|--------------------------------------------------------------------------
| Temporary Migration Route
|--------------------------------------------------------------------------
*/

Route::get('/migrate', function () {

    Artisan::call('migrate', [
        '--force' => true
    ]);

    Artisan::call('db:seed', [
        '--force' => true
    ]);

    return 'Migration and Seeder completed successfully';

});


Route::get('/', function () {
    if (auth()->check()) {

        if (auth()->user()->role == 'admin') {

            return redirect('/admin/dashboard');

        } else {

            return redirect('/employee/dashboard');

        }

    }

    return redirect('/login');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'admin'])->group(function () {

    Route::get('/admin/dashboard', function () {

        return view('admin.dashboard');

    })->name('admin.dashboard');

    //employee resource routes
    Route::resource('employees', EmployeeController::class);

    Route::get('/employees/restore/{id}',[EmployeeController::class, 'restore'])->name('employees.restore');

    Route::resource('attendances', AttendanceController::class);

    Route::get('/salary-calculation',[PayrollController::class, 'index'])->name('salary.calculation');

    Route::get('/payslip/{id}',[PayrollController::class, 'payslip'])->name('payslip');

    Route::get('/payslip/pdf/{id}',[PayrollController::class, 'downloadPdf'])->name('payslip.pdf');

});

Route::middleware(['auth', 'employee'])->group(function () {

    Route::get('/employee/dashboard', function () {

        return view('employee.dashboard');

    })->name('employee.dashboard');

    Route::get('/my-attendance', [EmployeeController::class, 'myAttendance'])->name('employee.attendance');

    Route::get('/my-payslips',[EmployeeController::class, 'myPayslips'])->name('employee.payslips');

    Route::get('/employee-payslip-pdf',[EmployeeController::class, 'downloadPayslipPdf'])->name('employee.payslip.pdf');

    Route::get('/view-payslip',[EmployeeController::class, 'viewPayslip'])->name('employee.view.payslip');


});


//salary structure resource routes
Route::resource('salary-structures', SalaryStructureController::class);




require __DIR__.'/auth.php';
