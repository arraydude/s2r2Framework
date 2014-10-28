$(function ($) {
    var self = this;

    self.get = function ($e, callback, settings) {
        $.ajax(settings.src, {
            dataType: 'json',
            method: 'post',
            data: $.extend({
                page: settings.page
            }, settings.extraParams),
            success: function (response) {
                if (response.elements.length > 0) {
                    var target = $e.data('target');

                    $.each(response.elements, function (i, element) {
                        var vars = {};
                        $.each(settings.globalVars, function (index, value) {
                            vars[index] = value;
                        });
                        vars['element'] = element;

                        $.when($(target).append(settings.template.render(vars))).then(function () {
                            settings.onAppend(element)
                        });

                        if (!response.addMore) {
                            $e.addClass('hidden');
                        }
                    });
                } else {
                    $e.addClass('hidden');
                }

                settings.page++;
                settings.callback(response.elements);
                callback();
            },
            error: function () {
                settings.onError();
            }
        });
    };

    $.fn.pager = function (options) {
        var that = this;
        var settings = $.extend({
            page: 1,
            src: '/' + $(that).data('src').replace('_', '/').replace('_', '/'),
            template: null,
            globalVars: {},
            extraParams: {},
            callback: function (data) {
            },
            onAppend: function (element) {
            },
            onError: function () {
            }
        }, options);

        return $(that).each(function (e) {
            $(that).data('$pager', self.settings);

            $(this).on('click', function (e) {
                e.preventDefault();

                var previousContent = $(that).html();
                $(that).html('<i class="fa fa-spinner spinner fa-spin"></i>');
                self.get(that, function () {
                    $(that).html(previousContent);
                }, settings);
            });
        });

    };
}(jQuery));