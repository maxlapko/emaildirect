<?php

/**
 * Description of Creatives
 *
 * @author mlapko
 */
class EmailDirect_Creatives extends EmailDirect_Resource
{
    
    public function all($options = array())
    {
        return $this->_adapter->get('/Creatives', $options);
    }
    
    public function create($name, $options = array())
    {
        return $this->_adapter->post('/Creatives', array_merge($options, array('Name' => $name)));
    }
    
    public function details()
    {
        return $this->_adapter->get('/Creatives/' . $this->_id);
    }
    
    public function update($name, $options = array())
    {
        return $this->_adapter->put('/Creatives/' . $this->_id, array_merge($options, array('Name' => $name)));
    }
    
    public function delete()
    {
        return $this->_adapter->delete('/Creatives/' . $this->_id);
    }
    
}
