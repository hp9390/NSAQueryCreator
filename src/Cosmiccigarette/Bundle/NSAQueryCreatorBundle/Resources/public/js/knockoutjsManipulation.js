/**
 * Created by Holger on 08.03.14.
 */
require(['knockoutjs', 'jquery'], function (ko, $) {
    function AppViewModel() {
        this.getNewQueries = function() {
            alert('foo');
        }
    }

    ko.applyBindings(new AppViewModel());
});
