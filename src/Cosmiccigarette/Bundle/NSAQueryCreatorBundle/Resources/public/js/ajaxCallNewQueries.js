/**
 * Created by Holger on 09.03.14.
 */
var ajaxCallNewQueries = function() {
    require(['jquery'], function ($) {
        $(document).ready(function () {
            var requestPath = $('#getNewQueries').data('path');
            var jqxhr = $.getJSON(requestPath, function (data) {
                $("#searchButtonOne").attr("href", "http://www.google.com/search?q=" + data.searchQueryOne.query);
                $("#searchButtonTwo").attr("href", "http://www.google.com/search?q=" + data.searchQueryTwo.query);
                $('#badgeSearchQueryOne').html(data.searchQueryOne.query);
                $('#badgeSearchQueryTwo').html(data.searchQueryTwo.query);
            })
                .done(function () {
                    console.log("second success");
                })
                .fail(function () {
                    console.log("error");
                })
                .always(function () {
                    console.log("complete");
                });
            jqxhr.complete(function () {
                console.log("second complete");
            });
        });
    });
}
var ajaxCallNewQueryOne = function() {
    require(['jquery'], function ($) {
        $(document).ready(function () {
            var requestPath = $('#getNewQueryOne').data('path');
            var jqxhr = $.getJSON(requestPath, function (data) {
                $("#searchButtonOne").attr("href", "http://www.google.com/search?q=" + data.searchQueryOne.query);
                $('#badgeSearchQueryOne').html(data.searchQueryOne.query);
            })
                .done(function () {
                    console.log("second success");
                })
                .fail(function () {
                    console.log("error");
                })
                .always(function () {
                    console.log("complete");
                });
            jqxhr.complete(function () {
                console.log("second complete");
            });
        });
    });
}
var ajaxCallNewQueryTwo = function() {
    require(['jquery'], function ($) {
        $(document).ready(function () {
            var requestPath = $('#getNewQueryTwo').data('path');
            var jqxhr = $.getJSON(requestPath, function (data) {
                $("#searchButtonTwo").attr("href", "http://www.google.com/search?q=" + data.searchQueryTwo.query);
                $('#badgeSearchQueryTwo').html(data.searchQueryTwo.query);
            })
                .done(function () {
                    console.log("second success");
                })
                .fail(function () {
                    console.log("error");
                })
                .always(function () {
                    console.log("complete");
                });
            jqxhr.complete(function () {
                console.log("second complete");
            });
        });
    });
}
