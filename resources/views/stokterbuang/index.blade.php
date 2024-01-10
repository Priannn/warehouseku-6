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
            <div class="navbar">
                <p class="ms-3 mt-3">Dashboard / Stok Terbuang</p>
                @include('partials.navbar')
            </div>
            <div class="main-cf bg-white rounded-4">
                <div class="container rounded d-flex">
                    <h5 class="fw-bold ms-2 mt-4">Daftar Stok Terbuang</h5>
                    <!-- Button trigger modal -->
                    <button type="button" data-bs-toggle="modal" data-bs-target="#tambahstok" class="ms-auto btnadd mt-4">
                        <i class="ri-add-line"></i> Tambah Stok Terbuang
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="tambahstok" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Stok Terbuang</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h2>Form Stok Terbuang</h2>
                                    <form action="/stokterbuang/create" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group mb-4">
                                            <label for="idp">Tanggal</label>
                                            <input type="date" class="form-control" id="idp" name="tanggal">
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="nama">Produk</label>
                                            <select name="stock_id" class="form-control">
                                                @foreach($produks as $produk)
                                                <option value="{{ $produk->id }}">{{ $produk->produk }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="d-flex">
                                            <div class="form-group mb-4">
                                                <label for="tanggalmasuk">Jumlah</label>
                                                <input type="number" class="form-control" id="tanggalmasuk" name="jumlah">
                                            </div>
                                            <div class="form-group mb-4 ms-auto">
                                                <label for="tanggalkeluar">Jumlah Kerugian</label>
                                                <input type="number" class="form-control" id="tanggalkeluar" name="jumlahkerugian">
                                            </div>
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
                    <form action="/dashboard/stokterbuang" method="get">
                        @csrf
                        <input class="form-control me-2 w-100 mt-5 rounded-3" type="search" name="search" placeholder="&#128269; Search" aria-label="Search">
                    </form>
                </div>
                <div class="container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="fw">Tanggal</th>
                                <th class="fw">Kode Produk</th>
                                <th class="fw">Produk</th>
                                <th class="fw">Jumlah</th>
                                <th class="fw">Jumlah Kerugian</th>
                                <th colspan="2"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($paginated as $p)
                            <tr>
                                <td class="fw-bolder" style="font-size: 15px;"> {{ $p->tanggal }} </td>
                                <td class="fw-bolder" style="font-size: 15px;"> {{ $p->stock->id }} </td>
                                <td class="fw-bolder" style="font-size: 15px;">{{ $p->stock->produk }}</td>
                                <td class="fw-bolder" style="font-size: 15px;"> {{ $p->jumlah }} </td>
                                <td class="fw-bolder" style="font-size: 15px;">{{ $p->jumlahkerugian }} </td>
                                <td style="text-align: left;">
                                    <a href="#editstok" type="button" data-bs-toggle="modal" data-bs-target="#editstok-{{$p->id}}"><img src="{{ asset('edit.gif') }}" alt=""></a>
                                    <div class="modal fade" id="editstok-{{$p->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Stok Terbuang</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <h2>Form Edit Terbuang</h2>
                                                    <form action="/stokterbuang/{{$p->id}}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('patch')
                                                        <div class="form-group mb-4">
                                                            <label for="idp">Tanggal</label>
                                                            <input type="date" class="form-control" id="idp" name="tanggal" value="{{old('tanggal',$p->tanggal)}}">
                                                        </div>
                                                        <div class="form-group mb-4">
                                                            <label for="idp">Kode Produk</label>
                                                            <input type="number" class="form-control" id="tanggalmasuk" name="kodeproduk" value="{{old('kodeproduk',$p->kodeproduk)}}">
                                                        </div>
                                                        <div class="form-group mb-4">
                                                            <label for="nama">Produk</label>
                                                            <select name="produk_id" class="form-control">
                                                                @foreach($produks as $produk)
                                                                <option value="{{ $produk->id }}">{{ $produk->produk }} </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="d-flex">
                                                            <div class="form-group mb-4">
                                                                <label for="tanggalmasuk">Jumlah</label>
                                                                <input type="number" class="form-control" id="tanggalmasuk" name="jumlah" value="{{old('jumlah',$p->jumlah)}}">
                                                            </div>
                                                            <div class="form-group mb-4 ms-auto">
                                                                <label for="tanggalkeluar">Jumlah Kerugian</label>
                                                                <input type="number" class="form-control" id="tanggalkeluar" name="jumlahkerugian" value="{{old('jumlahkerugian',$p->jumlahkerugian)}}">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                                            <!-- button untuk submit add data -->
                                                            <button type="submit" class="btn btn-success">Simpan Data</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <form action="{{ route('deleteTerbuang', $p->id) }}" method="post" id="deleteForm{{$p->id}}">
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
                <div class="pagination justify-content-end me-2" style="position: relative; z-index:0;">
                    {{ $paginated->links() }}
                </div>
            </div>
            <!-- end content pagenation -->
        </div>
    </div>
    </div>

    @include('sweetalert::alert')
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