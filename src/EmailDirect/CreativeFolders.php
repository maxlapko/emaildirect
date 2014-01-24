<?php

/**
 * Description of CreativeFolders
 *
 * @author mlapko
 */
class EmailDirect_CreativeFolders extends EmailDirect_Resource
{
    /**
     * @link http://docs.emaildirect.com/#CreativeFolderList
     * @return EmailDirect_Response
     */
    public function all()
    {
        return $this->_adapter->get('/Creatives/Folders');
    }
    
    /**
     * @link http://docs.emaildirect.com/#CreativeFolderAdd
     * @param string $name
     * @param integer $parentId
     * @return EmailDirect_Response
     */
    public function create($name, $parentId = null)
    {
        return $this->_adapter->post('/Creatives/Folders' . ($parentId ? "/$parentId" : ''), $name);
    }
    
    /**
     * @link http://docs.emaildirect.com/#CreativeFolderDetails
     * @return EmailDirect_Response
     */
    public function details()
    {
        return $this->_adapter->get('/Creatives/Folders/' . $this->_id);
    }
    
    /**
     * @link http://docs.emaildirect.com/#CreativeFolderUpdate
     * @param string $name
     * @return EmailDirect_Response
     */
    public function update($name)
    {
        return $this->_adapter->put('/Creatives/Folders/' . $this->_id, $name);
    }
    
    /**
     * @link http://docs.emaildirect.com/#CreativeFolderDelete
     * @return EmailDirect_Response
     */
    public function delete()
    {
        return $this->_adapter->delete('/Creatives/Folders/' . $this->_id);
    }
    
    /**
     * @link http://docs.emaildirect.com/#CreativeFolderTemplates
     * @param array $options
     * @return EmailDirect_Response
     */
    public function templates($options = array())
    {
        return $this->_adapter->get('/Creatives/Folders/' . $this->_id . '/Templates', $options);
    }
    
}
