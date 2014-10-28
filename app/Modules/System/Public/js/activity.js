$(function () {
    bindDateRange();
    bindParamsList();
});

function bindDateRange() {
    var startDate = dateFrom != null ? dateFrom : moment().subtract('days', 29);
    var endDate = dateTo != null ? dateTo : moment();

    $('#reportrange').daterangepicker({
            startDate: startDate,
            endDate: endDate,
            minDate: '01/01/2012',
            maxDate: '12/31/2014',
            dateLimit: {days: 60},
            showDropdowns: true,
            showWeekNumbers: true,
            timePicker: false,
            timePickerIncrement: 1,
            timePicker12Hour: true,
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract('days', 1), moment().subtract('days', 1)],
                'Last 7 Days': [moment().subtract('days', 6), moment()],
                'Last 30 Days': [moment().subtract('days', 29), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')]
            },
            opens: 'left',
            buttonClasses: ['btn btn-default'],
            applyClass: 'btn-small btn-primary',
            cancelClass: 'btn-small',
            format: 'MM/DD/YYYY',
            separator: ' to ',
            locale: {
                applyLabel: 'Submit',
                fromLabel: 'From',
                toLabel: 'To',
                customRangeLabel: 'Custom Range',
                daysOfWeek: ['Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa'],
                monthNames: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                firstDay: 1
            }
        },
        function (start, end) {
            var from = start.format('MMMM D, YYYY');
            var to = end.format('MMMM D, YYYY');

            var $post = $("<form/>");

            var search = '';
            if ($('#search-username').val() !== '') {
                search = '&search=' + $('#search-username').val();
            }

            $post.attr('method', 'post')
                .attr('action', '/system/activity/default/?dateBetween[from]=' + start.format('YYYY-MM-DD') + '&dateBetween[to]=' + end.format('YYYY-MM-DD') + search)
                .submit();

            $('#reportrange span').html(from + ' - ' + to);
        }
    );
    //Set the initial state of the picker label
    $('#reportrange span').html(moment(startDate).format('MMMM D, YYYY') + ' - ' + moment(endDate).format('MMMM D, YYYY'));
}

function bindParamsList() {
    $("[data-show-params]").off('click');
    $("[data-show-params]").on('click', function (e) {
        var $self = $(this);
        var params = $self.parents('tr').first().data('activityParams');

        $self.find('i').addClass('fa-spinner').addClass('fa-spin');

        $.ajax('/system/activity/ajaxdebugparams', {
            data: {
                params: params
            },
            success: function (view) {
                $self.find('i').removeClass('fa-spinner').removeClass('fa-spin');
                bootbox.dialog({
                    title: 'Params DEBUG',
                    message: view,
                    onEscape: function () {
                    }
                });
            }
        });

        return false;
    });
}
