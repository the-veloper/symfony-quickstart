function updateCart() {
    $.ajax({
                method: "GET",
                url: "/app_dev.php/cart/count",
                success: function (response) {
                   $('a[href="/app_dev.php/cart/view"]').html('Cart (' + response['total_count'] + ')');
                }
});
}
 
$(document).ready(function () {
updateCart();
});
