$(document).ready(function () {
    var shoppingCart = []; // Array to store items in the shopping cart

    $(".btn-pesan").on("click", function () {
        const namaMenuText = $(this).closest(".card").find("#nama_menu").text();
        const fotoMenuSrc = $(this)
            .closest(".card")
            .find(".fotoMenu")
            .attr("src");
        const hargaText = $(this).closest(".card").find("#harga").text();
        //convert dari Rp 16.000 jadi 16000
        const numericPart = hargaText.replace(/\D/g, "");
        const harga = parseInt(numericPart, 10);

        const existingItem = shoppingCart.find(
            (item) => item.namaMenu === namaMenuText
        );
        if (existingItem) {
            //jika yang ditambah sudah ada di list
            if ($(this).attr("id") == "minusButton") {
                if (
                    $(this).closest(".custom-add").find("#counter").text() > 1
                ) {
                    existingItem.quantity -= 1;
                }
            } else if ($(this).attr("id") == "plusButton") {
                existingItem.quantity += 1;
            }
        } else {
            //jika belum maka akan diinput value baru
            const value = $(this)
                .closest(".custom-add")
                .find("#counter")
                .text();
            const intValue = parseInt(value, 10);
            const item = {
                namaMenu: namaMenuText,
                harga: harga,
                fotoMenu: fotoMenuSrc,
                quantity: intValue,
            };
            shoppingCart.push(item);
        }
        updateCartNotification();

        // Check if the item already exists in the table
        const existingRow = $("#listPesanan").find(
            `td:contains('${namaMenuText}')`
        );
        if (existingRow.length > 0) {
            // jika data baru sudah ada di table maka update quantity dan harga (di html)
            const quantityElement = existingRow.find(".quantity-value");
            const newQuantity = parseInt(quantityElement.text().trim(), 10) + 1;
            quantityElement.text(newQuantity);

            const hargaElement = existingRow.find(".harga");
            // const newHarga = parseInt(hargaElement.text()) * newQuantity;
            const newHarga = harga * newQuantity;
            hargaElement.text(newHarga);
        } else {
            // jika data baru maka buat table row baru
            $("#listPesanan").append(
                `<tr>
                    <td colspan="4">
                        <div class="row" style="min-height: 9rem">
                            <div class="col-lg-4 col-5 d-flex justify-content-center align-items-center"><img src="` +
                    fotoMenuSrc +
                    `" class="img-fluid rounded fotoMenu"/></div>
                            <div class="col-lg-4 col-4 d-flex justify-content-start align-items-center namaMenu">` +
                    namaMenuText +
                    `</div>
                            <div class="col-lg-4 col-3 d-flex justify-content-center align-items-center harga" data-price="` +
                    harga +
                    `">` +
                    harga +
                    `</div>
                            <div class="col-12 d-flex justify-content-end align-items-start">
                                <div class="align-items-center">
                                    <button type="button" class="btn text-light me-2 custom-btn-sm btnOperation btnMin" style="background-color: #2f4858; border-radius: 50%">
                                        <i class="fa-solid fa-minus fa-sm"></i>
                                    </button>
                                    <span class="quantity-value">1</span>
                                    <button type="button" class="btn text-light ms-2 custom-btn-sm btnOperation btnPlus" style="background-color: #2f4858; border-radius: 50%">
                                    <i class="fa-solid fa-plus fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </td>
              </tr>`
            );
        }
        calculateTotal();

        console.log("Shopping Cart:", shoppingCart);
    });

    function updateCartNotification() {
        let totalQuantity = 0;
        shoppingCart.forEach((item) => {
            totalQuantity += item.quantity;
        });
        console.log(totalQuantity);
        $("#notifCart").text(totalQuantity);

        const namaKantinElement = $("#namaKantin");
        namaKantinElement.text("Carnival");
    }

    $(document).on("click", ".btnOperation", function () {
        const operasi = $(this).hasClass("btnMin") ? "-" : "+";
        const quantityElement = $(this).closest("tr").find(".quantity-value");
        let quantity = parseInt(quantityElement.text().trim(), 10);
        const hargaElement = $(this).closest("tr").find(".harga");
        const originalHarga = parseInt(hargaElement.data("price"), 10);

        if (operasi === "-" && quantity > 0) {
            //quantity dalam table di min
            quantity -= 1;

            //cari nama menu yang di klik minus
            const namaMenuText = $(this)
                .closest("tr")
                .find(".col-4")
                .text()
                .trim();
            //cari namaMenu tersebut di dalam array shoppingCart
            const index = shoppingCart.findIndex(
                (item) => item.namaMenu === namaMenuText
            );
            if (index !== -1) {
                //quantity item di array di -1
                shoppingCart[index].quantity -= 1;
            }
            updateCartNotification();
            calculateTotal();
        } else if (operasi === "+") {
            //quantity dalam table di add
            quantity += 1;

            //cari nama menu yang di klik tambah
            const namaMenuText = $(this)
                .closest("tr")
                .find(".col-4")
                .text()
                .trim();
            //cari namaMenu tersebut di dalam array shoppingCart
            const index = shoppingCart.findIndex(
                (item) => item.namaMenu === namaMenuText
            );
            if (index !== -1) {
                //quantity item di array di +1
                shoppingCart[index].quantity += 1;
            }
            updateCartNotification();
            calculateTotal();
        }

        const harga = originalHarga * quantity;
        quantityElement.text(quantity);
        hargaElement.text(harga);

        if (quantity === 0) {
            const namaMenuText = $(this)
                .closest("tr")
                .find(".col-4")
                .text()
                .trim();
            const index = shoppingCart.findIndex(
                (item) => item.namaMenu === namaMenuText
            );
            if (index !== -1) {
                shoppingCart.splice(index, 1);
            }
            hargaElement.html(
                '<button class="btn btn-danger harga hapusPesanan">Hapus</button>'
            );
        }
        calculateTotal();
        updateCartNotification();
    });

    function hasExistingRows() {
        // Check if there are any rows in the table with id 'listPesanan'
        const rowCount = $("#listPesanan tr").length;
        return rowCount > 0;
    }

    $(document).on("click", ".hapusPesanan", function () {
        const namaKantinElement = $("#namaKantin");

        $(this).closest("tr").remove();
        if (hasExistingRows()) {
            // The table has existing rows
            namaKantinElement.text("Carnival");
        } else {
            // The table doesn't have any rows
            namaKantinElement.text("TAMBAHKAN SESUATU TERLEBIH DAHULU!!!");
        }
    });

    function calculateTotal() {
        let total = 0;
        if (hasExistingRows()) {
            // Iterasi melalui setiap elemen harga pada tabel
            $(".harga").each(function () {
                const harga = parseInt($(this).text());

                total += harga;
                console.log(total);
            });

            // Tampilkan total di tempat yang sesuai, misalnya:
            $("#totalHarga").text(total);
        }
    }

    $("#addButton").on("click", function () {
        const toShow = $(this).closest(".col-2").find(".custom-add");
        const minButton = toShow.find("#minusButton");
        const counter = toShow.find("#counter");
        const plusButton = toShow.find("#plusButton");

        $(this).css("opacity", "0");
        minButton.css("opacity", "100");
        counter.css("opacity", "100");
        plusButton.css("opacity", "100");
        counter.text("1");
        setTimeout(function () {
            $(this).css("display", "none");
            minButton.css("display", "block");
            counter.css("display", "block");
            plusButton.css("display", "block");
        }, 200);
    });

    $(".custom-add-btn").on("click", function () {
        const toShow = $(this).closest(".custom-add");
        const minButton = toShow.find("#minusButton");
        const counter = toShow.find("#counter");
        const plusButton = toShow.find("#plusButton");

        const operation = $(this).attr("id");

        if (operation == "minusButton") {
            const res = counter.text() - 1;
            counter.text(res);
        } else if (operation == "plusButton") {
            const res = 1 + +counter.text();
            counter.text(res);
        }

        if (counter.text() == 0) {
            const addButton = $(this).closest(".col-2").find("#addButton");

            minButton.css("opacity", "0");
            counter.css("opacity", "0");
            plusButton.css("opacity", "0");
            setTimeout(function () {
                minButton.css("display", "none");
                counter.css("display", "none");
                plusButton.css("display", "none");
                setTimeout(function () {
                    addButton.css("opacity", "100");
                    addButton.css("display", "block");
                }, 50);
            }, 200);
        }
    });

    $("#submit-btn").on("click", function () {
        // Ambil Data dari Cart

        shoppingCart.forEach((element) => {
            console.log(element.namaMenu);
        });

        // Submit

        $.ajax({
            url: "order/nota",
            method: "POST",
            contentType: "application/json",
            data: shoppingCart,
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function () {
                window.location.href = "order/notaPesanan";
            },
            error: function (error) {
                console.error("Error fetching data:", error);
            },
        });
    });
});
