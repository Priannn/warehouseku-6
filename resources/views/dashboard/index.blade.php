<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Start icon -->
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

  <!-- End icon -->
  <!--Start CSS-->
  <link rel="stylesheet" href="{{ asset('asset/css/bootstrap.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}" />
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
        <p class="ms-3 mt-3">Dashboard / </p>
        @include('partials.navbar')
      </div>
      <div class="row mt-4 mx-3 ">
        <div class="col-4 ">
          <div class="card rounded-4 custom-card shadow " style="border: none;">
            <div class="d-flex p-3">
              <p class=" opacity-50">Daftar stok</p>
              <p class="ms-auto opacity-50">{{date('d/m/20y')}}</p>
            </div>
            <h4 class="fw-bold sales px-2 mb-4 mx-2">
              {{ auth()->user()->stock->count() }} <span class="text-success">Stok</span>
            </h4>
          </div>
        </div>
        <div class="col-4">
          <div class="card rounded-4 custom-card shadow" style="border: none;">
            <div class="d-flex p-3">
              <p class=" opacity-50">Pemesanan stok</p>
              <p class="ms-auto  opacity-50">{{date('d/m/20y')}}</p>
            </div>
            <h4 class="fw-bold sales px-2 mb-4 mx-2">
              {{ auth()->user()->pemesananstok->count() }} <span class="text-success">Pemesanan</span>
            </h4>
          </div>
        </div>
        <div class="col-4">
          <div class="card rounded-4 custom-card shadow" style="border: none;">
            <div class="d-flex p-3">
              <p class=" opacity-50">Stok Terbuang</p>
              <p class="ms-auto  opacity-50">{{date('d/m/20y')}}</p>
            </div>
            <h4 class="fw-bold sales px-2 mb-4 mx-2">
              {{ auth()->user()->stokterbuang->count() }} <span class="text-success">Stok</span>
            </h4>
          </div>
        </div>
      </div>
      <!-- chart -->
      <div class="row mt-5">
        <div class="">
          <div class="main-cf bg-white rounded-4">
            <div class="container">
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th class="fw">No. Pembayaran</th>
                      <th class="fw">No. Pembelian</th>
                      <th class="fw">Jenis Pembayaran</th>
                      <th class="fw">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($paginatedPembayaran as $pembayaran )
                    @if($pembayaran->status_pembayaran == 'Lunas')
                    <?php $pemesanan_id = $pembayaran->fakturpembelian_id; ?>
                    <tr>
                      <td class="fw-bolder">{{ $pembayaran->id }} </td>
                      <td class="fw-bolder">{{ $pemesanan_id }}</td>
                      <td class="fw-bolder">{{ $pembayaran->pembayaran }}</td>
                      <td class="fw-bolder">{{ $pembayaran->status }}</td>
                      <td class="fw-bolder">{{ $pembayaran->total }}</td>
                    </tr>
                    @endif
                    @endforeach
                    <!-- Tambahkan baris-baris lain sesuai dengan data yang Anda miliki -->
                  </tbody>
                </table>
                <!-- content pagenation -->
                <div class="pagination justify-content-end me-2" style="position: relative; z-index:0;">
                        {{ $paginatedPembayaran->links() }}
                    </div>
                <!-- end content pagenation -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- chart lese -->
      <div class="mt-4"></div>
      <div class="row">
        <div class="">
          <div class="main-cf bg-white rounded-4">
            <div class="container">
              <table class="table">
                <thead>
                  <tr>
                    <th class="fw">Gambar Produk</th>
                    <th class="fw">No Pemesanan</th>
                    <th class="fw">Produk</th>
                    <th class="fw">Tanggal</th>
                    <th class="fw">Pemasok</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($paginatedPemesanan as $pemesanan )
                  <tr>
                    <td class="fw-bolder">{{ $pemesanan->stock->produk }} </td>
                    <td class="fw-bolder">{{ $pemesanan->id }} </td>
                    <td class="fw-bolder">{{ $pemesanan->tanggal }} </td>
                    <td class="fw-bolder">{{ $pemesanan->id }} </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <!-- content pagenation -->
              <p class="ms-5 mt-3">Riwayat Pemesanan</p>
              <div class="pagination justify-content-end me-2" style="position: relative; z-index:0;">
                        {{ $paginatedPemesanan->links() }}
                    </div>
              <!-- end content pagenation -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script></script>
  <!-- start: JS -->
  <script src="{{ url('https://cdn.jsdelivr.net/npm/chart.js') }}"></script>
  <script src="{{ asset('asset/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('asset/js/jquery.min.js') }}"></script>
  <script src="{{ asset('asset/js/script.js') }}"></script>
  <script type="text/javascript" src="{{ url('https://www.gstatic.com/charts/loader.js') }}"></script>
  <script type="text/javascript">
    google.charts.load("current", {
      packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ["Task", "Hours per Day"],
        ["Roti", 2],
        ["Beras", 2],
        ["Chocoballs", 2],
        ["Susu", 10],
      ]);

      var options = {
        titleTextStyle: {
          fontSize: 10, // Ukuran teks judul
        },
        slices: {
          0: {
            color: "#4477CE"
          }, // Mengganti warna untuk "Geoverment"
          1: {
            color: "Black"
          }, // Mengganti warna untuk "Online shop"
          2: {
            color: "#313866"
          }, // Mengganti warna untuk "Referall"
          3: {
            color: "#79155B"
          }, // Mengganti warna untuk "Retail shop"
        },
      };
      var chart = new google.visualization.PieChart(
        document.getElementById("piechart_3d")
      );
      chart.draw(data, options);
    }
  </script>
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