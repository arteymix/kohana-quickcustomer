<?php

/**
 *
 */
class Model_QuickCustomer_Produit extends ORM {

    protected $_belongs_to = array("commande" => array());
    protected $_has_many = array(
        "events" => array(),
        "specifications" => array(),
        "commandes" => array()
    );

}

?>