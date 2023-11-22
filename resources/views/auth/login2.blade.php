<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name') }}</title>
    <link rel="icon" href="content/logo/w-logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .div1 {
            /* Set the background image */
            background-image: url('images/cake/Drip Cakes/1.png');

            /* Specify background properties */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row min-vh-100 " id="div1"> <!-- Add a custom class for styling -->
            <div class="col-lg-8 col-md-6 div1 full-height d-none d-md-block "> <!-- Add a custom class for styling -->
                {{-- <img src="content/styling-images/1.jpg" alt=""> --}}
            </div>
            <div class="col-md-6 col-lg-4 h-100"> <!-- Add a custom class for styling -->
                <div>
                    <div class="d-flex justify-content-center">
                        <a href="/">
                            <img src="content/logo/b-logo.png" alt="" style="width: 200px">
                        </a>
                    </div>
                    <h5 class="text-center fw-bolder fs-1 pb-4 text-muted">Welcome Back</h5>
                    <div class="p-3">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>
                    <form method="POST" action="{{ route('login') }}" class="px-5">
                        @csrf
                        <div class="form-group mb-4">
                            <label class="mb-2" for="username">Email Address <span
                                    class="text-danger">*</span></label>
                            <input autofocus type="text" name="email" class="form-control py-2 px-3"
                                :value="old('email')" style="border-radius: 20px" id="username"
                                placeholder="Enter email address">
                        </div>
                        <div class="form-group mb-4">
                            <label class="mb-2" for="password">Password <span class="text-danger">*</span></label>
                            <input type="password" name="password" class="form-control py-2 px-3"
                                style="border-radius: 20px" id="password" placeholder="Enter your password">
                        </div>
                        <button type="submit" class="btn btn-primary py-2 px-3"
                            style="border-radius: 20px">Login</button>
                    </form>

                    <p class="mt-5 fs-6 px-5">Don't have an account yet? <a href="/register"
                            class="fw-bold text-decoration-none text-primary" style="cursor: pointer">Register</a>
                        for free
                    </p>
                </div>
            </div>
        </div>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</body>

</html>
