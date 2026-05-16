<!DOCTYPE html>
<html>

<head>

    <title>
        Employee Payslip
    </title>

    <style>

        body{
            font-family: Arial, sans-serif;
            padding: 30px;
        }

        h2{
            margin-bottom: 30px;
        }

        table{
            width:100%;
            border-collapse: collapse;
        }

        table, th, td{
            border:1px solid #000;
        }

        th{
            background:#f2f2f2;
            text-align:left;
            width:40%;
        }

        th, td{
            padding:12px;
        }

    </style>

</head>

<body>

    <h2>
        Employee Payslip
    </h2>

    <table>

        <tr>

            <th>
                Employee
            </th>

            <td>

                {{ Auth::user()->name }}

            </td>

        </tr>

        <tr>

            <th>
                Basic Salary
            </th>

            <td>

                Rs. {{ $salary->basic_salary }}

            </td>

        </tr>

        <tr>

            <th>
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
                Final Salary
            </th>

            <td>

                Rs. {{ round($finalSalary) }}

            </td>

        </tr>

    </table>

</body>

</html>