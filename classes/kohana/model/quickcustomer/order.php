<?php

/**
 *
 */
class Kohana_Model_QuickCustomer_Order extends ORM {

    protected $_belongs_to = array("user" => array());
    protected $_has_many = array(
        "products" => array(),
        // Disponibilités pour effectuer la commande
        "disponibilities" => array("through" => "orders_disponibilities")
    );

}

?>