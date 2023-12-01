$(document).ready(function () {
    $(".card-body").on("click", function () {
        const noteContent = $(this).attr("data-content");
        
        
        const apiRequest = '/getOrder/'+ noteContent;

        $.ajax({
            url: apiRequest,
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                
                $("#dynamicModalLabel").text("Nota Nomor : " + noteContent);
                let number = 0;

                const htmlContentRows = data.map(function(item) {
                    number += 1;
                    return "<tr><td>" + number + "</td><td>" + item.nama_menu + "</td><td>" + item.jumlah_pesanan + "</td></tr>";
                }).join("");
                
                const htmlContentTotal = "<tr><td>Total : </td><td>" + data[0].nominal + "</td></tr>";
                const combinedHtmlContent = htmlContentRows + htmlContentTotal;

                $("#data-pesanan").html(combinedHtmlContent);
                $("#dynamicModal").modal("show");

            },
            error: function(error) {
                console.error('Error fetching data:', error);
            }
        });
    });
});
