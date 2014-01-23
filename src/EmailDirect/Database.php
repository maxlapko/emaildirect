<?php

/**
 * Description of Database
 *
 * @author mlapko
 */
class EmailDirect_Database extends EmailDirect_Resource
{
    
    public function create($name, $options = array())
    {
        return $this->_adapter->post('/Database', array_merge($options, array('ColumnName' => $name)));
    }
    
    public function all()
    {
        return $this->_adapter->get('/Database');
    }
    
    public function details()
    {
        return $this->_adapter->get('/Database/' . $this->_id);
    }
    
}
