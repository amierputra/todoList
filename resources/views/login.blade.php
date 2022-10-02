<!DOCTYPE html>
<html lang="ms">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    
    @if (session('save'))
    <script>
        alert("Success");
    </script>
    @endif
    @if (session('error'))
    <script>
        alert("Failed");
    </script>
    @endif

    <nav class="navbar navbar-light justify-content-center bg-info bg-gradient">
        <h1 class=" text-black text-center mt-2">to-Do List</h1>
    </nav>
    <section class="bg-dark py-5">
        <div class="container-fluid">
            <div class="d-flex align-items-center h-100">
                <div class="container h-100">
                    <div class="row d-flex justify-content-center align-items-center h-100">
                        <div class="col-12 col-md-9 col-lg-6 col-xl-4">
                            <div class="card shadow border-1 text-black bg-light bg-gradient rounded">
                                <div class="card-body p-4">
                                    <h5 class="text-center mb-4"><b>LOGIN</b></h5>

                                    <form action="{{ route('login.post') }}" method="post" accept-charset="UTF-8">
                                        {{csrf_field()}}
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="email"><b>Email</b></label>
                                            <input type="text" id="email" name="email" placeholder="Email" class="form-control px-3" required />
                                            @if ($errors->has('email'))
                                            <span class="text-red">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>

                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="password"><b>Password</b></label>
                                            <input type="password" id="password" name="password" placeholder="Password" class="form-control  px-3" required />
                                            @if ($errors->has('password'))
                                            <span class="text-red">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>

                                        <div class="d-grid pb-3">
                                            <button type="submit" name="submit" class="btn btn-info btn-block fw-bold rounded-2 text-black bg-gradient">Login</button>
                                        </div>

                                        <p class="text-center text-black mt-3 mb-0">Don't have an account? <a href="{{ url('register') }}" class="text-danger" style="text-decoration:none; font-style: italic;">Register</a></p>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="container-fluid pt-3 pb-1 text-center text-black adjust bg-info bg-gradient" style="position:relative">
        <p><b>
                &copy; Developed by
                <a href="https://amputra.com" class="text-danger" style="text-decoration:none;">Amier Putra</a>
                | All Rights Reserved | Version Release: v1.0 | THIS IS FOR EDUCATION PURPOSE ONLY.
            </b></p>
    </footer>
</body>

</html>