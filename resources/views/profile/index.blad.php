<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Start icon -->
    <link href="{{ url('https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <!-- End icon -->
    <!--Start CSS-->
    <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('asset/css/profile.css') }}">
    <!--End CSS-->
    <title>Warehouse</title>
</head>

<body>
<div class="loader-wrapper">
        <div class="lds-ellipsis">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <div class="main-dashboard d-flex">
        <!-- start: Sidebar -->
        <div class="sidebar mt-3">
            @include('partials.sidebar')
        </div>
        <!-- end: Sidebar -->
        <div class="right mt-3">
            <div class="navbar d-flex">
                <a class="text-dark">
                    Dashboard / User Profile
                </a>
                @include('partials.navbar')
            </div>
            <div class="container shadow">
                <div class="con-top">


                </div>
                <div class="con-mid">
                    <div class="d-flex justify-content-center ">
                        <img src="{{ asset('profilepic.jfif') }}" alt="" class="rounded-pill">
                    </div>
                    <div class="d-flex justify-content-center ms-4">
                        <h4>{{ $user->name }}</h4>
                    </div>
                    <div class="d-flex justify-content-center ms-4">
                        <h5>Admin Outlet</h5>
                    </div>
                    <h2>Profile</h2>
                    <hr>
                    <form action="">
                        <div class="mb-3 row">
                            <label for="inputUsername" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputUsername" placeholder="Username" value="{{ $user->name }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail" placeholder="Email" value="{{ $user->email }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputNoTelp" class="col-sm-2 col-form-label">Nomor Ponsel</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputNoTelp" placeholder="No Ponsel">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputNamaLeng" class="col-sm-2 col-form-label">Nama Lengkap</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputNoTelp" placeholder="Nama Lengkap">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputNamaU" class="col-sm-2 col-form-label">Nama Usaha</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputNoTelp" placeholder="Nama Usaha" value="{{ $user->namausaha }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputJenisU" class="col-sm-2 col-form-label">Jenis Usaha</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputNoTelp" placeholder="Jenis Usaha" value="{{ $user->jenisusaha }}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="inputAlamat" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputNoTelp" placeholder="Alamat" value="{{ $user->lokasi }}">
                            </div>
                        </div>
                    </form>
                </div>


                <div class="row">
                    <div class="con-bot col mt-4">
                        <a href="#">Reset Password</a>
                    </div>
                    <div class="col">
                        <button type="button" class="btn btn-secondary mt-3 mb-4 rounded-5">Simpan Perubahan</button>
                    </div>


                </div>
            </div>

            <!-- end content pagenation -->
        </div>
    </div>
    </div>

    <!-- start: JS -->
    <script src="{{ asset('asset/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('asset/js/jquery.min.js') }}"></script>
    <script src="{{ asset('asset/js/script.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        $(window).on("load", function() {
            $(".loader-wrapper").fadeOut("slow");
        });
    </script>
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <!-- end: Sidebar -->
</body>

</html>