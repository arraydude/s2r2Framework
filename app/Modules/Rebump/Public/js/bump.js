// Disable auto discover for all elements:
Dropzone.autoDiscover = false;

var myDropzone = new Dropzone("#rebump-upload", {
    acceptedFiles: "text/plain, .txt"
});

$(function () {
    myDropzone.on("success", function (file, response) {
        response = JSON.parse(response);
        if (response) {
            var $tr = $("<tr/>");
            var $labelTemplate = $("<span class='label label-warning'>Pending</span>");

            $("<td>" + response.file_id + "</td>").addClass('text-left').appendTo($tr);

            $("<td>" + response.user + "</td>").appendTo($tr);

            var $tdTemplate = $("<td/>");
            $tdTemplate.addClass('text-center').append($labelTemplate).appendTo($tr);

            $("<td>" + response.created_date + "</td>").addClass('text-center').appendTo($tr);

            $("table.list-files").append($tr);
        }
    });
});

$('#single_bump').click(function() {
    var icon = $('#single_bump_icon');
    var spinnerClass = 'fa fa-spinner spinner';
    var iconClass = icon.attr('class');
    var itemId = $.trim($('#item_id').val());

    if (itemId != '') {
        icon.removeClass(iconClass).addClass(spinnerClass);
        $.ajax('/rebump/upload/singleBump', {
            data: {
                itemId: itemId
            },
            dataType: 'json',
            success: function (response) {

                icon.removeClass(spinnerClass).addClass(iconClass);

                if (response.success) {
                    toast('Rebump success', 'Well done!', 'fa fa-check-circle fa-fw fa-lg');
                } else {
                    toast('Rebump failed: ' + response.error, 'Oh snap!', 'fa fa-times-circle fa-fw fa-lg', 'danger');
                }
            }
        });
    }
});