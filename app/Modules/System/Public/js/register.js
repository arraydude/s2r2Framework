$(function() {
    $('#registerWizard').wizard();

    $('#role').change(function() {
        $("[data-perms]").addClass('hidden');
        $("[data-perms] input:checkbox").prop('checked', false);
        $(".perms.spinner").removeClass('hidden');

        if ($(this).val()) {
            $.ajax({
                url: "/system/register/getPrivilegesFromRole",
                data: {roleId: $(this).val()},
                dataType: "json",
                success: function(response) {
                    $.each(response, function(key, action) {
                        var splited = action.split("_");
                        $('#' + action).prop('checked', true);
                        $('#' + action).prop('disabled', true);
                        var $module = $("[data-perms-module*='" + splited[0] + "']");
                        $module.first().prop('checked', true);
                        $module.parent().find("[data-perms-controller*='" + splited[1] + "']").first().prop('checked', true);
                    });
                    $(".perms.spinner").addClass('hidden');
                    $("[data-perms]").removeClass('hidden');
                }
            });
        } else {
            $(".perms.spinner").addClass('hidden');
        }
    });

    $("[data-perms] input:checkbox").on('change', function(e) {
        var $self = $(this);
        $self.parent().find('input:checkbox:enabled').prop('checked', $self.prop('checked'));
    });


    $('#registerWizard').on('change', function(e) {
        var activeStep = $(this).wizard('selectedItem').step;

        if (activeStep == 1) {
            var $formElements = $("#step" + activeStep).find('input, select');

            $formElements.each(function() {
                var $self = $(this);
                var isValid = $self[0].checkValidity();

                if (!isValid) {
                    e.preventDefault();
                    $self.parents('.form-group').addClass('has-error');
                } else {
                    $self.parents('.form-group').removeClass('has-error').addClass('has-success');
                }
            });
        }
    });

});
