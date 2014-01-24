<?php

/**
 * Description of Bounces
 *
 * @author mlapko
 */
class EmailDirect_Bounces extends EmailDirect_Resource
{
    /**
     * @link http://docs.emaildirect.com/#BounceDetails
     * @return EmailDirect_Response
     */
    public function details()
    {
        return $this->_adapter->get('/Bounces/' . $this->_id);
    }
    
    /**
     * @link http://docs.emaildirect.com/#BounceAll
     * @param array $options
     * @return EmailDirect_Response
     */
    public function all($options = array())
    {
        return $this->_adapter->get('/Bounces', $options);
    }
    
    /**
     * @link http://docs.emaildirect.com/#BounceHard
     * @param array $options
     * @return EmailDirect_Response
     */
    public function hard($options = array())
    {
        return $this->_adapter->get('/Bounces/Hard', $options);
    }
    
    /**
     * @link http://docs.emaildirect.com/#BounceSoft
     * @param array $options
     * @return EmailDirect_Response
     */
    public function soft($options = array())
    {
        return $this->_adapter->get('/Bounces/Soft', $options);
    }
}
