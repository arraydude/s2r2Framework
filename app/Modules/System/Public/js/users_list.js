function bindToggleEnabled() {
    $(".onoffswitch-checkbox").off('click');
    $(".onoffswitch-checkbox").on('click', function () {
        var that = $(this);
        var userId = that.val();
        var enabled = +that.is(':checked');
        $.ajax({
            url: "/system/user/toggleEnable",
            data: {userId: $(this).val(), enabled: enabled},
            complete: function (e) {
                var title = 'Success';
                var message = 'Changes saved';
                var type = 'success';

                if (e.status != 200) {
                    that.prop('checked', !enabled);
                    var title = 'Error';
                    var message = 'Changes not saved';
                    var type = 'danger';
                }

                toast(message, title, 'fa fa-check-circle fa-fw fa-lg', type);
            }
        });
    });
}

$(function () {
    bindToggleEnabled();

    $("[data-add-more='users']").pager({
        template: Twig.templates.userList,
        page: 2,
        globalVars: {
            userLogged: {
                id: FWK.userLogged.id
            }
        },
        extraParams: {
            jsonResponse: true,
            search: $("#search-user").val()
        },
        callback: function () {
            bindToggleEnabled();
        }
    });
});