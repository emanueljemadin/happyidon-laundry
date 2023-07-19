<!doctype html>
<html lang="en">

<head>
    <title>Login 05</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('templatelogin/css/style.css') }}">

</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Login Admin</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="wrap">
                        <div class="login-wrap p-4 p-md-5">
                            <div class="d-flex">
                                <div class="w-100">
                                    <h3 class="mb-4"Login</h3>
                                </div>
                            </div>

                            <form class="signin-form" method="POST" action="{{ route('login') }}">
                                @csrf


                                <div class="form-group mt-3">
                                    <input type="email" name="email" class="form-control" required>
                                    <label class="form-control-placeholder" for="email">Email</label>

                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                </div>
                                <div class="form-group">
                                    <input id="password" name="password" type="password" class="form-control" required>
                                    <label class="form-control-placeholder" for="password">Password</label>

                                    @error('password')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror

                                    <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>
                                <div class="form-group">
                                    <button type="submit"
                                        class="form-control btn btn-primary rounded submit px-3">Login</button>
                                </div>
                                <div class="form-group d-md-flex">
                                    <div class="w-50 text-left">
                                        <label class="checkbox-wrap checkbox-primary mb-0">Remember Me
                                            <input type="checkbox" name="remember" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    {{--  <div class="w-50 text-md-right">
                                        <a href="#">Forgot Password</a>
                                    </div>  --}}
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('templatelogin/js/jquery.min.js') }}"></script>
    <script src="{{ asset('templatelogin/js/popper.js') }}"></script>
    <script src="{{ asset('templatelogin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('templatelogin/js/main.js') }}"></script>

</body>

</html>
