<?php

/**
 * Description of EmailDirect_Import
 *
 * @author mlapko
 */
class EmailDirect_Import extends EmailDirect_Resource
{
    
    public function add($subscribers)
    {
        $data = array('Subscribers' => (array) $subscribers);
        return $this->_adapter->post('/Import/Subscribers', $data);
    }
    
    public function update($subscribers)
    {
        $data = array('Subscribers' => (array) $subscribers);
        return $this->_adapter->put('/Import/Subscribers', $data);
    }
    
    public function addOrUpdate($subscribers)
    {
        $data = array('Subscribers' => (array) $subscribers);
        return $this->_adapter->post('/Import/AddOrUpdate', $data);
    }
    
    public function remove($emails)
    {
        $data = array('EmailAddresses' => (array) $emails);
        return $this->_adapter->post('/Import/Removes', $data);
    }
    
    public function delete($emails)
    {
        $data = array('EmailAddresses' => (array) $emails);
        return $this->_adapter->post('/Import/Deletes', $data);
    }
    
}
