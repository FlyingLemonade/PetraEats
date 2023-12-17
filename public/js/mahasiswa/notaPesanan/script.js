$(document).ready(function () {
    const socket = io("http://localhost:3000", {
        query: {
            email: user_id,
        },
    });

    // For example trigger on button clicked, or any time you need
    var payButton = document.getElementById("pay-button");




    // payButton.addEventListener("click", function () {
    // const description = $("#description").val();
    // socket.emit("kirimOrder", {
    //     pemesan: user_id,
    //     pemilikToko: pemilikToko,
    //     shoppingCart: orders,
    //     totalHarga: totalHarga,
    //     deskripsi: description,
    // });

    // });

    payButton.addEventListener("click", function () {
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
        window.snap.pay(snapToken, {
            onSuccess: function (result) {
                /* You may add your own implementation here */
                const description = $("#description").val();
                socket.emit("kirimOrder", {
                    pemesan: user_id,
                    pemilikToko: pemilikToko,
                    shoppingCart: orders,
                    totalHarga: totalHarga,
                    deskripsi: description,
                });

                alert("payment success! Silahkan Cek Riwayat Pemesanan");
                window.location.href = '/';
                console.log(result);
            },
            onPending: function (result) {
                /* You may add your own implementation here */
                alert("wating your payment!");
                console.log(result);
            },
            onError: function (result) {
                /* You may add your own implementation here */
                alert("payment failed!");
                console.log(result);
            },
            onClose: function () {
                /* You may add your own implementation here */
                alert("you closed the popup without finishing the payment");
            },
        });
    });
});
