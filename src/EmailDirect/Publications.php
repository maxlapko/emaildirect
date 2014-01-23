<?php

/**
 * Description of EmailDirect_Publications
 *
 * @author mlapko
 */
class EmailDirect_Publications extends EmailDirect_Resource
{
    
    public function all()
    {
        return $this->_adapter->get('/Publications');
    }
    
    public function details()
    {
        return $this->_adapter->get('/Publications/' . $this->_id);
    }
    
    public function members($options = array())
    {
        return $this->_adapter->get('/Publications/' . $this->_id . '/Members', $options);
    }
    
    public function removes($options = array())
    {
        return $this->_adapter->get('/Publications/' . $this->_id . '/Removes', $options);
    }
    
    public function create($name, $options = array())
    {
        return $this->_adapter->post('/Publications/', array_merge($options, array('Name' => $name)));
    }
    
    public function update($name, $options = array())
    {
        return $this->_adapter->put('/Publications/' . $this->_id, array_merge($options, array('Name' => $name)));
    }
    
    public function delete()
    {
        return $this->_adapter->delete('/Publications/' . $this->_id);
    }
    
    public function addEmails($emails)
    {
        $data = array('EmailAddresses' => (array) $emails);
        return $this->_adapter->post('/Publications/' . $this->_id . '/AddEmails', $data);
    }
    
    public function forceEmails($emails)
    {
        $data = array('EmailAddresses' => (array) $emails);
        return $this->_adapter->post('/Publications/' . $this->_id . '/ForceEmails', $data);
    }
    
    public function removeEmails($emails)
    {
        $data = array('EmailAddresses' => (array) $emails);
        return $this->_adapter->post('/Publications/' . $this->_id . '/RemoveEmails', $data);
    }
    
    public function allMembers()
    {
        return $this->_adapter->get('/Publications/' . $this->_id . '/AllMembers');
    }
    
}
