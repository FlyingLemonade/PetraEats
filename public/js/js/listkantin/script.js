$(document).ready(function(){

    $(".canteen").on("click", function(){

        const form = $(this).closest('form');
        form.submit();

        
    })
})