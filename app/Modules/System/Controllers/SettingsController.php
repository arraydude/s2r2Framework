<?php

namespace System\Controllers;

use Framework\Config;
use Framework\Library\ACL;
use Framework\Session;
use Framework\Utils;
use Framework\Request;

class SettingsController extends \Framework\BaseController
{
    private $_userModel;

    public function __construct()
    {
        $this->_userModel = new \Framework\Models\User();
    }

    public function defaultAction()
    {
        $i18nConfig = Config::get('i18n.gettext.languageCode');

        $languageModel = new \Framework\Models\Language();
        $languages     = $languageModel->getMultipleByIso(array_keys($i18nConfig));

        $this->_render(
             'Settings.twig', array(
                                'languages' => $languages,
                            )
        );
    }

    public function saveAction()
    {
        $request = Request::getAll();
        $userId  = Session::get('user')->getId();

        $this->_userModel->save($request, $userId);

        ACL::refreshUserSession();

        Utils::redirect('/system/settings');
    }

    public function changePasswordAction()
    {
        $request = Request::getAll();
        if ($request['password'] === $request['password_repetition']) {
            $userId              = Session::get('user')->getId();
            $request['password'] = \sha1($request['password']);
            $this->_userModel->save($request, $userId);
        }

        Utils::redirect('/system/settings');
    }

    protected function userAllowed()
    {
        return true;
    }
}
