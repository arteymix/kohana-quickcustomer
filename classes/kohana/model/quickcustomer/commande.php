<?php

/**
 *
 */
class Kohana_Model_QuickCustomer_Commande extends ORM {

    protected $_belongs_to = array("user" => array());
    protected $_has_many = array(
        "produits" => array(),
        // Disponibilités pour effectuer la commande
        "disponibilities" => array("through" => "orders_disponibilities")
    );

}

?>