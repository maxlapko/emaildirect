<?php

/**
 * Description of Subscribers
 *
 * @author mlapko
 */
class EmailDirect_Subscribers extends EmailDirect_Resource
{
    
    public function active($options = array())
    {
        return $this->_adapter->get('/Subscribers', $options);
    }
    
    public function removes($options = array())
    {
        return $this->_adapter->get('/Subscribers/Removes', $options);
    }
    
    public function bounces($options = array())
    {
        $url = $this->_id === null ? '/Subscribers/Bounces' : ('/Subscribers/' . $this->_id . 'Bounces');
        return $this->_adapter->get($url, $options);
    }
    
    public function complaints($options = array())
    {
        return $this->_adapter->get('/Subscribers/Complaints', $options);
    }
    
    public function create($email, $options = array())
    {
        $data = array_merge($options, array(
            'EmailAddress' => $email
        ));
        return $this->_adapter->post('/Subscribers', $data);
    }
    
    // specific subscriber
    
    public function update($email, $data = array())
    {
        $data = array_merge($data, array('EmailAddress' => $email));
        return $this->_adapter->put('/Subscribers/' . $this->_id, $data);
    }
    
    public function delete()
    {
        return $this->_adapter->delete('/Subscribers/' . $this->_id);
    }
    
    public function remove()
    {
        return $this->_adapter->post('/Subscribers/Remove', array(
            'EmailAddress' => $this->_id
        ));
    }
    
    public function changeEmail($email)
    {
        return $this->_adapter->post('/Subscribers/' . $this->_id . '/ChangeEmail', array(
            'EmailAddress' => $email
        ));
    }
    
    public function details()
    {
        return $this->_adapter->get('/Subscribers/' . $this->_id);
    }
    
    public function properties()
    {
        return $this->_adapter->get('/Subscribers/' . $this->_id . '/Properties');
    }
    
    public function history()
    {
        return $this->_adapter->get('/Subscribers/' . $this->_id . '/History');
    }
    
    public function relaySends($options = array())
    {
        return $this->_adapter->get('/Subscribers/' . $this->_id . '/RelaySends', $options);
    }
    
    public function orders($options = array())
    {
        return $this->_adapter->get('/Subscribers/' . $this->_id . '/Orders', $options);
    }
    
    public function orderItems($options = array())
    {
        return $this->_adapter->get('/Subscribers/' . $this->_id . '/OrderItems', $options);
    }
}
