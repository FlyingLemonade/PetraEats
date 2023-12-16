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
    <link rel="stylesheet" href="{{ asset('css/mahasiswa/notaPesanan/style.css') }}" />
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css" />
    <title>Nota || PetraEats</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid row">
            <div class="col-sm-2 col-12 d-flex justify-content-sm-start justify-content-center" id="navbarSupportedContent">
                <img src="{{ asset('assets/logoPetraEats/logoPetraEats.png') }}" height="15" alt="MDB Logo" loading="lazy" />
                <span id="petra-eats"><a class="nav-link" href="/">PetraEats</a></span>
            </div>
            <div class="col-sm-10 col-12 d-flex justify-content-sm-end justify-content-center">
                <h5 class="me-sm-5 mt-2"> {{ auth()->user()->nama }} </h5>
            </div>
        </div>
    </nav>
    <!-- Navbar -->

    <!-- Nota -->
    <section>
        <div class="nota container-fluid d-flex">
            <div class="custom-box mt-5">
                <div class="box-header">
                    <h5 class="card-title ms-sm-3 d-flex justify-content-sm-start justify-content-center">Ringkasan</h5>
                </div>
                <div class="card-body order-detail">
                    <table class="table table-hover">
                        <tbody class="t-body border-bottom border-dark-subtle">
                            <!-- Menu -->
                            @foreach($orders as $order)
                            <tr>
                                <td colspan="4">
                                    <div class="row" style="min-height: 9rem">
                                        <div class="pesanan col-lg-4 col-sm-5 col-12 d-flex justify-content-center align-items-center"><img src=" {{ asset($order['fotoMenu']) }}" class="img-fluid rounded fotoMenu" /></div>
                                        <div class="pesanan col-lg-4 col-sm-4 col-6 d-flex justify-content-sm-start justify-content-center align-items-center"> {{ $order['namaMenu'] }} </div>
                                        <div class="harga col-lg-4 col-sm-3 col-6 d-flex justify-content-center align-items-center"> {{ $order['harga'] }} </div>

                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            <!-- End Menu -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- Nota -->

    <!-- Footer -->
    <section>
        <footer class="foot text-center">
            <div class="row justify-content-center">
                <div class="foot-left col-sm-6 pt-3">
                    <p class="d-flex justify-content-center align-items-center">
                        <span class="" id="price-title">Total Harga<br />
                            <span class="harga"> {{ $totalHarga }}</span>
                        </span>
                    </p>
                </div>
                <div class="foot-right col-sm-6 pt-3 pe-5 mb-sm-0 mb-5">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#dynamicModal">
                        Bayar
                    </button>
                </div>
            </div>
        </footer>
    </section>
    <!-- Footer -->

    <!-- Modal -->
    <div class="modal fade" id="dynamicModal" tabindex="-1" aria-labelledby="dynamicModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="dynamicModalContent">
                    <!-- Isi -->


                    <div class="row">
                        <div class="col-12">
                            <img src="{{ asset('assets/kantin/qr'. $dataToko->qr_picture) }}">
                        </div>
                        <div class="col-12"></div>
                    </div>
                </div>
                <div class="modal-footer">

                    <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Script -->

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>