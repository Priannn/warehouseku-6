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
        <div class="right mb-5">
            <div class="navbar d-flex">
                <p class="ms-3 mt-3">Dashboard / Supplier</p>
                @include('partials.navbar')
            </div>
            <div class="main-cf bg-white rounded-4">
                <div class="container rounded d-flex">
                    <h5 class="fw-bold ms-2 mt-4">Daftar Supplier</h5>
                    <!-- Button trigger modal -->
                    <button type="button" data-bs-toggle="modal" data-bs-target="#tambahsupplier" class="ms-auto btnadd mt-4">
                        <i class="ri-add-line"></i> Tambah Supplier
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="tambahsupplier" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Supplier</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h2>Form Tambah Supplier</h2>
                                    <form action="/daftarsupplier/create" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group mb-4">
                                            <label for="nama">Nama Supplier</label>
                                            <input type="text" class="form-control" id="nama" name="supplier">
                                        </div>
                                        <div class="d-flex">
                                            <div class="form-group mb-4">
                                                <label for="tanggalmasuk">Email</label>
                                                <input type="email" class="form-control" id="tanggalmasuk" name="email">
                                            </div>
                                            <div class="form-group mb-4 ms-auto">
                                                <label for="tanggalkeluar">Telepon</label>
                                                <input type="number" class="form-control" id="tanggalkeluar" name="no_telp">
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="total">Alamat</label>
                                            <input type="text" class="form-control" id="total" name="alamat">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                            <!-- button untuk submit add data -->
                                            <button type="submit" class="btn btn-success">Tambah Data</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="search ms-3 mb-2">
                    <form action="/dashboard/daftarsupplier" method="get">
                        @csrf
                        <input class="form-control me-2 w-100 mt-5 rounded-3" type="search" placeholder="&#128269; Search" aria-label="Search" name="search">
                    </form>
                </div>
                @if(session('message'))
                <div class="alert alert-success d-flex align-items-center mx-3" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                        <use xlink:href="#check-circle-fill" />
                    </svg>
                    <div>
                        {{ session('message') }}
                    </div>
                </div>
                @endif
                @if(session('error'))
                <div class="alert alert-danger d-flex align-items-center mx-3" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                        <use xlink:href="#check-circle-fill" />
                    </svg>
                    <div>
                        {{ session('error') }}
                    </div>
                </div>
                @endif
                <div class="container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="fw">Id Supplier</th>
                                <th class="fw">Supplier</th>
                                <th class="fw">Email</th>
                                <th class="fw">Telepon</th>
                                <th class="fw">Alamat</th>
                                <th colspan="2"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($paginated as $p)
                            <tr>
                                <td class="fw-bolder" style="font-size: 15px;"> {{ $p->id }} </td>
                                <td class="fw-bolder" style="font-size: 15px;"> {{ $p->supplier }} </td>
                                <td class="fw-bolder" style="font-size: 15px;"> {{ $p->email }} </td>
                                <td class="fw-bolder" style="font-size: 15px;"> {{ $p->no_telp }} </td>
                                <td class="fw-bolder" style="font-size: 15px;"> {{ $p->alamat }} </td>
                                <td style="text-align: left;">
                                    <a href="#editsupplier" type="button" data-bs-toggle="modal" data-bs-target="#editsupplier-{{ $p->id }}"><img src="{{ asset('edit.gif') }}" alt=""></a>
                                    <div class="modal fade" id="editsupplier-{{ $p->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Supplier</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <h2>Form Edit Supplier</h2>
                                                    <form action="/daftarsupplier/{{$p->id}}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('patch')
                                                        <div class="form-group mb-4">
                                                            <label for="nama">Pemasok</label>
                                                            <input type="text" class="form-control" id="nama" name="supplier" value="{{old('supplier', $p->supplier)}}">
                                                        </div>
                                                        <div class="d-flex">
                                                            <div class="form-group mb-4">
                                                                <label for="tanggalmasuk">Email</label>
                                                                <input type="email" class="form-control" id="tanggalmasuk" name="email" value="{{old('email', $p->email)}}">
                                                            </div>
                                                            <div class="form-group mb-4 ms-auto">
                                                                <label for="tanggalkeluar">Telepon</label>
                                                                <input type="number" class="form-control" id="tanggalkeluar" name="no_telp" value="{{old('no_telp', $p->no_telp)}}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-4">
                                                            <label for="total">Alamat</label>
                                                            <input type="text" class="form-control" id="total" name="alamat" value="{{old('alamat', $p->alamat)}}">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                            <!-- button untuk submit add data -->
                                                            <button type="submit" class="btn btn-success">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <form action="{{ route('deleteSupplier', $p->id) }}" method="post" id="deleteForm{{$p->id}}">
                                        @csrf
                                        @method('delete')
                                        <a href="#" class="delete-btn" data-id="{{ $p->id }}">
                                            <img src="{{ asset('trash.gif') }}" alt="Delete" class="delete-icon">
                                        </a>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            <!-- Tambahkan baris-baris lain sesuai dengan data yang Anda miliki -->
                        </tbody>
                    </table>
                </div>


                <!-- content pagenation -->
                <div class="pagination justify-content-end me-3" style="z-index: 0;position:relative;">
                    {{ $paginated->links() }}
                </div>
            </div>
            <!-- end content pagenation -->
        </div>
    </div>
    </div>


    <!-- start: JS -->
    @include('sweetalert::alert')
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.delete-btn').on('click', function(e) {
                e.preventDefault();

                var id = $(this).data('id');

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: 'Anda tidak dapat mengembalikan tindakan ini!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#b2b2b2',
                    confirmButtonText: 'Ya, hapus!',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('#deleteForm' + id).submit();
                    }
                });
            });
        });
    </script>
    <!-- end: Sidebar -->
</body>

</html>