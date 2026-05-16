# Payroll Management System

A Laravel-based Payroll Management System developed for managing employees, attendance, salary structures, payroll calculations, and payslip generation.

---

## Features

### Employee Management
- Employee CRUD Operations
- Role-based Authentication
- Admin & Employee Dashboard

### Salary Structure
- Basic Salary
- HRA
- Allowance
- Deductions

### Attendance Module
- Mark Attendance
- Present / Absent / Leave Status
- Employee Attendance View

### Payroll Calculation
- Automatic Salary Calculation
- Attendance-based Salary Deduction
- Net Salary Calculation

### Tax Deduction Logic

| Salary Range | Tax |
|---|---|
| Below 50,000 | 0% |
| 50,000 - 1,00,000 | 10% |
| Above 1,00,000 | 20% |

### Payslip Generation
- Employee Payslip View
- Admin Payslip View
- PDF Payslip Download

---

## Technologies Used

- Laravel 12
- PHP 8
- MySQL
- Bootstrap
- DomPDF

---

## Modules

- Authentication Module
- Employee Module
- Salary Structure Module
- Attendance Module
- Payroll Module
- Payslip PDF Module

---

## Project Screenshots

(Add screenshots here)

---

## Installation

```bash
git clone <repository-url>
```

```bash
cd payroll-management-system
```

```bash
composer install
```

```bash
cp .env.example .env
```

```bash
php artisan key:generate
```

```bash
php artisan migrate
```

```bash
php artisan serve
```

---

## Author

Monali Shevgan
