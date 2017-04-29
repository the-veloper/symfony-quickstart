$(document).ready(function () {
    $(".js-processed-actions").click(function () {
        $.ajax({
            method: "GET",
            url: $(this).data('path') + '/' + $(this).data('id'),
            success: function (response) {
                $(this).html(response.new_text);
                if(response.delete) {
                    $('.' + response.delete).hide('slow', function(){ $('.' + response.delete).remove(); });
                }
            }
        });
    });
});