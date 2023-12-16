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
    <link href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" href="style.css" />
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css" />
    <title>Riwayat | PetraEats</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid row">
            <div class="col-sm-2 col-6 d-flex" id="navbarSupportedContent">
                <img src="assets/logoPetraEats.png" height="15" alt="MDB Logo" loading="lazy" />
                <span id="petra-eats"><a class="nav-link" href="#">PetraEats</a></span>
            </div>
            <div class="col-sm-10 col-6 d-flex justify-content-end">
                <h5 class="me-5 mt-2">Username</h5>
            </div>
        </div>
    </nav>
    <!-- Navbar -->

    <!-- Direction -->
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-12">
                    <ul class="d-flex justify-content-start custom-margin">
                        <li id="before">
                            <a href="#">Home<span class="ms-3 me-3">></span></a>
                        </li>
                        <li id="current">Riwayat Pesanan</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- End Direction -->

    <!-- History-->
    <section>
        <div class="row justify-content-between">
            <div class="col-md-4 col-6 align-items-center d-flex">
                <h5 class="custom-margin-left">Riwayat Pesanan</h5>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row custom-box">
                <table class="table table-hover">
                    <tbody class="t-body border-bottom border-white">
                        <tr>
                            <td class="col-12 col-md-3">
                                <div class="kantin"><img src="assets/kantin t.jpg" class="img-fluid rounded fotoMenu" /></div>
                            </td>
                            <td class="col-12 col-md-2">
                                <div class="nama-kantin">Kantin T</div>
                            </td>
                            <td class="col-12 col-md-2">
                                <div class="harga ">Rp. 16.000</div>
                            </td>
                            <td class="col-12 col-md-2">
                                <div class="align-items-center">
                                    <span id="status" class="badge rounded-pill custom-request"> Pesanan </span>
                                </div>
                            </td>
                            <td class="col-12 col-md-3 mb-3">
                                <div class="tanggal">15 Desember 2023</div>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-12 col-md-3">
                                <div class="kantin"><img src="assets/kantin t.jpg" class="img-fluid rounded fotoMenu" /></div>
                            </td>
                            <td class="col-12 col-md-2">
                                <div class="nama-kantin">Kantin T</div>
                            </td>
                            <td class="col-12 col-md-2">
                                <div class="harga">Rp. 16.000</div>
                            </td>
                            <td class="col-12 col-md-2">
                                <div class="align-items-center">
                                    <span id="status" class="badge rounded-pill custom-process"> Pesanan </span>
                                </div>
                            </td>
                            <td class="col-12 col-md-3">
                                <div class="tanggal mb-3">15 Desember 2023</div>
                            </td>
                        </tr>
                        <tr>
                            <td class="col-12 col-md-3">
                                <div class="kantin"><img src="assets/kantin t.jpg" class="img-fluid rounded fotoMenu" /></div>
                            </td>
                            <td class="col-12 col-md-2">
                                <div class="nama-kantin">Kantin T</div>
                            </td>
                            <td class="col-12 col-md-2">
                                <div class="harga ">Rp. 16.000</div>
                            </td>
                            <td class="col-12 col-md-2">
                                <div class="align-items-center">
                                    <span id="status" class="badge rounded-pill custom-done"> Pesanan </span>
                                </div>
                            </td>
                            <td class="col-12 col-md-3 mb-3">
                                <div class="tanggal">15 Desember 2023</div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>