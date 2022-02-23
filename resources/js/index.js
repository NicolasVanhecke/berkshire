$(document).ready(function(e) {
    $( '.alert' ).delay( 4000 ).fadeOut( 1000 ); // fade out the message after newsletter form submit
   articleTagToggle();
});

// Show/hide cards, based on the selected data-attribute ( tag )
function articleTagToggle(){
    $( '.tag-pill' ).click( function() {
        var clickedId = $( this ).attr( 'data-tag' );
        activeClickedTagPil( clickedId );

        $( '.card' ).each( function( i, obj ){
            if( clickedId === '0' ){
                // show all
                $( this ).show();
            } else {
                // check each element if it matches the selected id
                var cardTagIds = $( this ).attr( 'data-tags' );
                if( cardTagIds.includes( clickedId ) ){
                    $( this ).show();
                } else {
                    $( this ).hide();
                }
            }
        });
    });
}

// Add/remove the 'active' class for the selected tag
function activeClickedTagPil( clickedId ){
    $( '.tag-pill' ).each( function( i, obj ){
        $( this ).removeClass( 'tag-pill-active' );

        if( $( this ).attr( 'data-tag' ) === clickedId ){
            $( this ).addClass( 'tag-pill-active' );
        }
    });
}
