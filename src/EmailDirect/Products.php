<?php

/**
 * Description of Products
 *
 * @author mlapko
 */
class EmailDirect_Products extends EmailDirect_Resource
{
    /**
     * @link http://docs.emaildirect.com/#ProductList
     * @param array $options
     * @return EmailDirect_Response
     */
    public function all($options = array())
    {
        return $this->_adapter->get('/Products', $options);
    }
    
    /**
     * @link http://docs.emaildirect.com/#ProductDetails
     * @return EmailDirect_Response
     */
    public function details()
    {
        return $this->_adapter->get('/Products/' . $this->_id);
    }
    
    /**
     * @link http://docs.emaildirect.com/#ProductBySKU
     * @return EmailDirect_Response
     */
    public function detailsBySKU($sku)
    {
        return $this->_adapter->get('/Products/SKU/' . $sku);
    }
    
    /**
     * @link http://docs.emaildirect.com/#ProductAdd
     * @param string $name product name
     * @param string $sku product SKU
     * @param array $options
     * @return EmailDirect_Response
     */
    public function create($name, $sku, $options = array())
    {
        $data = array_merge($options, array(
            'ProductName' => $name,
            'SKU' => $sku,
        ));
        return $this->_adapter->post('/Products', $data);
    }
    
    /**
     * @link http://docs.emaildirect.com/#ProductUpdate
     * @param array $data
     * @return EmailDirect_Response
     */
    public function update($data = array())
    {
        return $this->_adapter->put('/Products/' . $this->_id, $data);
    }
    
    /**
     * @link http://docs.emaildirect.com/#ProductDelete
     * @return EmailDirect_Response
     */
    public function delete()
    {
        return $this->_adapter->delete('/Products/' . $this->_id);
    }
    
    /**
     * @link http://docs.emaildirect.com/#ProductAddToCategories
     * @param array $categoryIds
     * @return EmailDirect_Response
     */
    public function addToCategories($categoryIds)
    {
        $data = array('Categories' => (array) $categoryIds);
        return $this->_adapter->post('/Products/' . $this->_id . '/AddToCategories', $data);
    }
    
    /**
     * @link http://docs.emaildirect.com/#ProductRemoveFromCategories
     * @param array $categoryIds
     * @return EmailDirect_Response
     */
    public function removeFromCategories($categoryIds)
    {
        $data = array('Categories' => (array) $categoryIds);
        return $this->_adapter->post('/Products/' . $this->_id . '/RemoveFromCategories', $data);
    }
    
}
