<?php

/**
 * Description of EmailDirect_Import
 *
 * @author mlapko
 */
class EmailDirect_Import extends EmailDirect_Resource
{
    /**
     * @link http://docs.emaildirect.com/#ImportAddSubscribers
     * @param array $subscribers
     * @return EmailDirect_Response
     */
    public function add($subscribers)
    {
        $data = array('Subscribers' => (array) $subscribers);
        return $this->_adapter->post('/Import/Subscribers', $data);
    }
    
    /**
     * @link http://docs.emaildirect.com/#ImportUpdateSubscribers
     * @param array $subscribers
     * @return EmailDirect_Response
     */
    public function update($subscribers)
    {
        $data = array('Subscribers' => (array) $subscribers);
        return $this->_adapter->put('/Import/Subscribers', $data);
    }
    
    /**
     * @link http://docs.emaildirect.com/#ImportAddOrUpdate
     * @param array $subscribers
     * @return EmailDirect_Response
     */
    public function addOrUpdate($subscribers)
    {
        $data = array('Subscribers' => (array) $subscribers);
        return $this->_adapter->post('/Import/AddOrUpdate', $data);
    }
    
    /**
     * @link http://docs.emaildirect.com/#ImportRemoves
     * @param array $emails
     * @return EmailDirect_Response
     */
    public function remove($emails)
    {
        $data = array('EmailAddresses' => (array) $emails);
        return $this->_adapter->post('/Import/Removes', $data);
    }
    
    /**
     * @link http://docs.emaildirect.com/#ImportDeletes
     * @param array $emails
     * @return EmailDirect_Response
     */
    public function delete($emails)
    {
        $data = array('EmailAddresses' => (array) $emails);
        return $this->_adapter->post('/Import/Deletes', $data);
    }
    
}
