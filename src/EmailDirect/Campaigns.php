<?php

/**
 * Resource Campaigns
 * 
 * Examples: 
 *   $emailDirect->campaigns()->create($name, $creativeId, $subject, $fromName, $publicationId);
 *   $emailDirect->campaigns()->active();
 *   $emailDirect->campaigns(3)->cancel();
 *   $emailDirect->campaigns(2)->details();
 */
class EmailDirect_Campaigns extends EmailDirect_Resource
{
    /**
     * @link http://docs.emaildirect.com/#CampaignBrowseActive
     * @param array $options
     * @return EmailDirect_Response
     */
    public function active($options = array())
    {
        return $this->_adapter->get('/Campaigns', $options);
    }
    
    /**
     * @link http://docs.emaildirect.com/#CampaignBrowseDrafts
     * @param array $options
     * @return EmailDirect_Response
     */
    public function drafts($options = array())
    {
        return $this->_adapter->get('/Campaigns/Drafts', $options);
    }
    
    /**
     * @link http://docs.emaildirect.com/#CampaignBrowseSent
     * @param array $options
     * @return EmailDirect_Response
     */
    public function sent($options = array())
    {
        return $this->_adapter->get('/Campaigns/Sent', $options);
    }
    
    /**
     * @link http://docs.emaildirect.com/#CampaignBrowseSending
     * @param array $options
     * @return EmailDirect_Response
     */
    public function sending($options = array())
    {
        return $this->_adapter->get('/Campaigns/Sending', $options);
    }
    
    /**
     * @link http://docs.emaildirect.com/#CampaignBrowseScheduled
     * @param array $options
     * @return EmailDirect_Response
     */
    public function scheduled($options = array())
    {
        return $this->_adapter->get('/Campaigns/Scheduled', $options);
    }
    
    /**
     * @link http://docs.emaildirect.com/#CampaignBrowseAll
     * @param array $options
     * @return EmailDirect_Response
     */
    public function all($options = array())
    {
        return $this->_adapter->get('/Campaigns/All', $options);
    }
    
    // working with campaign add/edit
    
    /**
     * @link http://docs.emaildirect.com/#CampaignAdd
     * @param string $name
     * @param integer $creativeId
     * @param string $subject
     * @param string $fromName
     * @param integer $publicationId
     * @param array $options
     * @return EmailDirect_Response
     */
    public function create($name, $creativeId, $subject, $fromName, $publicationId, $options = array())
    {
        $data = array_merge($options, array(
            'Name' => $name, 
            'CreativeID' => $creativeId, 
            'Subject' => $subject, 
            'FromName' => $fromName, 
            'PublicationID' => $publicationId
        ));
        return $this->_adapter->post('/Campaigns', $data);
    }
    
    /**
     * @link http://docs.emaildirect.com/#CampaignUpdate
     * @param array $data
     * @return EmailDirect_Response
     */
    public function update($data = array())
    {
        return $this->_adapter->put('/Campaigns/' . $this->_id, $data);
    }
    
    /**
     * @link http://docs.emaildirect.com/#CampaignSchedule
     * @param string $date
     * @return EmailDirect_Response
     */
    public function schedule($date)
    {
        return $this->_adapter->post('/Campaigns/Schedule', array(
            'CampaignID' => $this->_id,
            'ScheduleDate' => date('c', strtotime($date))
        ));
    }
    
    /**
     * @link http://docs.emaildirect.com/#CampaignCancel
     * @return EmailDirect_Response
     */
    public function cancel()
    {
        return $this->_adapter->post('/Campaigns/Cancel', $this->_id);
    }
    
    /**
     * @link http://docs.emaildirect.com/#CampaignDelete
     * @return EmailDirect_Response
     */
    public function delete()
    {
        return $this->_adapter->delete('/Campaigns/' . $this->_id);
    }
    
    // specific campaign
    
    /**
     * @link http://docs.emaildirect.com/#CampaignDetails
     * @return EmailDirect_Response
     */
    public function details()
    {
        return $this->_adapter->get('/Campaigns/' . $this->_id);
    }
    
    /**
     * @link http://docs.emaildirect.com/#CampaignEmail
     * @return EmailDirect_Response
     */
    public function message()
    {
        return $this->_adapter->get('/Campaigns/' . $this->_id . '/Email');
    }
    
    /**
     * @link http://docs.emaildirect.com/#CampaignRecipients
     * @param array $options
     * @return EmailDirect_Response
     */
    public function recipients($options = array())
    {
        return $this->_adapter->get('/Campaigns/' . $this->_id . '/Recipients', $options);
    }
    
    /**
     * @link http://docs.emaildirect.com/#CampaignOpens
     * @param array $options
     * @return EmailDirect_Response
     */
    public function opens($options = array())
    {
        return $this->_adapter->get('/Campaigns/' . $this->_id . '/Opens', $options);
    }
    
    /**
     * @link http://docs.emaildirect.com/#CampaignClicks
     * @param array $options
     * @return EmailDirect_Response
     */
    public function clicks($options = array())
    {
        return $this->_adapter->get('/Campaigns/' . $this->_id . '/Clicks', $options);
    }
    
    /**
     * @link http://docs.emaildirect.com/#CampaignRemoves
     * @param array $options
     * @return EmailDirect_Response
     */
    public function removes($options = array())
    {
        return $this->_adapter->get('/Campaigns/' . $this->_id . '/Removes', $options);
    }
    
    /**
     * @link http://docs.emaildirect.com/#CampaignComplaints
     * @param array $options
     * @return EmailDirect_Response
     */
    public function complaints($options = array())
    {
        return $this->_adapter->get('/Campaigns/' . $this->_id . '/Complaints', $options);
    }
    
    /**
     * @link http://docs.emaildirect.com/#CampaignSoftBounces
     * @param array $options
     * @return EmailDirect_Response
     */
    public function softBounces($options = array())
    {
        return $this->_adapter->get('/Campaigns/' . $this->_id . '/SoftBounces', $options);
    }
    
    /**
     * @link http://docs.emaildirect.com/#CampaignHardBounces
     * @param array $options
     * @return EmailDirect_Response
     */
    public function hardBounces($options = array())
    {
        return $this->_adapter->get('/Campaigns/' . $this->_id . '/HardBounces', $options);
    }
    
    // link information
    
    /**
     * @link http://docs.emaildirect.com/#CampaignLinks
     * @return EmailDirect_Response
     */
    public function links()
    {
        return $this->_adapter->get('/Campaigns/' . $this->_id . '/Links');
    }
    
    /**
     * Campaign Link Details
     * @link http://docs.emaildirect.com/#CampaignLinkDetails
     * @param integer $linkId
     * @return EmailDirect_Response
     */
    public function link($linkId)
    {
        return $this->_adapter->get('/Campaigns/' . $this->_id . '/Links/' . $linkId);
    }
    
    /**
     * Browse subscribers that clicked on a link
     * @link http://docs.emaildirect.com/#CampaignLinkClickers
     * @param integer $linkId
     * @return EmailDirect_Response
     */
    public function linkClicks($linkId, $options = array())
    {
        return $this->_adapter->get('/Campaigns/' . $this->_id . '/Links/' . $linkId . '/Clicks', $options);
    }
    
}

