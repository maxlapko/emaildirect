<?php

/**
 * Description of FileImports
 *
 * @author mlapko
 */
class EmailDirect_FileImports extends EmailDirect_Resource
{
    /**
     * @link http://docs.emaildirect.com/#FileImportBrowse
     * @param array $options
     * @return EmailDirect_Response
     */
    public function all($options = array())
    {
        return $this->_adapter->get('/FileImports', $options);
    }
    
    /**
     * @link http://docs.emaildirect.com/#FileImportDetails
     * @return EmailDirect_Response
     */
    public function details()
    {
        return $this->_adapter->get('/FileImports/' . $this->_id);
    }
    
    /**
     * @link http://docs.emaildirect.com/#FileImportAdd
     * @param string $localFTPFilePath
     * @param array $options
     * @return EmailDirect_Response
     */
    public function add($localFTPFilePath, $options = array())
    {
        $data = array_merge($options, array('LocalFTPFilePath' => $localFTPFilePath));
        return $this->_adapter->post('/FileImports', $data);
    }
}
