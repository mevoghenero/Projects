<!DOCTYPE html>
<html lang="en">


<head>
    <title>Clienex - Signin</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    

    <!-- Favicon icon -->
    <link rel="icon" href="" type="image/x-icon">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="{{ URL::to('assets/fonts/fontawesome/css/fontawesome-all.min.css') }}">
    <!-- animation css -->
    <link rel="stylesheet" href="{{ URL::to('assets/plugins/animation/css/animate.min.css') }}">
    <!-- vendor css -->
    <link rel="stylesheet" href="{{ URL::to('assets/css/style.css') }}">

</head>

<body>
    <div class="auth-wrapper">
        <div class="auth-content">
            <div class="auth-bg">
                <span class="r"></span>
                <span class="r s"></span>
                <span class="r s"></span>
                <span class="r"></span>
            </div>
            <div class="card">
                <div class="card-body text-center">
                    <form method="POST" action="{{ route('login')}}">
                        @csrf
                        <div class="mb-4">
                            <i class="feather icon-unlock auth-icon"></i>
                        </div>
                        <h3 class="mb-4">Login</h3>
                        <div class="input-group mb-3">
                            <input type="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" placeholder="E-Mail Address" required>


                            @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="input-group mb-4">
                            <input type="password" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="password" required>

                            @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group text-left">
                            <div class="checkbox checkbox-fill d-inline">
                                <input type="checkbox" name="checkbox-fill-1" id="checkbox-fill-a1" {{ old('remember') ? 'checked' : '' }}>
                                <label for="checkbox-fill-a1" class="cr"> Save credentials</label>
                            </div>
                        </div>
                        <button class="btn btn-primary shadow-2 mb-4">Login</button>
                    </form>
                    {{-- <p class="mb-2 text-muted">Forgot password? <a href="{{ route('password.request') }}">Reset</a></p>
                    <p class="mb-0 text-muted">Don’t have an account? <a href="{{ route('register') }}">Signup</a></p> --}}
                </div>
            </div>
        </div>
    </div>

    <!-- Required Js -->
    <script src="{{ URL::to('assets/js/vendor-all.min.js') }}"></script>
    <script src="{{ URL::to('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::to('assets/js/pcoded.min.js') }}"></script>

</body>
</html>
