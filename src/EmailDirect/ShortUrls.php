<?php

/**
 * Description of ShortUrls
 *
 * @author mlapko
 */
class EmailDirect_ShortUrls extends EmailDirect_Resource
{
    /**
     * @link http://docs.emaildirect.com/#ShortUrlList
     * @param array $options
     * @return EmailDirect_Response
     */
    public function all($options = array())
    {
        return $this->_adapter->get('/ShortUrls', $options);
    }
    
    /**
     * @link http://docs.emaildirect.com/#ShortUrlDetails
     * @return EmailDirect_Response
     */
    public function details()
    {
        return $this->_adapter->get('/ShortUrls', array('url' => $this->_id));
    }
    
    /**
     * @link http://docs.emaildirect.com/#ShortUrlLogs
     * @return EmailDirect_Response
     */
    public function clicks()
    {
        return $this->_adapter->get('/ShortUrls/Clicks', array('url' => $this->_id));
    }
    
    /**
     * @link http://docs.emaildirect.com/#ShortUrlAdd
     * @param string $url
     * @param array $options
     * @return EmailDirect_Response
     */
    public function create($url, $options = array())
    {
        $options = array_merge($options, array('Url' => $url));
        return $this->_adapter->post('/ShortUrls', $options);
    }
    
    /**
     * @link http://docs.emaildirect.com/#ShortUrlUpdate
     * @param string $newUrl
     * @return EmailDirect_Response
     */
    public function update($newUrl)
    {
        return $this->_adapter->put('/PrivateLabel?' . http_build_query(array('url' => $this->_id)), $newUrl);
    }
    
}
