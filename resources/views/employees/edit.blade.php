<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Edit Employee</title>

    <!-- Bootstrap 4 -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

</head>

<body>

<div class="container mt-5">

    <div class="card">

        <div class="card-header">

            <h3>Edit Employee</h3>

        </div>

        <div class="card-body">

            @if ($errors->any())

                <div class="alert alert-danger">

                    <ul>

                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif

            <form action="{{ route('employees.update', $employee->id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <!-- Name -->
                <div class="form-group">

                    <label>Name</label>

                    <input type="text"
                           name="name"
                           class="form-control"
                           value="{{ old('name', $employee->name) }}">

                </div>

                <!-- Email -->
                <div class="form-group">

                    <label>Email</label>

                    <input type="email"
                           name="email"
                           class="form-control"
                           value="{{ old('email', $employee->email) }}">

                </div>

                <!-- Phone -->
                <div class="form-group">

                    <label>Phone</label>

                    <input type="text"
                           name="phone"
                           class="form-control"
                           value="{{ old('phone', $employee->phone) }}">

                </div>

                <!-- Department -->
                <div class="form-group">

                    <label>Department</label>

                    <select name="department"
                            class="form-control">

                        <option value="HR"
                            {{ $employee->department == 'HR' ? 'selected' : '' }}>
                            HR
                        </option>

                        <option value="IT"
                            {{ $employee->department == 'IT' ? 'selected' : '' }}>
                            IT
                        </option>

                        <option value="Finance"
                            {{ $employee->department == 'Finance' ? 'selected' : '' }}>
                            Finance
                        </option>

                    </select>

                </div>

                <!-- Designation -->
                <div class="form-group">

                    <label>Designation</label>

                    <select name="designation"
                            class="form-control">

                        <option value="Manager"
                            {{ $employee->designation == 'Manager' ? 'selected' : '' }}>
                            Manager
                        </option>

                        <option value="Developer"
                            {{ $employee->designation == 'Developer' ? 'selected' : '' }}>
                            Developer
                        </option>

                        <option value="Accountant"
                            {{ $employee->designation == 'Accountant' ? 'selected' : '' }}>
                            Accountant
                        </option>

                    </select>

                </div>

                <!-- Salary -->
                <div class="form-group">

                    <label>Salary</label>

                    <input type="number"
                           name="salary"
                           class="form-control"
                           value="{{ old('salary', $employee->salary) }}">

                </div>

                <!-- Joining Date -->
                <div class="form-group">

                    <label>Joining Date</label>

                    <input type="date"
                           name="joining_date"
                           class="form-control"
                           value="{{ old('joining_date', $employee->joining_date) }}">

                </div>

                <button type="submit"
                        class="btn btn-primary">

                    Update Employee

                </button>

            </form>

        </div>

    </div>

</div>

</body>
</html>