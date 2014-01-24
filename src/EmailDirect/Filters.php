<?php

/**
 * Description of Filters
 *
 * @author mlapko
 */
class EmailDirect_Filters extends EmailDirect_Resource
{
    /**
     * @link http://docs.emaildirect.com/#FilterList
     * @return EmailDirect_Response
     */
    public function all()
    {
        return $this->_adapter->get('/Filters');
    }
    
    /**
     * @link http://docs.emaildirect.com/#FilterDetails
     * @return EmailDirect_Response
     */
    public function details()
    {
        return $this->_adapter->get('/Filters/' . $this->_id);
    }
    
    /**
     * @link http://docs.emaildirect.com/#FilterMembers
     * @param array $options
     * @return EmailDirect_Response
     */
    public function members($options = array())
    {
        return $this->_adapter->get('/Filters/' . $this->_id . '/Members', $options);
    }
    
}
