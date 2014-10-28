<?php

namespace Framework;

/**
 * Utils
 *
 * some util methods
 *
 */
class Utils
{
    public static function valid(&$var, $return = false)
    {
        return !empty($var) ? $var : $return;
    }

    public static function dump($data, $hidden = false)
    {
        echo $hidden ? '<!--' : '';
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        echo $hidden ? '-->' : '';
    }

    public static function entities($text)
    {
        return htmlentities($text, ENT_COMPAT, 'utf-8');
    }

    public static function redirect($destiny)
    {
        $config = Config::get('framework');
        header('Location: ' . $config['base_url'] . $destiny);
        die;
    }

    public static function getGravatarUrl($mail)
    {
        $hash   = md5(strtolower(trim($mail)));
        $config = Config::get('framework');

        return sprintf($config['gravatar'], $hash);
    }

    public static function getProfilePhotoUrl($profilePhoto, $mail, $size=300)
    {
        if (null == $profilePhoto) {
            $hash   = md5(strtolower(trim($mail)));
            $config = Config::get('framework');
            $profilePhotoUrl = sprintf($config['gravatar'], $hash).'?s='.$size;
        } else {
            $profilePhotoUrl = $profilePhoto.'?sz='.$size;
        }

        return $profilePhotoUrl;
    }

    public static function hiddenEcho($string)
    {
        echo "\n";
        echo "<!--";
        echo "\n";
        echo $string;
        echo "\n";
        echo "-->";
    }

    public static function olxSlug($text)
    {
        // Limpiamos las entidades html de la cadena en utf-8
        $text = html_entity_decode($text, ENT_QUOTES, 'UTF-8');

        // El caracter Eth (Ð, đ) no es soportado por iconv
        // La vocal ø Tampoco es soportada por iconv
        // La i sin punto (ı) no es soportada por iconv
        // ' iv' e 'iv ' son usados internamente por olx
        // Si algun dia estas 4 excepciones dejan de suceder,
        // esta funcion sera deprecada
        $text = str_replace(
            array(
                'Đ', 'đ', 'ı', 'ø', ' iv', 'iv ',
            ),
            array(
                'd', 'd', 'i', 'o', '-i-v', 'i-v-',
            ),
            $text
        );

        return self::slug($text);
    }

    /**
     * Takes a UTF-8 string and returns a string ready to use in a URL
     *
     * @param string $string
     *
     * @return string
     */
    private static function slug($string)
    {
        $string = self::removeSpecialChars($string);
        $string = iconv('UTF-8', 'ASCII//TRANSLIT', $string);
        $string = strtolower($string);
        $string = preg_replace('/[^a-z0-9]+/', '-', $string);
        $string = preg_replace('/-+/', '-', $string);
        $string = trim($string, '-');

        return $string;
    }

    private static function removeSpecialChars($string)
    {
        $toReplace = array(
            "á", "ử", "é", "í", "ó", "ú",
            "Á", "É", "Í", "Ó", "Ú", "à", "è", "ì", "ò", "ù",
            "À", "È", "Ì", "Ò", "Ù", "â", "ê", "î", "ô", "û",
            "Â", "Ê", "Î", "Ô", "Û", "ã", "õ", "Ã", "Õ",
            "ä", "ë", "ï", "ö", "ü", "Ä", "Ë", "Ï", "Ö", "Ü",
            "ő", "ű", "ñ", "Ñ", "ç", "Ç", "ł", "Ł", "ß", "ę", "Ę",
            "ż", "Ż", "ś", "ć", "ą", "ń", "ě", "ř", "č", "š", "Š",
            "ž", "ů", "ý", "Ž", "Ś", "ă", "ţ", "ş", "Į", "į", "ų",
            "ė", "ū", "ầ", "ứ", "í", "á", "ì", "ữ", "ệ",
            "ấ", "ẻ", "ị", "ồ", "ẻ", "ò", "ể", "ổ", "ứ",
            "ữ", "ạ", "à", "ư", "ở",
            "ậ", "ơ", "ư", "ỷ", "ề", "ả", "ệ", "ộ", "ả",
            "ụ", "ạ", "ế",
            "ậ", "ỗ", "ử", "ể", "ỹ", "ớ", "ố", "ự", "ễ",
            "ő", "Č", "ť", "ľ",
            "ā", "ģ", "ī", "ļ", "ē", "Ē", "ặ", "ỡ", "å",
            "æ", "ğ", "Ş", "İ",
            "ó", "ọ", "ọ", "ệ", "ờ", "ử", "ẹ", "ị",
            "ằ", "ử", "ụ", "ợ",
        );
        $replaceBy = array(
            "a", "u", "e", "i", "o", "u",
            "a", "e", "i", "o", "u", "a", "e", "i", "o", "u",
            "a", "e", "i", "o", "u", "a", "e", "i", "o", "u",
            "a", "e", "i", "o", "u", "a", "o", "a", "o",
            "a", "e", "i", "o", "u", "a", "e", "i", "o", "u",
            "o", "u", "n", "n", "c", "c", "l", "l", "ss", "e", "e",
            "z", "z", "s", "c", "a", "n", "e", "r", "c", "s", "s",
            "z", "u", "y", "z", "s", "a", "t", "s", "i", "i", "u",
            "e", "u", "a", "u", "i", "a", "i", "u", "e",
            "a", "e", "i", "o", "e", "o", "e", "o", "u",
            "u", "a", "a", "u", "o",
            "a", "o", "u", "y", "e", "a", "e", "o", "a",
            "u", "a", "e",
            "a", "o", "u", "e", "y", "o", "o", "u", "e",
            "o", "c", "t", "l",
            "a", "g", "i", "l", "e", "E", "a", "o", "a",
            "ae", "g", "s", "i",
            "o", "o", "o", "e", "o", "u", "e", "i",
            "a", "u", "u", "o",
        );

        $string = str_replace($toReplace, $replaceBy, $string);

        return $string;
    }

    public static function getUploadPath()
    {
        return __DIR__ . '/../../files/';
    }

    public static function csv2Array($csvPath, $delimiter = ';', $withHeader = true, $columnsNames = false)
    {
        $csv  = array();
        $file = file($csvPath);

        if ($withHeader) {
            $header = str_getcsv($file[0], ';');
        }
        foreach ($file as $key => $line) {
            if ($withHeader && $key == 0) {
                continue;
            }
            $csvLine = str_getcsv($line, $delimiter);

            $arrCsvLine = array();
            foreach ($csvLine as $column => $value) {
                if(!$columnsNames) {
                    $arrCsvLine[$header[$column]] = $value;
                }else{
                    $arrCsvLine[$columnsNames[$column]] = $value;
                }
            }

            $csv[] = $arrCsvLine;
        }

        return $csv;
    }

    public static function camelize(string $str, $capitalize_first_char = false)
    {
        if ($capitalize_first_char) {
            $str[0] = strtoupper($str[0]);
        }
        $func = create_function('$c', 'return strtoupper($c[1]);');

        return preg_replace_callback('/_([a-z])/', $func, $str);
    }

    public static function revertCamelize($str, $delimiter = '_')
    {
        if (strlen($str) > 0) {
            $newStr = "";

            for ($i = 0; $i <= (strlen($str) - 1); $i++) {
                if (ctype_upper($str[$i])) {
                    $newStr .= $delimiter . strtolower($str[$i]);
                } else {
                    $newStr .= $str[$i];
                }
            }

            return $newStr;
        }

        throw new Exception('The param must be an string');
    }
}
