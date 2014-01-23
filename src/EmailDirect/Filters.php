<?php

/**
 * Description of EmailDirect_Filters
 *
 * @author mlapko
 */
class EmailDirect_Filters extends EmailDirect_Resource
{
    
    public function all()
    {
        return $this->_adapter->get('/Filters');
    }
    
    public function details()
    {
        return $this->_adapter->get('/Filters/' . $this->_id);
    }
    
    public function members($options = array())
    {
        return $this->_adapter->get('/Filters/' . $this->_id . '/Members', $options);
    }
    
}
