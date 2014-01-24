<?php

/**
 * Description of RelaySendCustom
 *
 * @author mlapko
 */
class EmailDirect_RelaySendCustom extends EmailDirect_Resource
{
    /**
     * @link http://docs.emaildirect.com/#RelaySendCustomIDStats
     * @param array $options
     * @return EmailDirect_Response
     */
    public function stats($options = array())
    {
        return $this->_adapter->get('/RelaySends/CustomID/' . $this->_id . '/Stats', $options);
    }
    
    /**
     * @link http://docs.emaildirect.com/#RelaySendCustomID
     * @param array $options
     * @return EmailDirect_Response
     */
    public function details($options = array())
    {
        return $this->_adapter->get('/RelaySends/CustomID/' . $this->_id, $options);
    }
    
    /**
     * @link http://docs.emaildirect.com/#RelaySendCustomIDOpens
     * @param array $options
     * @return EmailDirect_Response
     */
    public function opens($options = array())
    {
        return $this->_adapter->get('/RelaySends/CustomID/' . $this->_id . '/Opens', $options);
    }
    
    /**
     * @link http://docs.emaildirect.com/#RelaySendCustomIDClicks
     * @param array $options
     * @return EmailDirect_Response
     */
    public function clicks($options = array())
    {
        return $this->_adapter->get('/RelaySends/CustomID/' . $this->_id . '/Clicks', $options);
    }
    
    /**
     * @link http://docs.emaildirect.com/#RelaySendCustomIDRemoves
     * @param array $options
     * @return EmailDirect_Response
     */
    public function removes($options = array())
    {
        return $this->_adapter->get('/RelaySends/CustomID/' . $this->_id . '/Removes', $options);
    }
    
    /**
     * @link http://docs.emaildirect.com/#RelaySendCustomIDBounces
     * @param array $options
     * @return EmailDirect_Response
     */
    public function bounces($options = array())
    {
        return $this->_adapter->get('/RelaySends/CustomID/' . $this->_id . '/Bounces', $options);
    }
    
    /**
     * @link http://docs.emaildirect.com/#RelaySendCustomIDComplaints
     * @param array $options
     * @return EmailDirect_Response
     */
    public function complaints($options = array())
    {
        return $this->_adapter->get('/RelaySends/CustomID/' . $this->_id . '/Complaints', $options);
    }
    
}
