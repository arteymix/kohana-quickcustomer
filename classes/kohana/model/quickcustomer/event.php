<?php

/**
 * Événement photo
 */
class Kohana_Model_QuickCustomer_Event extends ORM {

    protected $_has_many = array(
        // Users in the event
        'users' => array(),
        // Products allowed by the event
        'produits' => array(),
        // Specs allowed by the event
        'specifications' => array(),
    );

}

?>