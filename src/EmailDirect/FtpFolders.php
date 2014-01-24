<?php

/**
 * Description of FtpFolders
 *
 * @author mlapko
 */
class EmailDirect_FtpFolders extends EmailDirect_Resource
{
    /**
     * @link http://docs.emaildirect.com/#FTPFolders
     * @return EmailDirect_Response
     */
    public function all()
    {
        return $this->_adapter->get('/FTP/Folders');
    }
    
    /**
     * @link http://docs.emaildirect.com/#FTPFolderDetails
     * @return EmailDirect_Response
     */
    public function details()
    {
        return $this->_adapter->get('/FTP/Folders', array('Folder' => $this->_id));
    }
    
    /**
     * @link http://docs.emaildirect.com/#FTPFolderAdd
     * @param string $name folder name
     * @param string $parentFolder
     * @return EmailDirect_Response
     */
    public function create($name, $parentFolder = null)
    {
        $url = '/FTP/Folders' . ($parentFolder === null ? '' : ('?' . http_build_query(array('Folder' => $parentFolder))));
        return $this->_adapter->post($url, $name);
    }
    
    /**
     * @link http://docs.emaildirect.com/#FTPFolderDelete
     * @return EmailDirect_Response
     */
    public function delete()
    {
        return $this->_adapter->delete('/FTP/Folders?' . http_build_query(array('Folder' => $this->_id)));
    }
}
