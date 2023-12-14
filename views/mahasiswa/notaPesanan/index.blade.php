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
    <title>Ringkasan Pesanan</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid row">
            <div class="col-sm-2 col-12 d-flex justify-content-sm-start justify-content-center" id="navbarSupportedContent">
                <img src=" asset('assets/logoPetraEats/logoPetraEats.png')  " height="15" alt="MDB Logo" loading="lazy" />
                <span id="petra-eats"><a class="nav-link" href="#">PetraEats</a></span>
            </div>
            <div class="col-sm-10 col-12 d-flex justify-content-sm-end justify-content-center">
                <h5 class="me-sm-5 mt-2"> auth()->user()->nama </h5>
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
                            
                            <tr>
                                <td colspan="4">
                                    <div class="row" style="min-height: 9rem">
                                        <div class="pesanan col-lg-4 col-sm-5 col-12 d-flex justify-content-center align-items-center"><img src=" asset('assets/foods/' . $order->namaMenu . '.jpg') " class="img-fluid rounded fotoMenu" /></div>
                                        <div class="pesanan col-lg-4 col-sm-4 col-6 d-flex justify-content-sm-start justify-content-center align-items-center"> $order->namaMenu </div>
                                        <div class="harga col-lg-4 col-sm-3 col-6 d-flex justify-content-center align-items-center">  $order->harga  </div>
                                        <div class="col-12 d-flex justify-content-sm-end justify-content-center align-items-start mt-sm-0 mt-2">
                                            <div class="align-items-center">
                                                <button type="button" class="btn-operation btn text-light me-2 custom-btn-sm btnMin" style="background-color: #2f4858; border-radius: 50%">
                                                    <i class="fa-solid fa-minus fa-sm"></i>
                                                </button>
                                                <span class="quantity-value"> $order->quantity </span>
                                                <button type="button" class="btn-operation btn text-light ms-2 custom-btn-sm btnPlus" style="background-color: #2f4858; border-radius: 50%">
                                                    <i class="fa-solid fa-plus fa-sm"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            
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
                            <span class="harga"> $orders->harga </span>
                        </span>
                    </p>
                </div>
                <div class="foot-right col-sm-6 pt-3 pe-5 mb-sm-0 mb-5">
                    <button data-mdb-ripple-init id="myBtn" type="button" class="btn-bayar btn btn-outline-light btn-rounded ps-4 pe-4 ms-5">Bayar</button>
                </div>
            </div>
        </footer>
    </section>
    <!-- Footer -->

    <!-- Modal -->
    <div id="qrModal" class="modal">
        <!-- Modal content -->
        <div class="modal-content d-flex">
            <span class="close">&times;</span>
            <div class="text-center">
                <img src="https://chart.googleapis.com/chart?cht=qr&chl=https://www.youtube.com/watch?v=BbeeuzU5Qc8&ab_channel=MetroGirlzStation&chs=160x160&chld=L|0" class="qr-code img-thumbnail img-responsive" />
                <!-- ganti link disini -->
            </div>
            <form class="form-container" accept-charset=" UTF-8" action=" route('submitPembayaran')  " method="post">
                 csrf_field() 
                <div class="row form-horizontal">
                    <div class="form-group d-flex justify-content-center">
                        <label class="btn-modal btn btn-default btn-file" style="font-size: 17px"> Upload Bukti Bayar <input type="file" style="display: none" required /> </label>
                    </div>
                    <div class="form-group d-flex justify-content-center">
                        <!-- Button to submit -->
                        <button type="submit" class="btn-modal btn btn-default mt-2" id="generate">Confirm</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Script -->
    <script>
        var modal = document.getElementById("qrModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal
        btn.onclick = function() {
            modal.style.display = "block";
        };

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        };

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        };

        function htmlEncode(value) {
            return $("<div/>").text(value).html();
        }

        // $(function () {
        //   $("#generate").click(function () {
        //     // Generate the link that would be
        //     // used to generate the QR Code

        //     let finalURL =
        //       // Replace the src of the image with
        //       // the QR code image
        //       $(".qr-code").attr("src", finalURL);
        //   });
        // });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>