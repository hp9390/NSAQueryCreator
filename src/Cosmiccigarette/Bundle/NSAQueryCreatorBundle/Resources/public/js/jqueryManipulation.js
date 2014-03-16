/**
 * Created by Holger on 08.03.14.
 */
var readyFunction = function() {
    require(['ajaxCallNewQueries', 'enableDetails', 'keyCode']);
    $("[data-toggle=tooltip]").tooltip();
    $( "#sortable" ).sortable().disableSelection();
}

