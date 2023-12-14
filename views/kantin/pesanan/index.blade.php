<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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

  <link href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- CSS -->
  <link rel="stylesheet" href="{{ asset('css/kantin/pesanan/style.css') }}" />
  <title>Pesanan || Kantin</title>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid row">
      <div class="col-sm-2 col-12 d-flex justify-content-sm-start justify-content-center" id="navbarSupportedContent">
        <img src="{{ asset('assets/kantin/pesanan/logoPetraEats.png') }}" height="15" alt="MDB Logo" loading="lazy" />
        <span id="petra-eats"><a class="nav-link" href="#">PetraEats</a></span>
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
            <a class=" col-lg-2 col-md-3 col-sm-4 before" href="#">Home<span class="ms-3">></span></a>
            <div class=" col-sm-8 current ms-lg-1">Riwayat Pesanan</div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Direction -->

  <!-- Dalam Proses-->
  <section>
    <div class="container-fluid">
      <div class="row justify-content-between">
        <div class="col-md-4 col-6 align-items-center d-flex">
          <h5 class="ms-5">Pesanan</h5>
        </div>
        <div class="col-md-7 col-5 d-flex justify-content-end me-3">
          <button type="button" class="btn btn-warning fw-bold">Riwayat</button>
        </div>
      </div>
      <div class="row custom-box">

        @foreach($customers as $customer)
        <!-- Card -->
        <div class="col-xl-6 mb-4">
          <div class="card">
            <div class="card-body" data-bs-toggle="modal" data-bs-target="#dynamicModal" data-content="{{ $customer->order_id }}">
              <div class="row d-flex justify-content-between align-items-center">
                <div class="col-12 col-md-6 d-flex align-items-center">
                  <img src="https://mdbootstrap.com/img/new/avatars/8.jpg" alt="" style="width: 45px; height: 45px" class="rounded-circle" />
                  <div class="ms-3">

                    <!-- Nama Customer -->
                    <p class="fw-bold mb-1">{{ $customer->nama }}</p>
                    <!-- ID Order -->
                    <p id="email" class="text-muted mb-1">Nomor Transaksi : {{ $customer->order_id }}</p>
                  </div>
                </div>
                <span id="status" class="col-md-2 col-12 text-center fw-bold rounded-pill custom-request p-1 me-4"> Pesanan </span>
              </div>
            </div>
            <div class="card-footer p-2 d-flex justify-content-end">
              <button id="terima" class="btn btn-success m-0" type="button" data-ripple-color="primary">Terima <i class="fas fa-check"></i></button>
              <button id="tolak" class="btn btn-danger ms-3" type="button" data-ripple-color="primary">Tolak <i class="fas fa-times"></i></button>
            </div>
          </div>

        </div>
        <!-- End Card -->
        @endforeach

      </div>
    </div>
  </section>

  <!-- Modal -->
  <div class="modal fade" id="dynamicModal" tabindex="-1" aria-labelledby="dynamicModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="dynamicModalLabel">Nomor Transaksi :</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="dynamicModalContent">
          <!-- Isi -->
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama Pesanan</th>
                <th scope="col">Jumlah</th>
              </tr>
            </thead>
            <tbody id="data-pesanan">

            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

  <!-- End Modal -->
  <!-- End Dalam Proses -->

  <!-- Script -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <script src=" {{ asset('js/kantin/pesanan/script.js') }} "> </script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>