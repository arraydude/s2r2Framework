<?php

namespace System\Controllers;

use Framework\Config;
use Framework\Library\ACL;
use Framework\Library\Gettext;
use Framework\Request;
use Framework\Session;
use Framework\Utils;

class LoginController extends \Framework\BaseController
{
    protected $_requireLogin = false;

    public function defaultAction()
    {
        if (ACL::isLogged()) {
            $this->_access();
        }

        $client = $this->_getGoogleClient();

        Session::set('from', Request::get('from', false));

        $this->_render(
             'Login.twig', array(
                             'error'     => Request::get('error', false),
                             'googleUrl' => $client->createAuthUrl()
                         )
        );
    }

    private function _getGoogleClient()
    {
        $clientId = Config::get('framework.google.client');
        $secret   = Config::get('framework.google.secret');
        $redirect = Config::get('framework.base_url') . Config::get('framework.google.responseUrl');

        $client = new \Google_Client();
        $client->setClientId($clientId);
        $client->setClientSecret($secret);
        $client->setRedirectUri($redirect);
        $client->setScopes('email');

        return $client;
    }

    public function googleResponseAction()
    {
        $code = Request::get('code', null);

        if (!$code) {
            Utils::redirect('/system/login');
        }

        $client = $this->_getGoogleClient();
        $client->authenticate($code);

        if ($client->getAccessToken()) {
            $data = $client->verifyIdToken()->getAttributes();

            $userMail     = $data['payload']['email'];
            $userGoogleId = $data['payload']['id'];

            if ($userData = ACL::validateUserByEmail($userMail)) {
                $profilePhoto = $this->_getGooglePhoto($userGoogleId);
                if (null != $profilePhoto) {
                    $userData['profile_photo'] = $profilePhoto;
                }
                ACL::saveUserData($userData);

                $this->_access();
            }
        }

        Utils::redirect('/system/login?error=mail_not_registered');
    }

    public function loginAction()
    {
        $from     = Request::get('from', false);
        $username = Request::get('username', false);
        $password = Request::get('password', false);

        if (ACL::isLogged() || $userData = ACL::validateUserByUsernameAndPassword($username, $password)) {
            if (isset($userData)) {
                ACL::saveUserData($userData);
            }
            $this->_access();
        } else {
            $this->_render(
                 'Login.twig', array(
                                 'error' => Gettext::get('invalid_credentials'),
                                 'from'  => $from
                             )
            );
        }
    }

    private function _access()
    {
        $from = Session::get('from');

        if ($from) {
            $params      = Session::get('fromParams', false);
            $queryString = $params ? http_build_query($params) : null;

            Session::delete('fromParams');

            Utils::redirect('/' . str_replace('_', '/', $from) . '?' . $queryString);
        } else {
            Utils::redirect('/system/dashboard');
        }
    }

    private function _getGooglePhoto($userGoogleId)
    {
        $getPhotoUrl      = Config::get('framework.google.getPhotoUrl');
        $getPhotoUrl      = str_replace('[userGoogleId]', $userGoogleId, $getPhotoUrl);
        $getPhotoResponse = json_decode(file_get_contents($getPhotoUrl));
        $googlePhotoUrl   = null;

        if (null != $getPhotoResponse) {
            if (property_exists($getPhotoResponse, 'image')) {
                if (property_exists($getPhotoResponse->image, 'url')) {
                    $photoUrl       = $getPhotoResponse->image->url;
                    $googlePhotoUrl = substr($photoUrl, 0, strpos($photoUrl, "?sz="));
                }
            }
        }

        return $googlePhotoUrl;
    }

    public function logoutAction()
    {
        if (ACL::isLogged()) {
            Session::delete('user');
        }

        Utils::redirect('/system/login');
    }

    protected function userAllowed()
    {
        return true;
    }
}
