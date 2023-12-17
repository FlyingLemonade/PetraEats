<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Mahasiswa | Home</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <style>
        body,
        html {
            height: 100%;
            overflow: hidden;
        }
        @media (max-width: 480px) {
            .mycontainer {
                display: flex;
                flex-direction: column;
            }
        }

        .general {
            display: flex;
            height: 100%;
            max-height: 100%;
        }

        .panel {
            width: 30%;
            height: 100%;
        }

        .main {
            width: 100%;
            max-width: 89%;
            height: 100%;
            border: 2px solid;
        }

        .mycontainer {
            display: flex;
        }

        .justify {
            margin-left: 20%;
            margin-right: auto;
            text-align: justify;
        }

        .center {
            text-align: center;
            justify-content: center;
            align-items: center;
        }

        .button {
            border-radius: 10px;
            padding: 10px 17px;
            background-color: gainsboro;
        }

        #divSplit {
            width: 50%;
            height: 50%;
            float: left;
        }

        #divSplit img {
            display: inline-block;
            vertical-align: middle;
            max-height: 100%;
            max-width: 100%;
            object-fit: cover;
        }

        .image {
            position: relative;
            filter: grayscale(100%);
            font-size: 0;
            text-align: center;
            width: 100%;
            /* Container's dimensions */
            height: 100%;
            border: 2px solid;
            z-index: 0;
            object-fit: cover;
        }

        #profile image {
            position: absolute;
            right: 0;
            bottom: 10;
        }

        .image:hover {
            filter: grayscale(0%);
            transition: transform .5s;
            transform: scale(1.07);
            /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
            border-radius: 10px;
            border: 5px solid #eaf6ff;
            box-shadow: 5px 10px;
            z-index: 1;
        }

        .image:active {
            filter: grayscale(0%);
            transition: transform .5s;
            transform: scale(1.07);
            /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
            border-radius: 10px;
            border: 5px solid #eaf6ff;
            box-shadow: 5px 10px;
            z-index: 1;
            opacity: 50%;
        }
    </style>
</head>

<body>
    <div class="general">
        <div class="panel">
            <div class="mycontainer justify-content-center">

                <img class="mt-4" src="{{ asset('assets/logoPetraEats/logoPetraEats.png') }}" alt="logo" width="55" height="50">
                <p class="center h1 mt-4  ">PetraEats</p>

            </div>
            <div style="margin-top: 100px;"> </div>
            <div class="mycontainer center">
                <img class="center" id="profile" style="border-radius: 50%; object-fit: cover;" src="{{ asset('assets/mahasiswa/profile/'. auth()->user()->picture) }}" alt="" width="175" height="175">
            </div>
            <div class=" center ">
                <p class="center h2 mt-3">{{ auth()->user()->nama }}</p>
                <p class="" style="color: #9B9B9B">{{ auth()->user()->email }}</p>
            </div>
            <div class="mycontainer center">

            </div>

            <div class="mycontainer d-flex justify-content-center mt-4 mb-4">
                <button onclick="toPesanan()" class="btn btn-outline-dark center h8 p-2" type="button"><i class="fa fa-history" aria-hidden="true"></i> Riwayat Pemesanan</button>
            </div>

            <div class="mycontainer center mt-4">
                <button type="button" class="button" onclick="logout()">Log Out</button>
            </div>
        </div>
        <div class="main" style="background-color: black;">

            <form id="divSplit" class="form" method="post" action="{{ route('toCanteen') }}">
                {{ csrf_field() }}
                <input type="hidden" name="canteenID" value="3">
                <img type="submit" class="image" src=" {{ asset('assets/kantin/KantinP.jpg') }} " alt="Kantin P">
            </form>


            <form id="divSplit" class="form" method="post" action="{{ route('toCanteen') }}">
                {{ csrf_field() }}
                <input type="hidden" name="canteenID" value="4">
                <img type="submit" class="image" src="{{ asset('assets/kantin/KantinQ.jpg') }}" alt="Kantin Q">
            </form>

            <form id="divSplit" class="form" method="post" action="{{ route('toCanteen') }}">
                {{ csrf_field() }}
                <input type="hidden" name="canteenID" value="1">
                <img type="submit" class="image" src="{{ asset('assets/kantin/KantinW.jpg') }}" alt="Kantin W">
            </form>
            <form id="divSplit" class="form" method="post" action="{{ route('toCanteen') }}">
                {{ csrf_field() }}
                <input type="hidden" name="canteenID" value="2">
                <img type="submit" class="image" src="{{ asset('assets/kantin/KantinW.jpg') }}" alt="Kantin T">
            </form>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="{{ asset('js/mahasiswa/home/script.js') }} "></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

</body>

</html>