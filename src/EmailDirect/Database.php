<?php

/**
 * Description of Database
 *
 * @author mlapko
 */
class EmailDirect_Database extends EmailDirect_Resource
{
    /**
     * @link http://docs.emaildirect.com/#DatabaseAdd
     * @param string $name
     * @param array $options
     * @return EmailDirect_Response
     */
    public function create($name, $options = array())
    {
        return $this->_adapter->post('/Database', array_merge($options, array('ColumnName' => $name)));
    }
    
    /**
     * @link http://docs.emaildirect.com/#DatabaseList
     * @return EmailDirect_Response
     */
    public function all()
    {
        return $this->_adapter->get('/Database');
    }
    
    /**
     * @link http://docs.emaildirect.com/#DatabaseDetails
     * @return EmailDirect_Response
     */
    public function details()
    {
        return $this->_adapter->get('/Database/' . $this->_id);
    }
    
}
