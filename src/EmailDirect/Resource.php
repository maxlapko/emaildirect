<?php

abstract class EmailDirect_Resource
{
    /**
     * @var EmailDirect_Adapter_Curl
     */
    protected $_adapter;
    
    protected $_id;
    
    public function __construct($adapter)
    {
        $this->_adapter = $adapter;
    }
    
    public function setId($id)
    {
        $this->_id = $id;
        return $this;
    }
    
    public function __invoke($id)
    {
        return $this->setId($id);
    }
}

