<?php

/**
 * Description of RelaySendReceipts
 *
 * @author mlapko
 */
class EmailDirect_RelaySendReceipts extends EmailDirect_Resource
{
    /**
     * @link http://docs.emaildirect.com/#RelaySendReceipt
     * @return EmailDirect_Response
     */
    public function details()
    {
        return $this->_adapter->get('/RelaySends/Receipt/' . $this->_id);
    }
    
    /**
     * @link http://docs.emaildirect.com/#RelaySendReceiptMessage
     * @return EmailDirect_Response
     */
    public function message()
    {
        return $this->_adapter->get('/RelaySends/Receipt/' . $this->_id . '/Message');
    }
    
    /**
     * @link http://docs.emaildirect.com/#RelaySendReceiptClicks
     * @return EmailDirect_Response
     */
    public function clicks()
    {
        return $this->_adapter->get('/RelaySends/Receipt/' . $this->_id . '/Clicks');
    }
    
}
