<?php

    /**
     *
     */
    class Model_Commande extends ORM {
        
        protected $_belongs_to = array("user" => array());
        protected $_has_many = array("produits" => array());
        
    }
    
?>