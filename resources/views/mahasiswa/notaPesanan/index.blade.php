<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->

    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
    <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
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
    <link rel="icon" type="image/x-icon" href="/assets/home/logoPetraEats.png">
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
                                        <div class="col-12 d-flex justify-content-sm-end justify-content-center align-items-start mt-sm-0 mt-2">
                                            <div class="align-items-center">
                                                <span class="quantity-value">Total : {{ $order['quantity'] }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            <!-- End Menu -->

                            <tr>
                                <td class="col mt-3 mb-1">
                                    <label class="col-6" for="description">Deskripsi :</label>
                                    <textarea class="col-6" id="description" name="description" rows="8" cols="80"></textarea>
                                </td>
                            </tr>
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
            <div class="row d-flex justify-content-sm-around ">
                <div class="col-sm-5 col-12 pt-3 d-flex justify-content-sm-end align-items-center justify-content-center">
                    <p class="">
                        <span class="" id="price-title">Total Harga<br />
                            <span class="harga"> {{ $totalHarga }}</span>
                        </span>
                    </p>
                </div>
                <div class="col-sm-5 col-12 mb-5 mb-sm-0 d-flex justify-content-sm-start align-items-center justify-content-center">
                    <button id="pay-button" type="button" class="btn btn-primary ">
                        Bayar
                    </button>
                </div>
            </div>
        </footer>
    </section>
    <!-- Footer -->

    <!-- Script -->
    <script src="https://cdn.socket.io/4.7.2/socket.io.min.js" integrity="sha384-mZLF4UVrpi/QTWPA7BjNPEnkIfRFn4ZEO3Qt/HFklTJBj/gBOV8G3HcKn4NfQblz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script>
        const snapToken = '{{ $snapToken }}';
        const user_id = '{{ auth()->user()->email }}';
        const pemilikToko = '{{ $dataToko->toko_id }}';
        const orders = '@json($orders)';
        const totalHarga = '{{ $totalHarga }}'
    </script>
    <script src="{{ asset('js/mahasiswa/notaPesanan/script.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>