<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Start icon -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet">
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

            @include('partials.sidebar-admin')
        </div>
        <!-- end: Sidebar -->
        <div class="right mt-3">
            <div class="navbar">
                <a>Admin / Manage User
                </a>
                @include('partials.navbar')
            </div>
            <div class="main-cf bg-white rounded-4">
                <div class="container rounded d-flex">
                    <h5 class="fw-bold ms-2 mt-4">Manage User</h5>
                    <!-- Button trigger modal -->
                    <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" class="ms-auto btnadd mt-4">
                        <i class="ri-add-line"></i> Tambah Akun
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h2>Form Faktur Pembayaran</h2>
                                    <hr style="border-width: 3px">
                                    <form action="/daftaruser/create" method="POST">
                                        @csrf
                                        <div class="form-group mb-4">
                                            <label for="nofaktur">Username</label>
                                            <input type="text" class="form-control" id="nofaktur" name="name">
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="pemasok">Email</label>
                                            <input type="email" class="form-control" id="pemasok" name="email">
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="pemasok">Password</label>
                                            <input type="password" class="form-control" id="pemasok" name="password">
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="total">Nama Usaha</label>
                                            <input type="text" class="form-control" id="total" name="namausaha">
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="total">Jenis Usaha</label>
                                            <input type="text" class="form-control" id="total" name="jenisusaha">
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="total">Alamat</label>
                                            <input type="text" class="form-control" id="total" name="lokasi">
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="total">Lama Operasi</label>
                                            <input type="text" class="form-control" id="total" name="lamaoperasi">
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="total">Level</label>
                                            <select name="level" id="" class="form-control">
                                                <option value="0">Admin</option>
                                                <option value="1">Super Admin</option>
                                            </select>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Add Data</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="search ms-3 mb-2">
                    <input class="form-control me-2 w-100 mt-5 rounded-4" type="search" placeholder="&#128269; Search" aria-label="Search">
                </div>
                <div class="container">
                    <div class="table-responsive">
                        <table class="table tabek">
                            <thead>
                                <tr>
                                    <th class="fw">Photo Profile</th>
                                    <th class="fw">Level</th>
                                    <th class="fw">Username</th>
                                    <th class="fw">Email</th>
                                    <th class="fw">Nama Usaha</th>
                                    <th class="fw">Jenis Usaha</th>
                                    <th class="fw">Alamat</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach($post as $p)
                                <tr>
                                    <td class="fw-bolder"><img src="{{ asset('profilepic.jfif') }}" alt="" class="rounded-pill"></td>
                                    <td class="fw-bolder">
                                        @if($p->level == 0)
                                        <p>Admin</p>
                                        @else
                                        <p>Super Admin</p>
                                        @endif
                                    </td>
                                    <td class="fw-bolder">{{ $p->name }} </td>

                                    <td class="fw-bolder">{{ $p->email }} </td>
                                    <td class="fw-bolder">{{ $p->namausaha }} </td>
                                    <td class="fw-bolder">{{ $p->jenisusaha }} </td>
                                    <td class="fw-bolder">{{ $p->lokasi }} </td>
                                    <div class="d-flex">
                                        <td>
                                            <a href="#"><img src="{{ asset('edit.gif') }}" data-bs-toggle="modal" data-bs-target="#edit-{{$p->id}}"></a>
                                            <div class="modal fade" id="edit-{{$p->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h2>Form Faktur Pembayaran</h2>
                                                            <hr style="border-width: 3px">
                                                            <form action="/daftaruser/{{$p->id}}" method="POST">
                                                                @csrf
                                                                @method('patch')
                                                                <div class="form-group mb-4">
                                                                    <label for="nofaktur">Username</label>
                                                                    <input type="text" class="form-control" id="nofaktur" name="name" value="{{old('name',$p->name)}}">
                                                                </div>
                                                                <div class="form-group mb-4">
                                                                    <label for="pemasok">Email</label>
                                                                    <input type="email" class="form-control" id="pemasok" name="email" value="{{old('email',$p->email)}}">
                                                                </div>
                                                                <div class="form-group mb-4">
                                                                    <label for="total">Nama Usaha</label>
                                                                    <input type="text" class="form-control" id="total" name="namausaha" value="{{old('namausaha',$p->namausaha)}}">
                                                                </div>
                                                                <div class="form-group mb-4">
                                                                    <label for="total">Jenis Usaha</label>
                                                                    <input type="text" class="form-control" id="total" name="jenisusaha" value="{{old('jenisusaha',$p->jenisusaha)}}">
                                                                </div>
                                                                <div class="form-group mb-4">
                                                                    <label for="total">Alamat</label>
                                                                    <input type="text" class="form-control" id="total" name="lokasi" value="{{old('lokasi',$p->lokasi)}}">
                                                                </div>
                                                                <div class="form-group mb-4">
                                                                    <label for="total">Lama Operasi</label>
                                                                    <input type="text" class="form-control" id="total" name="lamaoperasi" value="{{old('lamaoperasi',$p->lamaoperasi)}}">
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                                    <button type="submit" class="btn btn-success">Simpan Data</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <form action="/daftaruser/{{$p->id}}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="bg-transparent">
                                                    <a href=""><img src="{{ asset('trash.gif') }}" alt="logo-hapus"></a>
                                                </button>
                                            </form>
                                        </td>
                                    </div>
                                </tr>
                                @endforeach
                                <!-- Tambahkan baris-baris lain sesuai dengan data yang Anda miliki -->
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- content pagenation -->
                <nav aria-label="Page navigation" class="me-3">
                    <ul class="pagination">
                        <li class="page-item ms-auto mb-3">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link text-dark" href="#">1</a></li>
                        <li class="page-item"><a class="page-link text-dark" href="#">2</a></li>
                        <li class="page-item"><a class="page-link text-dark" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
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