<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log in</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('adminlte/adminlte.min.css') }}">
    <!-- Sweetalert -->
    <link rel="stylesheet" href="{{ asset('sweetalert2/sweetalert2.min.css') }}">
    <script src="{{ asset('sweetalert2/sweetalert2.all.min.js') }}"></script>
</head>

<body class="hold-transition login-page" background="{{ asset('img/skulls.png') }}">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <br>
                <img src="{{ asset('img/logo_jateng.png') }}" width="100px" alt="Login Logo" title="Login Logo">
                <br><br>
                <h3>Login</h3>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Selamat Datang</p>
                <form action="{{ route('loginprocess') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control" placeholder="Username" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-key"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                    </div>
                </form>
                <p class="mb-0">
                    <a href="#" class="text-center">Register a new membership</a>
                </p>
            </div>
        </div>
        <div class="login-box-msg">
            <br>
            <strong>
                <a href="#">Tiarawp__ &copy; 2021</a>
                <br>
                Dinas Sosial Provinsi Jawa Tengah
            </strong>
        </div>
    </div>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('adminlte/adminlte.min.js') }}"></script>
    <!-- SWEET ALERT -->
    @if (session('pesan_error'))
        <script>
            Swal.fire({
                position: 'top',
                icon: 'error',
                title: 'Oops...',
                text: "{!! session('pesan_error') !!}"
            })
        </script>
    @endif
    @if (session('pesan_status'))
        <script>
            Swal.fire({
                position: 'top',
                icon: 'info',
                text: "{!! session('pesan_status') !!}",
                timer: 1500,
                timerProgressBar: true
            })
        </script>
    @endif
</body>

</html>
