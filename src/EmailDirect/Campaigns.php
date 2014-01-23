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
    public function active($options = array())
    {
        return $this->_adapter->get('/Campaigns', $options);
    }
    
    public function drafts($options = array())
    {
        return $this->_adapter->get('/Campaigns/Drafts', $options);
    }
    
    public function sent($options = array())
    {
        return $this->_adapter->get('/Campaigns/Sent', $options);
    }
    
    public function sending($options = array())
    {
        return $this->_adapter->get('/Campaigns/Sending', $options);
    }
    
    public function scheduled($options = array())
    {
        return $this->_adapter->get('/Campaigns/Scheduled', $options);
    }
    
    public function all($options = array())
    {
        return $this->_adapter->get('/Campaigns/All', $options);
    }
    
    // working with campaign add/edit
    
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
    
    public function update($data = array())
    {
        return $this->_adapter->put('/Campaigns/' . $this->_id, $data);
    }
    
    public function schedule($date)
    {
        return $this->_adapter->post('/Campaigns/Schedule', array(
            'CampaignID' => $this->_id,
            'ScheduleDate' => date('c', strtotime($date))
        ));
    }
    
    public function cancel()
    {
        return $this->_adapter->post('/Campaigns/Cancel', $this->_id);
    }
    
    public function delete()
    {
        return $this->_adapter->delete('/Campaigns/' . $this->_id);
    }
    
    // specific campaign
    
    public function details()
    {
        return $this->_adapter->get('/Campaigns/' . $this->_id);
    }
    
    public function message()
    {
        return $this->_adapter->get('/Campaigns/' . $this->_id . '/Email');
    }
    
    public function recipients($options = array())
    {
        return $this->_adapter->get('/Campaigns/' . $this->_id . '/Recipients', $options);
    }
    
    public function opens($options = array())
    {
        return $this->_adapter->get('/Campaigns/' . $this->_id . '/Opens', $options);
    }
    
    public function clicks($options = array())
    {
        return $this->_adapter->get('/Campaigns/' . $this->_id . '/Clicks', $options);
    }
    
    public function removes($options = array())
    {
        return $this->_adapter->get('/Campaigns/' . $this->_id . '/Removes', $options);
    }
    
    public function complaints($options = array())
    {
        return $this->_adapter->get('/Campaigns/' . $this->_id . '/Complaints', $options);
    }
    
    public function softBounces($options = array())
    {
        return $this->_adapter->get('/Campaigns/' . $this->_id . '/SoftBounces', $options);
    }
    
    public function hardBounces($options = array())
    {
        return $this->_adapter->get('/Campaigns/' . $this->_id . '/HardBounces', $options);
    }
    
    // link information
    
    public function links()
    {
        return $this->_adapter->get('/Campaigns/' . $this->_id . '/Links');
    }
    
    /**
     * Campaign Link Details
     * @param integer $linkId
     * @return array
     */
    public function link($linkId)
    {
        return $this->_adapter->get('/Campaigns/' . $this->_id . '/Links/' . $linkId);
    }
    
    /**
     * Browse subscribers that clicked on a link
     * @param integer $linkId
     * @return array
     */
    public function linkClicks($linkId, $options = array())
    {
        return $this->_adapter->get('/Campaigns/' . $this->_id . '/Links/' . $linkId . '/Clicks', $options);
    }
    
}

