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
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/js/mdb.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.10.1/css/mdb.min.css" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <!-- CSS -->
  <link href="{{ asset('css/order/style.css') }}" rel="stylesheet" />

  <!-- Font Awesome-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <title>Petra Eats</title>

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
        @if(auth()->user()->status_user == 1)
        <!-- Mahasiswa -->
        <i class="mt-2 fa-solid fa-cart-shopping btn position-relative" id="shopCart" style="background-color:#2F4858; color: white;" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
          <span id="notifCart" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
            0
          </span>
        </i>
        <h5 class="mt-2 ms-2">{{ auth()->user()->nama }}</h5>
        <!-- Mahasiswa -->
        @endif

        @if(auth()->user()->status_user == 2)
        <!-- Kantin -->
        <div class="col-sm-3 col-12 d-flex justify-content-sm-end justify-content-center me-3">
          <button class="logout btn btn-light border border-dark" onclick="logout()">Logout</button>
          <h5 class="mt-2 ms-3">{{ auth()->user()->nama }}</h5>
        </div>
        <!-- Kantin -->
        @endif

      </div>
    </div>
  </nav>
  <!-- Navbar -->


  <section>
    <div class="container-fluid">
      <div class="row ms-3 me-3">
        @if(auth()->user()->status_user == 1)
        <!-- Direction User Mahasiswa -->
        <div class="col-xl-6 custom-margin d-flex flex-sm-row flex-column">
          <a href="/mahasiswa" class="before ">Home<span class="ms-3 me-3">></span></a>
          @for ($i = 0; $i < 1; $i++)
          <a href="#" class="before">{{ $menus[$i]->nama_kantin}}<span class="ms-3 me-3">></span></a>
          <div class="current">{{ $menus[$i]->nama_toko}}</div>
          @endfor
        </div>
        <!-- Direction User Mahasiswa -->
        @endif
        @if(auth()->user()->status_user == 2) 
        <!-- Direction User Kantin -->
        <div class="col-xl-6 custom-margin d-flex flex-sm-row flex-column">
          <a href="#" class="current">Home<span class="ms-3 me-3"></span></a>
        </div>
        <div class="col-xl-6 custom-margin d-flex flex-sm-row flex-column justify-content-end">
          <i onclick="toPesanan()" class="mt-3 fa-solid fa-cart-shopping btn position-relative" id="shopCart" style="background-color:#2F4858; color: white;" data-toggle="tooltip" data-bs-placement="bottom" title="List Pesanan">
              <span id="notifCart" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                0
              </span>
            </i>
          @if($status[0]->tutup == 0)
          <button class='ms-3 btn btn-success border border-dark btn-tambah' data-bs-toggle='modal' data-bs-target='#tambahMenuModal'>Tambah Menu</button>
          @endif
          @if($status[0]->tutup == 1)
          <button class='ms-3 btn btn-success border border-dark btn-tambah' data-bs-toggle='modal' data-bs-target='#tambahMenuModal' disabled>Tambah Menu</button>
          @endif

          <div class="status-button">
            @if($status[0]->tutup == 0)
            <button class='ms-3 btn btn-danger border border-dark tutup col-11' data-content="1">TUTUP</button>
            @endif
            @if($status[0]->tutup == 1)
            <button class='ms-3 btn btn-success border border-dark buka col-11' data-content="0">BUKA</button>
            @endif
          </div>
        </div>
        <!-- Direction User Kantin -->
        @endif
      </div>
    </div>
  </section>


  @if(auth()->user()->status_user == 1)
  <!-- shopping cart offcanvas user mahasiswa -->
  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header" style="border-bottom: 1px groove;">
      <h3 class="offcanvas-title ms-2" id="offcanvasRightLabel">Keranjang</h3>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <div class="container">
        <h5 id="namaKantin">TAMBAHKAN SESUATU TERLEBIH DAHULU!!!</h5>
      </div>
      <div class="container">
        <table class="table">
          <tbody id="listPesanan">

          </tbody>
        </table>
      </div>
    </div>
    <div class="offcanvas-footer" style="border-top: 1px groove;">
      <div class="container">
        <div class="row mt-2 mb-2">
          <div class="col ms-2">
            <h5>Total Harga</h5>
            <span id="totalHarga">Rp 0</span>
          </div>
          <div class="col">
            <button type="button" class="btn" style="align-items: center; background-color: #2F4858; color: white;">Konrimasi Pesanan</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- shopping cart offcanvas user mahasiswa -->
  @endif


  <!-- List Menu -->
  <div class="container-fluid">
    <div id="listMenu" class="row ms-3 me-3 d-flex justify-content-md-start">
      <!-- Start Card -->
      @foreach($menus as $menu)
      <div class="col-xl-4 col-lg-6 col-12 mb-4 main-menu-item">
        <div class="card ">
          <div class="card-img-top">
            <div class="row" style="min-height: 12rem;">
              <div class="col-lg-4 col-6 d-flex justify-content-center align-items-center">
                <img class="fotoMenu rounded img-fluid" src="{{ asset('assets/foods/'. $menu->picture) }}" alt="kentang goyeng">
              </div>
              <div class="col-lg-6 col-4 d-flex justify-content-center align-items-center mt-3">
                <div class="content" data-content="{{ $menu->menu_id }}">
                  <h5 id="nama_menu">{{ $menu->nama_menu }}</h5>
                  <p id="deskripsi">{{ $menu->deskripsi}}</p>
                  <p id="harga">Rp {{ $menu->harga }}</p>
                </div>
              </div>
              @if(auth()->user()->status_user == 1)
              <!-- Button User mahasiswa -->
              <div class="col-2 text-end d-flex align-items-end justify-content-end">
                <button type="button" class="btn addButton " style="background-color: #2F4858; color: white;">
                  add</button>
                <div class="custom-add d-flex align-items-center justify-content-end">
                  <button id="minusButton" class="btn custom-add-btn" style="background-color: #2F4858; color: white"><i class="fas fa-minus"></i></button>
                  <div id="counter" class="fw-bold ms-3 me-3 custom-add-btn counter">1</div>
                  <button id="plusButton" class="btn custom-add-btn" style="background-color: #2F4858; color: white"><i class="fas fa-plus"></i></button>
                </div>
              </div>
              <!-- Button User mahasiswa -->
              @endif
              @if(auth()->user()->status_user == 2)
              <!-- Button User Kantin -->
              @if($status[0]->tutup == 0)
              <div class="col-2 text-end d-flex align-items-end justify-content-end">
                <button type="button" class="btn delButton btn-danger me-4" data-bs-toggle='modal' data-bs-target='#deleteMenuModal'>Delete</button>
                <button type="button" class="btn editButton" style="background-color: #2F4858; color: white;" data-bs-toggle='modal' data-bs-target='#editMenuModal'>
                  Edit</button>
              </div>
              @endif
              @if($status[0]->tutup == 1)
              <div class="col-2 text-end d-flex align-items-end justify-content-end" style="display:none">
                <button type="button" class="btn delButton btn-danger me-4" data-bs-toggle='modal' data-bs-target='#deleteMenuModal' style="display:none">Delete</button>
                <button type="button" class="btn editButton" style="background-color: #2F4858; color: white; display:none" data-bs-toggle='modal' data-bs-target='#editMenuModal'>
                  Edit</button>
              </div>
              @endif
              <!-- Button User Kantin -->
              @endif
            </div>
          </div>
        </div>
      </div>
      @endforeach
      <!-- End Card -->
    </div>
  </div>

  @if(auth()->user()->status_user == 2)
  <!-- Confirm Delete Modal -->
  <div class="modal fade" id="deleteMenuModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="judulDeleteResi">Delete Menu</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="confirmDelete">
            <input type="hidden" id="dataContentHidden" value="">
            <div class="mb-4 mt-2">
              <p id="notifDelete"></p>
            </div>
            <input type="hidden" id="hiddenName" value="">
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Kembali</button>
            <button id="confirmDel" type="submit" class="btn btn-danger confirmDel">Ya</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!--Edit Modal -->
  <div class="modal fade" id="editMenuModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Menu</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="editUser">
            {{ csrf_field() }}
            <div class="mb-4">
              <input type="hidden" id="dataContentHidden" value="">
              <label class="col-form-label">Nama Menu</label>
              <input type="text" class="form-control" id="namaMenuEdit" name="namaMenuEdit">
            </div>
            <div class="mb-3">
              <label class="col-form-label">Deskripsi</label>
              <input class="form-control" id="deskripsiEdit" name="deskripsiEdit"></input>
            </div>
            <div class="mb-3">
              <label class="col-form-label">Harga Menu</label>
              <input type="number" class="form-control" id="hargaEdit" name="hargaEdit"></input>
            </div>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Back</button>
            <button type="submit" id="editMenu" class="btn btn-primary">Edit Menu</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Tambah Menu Modal -->
  <div class="modal fade" id="tambahMenuModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5">Tambahkan Menu</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="tambahMenuForm">
            {{ csrf_field() }}
            <div class="mb-4">
              <input type="hidden" id="dataContentHidden" value="">
              <label class="col-form-label">Nama Menu</label>
              <input required type="text" class="form-control" id="namaMenuBaru" name="namaMenuBaru">
            </div>
            <div class="mb-3">
              <label class="col-form-label">Deskripsi</label>
              <input required class="form-control" id="deskripsiBaru" name="deskripsiBaru"></input>
            </div>
            <div class="mb-3">
              <label class="col-form-label">Harga Menu</label>
              <input type="number" required class="form-control" id="hargaBaru" name="hargaBaru"></input>
            </div>
            <div class="mb-4">
              <label class="col-form-label">Foto Menu</label>
              <input type="file" required class="form-control" id="fotoMenuBaru" name="fotoMenuBaru"></input>
            </div>

            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">cancel</button>

            <button type="submit" id="tambahMenu" class="btn btn-primary">Tambah Menu</button>

          </form>
        </div>
      </div>
    </div>
  </div>
  @endif



  <!-- Script -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

  <script>
    function logout() {
      fetch('/logout', {
          method: 'GET',
          headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
          },
        })
        .then(response => {
          if (response.ok) {
            window.location.href = '/';
          } else {
            console.error('Logout failed');
          }
        })
        .catch(error => {
          console.error('Logout error', error);
        });
    }
  </script>
  <script src="{{ asset('js/order/script.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>

</html>