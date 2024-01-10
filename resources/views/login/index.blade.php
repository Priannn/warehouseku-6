<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warehouseku</title>
    <link rel="stylesheet" href="{{ asset('asset/css/login.css') }}">
    <link href="{{ url('https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css')}}">
</head>

<body>



    <!-- halamaan Header dimulai -->


    <nav class="mt-4 container">
        <div class="navbar">

            <div class="navbar-left">
                <p class="brand">Warehouse |</p>
                <span><a href="/register" class="sign-in">Sign Up</a></span>
            </div>

            <div class="icon">
                <i class='bx bx-grid-alt'></i>
            </div>
        </div>
    </nav>
    <!-- Halamaan header selesai -->

    <section class="container mt-4">
        <!-- halaman sign in dimulai -->
        <div class="row">
            <div class="col mt-5">
                <h3>Sign In</h3>
                <p>Enter your email and password to sign in</p>
                <form action="/" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="email" class="form-control rounded-5 p-3 border-3 border-success @error('email') is-invalid @enderror " id="username" placeholder="Enter your email..." required name="email">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control rounded-5 p-3 mt-2 border-success border-3 @error('password') is-invalid @enderror " id="password" placeholder="Enter your password..." required name="password">
                    </div>
                    <div class="d-flex justify-content-center mt-3">
                        <button type="submit" class="button">SUBMIT</button>
                    </div>
                    <div class="d-flex justify-content-center mt-3">
                        <p>Don't have an account? <span><a href="/register">Sign Up</a></span></p>
                    </div>
                </form>
            </div>
            <div class="col gambar-signin">
                <img src="Group 153.svg" alt="" class="img-fluid">
            </div>
        </div>
    </section>
    <!-- halaman sign in selesai -->
</body>

</html>