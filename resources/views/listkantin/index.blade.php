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
    <link rel="stylesheet" href="{{ asset('css/listkantin/style.css') }}" />
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css" />
    <title>List Kantin || Petra Eats</title>



</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid row">
            <div class="col-sm-2 col-12 d-flex justify-content-sm-start justify-content-center" id="navbarSupportedContent">
                <img src="{{ asset('assets/logoPetraEats/logoPetraEats.png') }}" height="15" alt="PE Logo" loading="lazy" />
                <span id="petra-eats">
                    @if(auth()->user()->status_user == 1)
                    <a class="nav-link" href="/mahasiswa">PetraEats</a>
                    @endif
                    @if(auth()->user()->status_user == 2)
                    <a class="nav-link" href="/kantin">PetraEats</a>
                    @endif
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
            <div class="row ms-3">
                <div class="col-xl-6 custom-margin d-flex flex-sm-row flex-column">
                    <a href="#" class="before ">Home<span class="ms-3 me-3">></span></a>
                    <!-- <a href="#" class="before">Kantin P<span class="ms-3 me-3">></span></a> -->
                    <div class="current">Kantin P</div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Direction -->

    <!-- Start Toko -->
    <div class="media-scroller snaps-inline">
        <div class="scroll-arrow left-arrow bi-3x ms-3" onclick="scrollMediaScroller('left')">
            <i class="bi bi-arrow-left-circle-fill"></i>
        </div>
        <div class="scroll-arrow right-arrow bi-3x me-3" onclick="scrollMediaScroller('right')">
            <i class="bi bi-arrow-right-circle-fill"></i>
        </div>

        <!-- foreach( $canteens as $canteen) -->
        <div class="media-element">
            <img src="{{ asset('assets/foods/aw.jpg') }}" alt="">
            <p class="title">Carnival</p>
        </div>
        <div class="media-element">
            <img src="{{ asset('assets/foods/aw.jpg') }}" alt="">
            <p class="title">Carnival</p>
        </div>
        <div class="media-element">
            <img src="{{ asset('assets/foods/aw.jpg') }}" alt="">
            <p class="title">Carnival</p>
        </div>
        <div class="media-element">
            <img src="{{ asset('assets/foods/aw.jpg') }}" alt="">
            <p class="title">Carnival</p>
        </div>
        <div class="media-element">
            <img src="{{ asset('assets/foods/aw.jpg') }}" alt="">
            <p class="title">Carnival</p>
        </div>
        <div class="media-element">
            <img src="{{ asset('assets/foods/aw.jpg') }}" alt="">
            <p class="title">Carnival</p>
        </div>
        <div class="media-element">
            <img src="{{ asset('assets/foods/aw.jpg') }}" alt="">
            <p class="title">Carnival</p>
        </div>
        <div class="media-element">
            <img src="{{ asset('assets/foods/aw.jpg') }}" alt="">
            <p class="title">Carnival</p>
        </div>

    </div>
    <!-- endforeach -->

    <!-- End Toko -->

    <!-- Recommend -->

    <section>
        <div class="container-fluid">
            <div class="row ms-2">
                <div class="col-xl-6 d-flex flex-sm-row flex-column">
                    <div class="before rekom mt-2 mb-3">Top Recommendation</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Start Menu -->
    <div class="media-scroller snaps-inline rekomen ps-3 pb-3">
        <div class="media-element">
            <img src="{{ asset('assets/foods/kulit.jpg') }}" alt="">
            <p class="title">Kulit</p>
            <p class="description">Kulit dibalur dengan tepung digoreng dengan minyak yang sangat panas menghasilkan tekstur yang renyah dan memiliki rasa yang gurih</p>
        </div>
        <div class="media-element">
            <img src="{{ asset('assets/foods/tahu.jpg') }}" alt="">
            <p class="title">Tahu</p>
        </div>
        <div class="media-element">
            <img src="{{ asset('assets/foods/kentang.jpeg') }}" alt="">
            <p class="title">Kentang</p>
        </div>
    </div>
    <!-- End Menu -->



    <!-- Script -->

    <script>
        function scrollMediaScroller(direction) {
            const container = document.querySelector('.media-scroller');
            const scrollAmount = 300; // Adjust this value based on your preference

            if (direction === 'left') {
                container.scrollLeft -= scrollAmount;
            } else if (direction === 'right') {
                container.scrollLeft += scrollAmount;
            }
        }
    </script>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>