<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register</title>

    <!-- Bootstrap 4 CSS -->
    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

</head>

<body style="background-color:#f8f9fa;">

    <div class="container mt-5">

        <div class="row justify-content-center">

            <div class="col-md-5">

                <div class="card shadow">

                    <div class="card-header text-center">
                        <h4>Register</h4>
                    </div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('register') }}">

                            @csrf

                            <!-- Name -->
                            <div class="form-group">

                                <label>Name</label>

                                <input type="text"
                                       name="name"
                                       class="form-control"
                                       value="{{ old('name') }}"
                                       required
                                       autofocus>

                                @error('name')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror

                            </div>

                            <!-- Email -->
                            <div class="form-group">

                                <label>Email</label>

                                <input type="email"
                                       name="email"
                                       class="form-control"
                                       value="{{ old('email') }}"
                                       required>

                                @error('email')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror

                            </div>

                            <!-- Password -->
                            <div class="form-group">

                                <label>Password</label>

                                <input type="password"
                                       name="password"
                                       class="form-control"
                                       required>

                                @error('password')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror

                            </div>

                            <!-- Confirm Password -->
                            <div class="form-group">

                                <label>Confirm Password</label>

                                <input type="password"
                                       name="password_confirmation"
                                       class="form-control"
                                       required>

                                @error('password_confirmation')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror

                            </div>

                            <!-- Register Button -->
                            <button type="submit"
                                    class="btn btn-success btn-block">
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