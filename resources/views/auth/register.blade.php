<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Employee Registration</title>

    <!-- Bootstrap 4 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

</head>

<body style="background-color:#f8f9fa;">

    <div class="container mt-5">

        <div class="row justify-content-center">

            <div class="col-md-6">

                <div class="card shadow">

                    <div class="card-header text-center">
                        <h4>Employee Registration</h4>
                    </div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('register') }}">

                            @csrf

                            <!-- Employee ID -->
                            {{-- <div class="form-group">
                                <label>Employee ID</label>

                                <input type="text" name="employee_id" class="form-control"
                                    value="{{ old('employee_id') }}">
                            </div> --}}

                            <!-- Name -->
                            <div class="form-group">
                                <label>Full Name</label>

                                <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                                    required>

                                @error('name')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="form-group">
                                <label>Email</label>

                                <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                                    required>

                                @error('email')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>

                            <!-- Phone -->
                            <div class="form-group">
                                <label>Phone</label>

                                <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                            </div>

                            <!-- Department -->
                            <div class="form-group">
                                <label>Department</label>

                                <select name="department" class="form-control">

                                    <option value="">Select Department</option>
                                    <option value="HR">HR</option>
                                    <option value="IT">IT</option>
                                    <option value="Finance">Finance</option>
                                    <option value="Sales">Sales</option>
                                    <option value="Marketing">Marketing</option>

                                </select>
                            </div>

                            <!-- Designation -->
                            <div class="form-group">
                                <label>Designation</label>

                                <select name="designation" class="form-control">

                                    <option value="">Select Designation</option>
                                    <option value="Manager">Manager</option>
                                    <option value="Team Leader">Team Leader</option>
                                    <option value="Senior Developer">Senior Developer</option>
                                    <option value="Junior Developer">Junior Developer</option>
                                    <option value="HR Executive">HR Executive</option>
                                    <option value="Accountant">Accountant</option>

                                </select>
                            </div>
                            <!-- Salary -->
                            <div class="form-group">
                                <label>Salary</label>

                                <input type="number" name="salary" class="form-control" value="{{ old('salary') }}">
                            </div>

                            <!-- Joining Date -->
                            <div class="form-group">
                                <label>Joining Date</label>

                                <input type="date" name="joining_date" class="form-control"
                                    value="{{ old('joining_date') }}">
                            </div>

                            <!-- Password -->
                            <div class="form-group">
                                <label>Password</label>

                                <input type="password" name="password" class="form-control" required>

                                @error('password')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>

                            <!-- Confirm Password -->
                            <div class="form-group">
                                <label>Confirm Password</label>

                                <input type="password" name="password_confirmation" class="form-control" required>
                            </div>

                            <!-- Register Button -->
                            <button type="submit" class="btn btn-success btn-block">
                                Register
                            </button>

                            <!-- Login Link -->
                            <div class="text-center mt-3">

                                <a href="{{ route('login') }}">
                                    Already have account? Login
                                </a>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap 4 JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>

</body>

</html>
