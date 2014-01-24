<?php

/**
 * CURL Adapter
 *
 * */
class EmailDirect_Adapter_Curl
{

    private $_response = '';    // Contains the cURL response for debug
    private $_ch;     // Contains the cURL handler for a session
    private $_baseUrl;      // URL of the session
    private $_options = array(); // Populates curl_setopt_array
    private $_headers = array(); // Populates extra HTTP headers
    private $_defaultHeaders = array();
    public $errorCode;   // Error code returned as an int
    public $errorString;    // Error message returned as a string
    public $info;      // Returned after request (elapsed time, etc)

    public function __construct($baseUrl, $defaultHeaders = array())
    {
        if (!$this->isEnabled()) {
            throw new Exception('Please install cURL extension.');
        }
        
        $this->_defaultHeaders = $defaultHeaders;
        $this->create($baseUrl);
    }

    public function __call($method, $arguments)
    {
        if (in_array($method, array('get', 'post', 'put', 'delete'))) {
            array_unshift($arguments, $method);
            return call_user_func_array(array($this, 'simpleCall'), $arguments);
        }
    }
    
    public function isEnabled()
    {
        return function_exists('curl_init');
    }

    public function simpleCall($method, $url, $params = array(), $options = array())
    {
        $this->setHttpMethod($method);
        // Get acts differently, as it doesnt accept parameters in the same way
        if ($method === 'get') {
            // If a URL is provided, create new session
            $this->setOption(CURLOPT_URL, $this->_baseUrl . $url . ($params ? '?' . http_build_query($params) : ''));
        } else {
            $this->setOption(CURLOPT_URL, $this->_baseUrl . $url);
            
            if (!empty($params)) {
                $this->setOption(CURLOPT_POSTFIELDS, json_encode($params));
            }
        }
        foreach ($this->_defaultHeaders as $key => $value) {
            $this->setHeader($key, $value);
        }
        // Add in the specific options provided
        $this->setOptions($options);

        return $this->execute();
    }

    public function setHeader($header, $content = null)
    {
        $this->_headers[] = $content ? $header . ': ' . $content : $header;
    }

    public function setHttpMethod($method)
    {
        $method = strtoupper($method);
        $this->_options[CURLOPT_CUSTOMREQUEST] = $method;
        if ($method === 'PUT') {
            $this->setHeader('X-HTTP-Method-Override', 'PUT');
        } elseif ($method === 'POST') {
            $this->_options[CURLOPT_POST] = true;
        }
        return $this;
    }

    public function setHttpLogin($username = '', $password = '', $type = 'any')
    {
        $this->setOption(CURLOPT_HTTPAUTH, constant('CURLAUTH_' . strtoupper($type)));
        $this->setOption(CURLOPT_USERPWD, $username . ':' . $password);
        return $this;
    }

    public function ssl($verifyPeer = true, $verifyHost = 2, $pathToCert = null)
    {
        if ($verifyPeer) {
            $this->setOption(CURLOPT_SSL_VERIFYPEER, true);
            $this->setOption(CURLOPT_SSL_VERIFYHOST, $verifyHost);
            $this->setOption(CURLOPT_CAINFO, $pathToCert);
        } else {
            $this->setOption(CURLOPT_SSL_VERIFYPEER, false);
        }
        return $this;
    }

    public function setOptions($options = array())
    {
        // Merge options in with the rest - done as array_merge() does not overwrite numeric keys
        foreach ($options as $option_code => $option_value) {
            $this->setOption($option_code, $option_value);
        }

        // Set all options provided
        curl_setopt_array($this->_ch, $this->_options);

        return $this;
    }

    public function setOption($code, $value)
    {
        if (is_string($code) && !is_numeric($code)) {
            $code = constant('CURLOPT_' . strtoupper($code));
        }

        $this->_options[$code] = $value;
        return $this;
    }

    // Start a session from a URL
    public function create($url)
    {
        $this->_baseUrl = $url;
        $this->_ch = curl_init();

        return $this;
    }

    // End a session and return the results
    public function execute()
    {   
        // Set two default options, and merge any extra ones in
        if (!isset($this->_options[CURLOPT_TIMEOUT])) {
            $this->_options[CURLOPT_TIMEOUT] = 30;
        }
        if (!isset($this->_options[CURLOPT_RETURNTRANSFER])) {
            $this->_options[CURLOPT_RETURNTRANSFER] = true;
        }
        
        // Only set follow location if not running securely
        if (!ini_get('safe_mode') && !ini_get('open_basedir') && !isset($this->_options[CURLOPT_FOLLOWLOCATION])) {
            // Ok, follow location is not set already so lets set it to true
            $this->_options[CURLOPT_FOLLOWLOCATION] = true;
        }

        if (!empty($this->_headers)) {
            $this->setOption(CURLOPT_HTTPHEADER, $this->_headers);
        }
        $this->setOptions();
        
        // Execute the request & and hide all output
        $this->_response = curl_exec($this->_ch);
        $this->info = curl_getinfo($this->_ch);
        
        // Request failed
        if ($this->_response === false) {
            return new EmailDirect_Response(array(
                'Message' => curl_error($this->_ch),
                'ErrorCode' => curl_errno($this->_ch)
            ), $this->info);
        } else { // Request successful
            $this->_setDefaults();
            return new EmailDirect_Response($this->_response, $this->info);
        }
    }
    
    protected function _parseResponse()
    {
        $response = json_decode($this->_response, true);
        if ($this->info['http_code'] === 200 || $this->info['http_code'] === 201) {
            return $response;
        }
        throw new EmailDirect_Exception($response['Message'], $response['ErrorCode']);
    }

    private function _setDefaults()
    {
        $this->_headers = array();
        $this->_options = array();
    }
    
    public function __destruct()
    {
        if ($this->_ch) {
            curl_close($this->_ch);
        }
    }

}


