<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warehouseku</title>
    <link rel="stylesheet" href="{{ asset('asset/css/register.css') }}">
    <link href="{{ url('https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css') }}" rel="stylesheet">
   <link rel="stylesheet" href="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css') }}"> 
</head>
<body>
   

   
    <!-- halamaan Header dimulai -->
  

   <nav class="mt-4 container">
    <div class="navbar">

        <div class="navbar-left">
            <p class="brand">Warehouse |</p>
            <a href="/" class="sign-in">Sign In</a>
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
            <h3>Sign Up</h3>
            <p>Masukkan Nama, Email dan Password Untuk Mendaftar</p>
            <form action="/register" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control rounded-5 p-3 @error('name') is-invalid @enderror " id="username" placeholder="Masukkan nama..." required name="name">
                </div>
                <div class="form-group">
                    <input type="email" class="form-control rounded-5 p-3 mt-2 @error('email') is-invalid @enderror" id="email" placeholder="Masukkan email..." required name="email">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control rounded-5 p-3 mt-2 @error('password') is-invalid @enderror" id="password" placeholder="Masukkan password..." required name="password">
                </div>
                <div class="d-flex justify-content-center mt-3"> 
                    <button type="submit" class="button">Sign Up</button>
                </div>
                <div class="d-flex justify-content-center mt-3 link">
                    <p>Sudah Mempunyai Akun? <a href="/">Sign In</a></p>
                </div>
            </form>
        </div>
        <div class="col gambar-signup">
            <img src="Group 155.svg" alt="gamabar kontol" class="img-fluid">
        </div>
    </div>
    </section>
    <!-- halaman sign in selesai -->
    
    
</body>
</html>