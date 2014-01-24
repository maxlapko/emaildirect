<?php

/**
 * Description of ProductCategories
 *
 * @author mlapko
 */
class EmailDirect_ProductCategories extends EmailDirect_Resource
{
    /**
     * @link http://docs.emaildirect.com/#CategoryList
     * @return EmailDirect_Response
     */
    public function all()
    {
        return $this->_adapter->get('/ProductCategories');
    }
    
    /**
     * @link http://docs.emaildirect.com/#CategoryDetails
     * @return EmailDirect_Response
     */
    public function details()
    {
        return $this->_adapter->get('/ProductCategories/' . $this->_id);
    }
    
    /**
     * @link http://docs.emaildirect.com/#CategoryDetailsByName
     * @param string $name
     * @return EmailDirect_Response
     */
    public function detailsByName($name)
    {
        return $this->_adapter->get('/ProductCategories', array('categoryName' => $name));
    }
    
    /**
     * @link http://docs.emaildirect.com/#CategoryAdd
     * @param string $name category name
     * @param integer $parentId
     * @param array $options
     * @return EmailDirect_Response
     */
    public function create($name, $parentId = null, $options = array())
    {
        $data = array_merge($options, array('Name' => $name));
        return $this->_adapter->post('/ProductCategories' . ($parentId === null ? '' : "/$parentId"), $data);
    }
    
    /**
     * @link http://docs.emaildirect.com/#CategoryUpdate
     * @param array $data
     * @return EmailDirect_Response
     */
    public function update($data = array())
    {
        return $this->_adapter->put('/ProductCategories/' . $this->_id, $data);
    }
    
    /**
     * @link http://docs.emaildirect.com/#CategoryDelete
     * @return EmailDirect_Response
     */
    public function delete()
    {
        return $this->_adapter->delete('/ProductCategories/' . $this->_id);
    }
    
    /**
     * @link http://docs.emaildirect.com/#CategoryProducts
     * @param array $options
     * @return EmailDirect_Response
     */
    public function products($options = array())
    {
        return $this->_adapter->delete('/ProductCategories/' . $this->_id . '/Products', $options);
    }
    
    /**
     * @link http://docs.emaildirect.com/#CategoryAddProducts
     * @param array $productIds
     * @return EmailDirect_Response
     */
    public function addProducts($productIds)
    {
        $data = array('Products' => (array) $productIds);
        return $this->_adapter->post('/ProductCategories/' . $this->_id . '/AddProducts', $data);
    }
    
    /**
     * @link http://docs.emaildirect.com/#CategoryRemoveProducts
     * @param array $productIds
     * @return EmailDirect_Response
     */
    public function removeProducts($productIds)
    {
        $data = array('Products' => (array) $productIds);
        return $this->_adapter->post('/ProductCategories/' . $this->_id . '/RemoveProducts', $data);
    }
    
}
