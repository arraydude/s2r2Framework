Twig.extendFilter('json_decode', function (json) {
    return json;
});

Twig.extendFunction('gravatarUrl', function (mail) {
    return gravatarUrl(mail);
});

Twig.extendFunction('has_privilege', function (privilege) {
    return has_privilege(privilege);
});

Twig.extendFunction('getProfilePhoto', function (profilePhoto, email, size) {
    return getProfilePhoto(profilePhoto, email, size);
});


Twig.templates = {};

Twig.addTemplate = function (name, stringify) {
    return Twig.templates[name] = twig({
        data: stringify.string
    });
};

