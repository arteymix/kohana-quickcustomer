<?php

/**
 *
 */
class Model_Specification extends ORM {

    protected $_belongs_to = array(
        "produit" => array(),
        "image" => array(),
    );
    protected $_has_many = array("specifications" => array());

}

?>