<?php

namespace Framework\Models;

class Language extends DatabaseModel
{
    protected $_table = 'languages';
    protected $_primary = 'language_id';
    protected $_cols = array(
        'language_id',
        'name',
        'iso',
    );

    public function getMultipleByIso(array $codes)
    {
        $languages = array();
        foreach ($codes as $code) {
            $languages[] = $this->getByIso($code);
        }

        return $languages;
    }

    public function getByIso($iso)
    {
        return $this->fetch(array('iso' => $iso));
    }
}
