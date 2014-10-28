<?php

namespace Framework\Library;

class HttpRequest
{
    const CONTENT_JSON = 'application/json';
    
    /**
     * @var string
     */
    private $_url;
    /**
     * @var array
     */
    private $_params = array();
    /**
     * @var array
     */
    private $_queryParams = array();
    /**
     * @var string
     */
    private $_method = HTTP_METH_GET;
    /**
     * @var string
     */
    private $_body = '';
    /**
     * @var string
     */
    private $_contentType = '';
    /**
     * @var \HttpRequest
     */
    private $_httpRequest;
    
    public function __construct($url)
    {
        $this->_url = $url;
    }

    /**
     * Adds a query parameter for the current query object
     *
     * @param string $key
     * @param string $param
     *
     * @access public
     * @return \Framework\Library\HttpRequest
     */
    public function addParam($key, $param = null)
    {
        $this->_params[$key] = $param;

        return $this;
    }

    /**
     * Adds a queryString parameter for the current query object
     *
     * @param string $key
     * @param string $param
     *
     * @access public
     * @return \Framework\Library\HttpRequest
     */
    public function addQueryParam($key, $param)
    {
        $this->_queryParams[$key] = $param;

        return $this;
    }

    /**
     * Returns all query parameters
     *
     * @access public
     * @return array
     */
    public function getParams()
    {
        return $this->_params;
    }

    /**
     * Remove all params from array
     *
     * @access public
     */
    public function resetParams()
    {
        $this->_params = array();

        return $this;
    }

    /**
     * Returns all query parameters
     *
     * @access public
     * @return array
     */
    public function getQueryParams()
    {
        return $this->_queryParams;
    }

    /**
     * String representation of this query
     *
     * @access public
     * @return string
     */
    public function getQuery()
    {
        $string = '';
        // Params
        foreach ($this->_params as $key => $value) {
            $string .= '/' . $key;
            if (null !== $value) {
                $string .= '/' . urlencode($value);
            }
        }
        // QueryString Params
        if (!empty($this->_queryParams)) {
            $prefix = '?';
            foreach ($this->_queryParams as $key => $value) {
                $string .= $prefix . $key . '=' . urlencode($value);
                $prefix = '&';
            }
        }

        return $string;
    }

    /**
     * String full representation of this query
     *
     * @access public
     * @return string
     */
    public function getFullQuery()
    {
        return $this->_url . $this->getQuery();
    }

    /**
     * set a http body
     *
     * @param string $body
     *
     * @access public
     * @return \Framework\Library\HttpRequest
     */
    public function setBody($body)
    {
        $this->_body = $body;

        return $this;
    }
    
    /**
     * Set the content type
     *
     * @param string $contentType
     *
     * @access public
     * @return \Framework\Library\HttpRequest
     */
    public function setContentType($contentType)
    {
        $this->_contentType = $contentType;

        return $this;
    }

    /**
     * set the http method
     *
     * @param string $method
     *
     * @access public
     * @return \Framework\Library\HttpRequest
     */
    public function setMethod($method)
    {
        $this->_method = $method;

        return $this;
    }

    protected function _trySend($url)
    {
        $this->_httpRequest = new \HttpRequest($url);
        $this->_httpRequest->addHeaders(array("Accept-Encoding" => "gzip"));
        $this->_httpRequest->setMethod($this->_method);
        $this->_httpRequest->setBody($this->_body);
        
        if (! empty($this->_contentType)) {
            $this->_httpRequest->setContentType($this->_contentType);
        }

        try {
            $response = $this->_httpRequest->send();
        } catch (\Exception $e) {
            try {
                $response = $this->_httpRequest->send();
            } catch (\Exception $e) {
                $responseInfo = $this->_httpRequest->getResponseInfo();
                error_log(
                    "PECL HttpRequest in "
                    . "ReST Error :: After Second Try "
                    . $responseInfo['error'] . " - "
                    . $responseInfo['effective_url']
                );
                throw new \Exception(
                    "PECL HttpRequest in "
                    . "ReST Error :: After Second Try "
                    . $responseInfo['error'] . " - "
                    . $responseInfo['effective_url']
                );
            }
        }

        return $response;
    }

    protected function _tryGetResponse()
    {
        $response       = $this->_trySend($this->getFullQuery());
        $responseCode   = $response->getResponseCode();
        $responseFamily = floor($responseCode / 100);
        switch ($responseFamily) {
            case 2:
                return $response->getBody();
                break;
            case 4:
                $errorMessage = 'ReST Request Error';
                break;
            case 5:
                $errorMessage = 'ReST Server Error';
                break;
            default:
                if ($responseCode === 302) {
                    return $response->getBody();
                }
                $errorMessage = 'ReST Error';
        }

        throw new \Exception(
            "$errorMessage, Response code: $responseCode QUERY: ".$this->getFullQuery().' BODY: '.$response->getBody(),
            (int)$responseCode
        );
    }

    protected function _toArray($object)
    {
        if (is_object($object) || is_array($object)) {
            $array = array();
            foreach ($object as $key => $value) {
                if (is_object($value)) {
                    $value = $this->_toArray($value);
                } elseif (is_array($value)) {
                    $value = array_map(array($this, '_toArray'), $value);
                }
                $array[$key] = $value;
            }
        } else {
            $array = $object;
        }

        return $array;
    }

    /**
     * get the http response
     *
     * @param void
     *
     * @access public
     * @return array
     */
    public function getResponse()
    {
        $response = $this->_toArray(json_decode($this->_tryGetResponse()));

        return $response;
    }
    
    public function isReachable()
    {
        try {
            $response = $this->_trySend($this->_url);
            $responseCode = $response->getResponseCode();
            $responseFamily = floor($responseCode / 100);
        
            if ($responseFamily == 4 || $responseFamily == 5) {
                return false;
            } else {
                return true;
            }
        } catch (\Exception $e) {
            return false;
        }
    }
    
}
