$(function() {
    $.ajaxSetup({
       cache: true
    });
    $.getScript('/app/Modules/System/Public/js/bootstrap/bootstrap-growl.min.js', function()
    {
        $.growl.default_options = {
            ele: "body",
            type: "info",
            allow_dismiss: true,
            position: {
                from: "bottom",
                align: "right"
            },
            offset: 20,
            spacing: 10,
            z_index: 1031,
            fade_in: 400,
            delay: 5000,
            pause_on_mouseover: false,
            onGrowlShow: null,
            onGrowlShown: null,
            onGrowlClose: null,
            onGrowlClosed: null,
            template: {
                icon_type: 'class',
                container: '<div class="col-xs-10 col-sm-10 col-md-3 alert">',
                dismiss: '<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>',
                title: '<strong>',
                title_divider: '',
                message: ''
            }
        };
    });
});

function toast(message, title, icon, type) {
    message = message   || "";
    title   = title     || "";
    icon    = icon      || "";
    type    = type      || "success";

    $.growl( {
        title: title,
        icon: icon,
        message: message
    },{
        type: type
    });
}
