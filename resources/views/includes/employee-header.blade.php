<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow">

    <div class="container">

      

        <a href="{{ route('employee.dashboard') }}">

            Employee Panel

        </a>

        <div class="ml-auto">

            <a href="{{ route('employee.dashboard') }}"
               class="btn btn-light btn-sm mr-2">

                Dashboard

            </a>

            <a href="{{ route('employee.attendance') }}"
                class="btn btn-info btn-sm mr-2">

                My Attendance

            </a>

            <a href="{{ route('employee.payslips') }}"
               class="btn btn-secondary btn-sm mr-2">

                My Payslips

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