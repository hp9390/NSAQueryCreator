/**
 * Created by Holger on 10.03.14.
 */
$( document ).on( "keydown", function( event ) {
        event.preventDefault();
//        var keycode = (event.keyCode ? event.keyCode : event.which);
    var keycode = event.which;
        if (keycode == 49) {
            $('#searchButtonOne').click();
        } else if (keycode == 50) {
            $('#searchButtonTwo').click();
        }
});
