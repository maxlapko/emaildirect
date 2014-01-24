<?php

/**
 * Description of ImageFiles
 *
 * @author mlapko
 */
class EmailDirect_ImageFiles extends EmailDirect_Resource
{
    /**
     * @link http://docs.emaildirect.com/#ImageLibraryFiles
     * @param string $folderPath
     * @return EmailDirect_Response
     */
    public function all($folderPath = null)
    {
        $data = $folderPath === null ? array() : array('Folder' => $folderPath);
        return $this->_adapter->get('/ImageLibrary/Files', $data);
    }
    
    /**
     * @link http://docs.emaildirect.com/#ImageLibraryFileDetails
     * @return EmailDirect_Response
     */
    public function details()
    {
        return $this->_adapter->get('/ImageLibrary', array('File' => $this->_id));
    }
    
    /**
     * @link http://docs.emaildirect.com/#ImageLibraryFileDelete
     * @return EmailDirect_Response
     */
    public function delete()
    {
        return $this->_adapter->delete('/ImageLibrary?' . http_build_query(array('File' => $this->_id)));
    }
    
    /**
     * @link http://docs.emaildirect.com/#ImageLibraryUploadURL
     * @param string $url
     * @param array $options
     * @return EmailDirect_Response
     */
    public function uploadFromUrl($url, $options = array())
    {
        $data = array_merge($options, array('URL' => $url));
        return $this->_adapter->post('/ImageLibrary', $data);
    }
    
    /**
     * @link http://docs.emaildirect.com/#ImageLibraryStream
     * @param string $fileName
     * @param string $localPath
     * @param array $options
     * @return EmailDirect_Response
     */
    public function uploadFromFile($fileName, $localPath, $options = array())
    {
        $options = array_merge($options, array('FileName' => $fileName));
        return $this->_adapter->post(
            '/ImageUpload?' . http_build_query($options), 
             file_get_contents($localPath)
        );
    }
}
