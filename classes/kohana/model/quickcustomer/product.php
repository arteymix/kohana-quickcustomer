<?php

/**
 *
 */
class Model_QuickCustomer_Product extends ORM {

    protected $_belongs_to = array("order" => array());
    protected $_has_many = array(
        "specifications" => array(),
    );

}

?>