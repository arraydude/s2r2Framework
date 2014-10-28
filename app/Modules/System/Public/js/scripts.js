FWK.generateRoute = function (file) {
    if (file.match('^https?://')) {
        return file;
    }

    var fileExploded = file.split('/');
    var path = FWK.configs.framework.base_url + '/app/Modules/' + fileExploded[0].replace('@', '') + '/Public/';
    path += file.replace(fileExploded[0] + '/', '');

    return path;

};

FWK.loadScript = function (path, success) {
    success = success || function () {
    };
    return $.getScript(FWK.generateRoute(path), success);
};

FWK.loadDependencies = function (payload) {
    var self = FWK;
    self.payload = payload;

    $.ajaxSetup({
        cache: true
    });

    var promise = null;
    $.each(self.payload.dependencies, function (key, script) {
        promise = $.when(FWK.loadScript(script));
    });

    promise.then(function () {
        if (typeof self.payload.callbacks !== 'undefined') {
            $.each(self.payload.callbacks, function (script, callback) {
                $.when(FWK.loadScript(script)).then(callback());
            });
        }
    });

    return promise;
};

$(function ($) {

    $('#sidebar-nav .dropdown-toggle').click(function (e) {
        e.preventDefault();

        var $item = $(this).parent();

        if (!$item.hasClass('open')) {
            $item.parent().find('.open .submenu').slideUp('fast');
            $item.parent().find('.open').toggleClass('open');
        }

        $item.toggleClass('open');

        if ($item.hasClass('open')) {
            $item.children('.submenu').slideDown('fast');
        }
        else {
            $item.children('.submenu').slideUp('fast');
        }
    });

    $('.mobile-search').click(function (e) {
        e.preventDefault();

        $('.mobile-search').addClass('active');
        $('.mobile-search form input.form-control').focus();
    });

    $(document).mouseup(function (e) {
        var container = $('.mobile-search');

        if (!container.is(e.target) // if the target of the click isn't the container...
            && container.has(e.target).length === 0) // ... nor a descendant of the container
        {
            container.removeClass('active');
        }
    });

    $("[data-toggle='tooltip']").tooltip();

    timeAgo();
    setInterval(function () {
        timeAgo();
    }, 50000);
});

function timeAgo() {
    function parse($element) {
        var date = $element.data('timeago');
        return moment(date).fromNow();
    }

    $("[data-timeago]").each(function (key, element) {
        $(element).html(parse($(element)));
    });
}

(function ($, sr) {
    // debouncing function from John Hann
    // http://unscriptable.com/index.php/2009/03/20/debouncing-javascript-methods/
    var debounce = function (func, threshold, execAsap) {
        var timeout;

        return function debounced() {
            var obj = this, args = arguments;

            function delayed() {
                if (!execAsap)
                    func.apply(obj, args);
                timeout = null;
            };

            if (timeout)
                clearTimeout(timeout);
            else if (execAsap)
                func.apply(obj, args);

            timeout = setTimeout(delayed, threshold || 100);
        };
    }
    // smartresize
    jQuery.fn[sr] = function (fn) {
        return fn ? this.bind('resize', debounce(fn)) : this.trigger(sr);
    };

})(jQuery, 'smartresize');

function has_privilege(privilege) {
    var uriComponents = location.toString().split('?')[0].split('/');

    var url = [];
    url['module'] = uriComponents[3];
    url['controller'] = uriComponents[4];
    url['action'] = uriComponents[5];

    var privilegeForm = new Array('module', 'controller', 'action');
    var privilege = privilege.split('_');

    keys = privilegeForm.slice((3 - privilege.length));

    privilege = array_combine(keys, privilege);
    privilege = $.extend(url, privilege);

    function objectJoin(obj, sep) {
        var arr = [], p, i = 0;
        for (p in obj)
            arr[i++] = obj[p];
        return arr.join(sep);
    }

    privilege = objectJoin(privilege, '_').toLowerCase();

    if ($.inArray(privilege, FWK.userLogged.perms) !== -1) {
        return true;
    } else {
        return false;
    }
}

function array_combine(keys, values) {
    var new_array = [],
        keycount = keys && keys.length,
        i = 0;

    // input sanitation
    if (typeof keys !== 'object' || typeof values !== 'object' || // Only accept arrays or array-like objects
        typeof keycount !== 'number' || typeof values.length !== 'number' || !keycount) { // Require arrays to have a count
        return false;
    }

    // number of elements does not match
    if (keycount != values.length) {
        return false;
    }

    for (i = 0; i < keycount; i++) {
        new_array[keys[i]] = values[i];
    }

    return new_array;
}

function gravatarUrl(mail) {
    if (mail === null) {
        mail = '';
    }
    var hash = md5(mail.toLowerCase().trim());
    return FWK.configs.framework.gravatar.replace("%s", hash);
}

function getProfilePhoto(profilePhoto, email, size) {

    size = (typeof size === "undefined") ? "35" : size;

    if (null === profilePhoto) {
        var hash = md5(email.toLowerCase().trim());
        photoUrl = FWK.configs.framework.gravatar.replace("%s", hash) + '?s=' + size;
    } else {
        photoUrl = profilePhoto + "?sz=" + size;
    }
    return photoUrl;
}