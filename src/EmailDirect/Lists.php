<?php

/**
 * Description of Lists
 *
 * @author mlapko
 */
class EmailDirect_Lists extends EmailDirect_Resource
{
    /**
     * @link http://docs.emaildirect.com/#ListList
     * @return EmailDirect_Response
     */
    public function all()
    {
        return $this->_adapter->get('/Lists');
    }
    
    /**
     * @link http://docs.emaildirect.com/#ListAdd
     * @param string $name
     * @param array $options
     * @return EmailDirect_Response
     */
    public function create($name, $options = array())
    {
        return $this->_adapter->post('/Lists', array_merge($options, array('Name' => $name)));
    }
    
    /**
     * @link http://docs.emaildirect.com/#ListDetails
     * @return EmailDirect_Response
     */
    public function details()
    {
        return $this->_adapter->get('/Lists/' . $this->_id);
    }
    
    /**
     * @link http://docs.emaildirect.com/#ListUpdate
     * @param string $name
     * @param array $options
     * @return EmailDirect_Response
     */
    public function update($name, $options = array())
    {
        return $this->_adapter->put('/Lists/' . $this->_id, array_merge($options, array('Name' => $name)));
    }
    
    /**
     * @link http://docs.emaildirect.com/#ListDelete
     * @return EmailDirect_Response
     */
    public function delete()
    {
        return $this->_adapter->delete('/Lists/' . $this->_id);
    }
    
    /**
     * @link http://docs.emaildirect.com/#ListMembers
     * @param array $options
     * @return EmailDirect_Response
     */
    public function members($options = array())
    {
        return $this->_adapter->get('/Lists/' . $this->_id . '/Members', $options);
    }
    
    /**
     * @link http://docs.emaildirect.com/#ListAllMembers
     * @return EmailDirect_Response
     */
    public function allMembers()
    {
        return $this->_adapter->get('/Lists/' . $this->_id . '/AllMembers');
    }
    
    /**
     * @link http://docs.emaildirect.com/#ListAddEmails
     * @param array $emails
     * @return EmailDirect_Response
     */
    public function addEmails($emails)
    {
        $data = array('EmailAddresses' => (array) $emails);
        return $this->_adapter->post('/Lists/' . $this->_id . '/AddEmails', $data);
    }
    
    /**
     * @link http://docs.emaildirect.com/#ListRemoveEmails
     * @param array $emails
     * @return EmailDirect_Response
     */
    public function removeEmails($emails)
    {
        $data = array('EmailAddresses' => (array) $emails);
        return $this->_adapter->post('/Lists/' . $this->_id . '/RemoveEmails', $data);
    }
    
}
