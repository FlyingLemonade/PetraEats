$(document).ready(function () {
    $(".card").on("click", function () {
        const noteContent = $(this).attr("data-content");
        
        
        const apiRequest = '/getOrder/'+ noteContent;

        $.ajax({
            url: apiRequest,
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                var number = 0;
                $("#dynamicModalLabel").text("Nota Nomor : " + noteContent);

                const htmlContent = data.map(function(item) {
                    number += 1;
                    return "<tr><td>"+number+"</td><td>" + item.nama_menu + "</td><td>"+item.jumlah_pesanan +"</td></tr>";
                }).join("");

                $("#data-pesanan").html(htmlContent);
                $("#dynamicModal").modal("show");

            },
            error: function(error) {
                console.error('Error fetching data:', error);
            }
        });
    });
});
