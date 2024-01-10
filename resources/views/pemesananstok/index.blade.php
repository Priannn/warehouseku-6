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
                <p class="ms-3 mt-3">Dashboard / Pemesanan Stok</p>
                @include('partials.navbar')
            </div>
            <div class="main-cf bg-white rounded-4">
                <div class="container rounded d-flex">
                    <h5 class="fw-bold ms-2 mt-4">Daftar Pemesanan Stok</h5>
                    <!-- Button trigger modal -->
                    <button type="button" data-bs-toggle="modal" data-bs-target="#tambahsupplier" class="ms-auto btnadd mt-4">
                        <i class="ri-add-line"></i> Tambah Pemesanan Stok
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="tambahsupplier" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Pemesanan</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h2>Form Tambah Pemesanan</h2>
                                    <form action="/pemesananstok/create" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group mb-4">
                                            <label for="total">Gambar</label>
                                            <input type="file" class="form-control" id="photo" name="photo">
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="nama">Produk</label>
                                            <select name="stock_id" id="" class="form-control">
                                                <option disabled value></option>
                                                @foreach(auth()->user()->stock as $stock)
                                                <option value="{{ $stock->id }}"> {{ $stock->produk }} </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="total">Tanggal</label>
                                            <input type="date" class="form-control" id="total" name="tanggal">
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="total">jumlah</label>
                                            <input type="number" class="form-control" id="total" name="jumlah">
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
                    <form action="{{route('pemesanan',['userId'=>$user->id])}}" method="get">
                        @csrf
                        <input class="form-control me-2 w-100 mt-5 rounded-3" value="{{old('search')}}" type="search" name="search" placeholder="&#128269; Search" aria-label="Search">
                    </form>
                </div>
                <div class="container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="fw">No Pemesanan</th>
            
                                <th class="fw">Produk</th>
                                <th class="fw">Status</th>
                                <th class="fw">Jumlah</th>
                                <th class="fw">Gambar</th>
                                <th class="fw">Total Harga</th>
                                <th colspan="3"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($paginatedPemesanan as $pemesanan)
                            @if($pemesanan->pembayaran($pemesanan->id))
                            @else
                            <tr>
                                <?php
                                $totalharga = $pemesanan->jumlah;
                                ?>
                                <td class="fw-bolder" style="font-size: 15px;">{{ $pemesanan->id }}</td>
                                <td class="fw-bolder" style="font-size: 15px;"><img src="{{asset('gambarproduk/')}}" alt="" class="img-thumbnail border-success ms-2" style="width: 70px; height: 70px;"></td>
                                <td class="fw-bolder" style="font-size: 15px;">
                                    @if($pemesanan->stocks)
                                    {{ $pemesanan->stocks->produk }}
                                    @endif
                                </td>
                                <td class="fw-bolder" style="font-size: 15px;">{{ $pemesanan->status }} </td>
                                <td class="fw-bolder" style="font-size: 15px;">{{ $pemesanan->jumlah }} </td>
                                <td>
                                    <img src="{{asset('storage/' .$pemesanan->photo)}}" alt="">
                                </td>
                                <td class="fw-bolder" style="font-size: 15px;">{{ number_format($totalharga) }} </td>
                                <td>
                                    <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal-{{$pemesanan->id}}"><img src="{{ asset('view.gif') }}" alt=""></i></a>
                                    <div class="modal fade" id="exampleModal-{{$pemesanan->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="text-align:left;">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Detail Pemesanan</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <ul class="list-group">
                                                        <li class="list-group-item  bg-success text-light" aria-current="true">{{ $pemesanan }} </li>
                                                        <li class="list-group-item">No Pemesanan : {{ $pemesanan->id }} </li>
                                                        <li class="list-group-item">Tanggal : {{ $pemesanan->tanggal }} </li>
                                                        <li class="list-group-item">Status : {{ $pemesanan->status }} </li>
                                                        <li class="list-group-item">Supplier : {{ $pemesanan }} </li>
                                                        <li class="list-group-item">Jumlah : {{ $pemesanan->jumlah }} </li>
                                                        <li class="list-group-item">Total Harga : {{ number_format($totalharga) }} </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td style="text-align: left;">
                                    <a href="#editpemesanan" type="button" data-bs-toggle="modal" data-bs-target="#editpemesanan-{{ $pemesanan->id }}"><img src="{{ asset('edit.gif') }}" alt=""></a>
                                    <div class="modal fade" id="editpemesanan-{{ $pemesanan->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Pemesanan</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <h2>Form Edit Pemesanan</h2>
                                                    <form action="/pemesananstok/{{$pemesanan->id}}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('patch')
                                                        <div class="form-group mb-4">
                                                            <label for="nama">Produk</label>
                                                            <input type="text" class="form-control" id="status" value="{{ old('stock_id',$pemesanan) }} " disabled>
                                                        </div>
                                                        <div class="form-group mb-4">
                                                            <label for="total">Jumlah</label>
                                                            <input type="number" class="form-control" id="total" name="jumlah" value="{{ old('jumlah',$pemesanan->jumlah)}}">
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
                                    <form action="{{ route('deletePemesanan', $pemesanan->id) }}" method="post" id="deleteForm{{$pemesanan->id}}">
                                        @csrf
                                        @method('delete')
                                        <a href="#" class="delete-btn" data-id="{{ $pemesanan->id }}">
                                            <img src="{{ asset('trash.gif') }}" alt="Delete" class="delete-icon">
                                        </a>
                                    </form>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                            <!-- Tambahkan baris-baris lain sesuai dengan data yang Anda miliki -->
                        </tbody>
                    </table>
                </div>


                <!-- content pagenation -->
                <div class="pagination justify-content-end me-2" style="position: relative; z-index:0;">
                    {{ $paginatedPemesanan->links() }}
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