<?php

/**
 * Description of EmailDirect_Lists
 *
 * @author mlapko
 */
class EmailDirect_Lists extends EmailDirect_Resource
{
    
    public function all()
    {
        return $this->_adapter->get('/Lists');
    }
    
    public function create($name, $options = array())
    {
        return $this->_adapter->post('/Lists', array_merge($options, array('Name' => $name)));
    }
    
    public function details()
    {
        return $this->_adapter->get('/Lists/' . $this->_id);
    }
    
    public function update($name, $options = array())
    {
        return $this->_adapter->put('/Lists/' . $this->_id, array_merge($options, array('Name' => $name)));
    }
    
    public function delete()
    {
        return $this->_adapter->delete('/Lists/' . $this->_id);
    }
    
    public function members($options = array())
    {
        return $this->_adapter->get('/Lists/' . $this->_id . '/Members', $options);
    }
    
    public function allMembers()
    {
        return $this->_adapter->get('/Lists/' . $this->_id . '/AllMembers');
    }
    
    public function addEmails($emails)
    {
        $data = array('EmailAddresses' => (array) $emails);
        return $this->_adapter->post('/Lists/' . $this->_id . '/AddEmails', $data);
    }
    
    public function removeEmails($emails)
    {
        $data = array('EmailAddresses' => (array) $emails);
        return $this->_adapter->post('/Lists/' . $this->_id . '/RemoveEmails', $data);
    }
    
}
