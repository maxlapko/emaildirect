<?php

/**
 * Description of ImageFolders
 *
 * @author mlapko
 */
class EmailDirect_ImageFolders extends EmailDirect_Resource
{
    /**
     * @link http://docs.emaildirect.com/#ImageLibraryFolders
     * @return EmailDirect_Response
     */
    public function all()
    {
        return $this->_adapter->get('/ImageLibrary/Folders');
    }
    
    /**
     * @link http://docs.emaildirect.com/#ImageLibraryFolderDetails
     * @return EmailDirect_Response
     */
    public function details()
    {
        return $this->_adapter->get('/ImageLibrary/Folders', array('Folder' => $this->_id));
    }
    
    /**
     * @link http://docs.emaildirect.com/#ImageLibraryFolderAdd
     * @param string $name folder name
     * @param string $parentFolder
     * @return EmailDirect_Response
     */
    public function create($name, $parentFolder = null)
    {
        $url = '/ImageLibrary/Folders' . ($parentFolder === null ? '' : ('?' . http_build_query(array('Folder' => $parentFolder))));
        return $this->_adapter->post($url, $name);
    }
    
    /**
     * @link http://docs.emaildirect.com/#ImageLibraryFolderDelete
     * @return EmailDirect_Response
     */
    public function delete()
    {
        return $this->_adapter->delete('/ImageLibrary/Folders?' . http_build_query(array('Folder' => $this->_id)));
    }
}
