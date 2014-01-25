<?php

/**
 * Description of Accounts
 *
 * @author mlapko
 */
class EmailDirect_Accounts extends EmailDirect_Resource
{
    /**
     * @link http://docs.emaildirect.com/#PrivateLabelList
     * @return EmailDirect_Response
     */
    public function all()
    {
        return $this->_adapter->get('/PrivateLabel');
    }
    
    /**
     * @link http://docs.emaildirect.com/#PrivateLabelDetails
     * @return EmailDirect_Response
     */
    public function details()
    {
        return $this->_adapter->get('/PrivateLabel/' . $this->_id);
    }
    
    /**
     * @link http://docs.emaildirect.com/#PrivateLabelAdd
     * @param string $name
     * @param string $email
     * @param string $password
     * @param integer $limit
     * @return EmailDirect_Response
     */
    public function create($name, $email, $password, $limit = 0)
    {
        $data = array(
            'AccountName' => $name,
            'EmailAddress' => $email,
            'Password' => $password,
            'EmailLimit' => $limit,
        );
        return $this->_adapter->post('/PrivateLabel', $data);
    }
    
    /**
     * @link http://docs.emaildirect.com/#PrivateLabelUpdate
     * @param array $data
     * @return EmailDirect_Response
     */
    public function update($data = array())
    {
        return $this->_adapter->put('/PrivateLabel/' . $this->_id, $data);
    }
    
    /**
     * @link http://docs.emaildirect.com/#PrivateLabelApiKey
     * @return EmailDirect_Response
     */
    public function apiKey()
    {
        return $this->_adapter->get('/PrivateLabel/' . $this->_id . '/ApiKey');
    }
    
}
