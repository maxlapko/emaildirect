<?php

/**
 * Description of Bounces
 *
 * @author mlapko
 */
class EmailDirect_Bounces extends EmailDirect_Resource
{
    
    public function details()
    {
        return $this->_adapter->get('/Bounces/' . $this->_id);
    }
    
    public function all($options = array())
    {
        return $this->_adapter->get('/Bounces', $options);
    }
    
    public function hard($options = array())
    {
        return $this->_adapter->get('/Bounces/Hard', $options);
    }
    
    public function soft($options = array())
    {
        return $this->_adapter->get('/Bounces/Soft', $options);
    }
}
