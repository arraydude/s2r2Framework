<?php

namespace System\Controllers;

use Framework\Config;
use Framework\Request;

class MailController extends \Framework\BaseController
{
    public function sendAction()
    {
        $mailTo          = Request::get('to', false);
        if (! $mailTo) {
            echo 'Please add ?to={{local-part-of-email-address}}';
            die;
        }
        $mailTo         .= '@olx.com';
        
        $emailFromSystem = Config::get('framework.email_from.system');
        
        $mail            = new \PHPMailer;
        $mail->setFrom($emailFromSystem['address'], $emailFromSystem['name']);
        $mail->addAddress($mailTo);
        $mail->Subject   = 'Test from ToOLX';
        $mail->msgHTML('Test from ToOLX');
        if(! $mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo "Mail sent to {$mailTo}";
        }
    }

    protected function userAllowed()
    {
        return true;
    }
}
