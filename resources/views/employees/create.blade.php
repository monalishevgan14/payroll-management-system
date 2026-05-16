<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Add Employee</title>

    <!-- Bootstrap 4 -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

</head>

<body>

<div class="container mt-5">

    <div class="card">

        <div class="card-header">

            <h3>Add Employee</h3>

        </div>

        <div class="card-body">

            <!-- Validation Errors -->
            @if ($errors->any())

                <div class="alert alert-danger">

                    <ul class="mb-0">

                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif

            <form action="{{ route('employees.store') }}"
                  method="POST">

                @csrf

                <!-- Name -->
                <div class="form-group">

                    <label>Name</label>

                    <input type="text"
                           name="name"
                           class="form-control"
                           value="{{ old('name') }}">

                </div>

                <!-- Email -->
                <div class="form-group">

                    <label>Email</label>

                    <input type="email"
                           name="email"
                           class="form-control"
                           value="{{ old('email') }}">

                </div>

                <!-- Phone -->
                <div class="form-group">

                    <label>Phone</label>

                    <input type="text"
                           name="phone"
                           class="form-control"
                           value="{{ old('phone') }}">

                </div>

                <!-- Department -->
                <div class="form-group">

                    <label>Department</label>

                    <select name="department"
                            class="form-control">

                        <option value="">Select</option>

                        <option value="HR"
                            {{ old('department') == 'HR' ? 'selected' : '' }}>
                            HR
                        </option>

                        <option value="IT"
                            {{ old('department') == 'IT' ? 'selected' : '' }}>
                            IT
                        </option>

                        <option value="Finance"
                            {{ old('department') == 'Finance' ? 'selected' : '' }}>
                            Finance
                        </option>

                    </select>

                </div>

                <!-- Designation -->
                <div class="form-group">

                    <label>Designation</label>

                    <select name="designation"
                            class="form-control">

                        <option value="">Select</option>

                        <option value="Manager"
                            {{ old('designation') == 'Manager' ? 'selected' : '' }}>
                            Manager
                        </option>

                        <option value="Developer"
                            {{ old('designation') == 'Developer' ? 'selected' : '' }}>
                            Developer
                        </option>

                        <option value="Accountant"
                            {{ old('designation') == 'Accountant' ? 'selected' : '' }}>
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
                           value="{{ old('salary') }}">

                </div>

                <!-- Joining Date -->
                <div class="form-group">

                    <label>Joining Date</label>

                    <input type="date"
                           name="joining_date"
                           class="form-control"
                           value="{{ old('joining_date') }}">

                </div>

                <!-- Password -->
                <div class="form-group">

                    <label>Password</label>

                    <input type="password"
                           name="password"
                           class="form-control">

                </div>

                <button type="submit"
                        class="btn btn-success">

                    Save Employee

                </button>

            </form>

        </div>

    </div>

</div>

</body>
</html>