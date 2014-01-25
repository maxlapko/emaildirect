<?php

/**
 * Description of Response
 *
 * @author mlapko
 */
class EmailDirect_Response implements ArrayAccess
{   
    protected $_response;
    
    protected $_responseData;
    
    protected $_requestInfo;
    
    public function __construct($response, $requestInfo)
    {
        $this->_response = is_array($response) ? json_encode($response) : $response;
        $this->_responseData = json_decode($this->_response, true);
        $this->_requestInfo = $requestInfo;
    }
    
    /**
     * @return boolean
     */
    public function success() 
    {
        return $this->_requestInfo['http_code'] === 200 || $this->_requestInfo['http_code'] === 201;
    }
    
    /**
     * @return boolean
     */
    public function fail() 
    {
        return $this->_requestInfo['http_code'] !== 200 && $this->_requestInfo['http_code'] !== 201;
    }
    
    /**
     * @return string
     */
    public function getRawBody()
    {
        return $this->_response;
    }
    
    /**
     * @return array
     */
    public function getData()
    {
        return $this->_responseData;
    }
    
    /**
     * @return string
     */
    public function getErrorMessage()
    {
        return isset($this->_responseData['Message']) ? $this->_responseData['Message'] : 'Unknown error.';
    }
    
    /**
     * @return integer
     */
    public function getErrorCode()
    {
        return isset($this->_responseData['ErrorCode']) ? 
            $this->_responseData['ErrorCode'] : 
            $this->_requestInfo['http_code'];
    }
    
    /**
     * @return array
     */
    public function getRequestInfo()
    {
        return $this->_requestInfo;
    }
    
    public function __get($name)
    {
        if ($this->offsetExists($name)) {
            return $this->_responseData[$name];
        }
        throw new EmailDirect_Exception('The response does not exist "' . $name . '" property.');
    }
    
    public function offsetExists($offset)
    {
        return isset($this->_responseData[$offset]);
    }
    
    public function offsetGet($offset)
    {
        return isset($this->_responseData[$offset]) ? $this->_responseData[$offset] : null;
    }
    
    public function offsetSet($offset, $value)
    {
        if ($offset === null) {
            $this->_responseData[] = $value;
        } else {
            $this->_responseData[$offset] = $value;
        }
    }
    
    public function offsetUnset($offset)
    {
        unset($this->_responseData[$offset]);
    }
    
}
