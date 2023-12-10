$(document).ready(function(){

    const socket = io("http://localhost:3000", {
        query: {
            email : user_id,
        },
    });

    socket.on("pesanTerimaServer", ({statusTerima,order_id}) => {
       
       const status = $("#card-"+ order_id).find("#status");
       
       if(statusTerima == "terima"){
        status.css("background-color", "var(--process-color)");
        status.text("Proses");
       }else if(statusTerima == "selesai"){
        status.css("background-color", "var(--done-color)");
        status.text("Selesai");
       }else{
        status.css("background-color", "var(--deny-color)");
        status.text("Ditolak");
       }



    });




});