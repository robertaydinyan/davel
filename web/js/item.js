$(document).ready(function() {
    $('.name-autocomplete').autocomplete({
        source: function( request, response ) {
            $.get( {
                url: "/item/get-names",
                dataType: "json",
                data: {
                    term: request.term
                },
                success: function( data ) {
                    response(data);
                }
            } );
        },
        // select: function( event, ui ) {
        //     log( "Selected: " + ui.item.value + " aka " + ui.item.id );
        // }
    });
});