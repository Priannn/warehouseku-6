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
                <p class="ms-3 mt-3">Dashboard / Stok</p>
                <div class="nav-right">
                    @include('partials.navbar')
                </div>
            </div>
            <div class="main-cf bg-white rounded-4">
                <div class="container rounded d-flex">
                    <h5 class="fw-bold ms-2 mt-4">Daftar Stok</h5>
                    <!-- Button trigger modal -->
                    <button type="button" data-bs-toggle="modal" data-bs-target="#tambahstok" class="ms-auto btnadd mt-4">
                        <i class="ri-add-line"></i> Tambah Stok
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="tambahstok" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Produk</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h2>Form Tambah Stok</h2>
                                    <form action="/daftarstok/create" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group mb-4">
                                            <label for="nama">Produk</label>
                                            <input type="text" class="form-control" id="nama" name="produk">
                                        </div>
                                        <div class="d-flex">
                                            <div class="form-group mb-4">
                                                <label for="tanggalmasuk">Tanggal Masuk</label>
                                                <input type="date" class="form-control" id="tanggalmasuk" name="tanggal_masuk">
                                            </div>
                                            <div class="form-group mb-4 ms-auto">
                                                <label for="tanggalkeluar">Tanggal keluar</label>
                                                <input type="date" class="form-control" id="tanggalkeluar" name="tanggal_keluar">
                                            </div>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="pemasok">Pemasok</label>
                                            <select name="supplier_id" class="form-control">
                                                @foreach(auth()->user()->supplier as $s)
                                                <option value="{{ $s->id }}"> {{ $s->supplier }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="total">Jumlah</label>
                                            <input type="number" class="form-control" id="total" name="jumlah">
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="status">Satuan</label>
                                            <input type="text" class="form-control" id="status" name="satuan">
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="status">Harga Produk</label>
                                            <input type="number" class="form-control" id="status" name="harga">
                                        </div>
                                        <div class="form-group">
                                            <label for="gambar">Gambar Produk</label>
                                            <input type="file" class="form-control" id="gambar" name="gambar">
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
                    <form action="{{route('daftarstok',['userId'=>$user->id])}}" method="get">
                        <input class="form-control me-2 w-100 mt-5 rounded-3" type="text" name="search" placeholder="&#128269; Cari produk.." aria-label="Search" value="{{request('search')}}">
                    </form>
                </div>
                <div class="container mb-5">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="fw">Gambar</th>
                                <th class="fw">Kode Produk</th>
                                <th class="fw">Produk</th>
                                <th class="fw">Jumlah</th>
                                <th class="fw">Satuan</th>
                                <th colspan="2"></th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($paginatedStock as $p)
                            <tr>
                                <td><img src="{{ asset('gambarproduk/'.$p->gambar) }}" alt="Produk 2" class="img-thumbnail border-success ms-2" style="width: 70px; height: 70px;"></td>
                                <td class="fw-bolder" style="font-size: 15px;"> {{ $p->id }} </td>
                                <td class="fw-bolder" style="font-size: 15px;"> {{ $p->produk }} </td>
                                <td class="fw-bolder" style="font-size: 15px;"> {{ $p->jumlah }} </td>
                                <td class="fw-bolder" style="font-size: 15px;"> {{ $p->satuan }} </td>
                                <td>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal-{{$p->id}}"><img src="{{ asset('view.gif') }}" alt=""></i></a>
                                    <div class="modal fade" id="exampleModal-{{$p->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="text-align:left;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Produk</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <ul class="list-group">
                                                        <li class="list-group-item  bg-success text-light" aria-current="true">{{ $p->produk }} </li>
                                                        <li class="list-group-item">Kode Produk : {{ $p->id }} </li>
                                                        <li class="list-group-item">Tanggal Masuk : {{ $p->tanggal_masuk }} </li>
                                                        <li class="list-group-item">Tanggal Keluar : {{ $p->tanggal_keluar }} </li>
                                                        <li class="list-group-item">Supplier : {{ $p->supplier->supplier }} </li>
                                                        <li class="list-group-item">Jumlah : {{ $p->jumlah }} </li>
                                                        <li class="list-group-item">Satuan : {{ $p->satuan }} </li>
                                                        <li class="list-group-item">Harga Produk : {{ number_format($p->harga) }} </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <a href="#editstok" type="button" data-bs-toggle="modal" id="delete" data-bs-target="#editstok-{{ $p->id}}"><img src="{{ asset('edit.gif')  }}" alt=""></a>
                                    <div class="modal fade" id="editstok-{{$p->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="text-align:left;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Stok</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <h2>Form Edit Stok</h2>
                                                    <form action="/daftarstok/{{ $p->id }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('patch')
                                                        <div class="form-group mb-4">
                                                            <label for="nama">Produk</label>
                                                            <input type="text" class="form-control" id="nama" name="produk" value="{{ old('produk',$p->produk) }} ">
                                                        </div>
                                                        <div class="d-flex">
                                                            <div class="form-group mb-4">
                                                                <label for="tanggalmasuk">Tanggal Masuk</label>
                                                                <input type="date" class="form-control" name="tanggal_masuk" value="{{ old('tanggal_masuk',$p->tanggal_masuk) }}">
                                                            </div>
                                                            <div class="form-group mb-4 ms-auto">
                                                                <label for="tanggalkeluar">Tanggal keluar</label>
                                                                <input type="date" class="form-control" name="tanggal_keluar" value="{{ old('tanggal_keluar',$p->tanggal_keluar) }}">
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-4">
                                                            <label for="total">Jumlah</label>
                                                            <input type="number" class="form-control" id="total" name="jumlah" value="{{ old('jumlah',$p->jumlah) }}">
                                                        </div>
                                                        <div class="form-group mb-4">
                                                            <label for="status">Satuan</label>
                                                            <input type="text" class="form-control" id="status" name="satuan" value="{{old('satuan',$p->satuan)}}">
                                                        </div>
                                                        <div class="form-group mb-4">
                                                            <label for="status">Harga</label>
                                                            <input type="number" class="form-control" id="status" name="harga" value="{{old('harga',$p->harga) }}">
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
                                    <form action="{{ route('deleteStok', $p->id) }}" method="post" id="deleteForm{{$p->id}}">
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



                    <!-- content pagenation -->
                    <div class="pagination justify-content-end me-2" style="position: relative; z-index:0;">
                        {{ $paginatedStock->links() }}
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
    <script src="{{ asset('vendor/sweetalert/sweetalert.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
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
    </script>
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