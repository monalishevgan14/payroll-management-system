<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">

    <div class="container">

        <a class="navbar-brand font-weight-bold"
           href="{{ url('/admin/dashboard') }}">

            Payroll System

        </a>

        <div class="ml-auto">

            <a href="{{ route('admin.dashboard') }}"
               class="btn btn-primary btn-sm mr-2">

                Dashboard

            </a>

            <a href="{{ route('employees.index') }}"
               class="btn btn-primary btn-sm mr-2">

                Employees

            </a>

            <a href="{{ route('salary-structures.index') }}"
            class="btn btn-success btn-sm mr-2">

                Salary Structure

            </a>

            <a href="{{ route('attendances.index') }}"
                class="btn btn-info btn-sm mr-2">

                    Attendance

            </a>

            <a href="{{ route('salary.calculation') }}"
                class="btn btn-secondary btn-sm mr-2">

                    Payroll

            </a>

            <form action="{{ route('logout') }}"
                  method="POST"
                  class="d-inline">

                @csrf

                <button type="submit"
                        class="btn btn-danger btn-sm">

                    Logout

                </button>

            </form>

        </div>

    </div>

</nav>