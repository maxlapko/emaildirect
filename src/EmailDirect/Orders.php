<?php

/**
 * Description of Orders
 *
 * @author mlapko
 */
class EmailDirect_Orders extends EmailDirect_Resource
{
    /**
     * @link http://docs.emaildirect.com/#OrderList
     * @param array $options
     * @return EmailDirect_Response
     */
    public function all($options = array())
    {
        return $this->_adapter->get('/Orders', $options);
    }
    
    /**
     * @link http://docs.emaildirect.com/#OrderDetails
     * @return EmailDirect_Response
     */
    public function details()
    {
        return $this->_adapter->get('/Orders/' . $this->_id);
    }
    
    /**
     * @link http://docs.emaildirect.com/#OrderAdd
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
     * @link http://docs.emaildirect.com/#OrderImport
     * @param array $orders
     * @return EmailDirect_Response
     */
    public function import($orders)
    {
        return $this->_adapter->post('/Orders/Import', array('Orders' => (array) $orders));
    }
    
    /**
     * @link http://docs.emaildirect.com/#OrderUpdate
     * @param string $email
     * @param array $options
     * @return EmailDirect_Response
     */
    public function update($email, $options = array())
    {
        $options = array_merge($options, array('EmailAddress' => $email));
        return $this->_adapter->put('/Orders/' . $this->_id, $options);
    }
    
    /**
     * @link http://docs.emaildirect.com/#OrderDelete
     * @return EmailDirect_Response
     */
    public function delete()
    {
        return $this->_adapter->delete('/Orders/' . $this->_id);
    }
    
}
