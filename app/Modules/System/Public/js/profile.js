$(function () {
    bindPager();

    $("[data-delete-privilege]").on('click', function (e) {
        e.preventDefault();
        var $self = $(this);
        bootbox.confirm('¿ Are you sure do you want to delete this privilege ?', function (del) {
            if (del) {
                deletePrivilege({
                    user_id: $self.attr('data-user-id'),
                    module: $self.attr('data-module'),
                    controller: $self.attr('data-controller'),
                    action: $self.attr('data-action')
                }, function (deleted) {
                    $self.parents('tr').hide('slow');
                });
            }
        });
    });
});

function deletePrivilege(data, callback) {
    $.ajax('/system/user/deleteprivilege/', {
        //dataType: 'json',
        data: data,
        success: function (deleted) {
            callback(deleted);
        },
        error: function (jqXHR, textStatus, errorThrown) {
            // @todo
        }
    });
}

function bindPager() {
    $("[data-add-more='activities']").pager({
        template: Twig.templates.activityList,
        page: 2,
        extraParams: {
            user_id: user.user_id
        }
    });
}