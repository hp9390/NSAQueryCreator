/**
 * Created by Holger on 09.03.14.
 */
var detailsOne = function () {
    var searchTerm = $('#badgeSearchQueryOne').text();
    var html = '<div class="bg-info" id="infoSearchTerm"><p class="lead text-center text-info">Your search term is: ' + searchTerm + '</p></div>';
    $('#queryButtons').append(html);
}
var detailsTwo = function () {
    var searchTerm = $('#badgeSearchQueryTwo').text();
    var html = '<div class="bg-info" id="infoSearchTerm"><p class="lead text-center text-info">Your search term is: ' + searchTerm + '</p></div>';
    $('#queryButtons').append(html);
}
var disableDetails = function () {
    $('#infoSearchTerm').remove();
}
