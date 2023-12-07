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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/css/mdb.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- CSS -->
    <link href="{{ asset('css/order/style.css') }}" rel="stylesheet" />

    <!-- Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Interface Kantin</title>

</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid row">
            <div class="col-sm-8 col-12 ms-sm-4 ms-3 d-flex justify-content-sm-start justify-content-center" id="navbarSupportedContent">
                <img src="{{ asset('assets/logoPetraEats/logoPetraEats.png') }}" height="15" alt="MDB Logo" loading="lazy" />
                <a id="petra-eats" class="ms-2 nav-link" href="#">PetraEats</a>
            </div>
            <div class="col-sm-3 col-12 d-flex justify-content-sm-end justify-content-center">
                <i class="mt-2 fa-solid fa-cart-shopping btn position-relative" id="shopCart" style="background-color:#2F4858; color: white;" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                    <span id="notifCart" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger z-3">
                        0
                    </span>
                </i>
                <h5 class="mt-2 ms-2">Username</h5>
            </div>
        </div>
    </nav>
    <!-- Navbar -->

    <!-- Direction -->
    <section>
        <div class="container-fluid">
            <div class="row ms-3">
                <div class="col-xl-6 custom-margin d-flex flex-sm-row flex-column">
                    <a href="#" class="before ">Home<span class="ms-3 me-3">></span></a>
                    <a href="#" class="before">Kantin P<span class="ms-3 me-3">></span></a>
                    <div class="current">Carnival</div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Direction -->

    <!-- SHOPPING CART-->
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header" style="border-bottom: 1px groove;">
            <h3 class="offcanvas-title ms-2" id="offcanvasRightLabel">Keranjang</h3>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="container">
                <h5 id="namaKantin">TAMBAHKAN SESUATU TERLEBIH DAHULU!!!</h5>
            </div>
            <div class="">
                <table class="table">
                    <tbody id="listPesanan">
                        <!--NEW LIST HERE-->
                    </tbody>
                </table>
            </div>
        </div>

        <div class="offcanvas-footer" style="border-top: 1px groove;">
            <div class="container">
                <div class="row mt-2 mb-2">
                    <div class="col ms-2">
                        <h5>Total Harga</h5>
                        <span id="totalHarga">-</span>
                    </div>
                    <div class="col">
                        <button type="button" class="btn" id="submit-btn" style="align-items: center; background-color: #2F4858; color: white;">Konrimasi Pesanan</button>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <!-- List Menu -->
    <div class="container-fluid">
        <div class="row ms-3 me-3 d-flex justify-content-md-start">
            <!-- Start Card -->
            <div class="col-xl-4 col-lg-6 col-12 mb-4">
                <div class="card ">
                    <div class="card-img-top">
                        <div class="row" style="min-height: 12rem;">
                            <div class="col-lg-4 col-6 d-flex justify-content-center align-items-center">
                                <img class="fotoMenu rounded img-fluid" src="{{ asset('assets/foods/kentang.jpeg') }}" alt="kentang goyeng">
                            </div>
                            <div class="col-lg-6 col-4 d-flex justify-content-center align-items-center mt-3">
                                <div class="content">
                                    <h5 id="nama_menu">French Fries</h5>
                                    <p id="deskripsi">Kentang goreng dengan bumbu dan saos pilihan</p>
                                    <p id="harga">Rp 16.000</p>
                                </div>
                            </div>
                            <div class="col-2 text-end d-flex align-items-end justify-content-end">
                                <button id="addButton" type="button" class="btn " style="background-color: #2F4858; color: white;">
                                    add</button>
                                <div class="custom-add d-flex align-items-center justify-content-end btn-pesan">
                                    <button id="minusButton" class="btn custom-add-btn btn-pesan" style="background-color: #2F4858; color: white"><i class="fas fa-minus"></i></button>
                                    <div id="counter" class="fw-bold ms-3 me-3 custom-add-btn">1</div>
                                    <button id="plusButton" class="btn custom-add-btn btn-pesan" style="background-color: #2F4858; color: white"><i class="fas fa-plus"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-12 mb-4">
                <div class="card ">
                    <div class="card-img-top">
                        <div class="row" style="min-height: 12rem;">
                            <div class="col-lg-4 col-6 d-flex justify-content-center align-items-center">
                                <img class="fotoMenu rounded img-fluid" src="{{ asset('assets/foods/curlyFries.jpg') }}" alt="kentang goyeng">
                            </div>
                            <div class="col-lg-6 col-4 d-flex justify-content-center align-items-center mt-3">
                                <div class="content">
                                    <h5 id="nama_menu">Kentang Curly</h5>
                                    <p id="deskripsi">Kentang curly dengan bumbu dan saos pilihan</p>
                                    <p id="harga">Rp 16.000</p>
                                </div>
                            </div>
                            <div class="col-2 text-end d-flex align-items-end justify-content-end">
                                <button type="button" class="btn btn-pesan" style="background-color: #2F4858; color: white;"><i class="fa-solid fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-12 mb-4">
                <div class="card ">
                    <div class="card-img-top">
                        <div class="row" style="min-height: 12rem;">
                            <div class="col-lg-4 col-6 d-flex justify-content-center align-items-center">
                                <img class="fotoMenu rounded img-fluid" src="{{ asset('assets/foods/kulit.jpg') }}" alt="kentang goyeng">
                            </div>
                            <div class="col-lg-6 col-4 d-flex justify-content-center align-items-center mt-3">
                                <div class="content">
                                    <h5 id="nama_menu">Kulit</h5>
                                    <p id="deskripsi">Kulit ayam crispy</p>
                                    <p id="harga">Rp 14.000</p>
                                </div>
                            </div>
                            <div class="col-2 text-end d-flex align-items-end justify-content-end">
                                <button type="button" class="btn btn-pesan" style="background-color: #2F4858; color: white;"><i class="fa-solid fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-12 mb-4">
                <div class="card ">
                    <div class="card-img-top">
                        <div class="row" style="min-height: 12rem;">
                            <div class="col-lg-4 col-6 d-flex justify-content-center align-items-center">
                                <img class="fotoMenu rounded img-fluid" src="{{ asset('assets/foods/tahu.jpg') }}" alt="kentang goyeng">
                            </div>
                            <div class="col-lg-6 col-4 d-flex justify-content-center align-items-center mt-3">
                                <div class="content">
                                    <h5 id="nama_menu">Tahu Goreng</h5>
                                    <p id="deskripsi">Tahu goreng dengan bumbu dan saos pilihan</p>
                                    <p id="harga">Rp 12.000</p>
                                </div>
                            </div>
                            <div class="col-2 text-end d-flex align-items-end justify-content-end">
                                <button type="button" class="btn btn-pesan" style="background-color: #2F4858; color: white;"><i class="fa-solid fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-12 mb-4">
                <div class="card ">
                    <div class="card-img-top">
                        <div class="row" style="min-height: 12rem;">
                            <div class="col-lg-4 col-6 d-flex justify-content-center align-items-center">
                                <img class="fotoMenu rounded img-fluid" src="{{ asset('assets/foods/jamur.jpg') }}" alt="kentang goyeng">
                            </div>
                            <div class="col-lg-6 col-4 d-flex justify-content-center align-items-center mt-3">
                                <div class="content">
                                    <h5 id="nama_menu">Mushroom Crispy</h5>
                                    <p id="deskripsi">Jamur goreng dengan bumbu dan saos pilihan</p>
                                    <p id="harga">Rp 14.000</p>
                                </div>
                            </div>
                            <div class="col-2 text-end d-flex align-items-end justify-content-end">
                                <button type="button" class="btn btn-pesan" style="background-color: #2F4858; color: white;"><i class="fa-solid fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-12 mb-4">
                <div class="card ">
                    <div class="card-img-top">
                        <div class="row" style="min-height: 12rem;">
                            <div class="col-lg-4 col-6 d-flex justify-content-center align-items-center">
                                <img class="fotoMenu rounded img-fluid" src="{{ asset('assets/foods/chickenCrispy.jpg') }}" alt="kentang goyeng">
                            </div>
                            <div class="col-lg-6 col-4 d-flex justify-content-center align-items-center mt-3">
                                <div class="content">
                                    <h5 id="nama_menu">Chicken Crispy</h5>
                                    <p id="deskripsi">Potongan ayam goreng crispy</p>
                                    <p id="harga">Rp 17.000</p>
                                </div>
                            </div>
                            <div class="col-2 text-end d-flex align-items-end justify-content-end">
                                <button type="button" class="btn btn-pesan" style="background-color: #2F4858; color: white;"><i class="fa-solid fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-12 mb-4">
                <div class="card ">
                    <div class="card-img-top">
                        <div class="row" style="min-height: 12rem;">
                            <div class="col-lg-4 col-6 d-flex justify-content-center align-items-center">
                                <img class="fotoMenu rounded img-fluid" src="{{ asset('assets/foods/baksoIkan.jpg') }}" alt="kentang goyeng">
                            </div>
                            <div class="col-lg-6 col-4 d-flex justify-content-center align-items-center mt-3">
                                <div class="content">
                                    <h5 id="nama_menu">Fish Ball</h5>
                                    <p id="deskripsi">Bakso ikan, isi 10</p>
                                    <p id="harga">Rp 16.000</p>
                                </div>
                            </div>
                            <div class="col-2 text-end d-flex align-items-end justify-content-end">
                                <button type="button" class="btn btn-pesan" style="background-color: #2F4858; color: white;"><i class="fa-solid fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-12 mb-4">
                <div class="card ">
                    <div class="card-img-top">
                        <div class="row" style="min-height: 12rem;">
                            <div class="col-lg-4 col-6 d-flex justify-content-center align-items-center">
                                <img class="fotoMenu rounded img-fluid" src="{{ asset('assets/foods/baksoUdang.jpg') }}" alt="kentang goyeng">
                            </div>
                            <div class="col-lg-6 col-4 d-flex justify-content-center align-items-center mt-3">
                                <div class="content">
                                    <h5 id="nama_menu">Shrimp Ball</h5>
                                    <p id="deskripsi">Bakso udang, isi 8</p>
                                    <p id="harga">Rp 16.000</p>
                                </div>
                            </div>
                            <div class="col-2 text-end d-flex align-items-end justify-content-end">
                                <button type="button" class="btn btn-pesan" style="background-color: #2F4858; color: white;"><i class="fa-solid fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Card -->



        </div>
    </div>





    <!-- Script -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/js/mdb.min.js"></script> -->
    <script src="{{ asset('js/order/script.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>