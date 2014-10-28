<?php

namespace Framework;

use Framework\Library\Twig\Twig;

class HttpException extends \Exception
{
    public function __construct($message = '', $code = null)
    {
        $responseFamily = floor($code / 100);
        switch ($responseFamily) {
            case 2:
                break;
            case 4:
                $this->notFound($message, $code);
                break;
            case 5:
                $this->internalError($message, $code);
                break;
            default:
                $this->internalError('this message should not appear', $code);
                break;
        }
    }

    private function notFound($message, $code)
    {
        switch ($code) {
            case 403:
                header("Status: 403 Forbidden");
                header('HTTP/1.0 403 Forbidden');
                break;
            case 404:
                header("Status: 404 Not Found");
                header('HTTP/1.0 404 Not Found');
                break;
        }

        Twig::render(
            'Modules/System/Views/Errors/NotFound.twig',
            array(
                'message' => $message,
                'code'    => $code
            )
        );
    }

    private function internalError($message, $code)
    {
        header("Status: 500 Server Error");
        header('HTTP/1.1 500 Internal Server Error');

        Twig::render(
            'Modules/System/Views/Errors/InternalError.twig',
            array(
                'message' => $message,
                'code'    => $code
            )
        );
    }
}
