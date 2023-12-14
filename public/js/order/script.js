$(document).ready(function () {
    //Script user mahasiswa
    let shoppingCart = [];

    function hasExistingRows() {
        // Check if there are any rows in the table with id 'listPesanan'
        const rowCount = $("#listPesanan tr").length;
        return rowCount > 0;
    }

    function updateCartNotification() {
        let totalQuantity = 0;
        shoppingCart.forEach(item => {
            totalQuantity += item.quantity;
        });

        $('#notifCart').text(totalQuantity);

        if (hasExistingRows()) {
            const namaKantinElement = $('#namaKantin');
            namaKantinElement.text("");
        } else {
            const namaKantinElement = $('#namaKantin');
            namaKantinElement.text("TAMBAHKAN SESUATU TERLEBIH DAHULU!!!");
        }
    }

    function calculateTotal() {
        let total = 0;
    
        // Iterasi melalui setiap elemen harga pada tabel
        $(".harga").each(function () {
            const harga = parseInt($(this).text());
            total += harga;
        });
        
        // Tampilkan total di tempat yang sesuai, misalnya:
        $("#totalHarga").text(`Rp ${total}`);
        
    }

    $(".addButton").on("click", function () {
        const toShow = $(this).closest(".col-2").find(".custom-add");
        const minButton = toShow.find("#minusButton");
        const counter = toShow.find("#counter");
        const plusButton = toShow.find("#plusButton");

        //get data
        const namaMenuText = $(this).closest('.card').find('#nama_menu').text();
        const fotoMenuSrc = $(this).closest('.card').find('.fotoMenu').attr('src');
        const hargaText = $(this).closest('.card').find('#harga').text();
        //convert dari Rp 16.000 jadi 16000
        const regex = /\d+/;
        const harga = hargaText.match(regex)[0];

        //Tambah item ke cart
        const item = {
            namaMenu: namaMenuText,
            harga: harga,
            fotoMenu: fotoMenuSrc,
            quantity: 1
        };
        shoppingCart.push(item);

        //Buat list table di offcanvas
        $("#listPesanan").append(
            `<tr>
                <td colspan="4">
                    <div class="row" style="min-height: 9rem">
                        <div class="col-lg-4 col-5 d-flex justify-content-center align-items-center"><img src="` + fotoMenuSrc + `" class="img-fluid rounded fotoMenu"/></div>
                        <div class="col-lg-4 col-4 d-flex justify-content-start align-items-center namaMenu">` + namaMenuText + `</div>
                        <div class="col-lg-4 col-3 d-flex justify-content-center align-items-center harga" data-price="` + harga + `">` + harga + `</div>
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

        //Update notif cart logo
        updateCartNotification();

        calculateTotal();

        //Ubah Button
        $(this).css("opacity", "0");
        $(this).css("display", "none");
        minButton.css("opacity", "100");
        counter.css("opacity", "100");
        plusButton.css("opacity", "100");
        counter.text("1");
        setTimeout(function () {
            minButton.css("display", "block");
            counter.css("display", "block");
            plusButton.css("display", "block");
        }, 200);
    });

    function updateCartItemQuantity(menuName, quantity) {
        // Update menu pilihan di offcanvas
        const rowElement = $('#listPesanan .namaMenu:contains("' + menuName + '")').closest('tr');
        if (rowElement) {
            const pricePerItem = parseInt(rowElement.find('.harga').attr('data-price'));
            const totalPrice = pricePerItem * quantity;
            rowElement.find('.quantity-value').text(quantity);
            rowElement.find('.harga').text(totalPrice);

            // Update the total price of the shoppingCart array
            const menuItem = shoppingCart.find(item => item.namaMenu === menuName);
            if (menuItem) {
                menuItem.quantity = quantity;
                menuItem.totalPrice = totalPrice;
            }
        }
    }

    $(".custom-add-btn").on("click", function () {
        const toShow = $(this).closest(".custom-add");
        const minButton = toShow.find("#minusButton");
        const counter = toShow.find("#counter");
        const plusButton = toShow.find("#plusButton");

        // Find the menu item in the shoppingCart array
        const menuName = $(this).closest('.card').find('#nama_menu').text();
        const menuItem = shoppingCart.find(item => item.namaMenu === menuName);

        const operation = $(this).attr("id");

        if (operation == "minusButton") {
            const res = counter.text() - 1;
            counter.text(res);

            // Update the quantity in the shoppingCart array
            menuItem.quantity = res;
            
        } else if (operation == "plusButton") {
            const res = 1 + +counter.text();
            counter.text(res);

            // Update the quantity in the shoppingCart array
            menuItem.quantity = res;

        }

        // update cart logo notif
        updateCartNotification();

        // Update the cart item in the shoppingCart array
        updateCartItemQuantity(menuName, +counter.text());

        calculateTotal();

        if (counter.text() == 0) {
            // Remove the item from the shoppingCart array
            const menuName = $(this).closest('.card').find('#nama_menu').text();
            const indexToRemove = shoppingCart.findIndex(item => item.namaMenu === menuName);
            if (indexToRemove !== -1) {
                shoppingCart.splice(indexToRemove, 1);
            }

            // Remove the corresponding row from the table
            $('#listPesanan .namaMenu:contains("' + menuName + '")').closest('tr').remove();

            // Update cart logo notif
            updateCartNotification();

            //Change back the button
            const addButton = $(this).closest(".col-2").find(".addButton");

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


    //offcanvas
    function updateMainMenuQuantity(menuName, newQuantity) {
        // Find the main menu element by menuName
        const mainMenuElement = $('.main-menu-item').filter(function () {
            return $(this).find('.content h5').text().trim() === menuName;
        });
    
        // Update the quantity in the main menu
        mainMenuElement.find('.counter').text(newQuantity);
    }

    $(document).on("click", ".btnOperation", function () {
        const quantityElement = $(this).closest('tr').find('.quantity-value');
        let quantity = parseInt(quantityElement.text().trim(), 10);
        const hargaElement = $(this).closest('tr').find('.harga');
        const originalHarga = parseInt(hargaElement.data('price'), 10);

        //cari nama menu yang di klik minus
        const namaMenuText = $(this).closest('tr').find('.col-4').text().trim();
        const index = shoppingCart.findIndex(item => item.namaMenu === namaMenuText);

        const operasi = $(this).hasClass('btnMin') ? '-' : '+';
        if (operasi === "-" && quantity > 0) {
            // quantity dalam table di min
            quantity -= 1;
            // quantity di array di ubah
            shoppingCart[index].quantity = quantity;
        } else if (operasi === "+") {
            // quantity dalam table di add
            quantity += 1;
            // quantity di array di ubah
            shoppingCart[index].quantity = quantity;
        }
        
        const harga = originalHarga * quantity;
        
        quantityElement.text(quantity);
        hargaElement.text(harga);

        //update notif logo cart
        updateCartNotification();
        
        updateMainMenuQuantity(namaMenuText, quantity);
        
        calculateTotal();

        if (quantity === 0) {
            $(this).closest('tr').remove();
            
            // Remove the menu item from the shopping cart array
            shoppingCart.splice(index, 1);

            const namaKantinElement = $('#namaKantin');
            if (!hasExistingRows()) {
                // The table doesn't have any rows
                namaKantinElement.text('TAMBAHKAN SESUATU TERLEBIH DAHULU!!!');
                $("#totalHarga").text("Rp 0");
            }

            const mainMenuItem = $(".main-menu-item:contains('" + namaMenuText + "')");
            const addButton = mainMenuItem.find(".addButton");
            const minButton = mainMenuItem.find("#minusButton");
            const counter = mainMenuItem.find(".counter");
            const plusButton = mainMenuItem.find("#plusButton");

            // Hide buttons
            minButton.css("opacity", "0");
            counter.css("opacity", "0");
            plusButton.css("opacity", "0");

            // Set a timeout to change display after hiding
            setTimeout(function () {
                minButton.css("display", "none");
                counter.css("display", "none");
                plusButton.css("display", "none");

                // Show the add button
                setTimeout(function () {
                    addButton.css("opacity", "1");
                    addButton.css("display", "block");
                }, 50);
            }, 200);
        }
    });

    

    //Script User Kantin
    $('.buka').trigger('click');

    $('.tutup, .buka').on('click', function(e) {
        var tambahMenuButton = $('.btn-tambah');
        e.preventDefault();
        if ($(this).hasClass('tutup')) {
            $(this).removeClass('tutup').addClass('buka').text('BUKA');
            $(this).removeClass('btn-danger').addClass('btn-success');
            // Hide delete and edit buttons when closed
            $('.delButton, .editButton').hide();

            tambahMenuButton.prop('disabled', true);
        } else {
            $(this).removeClass('buka').addClass('tutup').text('TUTUP');
            $(this).removeClass('btn-success').addClass('btn-danger');
            $('.delButton, .editButton').show();

            // Disable the "Tambah Menu" button
            tambahMenuButton.prop('disabled', false);
        }
    });

    // Add a check before opening the modal
    $('.btn-tambah').on('click', function(e) {
        if ($(this).prop('disabled')) {
            e.preventDefault();
        }
    });

    $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();   
    });

    $(".editButton").on("click", function () {
        // Get the data-content attribute from the card
        const dataContent = $(this).closest('.card').find('.content').data('content');
        $("#dataContentHidden").val(dataContent);

        // Use the data-content value to identify the elements to update
        const namaMenu = $(this).closest('.card').find('#nama_menu').text();
        const deskripsi = $(this).closest('.card').find('#deskripsi').text();
        const hargaText = $(this).closest('.card').find('#harga').text();

        const regex = /\d+/;
        const harga = hargaText.match(regex)[0];

        console.log("Data Content:", dataContent);
        console.log("Nama Menu:", namaMenu);
        console.log("Deskripsi:", deskripsi);
        console.log("Harga Text:", hargaText);

        // Update your modal inputs or perform other logic based on the data-content
        $(namaMenuEdit).val(namaMenu);
        $(deskripsiEdit).val(deskripsi);
        $(hargaEdit).val(harga);
    });

    $("#editMenu").on("click", function () {
        event.preventDefault();
        
        const namaMenu = $("#namaMenuEdit").val();
        const deskripsi = $("#deskripsiEdit").val();
        const harga = $("#hargaEdit").val();

        // Get the data-content attribute from the hidden input
        const dataContent = $("#dataContentHidden").val();

        // Update the values in the card based on data-content
        $(".content[data-content='" + dataContent + "']").closest('.card').find('#nama_menu').text(namaMenu);
        $(".content[data-content='" + dataContent + "']").closest('.card').find('#deskripsi').text(deskripsi);
        $(".content[data-content='" + dataContent + "']").closest('.card').find('#harga').text("Rp " + harga);


        // Close the modal after editing
        $('#editMenuModal').modal('hide');
    });

    $(".delButton").on("click", function () {
        event.preventDefault();
        const dataContent = $(this).closest('.card').find('.content').data('content');
        $("#dataContentHidden").val(dataContent);

        const namaMenuCard = $(this).closest('.card').find('#nama_menu').text();
        
        $("#notifDelete").html(`Apakah anda ingin menghapus ${namaMenuCard} dari menu?`);
    });

    $("#confirmDel").on("click", function () {
        // Get the data-content attribute from the hidden input
        const dataContent = $("#dataContentHidden").val();

        $(".main-menu-item").filter(function() {
            return $(this).find('.content').data('content') == dataContent;
        }).remove();

        $('#deleteMenuModal').modal('hide');
    });


    $("#tambahMenu").on("click", function () {
        event.preventDefault();
        const menuBaru = $("#namaMenuBaru").val();
        const deskripsiBaru = $("#deskripsiBaru").val();
        const hargaBaru = $("#hargaBaru").val();
        
        const fileInput = $("#fotoMenuBaru")[0]; // Get the file input element
        const src = fileInput.files[0].name;

        console.log(menuBaru);
        console.log(deskripsiBaru);
        console.log(hargaBaru);
        console.log(src);

        const lastDataContent = $('#listMenu .main-menu-item:last .content').data('content');

        const newDataContent = lastDataContent + 1;
        console.log(newDataContent);

        $("#listMenu").append(`
        <div class="col-xl-4 col-lg-6 col-12 mb-4 main-menu-item">
            <div class="card ">
              <div class="card-img-top">
                <div class="row" style="min-height: 12rem;">
                  <div class="col-lg-4 col-6 d-flex justify-content-center align-items-center">
                    <img class="fotoMenu rounded img-fluid" src="assets/`+ src +`" alt="">
                  </div>
                  <div class="col-lg-6 col-4 d-flex justify-content-center align-items-center mt-3">
                    <div class="content" data-content="`+ newDataContent +`">
                    <h5 id="nama_menu">`+ menuBaru +`</h5>
                    <p id="deskripsi">`+ deskripsiBaru +`</p>
                    <p id="harga">Rp `+ hargaBaru + `</p>
                  </div>
                  </div>
                  <!-- Button User mahasiswa -->
                  <!-- <div class="col-2 text-end d-flex align-items-end justify-content-end">
                    <button type="button" class="btn addButton " style="background-color: #2F4858; color: white;">
                        add</button>
                    <div class="custom-add d-flex align-items-center justify-content-end">
                        <button id="minusButton" class="btn custom-add-btn" style="background-color: #2F4858; color: white"><i class="fas fa-minus"></i></button>
                        <div id="counter" class="fw-bold ms-3 me-3 custom-add-btn counter">1</div>
                        <button id="plusButton" class="btn custom-add-btn" style="background-color: #2F4858; color: white"><i class="fas fa-plus"></i></button>
                    </div>
                  </div> -->
                  <!-- Button User mahasiswa -->

                  <!-- Button User Kantin -->
                  <div class="col-2 text-end d-flex align-items-end justify-content-end">
                    <button type="button" class="btn delButton btn-danger me-4" data-bs-toggle='modal' data-bs-target='#deleteMenuModal'>Delete</button>
                    <button type="button" class="btn editButton" style="background-color: #2F4858; color: white;"
                      data-bs-toggle='modal' data-bs-target='#editMenuModal'>
                        Edit</button>
                  </div>
                  <!-- Button User Kantin -->
                </div>
              </div>
            </div>
          </div>`);


        $('#tambahMenuModal').modal('hide');
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





