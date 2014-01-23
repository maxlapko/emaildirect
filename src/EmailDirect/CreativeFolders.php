<?php

/**
 * Description of EmailDirect_CreativeFolders
 *
 * @author mlapko
 */
class EmailDirect_CreativeFolders extends EmailDirect_Resource
{
    
    public function all($options = array())
    {
        return $this->_adapter->get('/Creatives/Folders', $options);
    }
    
    public function create($name, $parentId = null)
    {
        return $this->_adapter->post('/Creatives/Folders' . ($parentId ? "/$parentId" : ''), $name);
    }
    
    public function details()
    {
        return $this->_adapter->get('/Creatives/Folders/' . $this->_id);
    }
    
    public function update($name)
    {
        return $this->_adapter->put('/Creatives/Folders/' . $this->_id, $name);
    }
    
    public function delete()
    {
        return $this->_adapter->delete('/Creatives/Folders/' . $this->_id);
    }
    
    public function templates($options = array())
    {
        return $this->_adapter->get('/Creatives/Folders/' . $this->_id . '/Templates', $options);
    }
    
}
