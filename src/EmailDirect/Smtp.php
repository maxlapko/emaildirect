<?php

/**
 * Description of Smtp
 *
 * @author mlapko
 */
class EmailDirect_Smtp extends EmailDirect_Resource
{
    /**
     * @link http://docs.emaildirect.com/#SMTPList
     * @return EmailDirect_Response
     */
    public function all()
    {
        return $this->_adapter->get('/SMTP');
    }
    
    /**
     * @link http://docs.emaildirect.com/#SMTPDetails
     * @return EmailDirect_Response
     */
    public function details()
    {
        return $this->_adapter->get('/SMTP/' . $this->_id);
    }
    
    /**
     * @link http://docs.emaildirect.com/#SMTPAdd
     * @param string $userName
     * @param string $password
     * @param array $options
     * @return EmailDirect_Response
     */
    public function create($userName, $password, $options = array())
    {
        $options = array_merge($options, array(
            'UserName' => $userName,
            'Password' => $password
        ));
        return $this->_adapter->post('/SMTP', $options);
    }
    
    /**
     * @link http://docs.emaildirect.com/#SMTPUpdate
     * @param string $newUserName
     * @param string $password
     * @param array $options
     * @return EmailDirect_Response
     */
    public function update($newUserName, $password, $options = array())
    {
        $options = array_merge($options, array(
            'UserName' => $newUserName,
            'Password' => $password
        ));
        return $this->_adapter->put('/SMTP/' . $this->_id, $options);
    }
    
    /**
     * @link http://docs.emaildirect.com/#SMTPDelete
     * @return EmailDirect_Response
     */
    public function delete()
    {
        return $this->_adapter->delete('/SMTP/' . $this->_id);
    }
    
}
