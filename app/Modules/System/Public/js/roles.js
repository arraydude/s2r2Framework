$(function() {
    $("[data-perms] input:checkbox").on('change', function(e) {
        var $self = $(this);
        $self.parent().find('input:checkbox').prop('checked', $self.prop('checked'));
    });

    $("[data-delete-role]").on('click', function(e) {
        var $self = $(this);
        bootbox.confirm('¿ Are you sure do you want to delete it ?', function(remove) {
            if (remove) {
                $.ajax('/system/roles/delete', {
                    dataType: 'json',
                    data: {
                        roleId: $self.data('role-id')
                    },
                    success: function(response) {
                        if (response.success) {
                            location.reload();
                        } else {
                            toast(response.error, 'Delete failed', 'fa fa-times-circle fa-fw fa-lg', 'danger');
                        }
                    }
                });
            }
        });
    });
    
    $("[data-show-privileges]").on('click', function(e){
        var roleId = $(this).data('role-id');
        $.ajax('/system/roles/getPrivilegesByRole', {
           dataType: "json",
           data: {
               roleId: roleId
           },
           success: function(privileges) {
               var text = "";
               for(var i in privileges) {
                   var privilege = privileges[i];
                   text += privilege.module + "_" + privilege.controller + "_" + privilege.action + "<br/>";
               }
               
               bootbox.alert(text);
           }
        });
    });
});