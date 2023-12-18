<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <!-- Roboto -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <!-- Quicksand -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
  <!-- Inter -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;300;500;600;700;800&family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
  <!-- Coustard -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Coustard&family=Roboto&display=swap" rel="stylesheet" />
  <!-- MDB -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- CSS -->
  <link rel="stylesheet" href="{{ asset('css/riwayat/style.css') }}" />
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css" />
  <title>Riwayat | PetraEats</title>
  <link rel="icon" type="image/x-icon" href="/assets/home/logoPetraEats.png">
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid row">
      <div class="col-sm-2 col-12 d-flex justify-content-sm-start justify-content-center" id="navbarSupportedContent">
        <img src="{{ asset('assets/logoPetraEats/logoPetraEats.png') }}" height="15" alt="MDB Logo" loading="lazy" />
        <span id="petra-eats">
          <a class="nav-link" href="/">PetraEats</a>
        </span>
      </div>
      <div class="col-sm-10 col-12 d-flex justify-content-sm-end justify-content-center">
        <h5 class="me-sm-5 mt-2">{{ auth()->user()->nama }}</h5>
      </div>
    </div>
  </nav>
  <!-- Navbar -->

  <!-- Direction -->
  <section>
    <div class="container-fluid">
      <div class="row">
        <div class="col-6 ms-5">
          <div class="row d-flex justify-content-start custom-margin">
            <a class=" col-lg-2 col-md-3 col-sm-4 before" href="/">Home<span class="ms-3">></span></a>
            <div class=" col-sm-8 current ms-lg-1">Riwayat Pesanan</div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Direction -->

  <!-- History-->
  <section class="ms-5 me-5">
    <div class="row row justify-content-between mb-3">
      <div class="col-md-4 col-6 align-items-center d-flex">
        <h5 class="ms-3">Riwayat Pesanan</h5>
      </div>
      <div class="col-md-7 col-5 d-flex justify-content-end me-3" style="border: 1px">
        <button onclick="toPesanan()" type="button" class="btn btn-primary fw-bold">Back</button>
      </div>
    </div>

    @if(auth()->user()->status_user == 1)
    <!-- Tampilan Untuk Mahasiswa -->
    @foreach($orders as $order)
    <!-- Card -->
    <div class="container-fluid mt-2">
      <div class="row custom-box">
        <table class="table table-hover">
          <tbody class="t-body border-bottom border-white">
            <tr>
              <td class="col-5 col-sm-2">
                <div class="kantin">
                  <img src="{{ asset('assets/kantin/toko/'. $order->picture) }}" class="rounded-circle" style="width: 60px; height: 60px" />
                </div>
              </td>
              <td class="col-12 col-sm-2">
                <div class="nama-kantin">{{ $order->nama_toko }}</div>
              </td>
              <td class="col-12 col-sm-4">
                <div class="tanggal">{{ $order->tanggal }}</div>
              </td>

              <td class="col-12 col-sm-2">
                <div class="harga">Rp {{ $order->nominal }}</div>
              </td>
              <td class="col-12 col-sm-2 mb-5">
                <div class="align-items-center status">
                <span id="status" class="col-md-2 col-12 text-center fw-bold rounded-pill custom-status-{{ $order->status_pesanan }} p-1 me-4">
                  @if($order->status_pesanan == 0) Ditolak @endif
                  @if($order->status_pesanan == 1) Pesan @endif
                  @if($order->status_pesanan == 2) Proses @endif
                  @if($order->status_pesanan == 3) Selesai @endif
                </span>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <!-- End Card -->
    @endforeach
    <!-- End Tampilan Untuk Mahasiswa -->
    @endif

    @if(auth()->user()->status_user == 2)
    <!-- Tampilan Untuk Mahasiswa -->
    @foreach($customers as $customer)
    <!-- Card -->
    <div class="container-fluid mt-2">
      <div class="row custom-box">
        <table class="table table-hover">
          <tbody class="t-body border-bottom border-white">
            <tr>
              <td class="col-5 col-sm-2">
                <div class="kantin">
                  <img src="{{ asset('assets/mahasiswa/profile/'. $customer->picture) }}" class="rounded-circle" style="width: 60px; height:  60px" />
                </div>
              </td>
              <td class="col-12 col-sm-2">
                <div class="nama-kantin">{{ $customer->nama }}</div>
              </td>
              <td class="col-12 col-sm-4">
                <div class="tanggal"> {{ $customer->tanggal }} </div>
              </td>

              <td class="col-12 col-sm-2">
                <div class="harga">Rp {{ $customer->nominal }} </div>
              </td>
              <td class="col-12 col-sm-2 mb-5">
                <div class="align-items-center status">
                <span id="status" class="badge rounded-pill  mb-3  custom-status-{{ $customer->status_pesanan }}">
                  @if($customer->status_pesanan == 0) Ditolak @endif
                  @if($customer->status_pesanan == 1) Pesan @endif
                  @if($customer->status_pesanan == 2) Proses @endif
                  @if($customer->status_pesanan == 3) Selesai @endif
                  </span>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <!-- End Card -->
    @endforeach
    <!-- End Tampilan Untuk Mahasiswa -->
    @endif


  </section>

  <!-- Script -->
  <script src="{{ asset('js/riwayat/script.js') }} "></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>