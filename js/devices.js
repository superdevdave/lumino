var vm = null;
$(function () {
    $('li.menu-devices').addClass('active');

    ko.bindingHandlers.devicesDataTable = {
        init: function (element, valueAccessor) {
            var devicesUnwrapped = ko.unwrap(valueAccessor());

            //console.log(devicesUnwrapped);

            vm.devicesDataTable = $(element).on('draw.dt', function () {
                $('a.modalopen').click(function (e) {
                    e.preventDefault();
                    //console.log($(this).attr('data-id'));
                    vm.selectDevice($(this).attr('data-id'));
                });
            }).DataTable({
                deferRender: true,
                //scrollY: 250,
                scroller: true,
                //    loadingIndicator: true,
                //    displayBuffer: 10
                //},
                //select: {
                //    style: 'single'
                //},
                stateSave: true,
                dom: '<"clearfix"<"pull-left"B><"pull-right"f>><"table-responsive"t><"clearfix"<"pull-left"l><"pull-right"p>>',
                //buttons: [],
                'columns': [{
                    'data': 'name'
                    , 'render': function (data, type, full, meta) {
                        return '<a href="#" class="modalopen" data-id="' + full.id() + '">' + data() + '</a>';
                    }
                }
                , {
                    'data': 'serialNumber'
                    , 'render': function (data, type, full, meta) {
                        return '<a href="#" class="modalopen" data-id="' + full.id() + '">' + data() + '</a>';
                    }
                }
                , { 'data': 'model' }
                , { 'data': 'location' }
                , {
                    'data': 'firstSeen'
                    , 'render': function (data, type, full, meta) {
                        var firstSeen = moment(full.firstSeen());
                        return firstSeen.format("YYYY-MM-DD HH:mm") + ' (' + firstSeen.fromNow() + ')';
                    }
                }
                , {
                    'data': 'lastSeen'
                    , 'render': function (data, type, full, meta) {
                        var lastSeen = moment(full.lastSeen());
                        return lastSeen.format("YYYY-MM-DD HH:mm") + ' (' + lastSeen.fromNow() + ')';
                    }
                }
                , { 'data': 'poNumber' }
                , { 'data': 'assetCost' }
                , { 'data': 'assetRental' }
                , { 'data': 'monthlyContractTerm' }
                , { 'data': 'invoiceNumber' }
                , { 'data': 'invoiceDate' }
                , { 'data': 'settlementDate' }
                , { 'data': 'commencementDate' }
                , { 'data': 'firstInstallmentDate' }
                , { 'data': 'expiresOn' }
                ],
                data: devicesUnwrapped,
                order: [[0, "asc"]]
            });
        },
        update: function (element, valueAccessor) {
            var devices = ko.unwrap(valueAccessor());

            $(element).DataTable().clear();
            $(element).DataTable().rows.add(devices);
            $(element).DataTable().draw();
            $(element).DataTable().columns.adjust();
        }
    };

    vm = new DevicesViewModel();
    ko.applyBindings(vm);
});