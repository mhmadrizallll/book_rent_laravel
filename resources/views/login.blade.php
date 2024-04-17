<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rental Buku | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
    <style>
        .main {
            height: 100vh;
        }

        .login-box {
            width: 500px;
            border: solid 1px;
            padding: 30px;
        }

        form div {
            margin-bottom: 20px;
        }
    </style>
<body>

    <div class="main d-flex flex-column justify-content-center align-items-center">
        @if (session('status') == 'failed')
            <div class="alert alert-danger">
                {{ session('message') }}
            </div>
        @endif
        @if (session('status') == 'success')
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <div class="login-box">
            <h2 class="mb-4 text-uppercase text-center">Login Form</h2>
            <form action="" method="post">
                @csrf
                <div>
                    <label for="name" class="form-label">Username</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div>
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" required>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary form-control">Login</button>
                </div>
                <div class="text-center">
                   Don't not Account?? <a href="register">Sign Up?</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>