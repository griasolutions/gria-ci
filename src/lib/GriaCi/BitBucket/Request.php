<?php

namespace Gria\BitBucket;

class Request extends \Gria\Config\Configurable
{

    const METHOD_POST = 'post';
    const METHOD_GET = 'get';
    const METHOD_PUT = 'put';
    const METHOD_DELETE = 'delete';

    private $_handle;
    private $_data = array();
    private $_endpoint;

    public function __construct(\GriaCi\Config\Config $config)
    {
        parent::__construct($config);
        $this->_handle = curl_init();
    }

    public function __destruct()
    {
        if ($this->getHandle()) {
            curl_close($this->getHandle());
        }
    }

    public function __toString()
    {
        return $this->getUrl();
    }

    public function getUrl()
    {
    }

    public function setData(array $data)
    {
        $this->_data = $data;
    }

    public function setEndpoint($endpoint)
    {
        $this->_endpoint = $endpoint;
    }

    public function setMethod($method)
    {
        switch($method) {
            case self::METHOD_POST:
                curl_setopt($this->getHandle(), CURLOPT_POST, true);
                break;
            case self::METHOD_PUT:
                curl_setopt($this->getHandle(), CURLOPT_PUT, true);
                break;
            case self::METHOD_DELETE:
                curl_setopt($this->getHandle(), CURLOPT_CUSTOMREQUEST, 'DELETE');
                break;
            default:
                curl_setopt($this->getHandle(), CURLOPT_HTTPGET, true);
                break;                                                                                                                                                                              
        }     
    }

    public function getHandle()
    {
        return $this->_handle;
    }

    public function post()
    {    
        $this->setMethod(self::METHOD_POST);
        return $this->send();
    }

    public function get()
    {
        $this->setMethod(self::METHOD_GET);
        return $this->send();
    }

    public function send($method)
    {
        $this->setMethod($method);
        curl_setopt($this->getHandle(), CURLOPT_URL, $this->getUrl());
        curl_setopt($this->getHandle(), CURLOPT_HEADER, false);
        curl_setopt($this->getHandle(), CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($this->getHandle());
        $response = new Response($result);
        curl_close($this->getHandle());
        return $response;
    }

}
