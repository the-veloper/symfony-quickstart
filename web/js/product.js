$(document).ready(function () {
    $("#add_to_card").click(function () {
        $.ajax({
            method: "POST",
            data: {
                product_id: $(this).data('id'),
                product_qty: 1
            },
            url: "{{ path('cart_add') }}",
            success: function (response) {
                console.log(response);
            }
        });
    });
});