<?php

/**
 * Description of Response
 *
 * @author mlapko
 */
class EmailDirect_Response
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
    
}
