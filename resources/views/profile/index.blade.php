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
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
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
        <div class="right">
            <div class="navbar d-flex">
                <p class="ms-3 mt-3">Dashboard / profile</p>
                <div class="nav-right">
                    @include('partials.navbar')
                </div>
            </div>
            <div class="main-cf bg-white rounded-4">
                <div class="container rounded d-flex">
                    <div class="container mb-5 mt-5 ">
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
                            <form action="{{ route('updateProfile',['id'=>$user->id]) }}" method="POST">
                                <input type="hidden" name="_method" value="patch">
                                @csrf
                                <div class="mb-3 row">
                                    <label for="inputUsername" class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="name" id="inputText" placeholder="Username" value="{{ $user->name }}">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputText" name="email" placeholder="Email" value="{{ $user->email }}">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputNamaU" class="col-sm-2 col-form-label">Nama Usaha</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputText" name="nama_usaha" placeholder="Nama Usaha" value="{{ $user->nama_usaha }}">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputJenisU" class="col-sm-2 col-form-label">Jenis Usaha</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputText" name="jenis_usaha" placeholder="Jenis Usaha" value="{{ $user->jenis_usaha }}">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputAlamat" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputText" name="lokasi_usaha" placeholder="Alamat" value="{{ $user->lokasi_usaha }}">
                                    </div>
                                </div>
                                <div class="col text-center">
                                    <button type="submit" id="submitButton" class="btn btn-success mt-3 mb-4 rounded-5">Simpan Perubahan</button>
                                </div>
                            </form>
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
            <script>
                $(document).ready(function() {
                    $("a.submit").click(function() {
                        document.getElementById("myForm").submit();
                    });
                });

                function checkInput() {
                    var inputText = document.getElementById('inputText').value;
                    var submitButton = document.getElementById('submitButton');

                    // Cek apakah nilai input kosong atau tidak
                    if (inputText.trim() !== '') {
                        submitButton.disabled = false; // Aktifkan tombol jika input tidak kosong
                    } else {
                        submitButton.disabled = true; // Nonaktifkan tombol jika input kosong
                    }
                }
            </script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

            <!-- end: Sidebar -->
</body>

</html>