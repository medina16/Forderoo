<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/htmlstatic/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&family=Quicksand:wght@300..700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="forderoo">FORDEROO</div>
            <div class="col-md-12">

                <div class="alert alert-danger alert-dismissable fade show" role="alert">
                    Registrasi berhasil! <br> Silakan login.
                    <button type="button" class="btn-close alert-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>

                <main class="form-signin w-100 m-auto">
                    <form action="/login" method="post">
                        <div class="form-fields">
                            <h1 class="h3 mb-3">Login</h1>

                            <div class="form-floating">
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" id="email" placeholder="name@example.com" autofocus required
                                    value="palelu@gmail.com">
                                <label for="email">Email address</label>
                                <div class="invalid-feedback">
                                    Lalalalalala
                                </div>
                            </div>

                            <div class="form-floating">
                                <input type="password" class="form-control" name="password" id="password"
                                    placeholder="Password" required>
                                <label for="password">Password</label>
                            </div>
                        </div>

                        <div class="button-group">
                            <button class="btn btn-primary w-100 py-2" type="submit">Login</button>
                            <a href="/register" class="btn btn-secondary w-100 py-2" type="submit">Register</a>
                        </div>

                    </form>
                </main>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>

</html>
