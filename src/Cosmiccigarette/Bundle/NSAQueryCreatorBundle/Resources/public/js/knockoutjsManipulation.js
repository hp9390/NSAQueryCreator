/**
 * Created by Holger on 08.03.14.
 */
require(['knockoutjs', 'jquery'], function (ko, $) {
    function AppViewModel() {
        this.getNewQueries = function () {
                ajaxCallNewQueries();
        }
        this.getNewQueryOne = function () {
                ajaxCallNewQueryOne();
        }
        this.getNewQueryTwo = function () {
                ajaxCallNewQueryTwo();
        }
    }

    ko.applyBindings(new AppViewModel());
});
