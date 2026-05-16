<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>

    <!-- Bootstrap 4 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

</head>

<body style="background-color:#f8f9fa;">

    <div class="container mt-5">

        <div class="row justify-content-center">

            <div class="col-md-4">

                <div class="card shadow">

                    <div class="card-header text-center">
                        <h4>Login</h4>
                    </div>

                    <div class="card-body">

                        <!-- Session Message -->
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('login') }}">

                            @csrf

                            <!-- Email -->
                            <div class="form-group">

                                <label>Email</label>

                                <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                                    required autofocus>

                                @error('email')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror

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

                            <!-- Remember Me -->
                            <div class="form-group form-check">

                                <input type="checkbox" class="form-check-input" name="remember" id="remember">

                                <label class="form-check-label" for="remember">
                                    Remember Me
                                </label>

                            </div>

                            <!-- Login Button -->
                            <button type="submit" class="btn btn-primary btn-block">
                                Login
                            </button>

                            <!-- Register Link -->
                            <div class="text-center mt-3">

                                <a href="{{ route('register') }}">
                                    Create New Account
                                </a>

                                <br>

                                <a href="{{ route('password.request') }}">
                                    Forgot Password?
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
