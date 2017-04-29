$(document).ready(function () {
    $("#add_to_card").click(function () {
        $.ajax({
            method: "POST",
            data: {
                product_id: $(this).data('id'),
                product_qty: 1
            },
            url: $(this).data('path'),
            success: function (response) {
                console.log(response);
            }
        });
        
        $('a[href="/app_dev.php/cart/view"]').Morphext({
    // The [in] animation type. Refer to Animate.css for a list of available animations.
    animation: "wobble",
     separator: "|", // Overrides default ","
    speed: 3000, // Overrides default 2000
    complete: function () {
        updateCart();
    }
});
});
        
        
        
    });



