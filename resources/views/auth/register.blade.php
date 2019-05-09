<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('dashboard/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link href="{{asset('dashboard/vendor/fonts/circular-std/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('dashboard/libs/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard/vendor/fonts/fontawesome/css/fontawesome-all.css')}}">
    <style>
        html,
        body {
            height: 100%;
        }

        body {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-align: center;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
        }
    </style>
</head>

<body>
<!-- ============================================================== -->
<!-- register page  -->
<!-- ============================================================== -->
<form class="splash-container" method="POST" action="{{ route('register') }}">
    @csrf
    <div class="card">
        <div class="card-header">
            <h3 class="mb-1">Registrations</h3>
            <p>Please enter your user information.</p>
        </div>
        <div class="card-body">
            <div class="form-group">
                <input class="form-control form-control-lg{{ $errors->has('name') ? ' is-invalid' : '' }}" type="text" name="name" value="{{ old('name') }}" autofocus required="" placeholder="Username" autocomplete="off">
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <input class="form-control form-control-lg{{ $errors->has('email') ? ' is-invalid' : '' }}" type="email" name="email" value="{{ old('email') }}" required placeholder="E-mail" autocomplete="off">
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <input class="form-control form-control-lg{{ $errors->has('password') ? ' is-invalid' : '' }}" id="pass1" type="password" name="password" required placeholder="Password">
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <input type="password" class="form-control form-control-lg" name="password_confirmation" required placeholder="Confirm" autocomplete="new-password">
            </div>
            <div class="form-group">
                <select name="gender" class="form-control form-control-lg">
                    <option value="" disabled selected>Select Gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>
            <div class="form-group pt-2">
                <button class="btn btn-block btn-primary" type="submit">Register My Account</button>
            </div>
            <div class="form-group">
                <label class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="checkbox"><span class="custom-control-label">By creating an account, you agree the <a href="#">terms and conditions</a></span>
                </label>
            </div>
        </div>
        <div class="card-footer bg-white">
            <p>Already member? <a href="{{route('login')}}" class="text-secondary">Login Here.</a></p>
        </div>
    </div>
</form>

<!-- ============================================================== -->
<!-- end register page  -->
<!-- ============================================================== -->
<!-- Optional JavaScript -->
<script src="{{asset('dashboard/vendor/jquery/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('dashboard/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
</body>

</html>