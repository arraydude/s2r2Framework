<?php

namespace Framework\Library;

use Framework\Config;

class Gettext
{
    public static function init($language, $path, $country = null)
    {
        $config = Config::get('i18n');
        $domain = $config["gettext"]["domain"];
        if (textdomain($domain) !== $domain) {
            throw new \Exception(
                "Error setting \"" . $domain . "\"as gettext text domain."
            );
        }

        $codeset = $config["gettext"]["codeset"];
        if (!is_string(bind_textdomain_codeset($domain, $codeset))) {
            throw new \Exception(
                "Error setting \"" . $codeset . "\"as gettext codeset."
            );
        }
        if (bindtextdomain($domain, $path) === false) {
            throw new \Exception(
                "Error setting \"" . $path . "\"as gettext directory."
            );
        }

        $language = strtolower($language);
        $langCode = $config["gettext"]["languageCode"];
        $key      = $language . "_" . strtoupper($country);
        if (
            $country != null && isset($langCode[$key])
        ) {
            $gettextLanguageCode = $langCode[$key];
        } else {
            $gettextLanguageCode = $langCode[$language];
        }
        putenv("LANG=" . $gettextLanguageCode);
        putenv("LC_ALL=" . $gettextLanguageCode);
        setlocale(LC_ALL, $gettextLanguageCode);
    }

    public static function exists($key)
    {
        if (gettext($key) === $key) {
            return false;
        } else {
            return true;
        }
    }

    public static function get($key)
    {
        return gettext($key);
    }
}
