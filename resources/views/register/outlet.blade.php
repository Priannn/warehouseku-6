<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="asset/css/outlet.css">
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
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
    <form action="/register/outlet" method="POST">
        @csrf
        <input type="hidden" value="{{old('name',$name)}}" name="name">
        <input type="hidden" value="{{old('email',$email)}}" name="email">
        <input type="hidden" value="{{old('password',$password)}}" name="password">
        <div class="d-flex align-items-center m-4">
            <img class="img" src="logo2.svg" alt="" srcset="">
            <a href="#" class="sidebar-logo fw-bold text-decoration-none text-white">Warehouseku</a>
        </div>

        <div class="mt-4 rounded-3 container-sm bg-white justify-content-center w-50 mb-5">
            <div class="row">
                <h3 class="mb-4 mt-4 ms-3">Informasi Bisnis</h3>
                <div class="col-md-5 ms-5">
                    <label for="field1" class="mt-3 mb-3 fw-normal @error('namausaha') is-invalid @enderror ">Nama Usaha</label>
                    <input type="text" id="field1" name="nama_usaha" placeholder="Masukan nama usaha anda" class="form-control">
                </div>
                <div class="col-md-5 ms-5">
                    <label for="field2" class="mt-3 mb-3 @error('lokasi') is-invalid @enderror ">Lokasi Usaha</label>
                    <input type="text" id="field2" name="lokasi_usaha" placeholder="Masukan kota anda" class="form-control">
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-5 ms-5">
                    <label for="field1" class=" mb-3 fw-normal @error('jenisusaha') is-invalid @enderror ">Jenis Usaha</label>
                    <input type="text" id="field1" name="jenis_usaha" placeholder="Masukan jenis usaha anda" class="form-control">
                </div>
                <div class="col-md-5 ms-5">
                    <label for="field2" class=" mb-3 @error('lamaoperasi') is-invalid @enderror ">Lama Beroprasi</label>
                    <input type="text" id="field2" name="lama_operasi" placeholder="3 - 6 Bulan" class="form-control">
                </div>
            </div>
            <div class="d-flex justify-content-center mt-5">
                <button type="submit" class="btng mt-3 mb-3 w-25">Simpan</button>
            </div>

        </div>
    </form>
    <div class="footer">
        <p>Copyright&copy; warehouseku 2023 </p>
    </div>
</body>

</html>