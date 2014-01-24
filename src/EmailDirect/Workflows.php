<?php

/**
 * Description of Workflows
 *
 * @author mlapko
 */
class EmailDirect_Workflows extends EmailDirect_Resource
{
    /**
     * @link http://docs.emaildirect.com/#WorkflowList
     * @return EmailDirect_Response
     */
    public function all()
    {
        return $this->_adapter->get('/Workflows');
    }
    
    /**
     * @link http://docs.emaildirect.com/#WorkflowDetails
     * @return EmailDirect_Response
     */
    public function details()
    {
        return $this->_adapter->get('/Workflows/' . $this->_id);
    }
    
    /**
     * @link http://docs.emaildirect.com/#WorkflowMembers
     * @param array $options
     * @return EmailDirect_Response
     */
    public function members($options = array())
    {
        return $this->_adapter->get('/Workflows/' . $this->_id . '/Members', $options);
    }
    
    /**
     * @link http://docs.emaildirect.com/#WorkflowStats
     * @param array $options
     * @return EmailDirect_Response
     */
    public function stats($options = array())
    {
        return $this->_adapter->get('/Workflows/' . $this->_id . '/Stats', $options);
    }
    
    /**
     * @link http://docs.emaildirect.com/#WorkflowStart
     * @return EmailDirect_Response
     */
    public function start()
    {
        return $this->_adapter->put('/Workflows/Start', $this->_id);
    }
    
    /**
     * @link http://docs.emaildirect.com/#WorkflowStop
     * @return EmailDirect_Response
     */
    public function stop()
    {
        return $this->_adapter->put('/Workflows/Stop', $this->_id);
    }
    
    /**
     * @link http://docs.emaildirect.com/#WorkflowAddEmails
     * @param array $emails
     * @return EmailDirect_Response
     */
    public function addEmails($emails)
    {
        return $this->_adapter->post('/Workflows/' . $this->_id . '/AddEmails', array(
            'EmailAddresses' => (array) $emails
        ));
    }
    
    /**
     * @link http://docs.emaildirect.com/#WorkflowRemoveEmails
     * @param array $emails
     * @return EmailDirect_Response
     */
    public function removeEmails($emails)
    {
        return $this->_adapter->post('/Workflows/' . $this->_id . '/RemoveEmails', array(
            'EmailAddresses' => (array) $emails
        ));
    }
    
    /**
     * @link http://docs.emaildirect.com/#WorkflowSendNodes
     * @return EmailDirect_Response
     */
    public function sendNodes()
    {
        return $this->_adapter->get('/Workflows/' . $this->_id . '/SendNodes');
    }
    
    /**
     * @link http://docs.emaildirect.com/#WorkflowSendNodes
     * @param integer $sendNodeId
     * @return EmailDirect_Response
     */
    public function sendNodeDetails($sendNodeId)
    {
        return $this->_adapter->get('/Workflows/' . $this->_id . '/SendNodes/' . $sendNodeId);
    }
    
    /**
     * @link http://docs.emaildirect.com/#WorkflowSendNodeStats
     * @param integer $sendNodeId
     * @param array $options
     * @return EmailDirect_Response
     */
    public function sendNodeStats($sendNodeId, $options = array())
    {
        return $this->_adapter->get('/Workflows/' . $this->_id . '/SendNodes/' . $sendNodeId . '/Stats', $options);
    }
    
    /**
     * @link http://docs.emaildirect.com/#WorkflowSendNodeRecipients
     * @param integer $sendNodeId
     * @param array $options
     * @return EmailDirect_Response
     */
    public function sendNodeRecipients($sendNodeId, $options = array())
    {
        return $this->_adapter->get('/Workflows/' . $this->_id . '/SendNodes/' . $sendNodeId . '/Recipients', $options);
    }
    
    /**
     * @link http://docs.emaildirect.com/#WorkflowSendNodeOpens
     * @param integer $sendNodeId
     * @param array $options
     * @return EmailDirect_Response
     */
    public function sendNodeOpens($sendNodeId, $options = array())
    {
        return $this->_adapter->get('/Workflows/' . $this->_id . '/SendNodes/' . $sendNodeId . '/Opens', $options);
    }
    
    /**
     * @link http://docs.emaildirect.com/#WorkflowSendNodeClicks
     * @param integer $sendNodeId
     * @param array $options
     * @return EmailDirect_Response
     */
    public function sendNodeClicks($sendNodeId, $options = array())
    {
        return $this->_adapter->get('/Workflows/' . $this->_id . '/SendNodes/' . $sendNodeId . '/Clicks', $options);
    }
    
    /**
     * @link http://docs.emaildirect.com/#WorkflowSendNodeRemoves
     * @param integer $sendNodeId
     * @param array $options
     * @return EmailDirect_Response
     */
    public function sendNodeRemoves($sendNodeId, $options = array())
    {
        return $this->_adapter->get('/Workflows/' . $this->_id . '/SendNodes/' . $sendNodeId . '/Removes', $options);
    }
    
    /**
     * @link http://docs.emaildirect.com/#WorkflowSendNodeBounces
     * @param integer $sendNodeId
     * @param array $options
     * @return EmailDirect_Response
     */
    public function sendNodeBounces($sendNodeId, $options = array())
    {
        return $this->_adapter->get('/Workflows/' . $this->_id . '/SendNodes/' . $sendNodeId . '/Bounces', $options);
    }
    
    /**
     * @link http://docs.emaildirect.com/#WorkflowSendNodeComplaints
     * @param integer $sendNodeId
     * @param array $options
     * @return EmailDirect_Response
     */
    public function sendNodeComplaints($sendNodeId, $options = array())
    {
        return $this->_adapter->get('/Workflows/' . $this->_id . '/SendNodes/' . $sendNodeId . '/Complaints', $options);
    }
    
}
