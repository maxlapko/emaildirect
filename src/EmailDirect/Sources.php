<?php

/**
 * Description of Sources
 *
 * @author mlapko
 */
class EmailDirect_Sources extends EmailDirect_Resource
{
    /**
     * @link http://docs.emaildirect.com/#SourceList
     * @return EmailDirect_Response
     */
    public function all()
    {
        return $this->_adapter->get('/Sources');
    }
    
    /**
     * @link http://docs.emaildirect.com/#SourceDetails
     * @return EmailDirect_Response
     */
    public function details()
    {
        return $this->_adapter->get('/Sources/' . $this->_id);
    }
    
    /**
     * @link http://docs.emaildirect.com/#SourceMembers
     * @param array $options
     * @return EmailDirect_Response
     */
    public function members($options = array())
    {
        return $this->_adapter->get('/Sources/' . $this->_id . '/Members', $options);
    }
    
    /**
     * @link http://docs.emaildirect.com/#SourceAdd
     * @param string $name
     * @param array $options
     * @return EmailDirect_Response
     */
    public function create($name, $options = array())
    {
        $options = array_merge($options, array(
            'Name' => $name
        ));
        return $this->_adapter->post('/Sources', $options);
    }
    
    /**
     * @link http://docs.emaildirect.com/#SourceUpdate
     * @param string $name
     * @param array $options
     * @return EmailDirect_Response
     */
    public function update($name, $options = array())
    {
        $options = array_merge($options, array(
            'Name' => $name
        ));
        return $this->_adapter->put('/Sources/' . $this->_id, $options);
    }
    
    /**
     * @link http://docs.emaildirect.com/#SourceDelete
     * @return EmailDirect_Response
     */
    public function delete()
    {
        return $this->_adapter->delete('/Sources/' . $this->_id);
    }
    
    /**
     * @link http://docs.emaildirect.com/#SourceAddEmails
     * @param array $emails
     * @return EmailDirect_Response
     */
    public function addEmails($emails)
    {
        return $this->_adapter->post('/Sources/' . $this->_id . '/AddEmails', array('EmailAddresses' => (array) $emails));
    }
    
}
