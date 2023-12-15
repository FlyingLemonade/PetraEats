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

        #profile image{
            position: absolute; right: 0; bottom: 10;
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
                <img class="center" id="profile" style="border-radius: 50%; object-fit: cover;" src="{{ 'assets/mahasiswa/profile/'. auth()->user()->picture }}" alt="" width="175" height = "175">
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
            <div id="divSplit">
                <img class="image" src=" {{ asset('assets/mahasiswa/home/KantinP.jpg') }} " alt="">
            </div>
            <div id="divSplit">
                <img class="image" src="{{ asset('assets/mahasiswa/home/KantinQ.jpg') }}" alt="">
            </div>
            <div id="divSplit">
                <img class="image" src="{{ asset('assets/mahasiswa/home/KantinW.jpg') }}" alt="">
            </div>
            <div id="divSplit">
                <img class="image" src="{{ asset('assets/mahasiswa/home/KantinW.jpg') }}" alt="">
            </div>
        </div>
    </div>


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

        function toPesanan() {
            fetch('/mahasiswa/pesanan', {
                    method: 'GET',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                })
                .then(response => {
                    if (response.ok) {
                        window.location.href = '/mahasiswa/pesanan';
                    } else {
                        console.error('Fail to Move');
                    }
                })
                .catch(error => {
                    console.error('Error Occur', error);
                });
        }
    </script>
</body>

</html>