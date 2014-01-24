<?php

/**
 * Description of FtpFiles
 *
 * @author mlapko
 */
class EmailDirect_FtpFiles extends EmailDirect_Resource
{
    /**
     * @link http://docs.emaildirect.com/#FTPFiles
     * @param string $folderPath
     * @return EmailDirect_Response
     */
    public function all($folderPath = null)
    {
        $data = $folderPath === null ? array() : array('Folder' => $folderPath);
        return $this->_adapter->get('/FTP/Files', $data);
    }
    
    /**
     * @link http://docs.emaildirect.com/#FTPFileDetails
     * @return EmailDirect_Response
     */
    public function details()
    {
        return $this->_adapter->get('/FTP', array('File' => $this->_id));
    }
    
    /**
     * @link http://docs.emaildirect.com/#FTPFileDelete
     * @return EmailDirect_Response
     */
    public function delete()
    {
        return $this->_adapter->delete('/FTP?' . http_build_query(array('File' => $this->_id)));
    }
    
    /**
     * @link http://docs.emaildirect.com/#FTPFileUpload
     * @param string $url
     * @param array $options
     * @return EmailDirect_Response
     */
    public function upload($url, $options = array())
    {
        $data = array_merge($options, array('URL' => $url));
        return $this->_adapter->post('/FTP', $data);
    }
}
