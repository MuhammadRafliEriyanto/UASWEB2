<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Muhammad Rafli Eriyanto</title>

    <!-- Google Font: Montserrat -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,400,400i,700&display=swap">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('AdminLTE/dist/css/adminlte.min.css') }}">

    <style>
        body {
            height: 100vh;
            background: #e9eef7;
            font-family: 'Montserrat', sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 50px;
        }
        .spContainer {
            width: 100%;
            max-width: 500px;
            padding: 20px;
            padding-top: 50px;
            box-sizing: border-box;
        }
        .card {
            border-radius: 16px;
            transition: .25s;
            padding: 40px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            background: white;
            margin: auto;
        }
        .card:hover {
            transition: .25s;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
        }
        .btn-primary {
            border-radius: 4px;
            border: none;
            background-color: #28a745;
            box-shadow: 0px 0px 0px 0px rgba(34, 36, 38, 0.15) inset, 0px -0.4em 0px 0px rgba(34, 36, 38, 0.15) inset;
            padding: 10px 20px;
            font-size: 18px;
        }
        .btn-primary:hover, .btn-primary:focus, .btn-primary:active {
            background-color: #218838 !important;
            box-shadow: none;
        }
        .inpSp {
            background-color: #ebebeb;
            border: none;
            transition: .25s;
            padding-left: 25px;
            font-family: "Montserrat", sans-serif;
            border-radius: 4px;
            height: 45px;
            font-size: 16px;
        }
        .inpSp:hover {
            transition: .25s;
            background-color: #dbdbdb;
        }
        .inpSp:focus {
            background-color: #ebebeb;
            box-shadow: 0 8px 8px 0px #f1f1f1;
        }
        .regStr {
            transition: .25s;
            padding-bottom: 4px;
            border-bottom: 2px solid gray;
            color: #212519;
            font-size: 16px;
        }
        .regStr:hover {
            border-bottom: 2px solid #ff425f;
            padding-bottom: 8px;
            transition: .25s;
            text-decoration: none;
            color: #212519;
        }
        .btn-sm {
            font-weight: 300;
            font-size: 14px;
            padding: 8px 15px;
        }
        .btn-sm:hover {
            font-weight: 900;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }
        h2 {
            font-size: 2rem;
        }
        p {
            font-size: 1rem;
        }
        .text-left {
            text-align: left;
        }
        .text-center {
            text-align: center;
        }
        .text-black-50 {
            color: rgba(0, 0, 0, 0.5);
        }
        .badge {
            font-size: 0.9rem;
        }
    </style>
</head>

<body>
    <div class="spContainer">
        <div class="card border-0 shadow">
            <div class="text-left mb-4">
                <h2 class="font-weight-bold">Login</h2>
                <p>Akses aplikasi Perhitungan SPK Topsis</p>
            </div>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="text-center mb-3">
                    <div class="form-group mx-auto">
                        <input type="email" name="email" class="form-control inpSp" placeholder="Email" value="{{ old('email') }}">
                    </div>
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="text-center mb-3">
                    <div class="form-group mx-auto">
                        <input type="password" name="password" class="form-control inpSp" placeholder="Password">
                    </div>
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="text-left mb-4">
                    <div class="form-group mx-auto">
                        <button type="submit" class="btn btn-primary">Masuk</button>
                        <a class="small text-black-50 pl-2 ml-2 border-left" href="{{ route('forgot-password') }}">Lupa Password?</a>
                    </div>
                </div>
            </form>
            <div class="text-left mb-3">
                <div class="form-group mx-auto mb-0">
                    <label class="text-black-50 small">atau login dengan</label>
                </div>
            </div>
            <div class="text-left">
                <div class="form-group mx-auto">
                    <a href="{{ route('google-login') }}" class="btn btn-sm btn-light">
                        <span class="badge text-white"><i class="fab fa-google text-danger"></i></span> Google
                    </a>
                </div>
            </div>
            <div class="text-left mt-4">
                <div class="form-group mx-auto mb-0">
                    <a class="text-black font-weight-bold regStr" href="{{ route('register') }}">Daftar akun baru</a>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('AdminLTE/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
