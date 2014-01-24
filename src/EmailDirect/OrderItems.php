<?php

/**
 * Description of OrderItems
 *
 * @author mlapko
 */
class EmailDirect_OrderItems extends EmailDirect_Resource
{
    /**
     * @link http://docs.emaildirect.com/#OrderItemList
     * @param array $options
     * @return EmailDirect_Response
     */
    public function all($options = array())
    {
        return $this->_adapter->get('/Orders/Items', $options);
    }
    
    /**
     * @link http://docs.emaildirect.com/#OrderItemDetails
     * @return EmailDirect_Response
     */
    public function details()
    {
        return $this->_adapter->get('/Orders/Items/' . $this->_id);
    }
    
    /**
     * @link http://docs.emaildirect.com/#OrderItemAdd
     * @param string $email
     * @param array $options
     * @return EmailDirect_Response
     */
    public function create($email, $options = array())
    {
        $data = array_merge($options, array(
            'EmailAddress' => $email,
        ));
        return $this->_adapter->post('/Orders', $data);
    }
    
    /**
     * @link http://docs.emaildirect.com/#OrderItemImport
     * @param array $orders
     * @return EmailDirect_Response
     */
    public function import($orders)
    {
        return $this->_adapter->post('/Orders/Import', array('Orders' => (array) $orders));
    }
    
    /**
     * @link http://docs.emaildirect.com/#OrderItemUpdate
     * @param array $data
     * @return EmailDirect_Response
     */
    public function update($data)
    {
        return $this->_adapter->put('/Orders/Items/' . $this->_id, $data);
    }
    
    /**
     * @link http://docs.emaildirect.com/#OrderItemDelete
     * @return EmailDirect_Response
     */
    public function delete()
    {
        return $this->_adapter->delete('/Orders/Items/' . $this->_id);
    }
    
}
