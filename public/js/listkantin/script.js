$(document).ready(function(){
    const socket = io("http://localhost:3000", {
        query: {
            email: user,
        },
    });
    
    $(".canteen").on("click", function(){
        const id = $(this).find("img").attr("id");
        const clickedElement = $(this);
        const url = "/getToko/"+id;
        $.ajax({
            url: url,
            method: "GET",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (data) {

                if (data[0].tutup == '1') {
                    const form = clickedElement.closest('form.media-element.canteen');
                    console.log("Form found:", form);
                    form.submit();
                }
               
            },
            error: function (error) {
                console.error("Error fetching data:", error);
            },
        });
        
        
    })

    socket.on("pesanBukaTutupServer", ({sender,statusTutup}) => {
        const escapedSender = $.escapeSelector(sender);
        const selected = $("#"+escapedSender);
       

        if(statusTutup == "1"){ 
            // Buka
            
            selected.css("filter", "");
            selected.attr("data-content","enabled");
        }else{
            // Tutup
            selected.css("filter", "grayscale(100%)");
            selected.attr("data-content","disabled");
        }
     });
})