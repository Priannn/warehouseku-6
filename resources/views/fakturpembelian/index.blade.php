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
                <p class="ms-3 mt-3">Dashboard / Faktur Pembelian</p>
                @include('partials.navbar')
            </div>
            <div class="main-cf bg-white rounded-4">
                <div class="container rounded d-flex">
                    <h5 class="fw-bold ms-2 mt-4">Daftar Faktur Pembelian</h5>
                    <!-- Button trigger modal -->
                    <button type="button" data-bs-toggle="modal" data-bs-target="#tambahfaktur" class="ms-auto btnadd mt-4">
                        <i class="ri-add-line"></i> Tambah Faktur
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="tambahfaktur" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Faktur</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h2>Form Tambah Faktur</h2>
                                    <form action="/fakturpembelian/create" method="POST">
                                        @csrf
                                        <div class="form-group mb-4">
                                            <label for="idp">No Pemesanan</label>
                                            <input type="text" class="form-control" id="idp" name="pemesananstok_id">
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="idp">Tanggal</label>
                                            <input type="date" class="form-control" id="idp" name="tanggal">
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
                    <form action="/dashboard/fakturpembelian" method="get">
                        @csrf
                        <input class="form-control me-2 w-100 mt-5 rounded-3" name="search" type="search" placeholder="&#128269; Search" aria-label="Search">
                    </form>
                </div>
                <div class="container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="fw">Nomor Faktur</th>
                                <th class="fw">No Pemesanan</th>
                                <th class="fw">Tanggal</th>
                                <th class="fw">Status</th>
                                <th colspan="2"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(auth()->user()->fakturpembelian as $faktur)
                            @if($faktur->pembayaran($faktur->id))
                            @else
                            <tr>
                                <td class="fw-bolder" style="font-size: 15px;">{{ $faktur->id }} </td>
                                <td class="fw-bolder" style="font-size: 15px;">{{ $faktur->pemesananstok_id }}</td>
                                <td class="fw-bolder" style="font-size: 15px;">{{ $faktur->tanggal }} </td>
                                <td class="fw-bolder" style="font-size: 15px;">{{ $faktur->status }} </td>
                                <td class="fw-bolder" style="font-size: 15px;"> </td>
                                <td style="text-align: left;">
                                    <a href="#editfaktur" type="button" data-bs-toggle="modal" data-bs-target="#editfaktur-{{$faktur->id}}"><img src="{{ asset('edit.gif') }}" alt=""></a>
                                    <div class="modal fade" id="editfaktur-{{$faktur->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Faktur</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <h2>Form Edit Faktur</h2>
                                                    <form action="/fakturpembelian/{{ $faktur->id }}" method="POST">
                                                        @csrf
                                                        @method('patch')
                                                        <div class="form-group mb-4">
                                                            <label for="idp">Tanggal</label>
                                                            <input type="date" class="form-control" id="idp" value="{{old('tanggal',$faktur->tanggal)}}" disabled>
                                                        </div>
                                                        <div class="form-group mb-4 ms-auto">
                                                            <label for="tanggalkeluar">Status</label>
                                                            <select name="status" id="" class="form-control">
                                                                <option value="Menunggu">Menunggu</option>
                                                                <option value="Selesai">Selesai</option>
                                                            </select>
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
                                    <form action="{{ route('deletePembelian', $p->id) }}" method="post" id="deleteForm{{$p->id}}">
                                        @csrf
                                        @method('delete')
                                        <a href="#" class="delete-btn" data-id="{{ $p->id }}">
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