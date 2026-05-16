<!DOCTYPE html>
<html>

<head>

    <title>Payslip</title>

    <style>

        body {

            font-family: Arial, sans-serif;

        }

        table {

            width: 100%;

            border-collapse: collapse;

            margin-top: 20px;

        }

        table, th, td {

            border: 1px solid black;

        }

        th, td {

            padding: 10px;

            text-align: left;

        }

    </style>

</head>

<body>

    <h2>Employee Payslip</h2>

    <table>

        <tr>

            <th>Employee Name</th>

            <td>{{ $salary->user->name }}</td>

        </tr>

        <tr>

            <th>Basic Salary</th>

            <td>₹ {{ $salary->basic_salary }}</td>

        </tr>

        <tr>

            <th>HRA</th>

            <td>₹ {{ $salary->hra }}</td>

        </tr>

        <tr>

            <th>Allowance</th>

            <td>₹ {{ $salary->allowance }}</td>

        </tr>

        <tr>

            <th>Deduction</th>

            <td>₹ {{ $salary->deduction }}</td>

        </tr>

        <tr>

            <th>Absent Days</th>

            <td>{{ $absentDays }}</td>

        </tr>

        <tr>

            <th>Final Salary</th>

            <td>

                ₹ {{ round($finalSalary) }}

            </td>

        </tr>

    </table>

</body>

</html>