<?php

/**
 * Description of SuppressionLists
 *
 * @author mlapko
 */
class EmailDirect_SuppressionLists extends EmailDirect_Resource
{
    /**
     * @link http://docs.emaildirect.com/#SuppressionListList
     * @return EmailDirect_Response
     */
    public function all()
    {
        return $this->_adapter->get('/SuppressionLists');
    }
    
    /**
     * @link http://docs.emaildirect.com/#SuppressionListDetails
     * @return EmailDirect_Response
     */
    public function details()
    {
        return $this->_adapter->get('/SuppressionLists/' . $this->_id);
    }
    
    /**
     * @link http://docs.emaildirect.com/#SuppressionListAdd
     * @param string $name
     * @return EmailDirect_Response
     */
    public function create($name)
    {
        return $this->_adapter->post('/SuppressionLists', $name);
    }
    
    /**
     * @link http://docs.emaildirect.com/#SuppressionListUpdate
     * @param string $name
     * @return EmailDirect_Response
     */
    public function update($name)
    {
        return $this->_adapter->put('/SuppressionLists/' . $this->_id, $name);
    }
    
    /**
     * @link http://docs.emaildirect.com/#SuppressionListDelete
     * @return EmailDirect_Response
     */
    public function delete()
    {
        return $this->_adapter->delete('/SuppressionLists/' . $this->_id);
    }
    
    /**
     * @link http://docs.emaildirect.com/#SuppressionListEmails
     * @param array $options
     * @return EmailDirect_Response
     */
    public function emails($options = array())
    {
        return $this->_adapter->get('/SuppressionLists/' . $this->_id . '/Emails', $options);
    }
    
    /**
     * @link http://docs.emaildirect.com/#SuppressionListDomains
     * @param array $options
     * @return EmailDirect_Response
     */
    public function domains($options = array())
    {
        return $this->_adapter->get('/SuppressionLists/' . $this->_id . '/Domains', $options);
    }
    
    /**
     * @link http://docs.emaildirect.com/#SuppressionListAddEmails
     * @param array $emails
     * @return EmailDirect_Response
     */
    public function addEmails($emails)
    {
        return $this->_adapter->post(
            '/SuppressionLists/' . $this->_id . '/AddEmails', 
            array('EmailAddresses' => (array) $emails)
        );
    }
    
    /**
     * @link http://docs.emaildirect.com/#SuppressionListRemoveEmails
     * @param array $emails
     * @return EmailDirect_Response
     */
    public function removeEmails($emails)
    {
        return $this->_adapter->post(
            '/SuppressionLists/' . $this->_id . '/RemoveEmails', 
            array('EmailAddresses' => (array) $emails)
        );
    }
    
    /**
     * @link http://docs.emaildirect.com/#SuppressionListAddDomains
     * @param array $domains
     * @return EmailDirect_Response
     */
    public function addDomains($domains)
    {
        return $this->_adapter->post(
            '/SuppressionLists/' . $this->_id . '/AddDomains', 
            array('DomainNames' => (array) $domains)
        );
    }
    
    /**
     * @link http://docs.emaildirect.com/#SuppressionListRemoveDomains
     * @param array $domains
     * @return EmailDirect_Response
     */
    public function removeDomains($domains)
    {
        return $this->_adapter->post(
            '/SuppressionLists/' . $this->_id . '/RemoveDomains', 
            array('DomainNames' => (array) $domains)
        );
    }
}
