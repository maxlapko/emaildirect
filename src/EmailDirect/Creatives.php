<?php

/**
 * Description of Creatives
 *
 * @author mlapko
 */
class EmailDirect_Creatives extends EmailDirect_Resource
{
    /**
     * @link http://docs.emaildirect.com/#CreativesList
     * @param array $options
     * @return EmailDirect_Response
     */
    public function all($options = array())
    {
        return $this->_adapter->get('/Creatives', $options);
    }
    
    /**
     * @link http://docs.emaildirect.com/#CreativeAdd
     * @param string $name
     * @param array $options
     * @return EmailDirect_Response
     */
    public function create($name, $options = array())
    {
        return $this->_adapter->post('/Creatives', array_merge($options, array('Name' => $name)));
    }
    
    /**
     * @link http://docs.emaildirect.com/#CreativeDetails
     * @return EmailDirect_Response
     */
    public function details()
    {
        return $this->_adapter->get('/Creatives/' . $this->_id);
    }
    
    /**
     * @link http://docs.emaildirect.com/#CreativeUpdate
     * @param string $name
     * @param array $options
     * @return EmailDirect_Response
     */
    public function update($name, $options = array())
    {
        return $this->_adapter->put('/Creatives/' . $this->_id, array_merge($options, array('Name' => $name)));
    }
    
    /**
     * @link http://docs.emaildirect.com/#CreativeDelete
     * @return EmailDirect_Response
     */
    public function delete()
    {
        return $this->_adapter->delete('/Creatives/' . $this->_id);
    }
    
}
