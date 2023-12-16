<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Material Design for Bootstrap</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <!-- Roboto -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- Quicksand -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <!-- Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;500;600;700;800&family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" href="css/login/loginStyle.css" />
</head>

<body>
    <section class="vh-100">
        <div class="container-fluid">
            <div class="row custom-row">
                <div class="col-auto col-sm-auto col-md-6 col-lg-4 text-black">
                    <div class="container-semua d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-5">
                        <form class="form-container" style="width: 23rem" accept-charset=" UTF-8" action="{{ route('checkLogin') }} " method="post">

                            {{ csrf_field() }}
                            <h3 class="welcome mb-3 pb-3" style="letter-spacing: 1px">Welcome, Petranesian</h3>

                            <h4 class="subtext mb-3 pb-3">Log in to access our full features.</h4>

                            <div class="form-outline mb-4">
                                <input type="email" id="email" class="form-control form-control-lg" name="email" />
                                <label class="email form-label" for="email">Email address</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="password" id="password" class="form-control form-control-lg" name="password" />
                                <label class="password form-label" for="password">Password</label>
                            </div>

                            <div class="signin-con pt-1 mb-4">
                                <button class="btn btn-lg btn-block" type="submit">Sign in</button>
                            </div>

                            <p class="forgor small mb-5 pb-lg-2"><a class="text-muted" href="#!">Forgot password?</a></p>
                        </form>

                    </div>
                    @if(Session::has('error'))
                    <div class="alert alert-danger">
                        {{ Session::get('error') }}
                    </div>
                    @endif
                </div>
                <div class="side-image col-md-6 col-lg-8 px-0 d-none d-sm-block">
                    <img src="assets/login/landingIMG.jpeg" alt="Login image" class="image w-100 vh-100" />
                    <img src="assets/login/logos.png" alt="logo-2" class="logos" />
                </div>
            </div>
        </div>
    </section>

    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script>
</body>

</html>