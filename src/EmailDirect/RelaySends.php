<?php

/**
 * Description of RelaySends
 *
 * @author mlapko
 */
class EmailDirect_RelaySends extends EmailDirect_Resource
{
    /**
     * @link http://docs.emaildirect.com/#RelayCategoryList
     * @return EmailDirect_Response
     */
    public function all()
    {
        return $this->_adapter->get('/RelaySends');
    }
    
    /**
     * @link http://docs.emaildirect.com/#RelayCategoryAdd
     * @param string $categoryName
     * @return EmailDirect_Response
     */
    public function create($categoryName)
    {
        return $this->_adapter->post('/RelaySends', $categoryName);
    }
    
    // specific relay send category
    
    /**
     * Sends a custom message.  See the docs for all the possible options
     * @link http://docs.emaildirect.com/#RelaySendAllOptions 
     * @param array $data
     * @return EmailDirect_Response
     */
    public function sendEmail($data)
    {
        return $this->_adapter->post('/RelaySends/' . $this->_id, $data);
    }
    
    /**
     * @link http://docs.emaildirect.com/#RelayCategoryDetails
     * @return EmailDirect_Response
     */
    public function details()
    {
        return $this->_adapter->get('/RelaySends/' . $this->_id);
    }
    
    /**
     * @link http://docs.emaildirect.com/#RelayCategoryUpdate
     * @param string $categoryName
     * @return EmailDirect_Response
     */
    public function update($categoryName)
    {
        return $this->_adapter->put('/RelaySends/' . $this->_id, $categoryName);
    }
    
    /**
     * @link http://docs.emaildirect.com/#RelayCategoryDelete
     * @return EmailDirect_Response
     */
    public function delete()
    {
        return $this->_adapter->delete('/RelaySends/' . $this->_id);
    }
    
    /**
     * @link http://docs.emaildirect.com/#RelayCategoryStats
     * @param array $options
     * @return EmailDirect_Response
     */
    public function stats($options = array())
    {
        return $this->_adapter->get('/RelaySends/' . $this->_id . '/Stats', $options);
    }
    
    /**
     * @link http://docs.emaildirect.com/#RelayCategoryLinks
     * @param array $options
     * @return EmailDirect_Response
     */
    public function links($options = array())
    {
        return $this->_adapter->get('/RelaySends/' . $this->_id . '/Links', $options);
    }
    
    /**
     * @link http://docs.emaildirect.com/#RelayCategoryEmails
     * @param array $options
     * @return EmailDirect_Response
     */
    public function emails($options = array())
    {
        return $this->_adapter->get('/RelaySends/' . $this->_id . '/Emails', $options);
    }
    
    /**
     * @link http://docs.emaildirect.com/#RelayCategoryOpens
     * @param array $options
     * @return EmailDirect_Response
     */
    public function opens($options = array())
    {
        return $this->_adapter->get('/RelaySends/' . $this->_id . '/Opens', $options);
    }
    
    /**
     * @link http://docs.emaildirect.com/#RelayCategoryClicks
     * @param array $options
     * @return EmailDirect_Response
     */
    public function clicks($options = array())
    {
        return $this->_adapter->get('/RelaySends/' . $this->_id . '/Clicks', $options);
    }
    
    /**
     * @link http://docs.emaildirect.com/#RelayCategoryRemoves
     * @param array $options
     * @return EmailDirect_Response
     */
    public function removes($options = array())
    {
        return $this->_adapter->get('/RelaySends/' . $this->_id . '/Removes', $options);
    }
    
    /**
     * @link http://docs.emaildirect.com/#RelayCategoryBounces
     * @param array $options
     * @return EmailDirect_Response
     */
    public function bounces($options = array())
    {
        return $this->_adapter->get('/RelaySends/' . $this->_id . '/Bounces', $options);
    }
    
    /**
     * @link http://docs.emaildirect.com/#RelayCategoryComplaints
     * @param array $options
     * @return EmailDirect_Response
     */
    public function complaints($options = array())
    {
        return $this->_adapter->get('/RelaySends/' . $this->_id . '/Complaints', $options);
    }
    
    /**
     * @link http://docs.emaildirect.com/#RelayCategorySoftBounces
     * @param array $options
     * @return EmailDirect_Response
     */
    public function softBounces($options = array())
    {
        return $this->_adapter->get('/RelaySends/' . $this->_id . '/SoftBounces', $options);
    }
    
    /**
     * @link http://docs.emaildirect.com/#RelayCategoryHardBounces
     * @param array $options
     * @return EmailDirect_Response
     */
    public function hardBounces($options = array())
    {
        return $this->_adapter->get('/RelaySends/' . $this->_id . '/HardBounces', $options);
    }
}