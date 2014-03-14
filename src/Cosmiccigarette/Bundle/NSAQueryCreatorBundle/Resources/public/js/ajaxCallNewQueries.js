/**
 * Created by Holger on 09.03.14.
 */
var ajaxCallNewQueries = function() {
    require(['jquery'], function ($) {
        $(document).ready(function () {
            var requestPath = $('#getNewQueries').data('path');
            var jqxhr = $.getJSON(requestPath, function (data) {
                $("#searchButtonOne").attr("href", "http://www.google.com/search?q=" + data.searchQueryOne);
                $("#searchButtonTwo").attr("href", "http://www.google.com/search?q=" + data.searchQueryTwo);
                $('#badgeSearchQueryOne').html(data.searchQueryOne);
                $('#badgeSearchQueryTwo').html(data.searchQueryTwo);
            })
                .done(function () {
                    
                })
                .fail(function () {

                })
                .always(function () {

                });
            jqxhr.complete(function () {

            });
        });
    });
}
var ajaxCallNewQueryOne = function() {
    require(['jquery'], function ($) {
        $(document).ready(function () {
            var requestPath = $('#getNewQueryOne').data('path');
            var jqxhr = $.getJSON(requestPath, function (data) {
                $("#searchButtonOne").attr("href", "http://www.google.com/search?q=" + data.searchQueryOne);
                $('#badgeSearchQueryOne').html(data.searchQueryOne);
            })
                .done(function () {

                })
                .fail(function () {

                })
                .always(function () {

                });
            jqxhr.complete(function () {

            });
        });
    });
}
var ajaxCallNewQueryTwo = function() {
    require(['jquery'], function ($) {
        $(document).ready(function () {
            var requestPath = $('#getNewQueryTwo').data('path');
            var jqxhr = $.getJSON(requestPath, function (data) {
                $("#searchButtonTwo").attr("href", "http://www.google.com/search?q=" + data.searchQueryTwo);
                $('#badgeSearchQueryTwo').html(data.searchQueryTwo);
            })
                .done(function () {

                })
                .fail(function () {

                })
                .always(function () {

                });
            jqxhr.complete(function () {

            });
        });
    });
}
