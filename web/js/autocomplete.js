$( ".autocomplete" ).autocomplete({
    minLength: 2,
    scrollHeight: 220,
    source: function(req, add){
        $.ajax({
            url:$( ".autocomplete" ).data('source'),
            type:"get",
            dataType: 'json',
            data: 'term='+req.term,
            async: true,
            cache: true,
            success: function(data){
                var suggestions = [];
                //process response
                $.each(data, function(i, val){
                    suggestions.push({"name": val.categoryName});
                });
                //pass array to callback
                add(suggestions);
            }
        });
    }
});