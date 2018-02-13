var vm = null;

$(function () {
    'use strict';
    $('li.menu-dashboard').addClass('active');

    vm = new DashboardViewModel(14);
    ko.applyBindings(vm);
});
