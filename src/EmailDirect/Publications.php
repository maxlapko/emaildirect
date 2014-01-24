<?php

/**
 * Description of Publications
 *
 * @author mlapko
 */
class EmailDirect_Publications extends EmailDirect_Resource
{
    /**
     * @link http://docs.emaildirect.com/#PublicationList
     * @return EmailDirect_Response
     */
    public function all()
    {
        return $this->_adapter->get('/Publications');
    }
    
    /**
     * @link http://docs.emaildirect.com/#PublicationDetails
     * @return EmailDirect_Response
     */
    public function details()
    {
        return $this->_adapter->get('/Publications/' . $this->_id);
    }
    
    /**
     * @link http://docs.emaildirect.com/#PublicationMembers
     * @param array $options
     * @return EmailDirect_Response
     */
    public function members($options = array())
    {
        return $this->_adapter->get('/Publications/' . $this->_id . '/Members', $options);
    }
    
    /**
     * @link http://docs.emaildirect.com/#PublicationRemoves
     * @param array $options
     * @return EmailDirect_Response
     */
    public function removes($options = array())
    {
        return $this->_adapter->get('/Publications/' . $this->_id . '/Removes', $options);
    }
    
    /**
     * @link http://docs.emaildirect.com/#PublicationAdd
     * @param string $name
     * @param array $options
     * @return EmailDirect_Response
     */
    public function create($name, $options = array())
    {
        return $this->_adapter->post('/Publications/', array_merge($options, array('Name' => $name)));
    }
    
    /**
     * @link http://docs.emaildirect.com/#PublicationUpdate
     * @param string $name
     * @param array $options
     * @return EmailDirect_Response
     */
    public function update($name, $options = array())
    {
        return $this->_adapter->put('/Publications/' . $this->_id, array_merge($options, array('Name' => $name)));
    }
    
    /**
     * @link http://docs.emaildirect.com/#PublicationDelete
     * @return EmailDirect_Response
     */
    public function delete()
    {
        return $this->_adapter->delete('/Publications/' . $this->_id);
    }
    
    /**
     * @link http://docs.emaildirect.com/#PublicationAddEmails
     * @param array $emails
     * @return EmailDirect_Response
     */
    public function addEmails($emails)
    {
        $data = array('EmailAddresses' => (array) $emails);
        return $this->_adapter->post('/Publications/' . $this->_id . '/AddEmails', $data);
    }
    
    /**
     * @link http://docs.emaildirect.com/#PublicationForceEmails
     * @param array $emails
     * @return EmailDirect_Response
     */
    public function forceEmails($emails)
    {
        $data = array('EmailAddresses' => (array) $emails);
        return $this->_adapter->post('/Publications/' . $this->_id . '/ForceEmails', $data);
    }
    
    /**
     * @link http://docs.emaildirect.com/#PublicationRemoveEmails
     * @param array $emails
     * @return EmailDirect_Response
     */
    public function removeEmails($emails)
    {
        $data = array('EmailAddresses' => (array) $emails);
        return $this->_adapter->post('/Publications/' . $this->_id . '/RemoveEmails', $data);
    }
    
    /**
     * @link http://docs.emaildirect.com/#PublicationAllMembers
     * @return EmailDirect_Response
     */
    public function allMembers()
    {
        return $this->_adapter->get('/Publications/' . $this->_id . '/AllMembers');
    }
    
}
