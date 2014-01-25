<?php

/**
 * Description of Subscribers
 *
 * @author mlapko
 */
class EmailDirect_Subscribers extends EmailDirect_Resource
{
    /**
     * @link http://docs.emaildirect.com/#BrowseSubscribers
     * @param array $options
     * @return EmailDirect_Response
     */
    public function active($options = array())
    {
        return $this->_adapter->get('/Subscribers', $options);
    }
    
    /**
     * @link http://docs.emaildirect.com/#BrowseRemoves
     * @param array $options
     * @return EmailDirect_Response
     */
    public function removes($options = array())
    {
        return $this->_adapter->get('/Subscribers/Removes', $options);
    }
    
    /**
     * @link http://docs.emaildirect.com/#BrowseBounces
     * @link http://docs.emaildirect.com/#SubscriberBounces
     * @param array $options
     * @return EmailDirect_Response
     */
    public function bounces($options = array())
    {
        $url = $this->_id === null ? '/Subscribers/Bounces' : ('/Subscribers/' . $this->_id . 'Bounces');
        return $this->_adapter->get($url, $options);
    }
    
    /**
     * @link http://docs.emaildirect.com/#BrowseComplaints
     * @param array $options
     * @return EmailDirect_Response
     */
    public function complaints($options = array())
    {
        return $this->_adapter->get('/Subscribers/Complaints', $options);
    }
    
    /**
     * @link http://docs.emaildirect.com/#SubscriberAddNew
     * @param string $email
     * @param array $data
     * @return EmailDirect_Response
     */
    public function create($email, $data = array())
    {
        $data = array_merge($data, array(
            'EmailAddress' => $email
        ));
        return $this->_adapter->post('/Subscribers', $data);
    }
    
    // specific subscriber
    
    /**
     * @link http://docs.emaildirect.com/#SubscriberUpdate
     * @param array $data
     * @return EmailDirect_Response
     */
    public function update($data = array())
    {
        $data = array_merge($data, array('EmailAddress' => $this->_id));
        return $this->_adapter->put('/Subscribers/' . $this->_id, $data);
    }
    
    /**
     * @link http://docs.emaildirect.com/#SubscriberDelete
     * @return EmailDirect_Response
     */
    public function delete()
    {
        return $this->_adapter->delete('/Subscribers/' . $this->_id);
    }
    
    /**
     * @link http://docs.emaildirect.com/#SubscriberRemove
     * @return EmailDirect_Response
     */
    public function remove()
    {
        return $this->_adapter->post('/Subscribers/Remove', array(
            'EmailAddress' => $this->_id
        ));
    }
    
    /**
     * @link http://docs.emaildirect.com/#SubscriberChange
     * @param string $email
     * @return EmailDirect_Response
     */
    public function changeEmail($email)
    {
        return $this->_adapter->post('/Subscribers/' . $this->_id . '/ChangeEmail', array(
            'EmailAddress' => $email
        ));
    }
    
    /**
     * @link http://docs.emaildirect.com/#SubscriberDetails
     * @return EmailDirect_Response
     */
    public function details()
    {
        return $this->_adapter->get('/Subscribers/' . $this->_id);
    }
    
    /**
     * @link http://docs.emaildirect.com/#SubscriberProperties
     * @return EmailDirect_Response
     */
    public function properties()
    {
        return $this->_adapter->get('/Subscribers/' . $this->_id . '/Properties');
    }
    
    /**
     * @link http://docs.emaildirect.com/#SubscriberHistory
     * @return EmailDirect_Response
     */
    public function history()
    {
        return $this->_adapter->get('/Subscribers/' . $this->_id . '/History');
    }
    
    /**
     * @link http://docs.emaildirect.com/#SubscriberRelaySends
     * @param array $options
     * @return EmailDirect_Response
     */
    public function relaySends($options = array())
    {
        return $this->_adapter->get('/Subscribers/' . $this->_id . '/RelaySends', $options);
    }
    
    /**
     * @link http://docs.emaildirect.com/#SubscriberOrders
     * @param array $options
     * @return EmailDirect_Response
     */
    public function orders($options = array())
    {
        return $this->_adapter->get('/Subscribers/' . $this->_id . '/Orders', $options);
    }
    
    /**
     * @link http://docs.emaildirect.com/#SubscriberOrderItems
     * @param array $options
     * @return EmailDirect_Response
     */
    public function orderItems($options = array())
    {
        return $this->_adapter->get('/Subscribers/' . $this->_id . '/OrderItems', $options);
    }
}
