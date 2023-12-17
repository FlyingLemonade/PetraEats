$(document).ready(function () {
    const socket = io("http://localhost:3000", {
        query: {
            email: user_id,
        },
    });

    $(document).on("click",".decide-btn", function () {
        const noteContent = $(this)
            .closest(".card")
            .find(".card-body")
            .attr("data-content");
        const apiRequest = "/getOrder/" + noteContent;
        const status = $(this).attr("data-content");

        // Button Hilang
        const cardFooter = $(this).closest(".card-footer");
        const proses = $(this).closest(".card").find("#status");

        if(status == "terima"){
            proses.css("background-color","var(--process-color)")
            proses.text("Proses");
            cardFooter.html('<button data-content="selesai" class="btn btn-success m-0 decide-btn" type="button" data-ripple-color="primary">Selesai <i class="fas fa-check"></i></button>');

        }else if(status == "selesai") 
        {
            proses.css("background-color","var(--done-color)")
            proses.text("Selesai");
            cardFooter.html('');
        }
        else{
            proses.css("background-color","var(--deny-color)")
            proses.text("Ditolak");
            cardFooter.html('');
        }
        
        
        $.ajax({
            url: apiRequest,
            method: "GET",
            dataType: "json",
            success: function (data) {
                const tujuan = data.map(function (item) {
                    return item.email_user;
                });
                
                socket.emit("pesanTerima", {
                    order_id: noteContent,
                    statusTerima: status,
                    userTujuan: tujuan[0],
                });
            },
            error: function (error) {
                console.error("Error fetching data:", error);
            },
        });
    });



     socket.on('kirimOrderServer', ({ pemesan,lastOrderId }) =>{
      
         const url = "/getPembeli/"+pemesan;
         $.ajax({
             url: url,
             method: "GET",
             dataType: "json",
             success: function (data) {
       
                 $('.custom-box').append(`<div class="col-xl-6 mb-4" id="card-`+lastOrderId+`">
                 <div class="card">
                   <div class="card-body" data-bs-toggle="modal" data-bs-target="#dynamicModal" data-content="`+lastOrderId+`">
                     <div class="row d-flex justify-content-between align-items-center">
                       <div class="col-12 col-md-6 d-flex align-items-center">
                         <img src= "http://localhost:8000/assets/mahasiswa/profile/`+data.picture+`" alt="" style="width: 45px; height: 45px" class="rounded-circle" />
                         <div class="ms-3">
                           <!-- Nama Customer -->
                           <p class="fw-bold mb-1">`+data.nama+`</p>
                           <!-- ID Order -->
                           <p id="email" class="text-muted mb-1">Nomor Transaksi :`+lastOrderId+`</p>
                         </div>
                       </div>
                       <span id="status" class="col-md-2 col-12 text-center fw-bold rounded-pill custom-status-1 p-1 me-4">
                      Pesan
                     </div>
                   </div>
                   <div class="card-footer p-2 d-flex justify-content-end">
                     <button data-content="terima" class="btn btn-success m-0 decide-btn" type="button" data-ripple-color="primary">Terima <i class="fas fa-check"></i></button>
                     <button data-content="tolak" class="btn btn-danger ms-3 decide-btn" type="button" data-ripple-color="primary">Tolak <i class="fas fa-times"></i></button>
                   </div>
                 </div>
               </div>`)
             },
             error: function (error) {
                 console.error("Error fetching data:", error);
             },
         });
     });
 
});
