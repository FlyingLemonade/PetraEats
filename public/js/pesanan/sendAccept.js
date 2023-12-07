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
                
                console.log("MSG SENT")
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
});
