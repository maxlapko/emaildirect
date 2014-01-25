<?php

/**
 * @method EmailDirect_Bounces bounces($bounceId = null) bounces
 * @method EmailDirect_Campaigns campaigns($campaignId = null) campaigns
 * @method EmailDirect_CreativeFolders creativeFolders($folderId = null) creative folders
 * @method EmailDirect_Creatives creatives($creativeId = null) creatives
 * @method EmailDirect_Database database($columnName = null) database
 * @method EmailDirect_Filters filters($filterId = null) filters
 * @method EmailDirect_Import import() import multiple subscribers
 * @method EmailDirect_Lists lists($listId = null) lists
 * @method EmailDirect_Publications publications($publicationId = null) publications
 * @method EmailDirect_RelaySends relaySends($relaySendCategoryId = null) relay sends
 * @method EmailDirect_RelaySendReceipts relaySendReceipts($relaySendReceiptId = null) relay send receipts
 * @method EmailDirect_RelaySendCustom relaySendCustom($customId = null) relay sends with a CustomID
 * @method EmailDirect_Subscribers subscribers($email = null) subscribers
 * @method EmailDirect_Workflows workflows($workflowId = null) workflows
 * @method EmailDirect_Products products($productId = null) products
 * @method EmailDirect_ProductCategories productCategories($categoryId = null) product categories
 * @method EmailDirect_FileImports fileImports($fileImportId = null) product file imports
 * @method EmailDirect_FtpFolders ftpFolders($folderPath = null) FTP folders
 * @method EmailDirect_FtpFiles ftpFiles($filePath = null) FTP files
 * @method EmailDirect_ImageFolders imageFolders($folderPath = null) image folders
 * @method EmailDirect_ImageFiles imageFiles($filePath = null) image files
 * @method EmailDirect_Orders orders($orderNumber = null) orders
 * @method EmailDirect_OrderItems orderItems($orderItemId = null) order items
 * @method EmailDirect_Accounts accounts($accountName = null) private label accounts
 * @method EmailDirect_ShortUrls shortUrls($shortUrl = null) short urls
 * @method EmailDirect_Smtp smtp($smtpUserName = null) smtp logins
 * @method EmailDirect_Sources sources($sourceId = null) sources
 * @method EmailDirect_SuppressionLists suppressionLists($suppressionListId = null) suppression lists
 */
class EmailDirect
{
    const URL = 'https://rest.emaildirect.com/v1';
    
    public static $headers = array(
        'User-Agent' => 'emaildirect-rest-v1',
        'Content-Type' => 'application/json',
    );
    
    /**
     * @var string 
     */
    protected $_apiKey;
    
    /**
     * @var EmailDirect_Adapter_Curl 
     */
    protected $_adapter;
    
    private $_mapResources = array();
    
    /**
     * @param string $apiKey
     */
    public function __construct($apiKey)
    {
        $this->_apiKey = $apiKey;
    }
    
    /**
     * @param string $method
     * @param array $args
     * @return EmailDirect_Resource
     */
    public function __call($method, $args)
    {
        $class = 'EmailDirect_' . ucfirst($method);
        if (!isset($this->_mapResources[$class])) {
            $this->_mapResources[$class] = new $class($this->getAdapter());
        }
        if (isset($args[0])) {
            $this->_mapResources[$class]->setId($args[0]);
        }
        return $this->_mapResources[$class];
    }
    
    /**
     * Http client
     * @return EmailDirect_Adapter_Curl
     */
    public function getAdapter()
    {
        if ($this->_adapter === null) {
            $this->_adapter = new EmailDirect_Adapter_Curl(
                static::URL, 
                array_merge(static::$headers, array('ApiKey' => $this->_apiKey))
            );
        }
        return $this->_adapter;
    }
    
    /**
     * @link http://docs.emaildirect.com/#Ping
     * @return EmailDirect_Response
     */
    public function ping()
    {
        return $this->getAdapter()->get('/Ping');
    }
    
    /**
     * @param string $class
     * @return boolean
     */
    public static function loadClass($class) 
    {
        $file = dirname(__FILE__) . DIRECTORY_SEPARATOR . strtr($class, array('_' => DIRECTORY_SEPARATOR)) . '.php';
        if (file_exists($file)) {
            require_once $file;
            return true;
        }
    }
    
    /**
     * Autoload for EmailDirect
     * Fallback for user who does not use composer
     * 
     * @param boolean $prepend
     */
    public static function register($prepend = false)
    {
        spl_autoload_register(array('EmailDirect', 'loadClass'), true, $prepend);
    }
}