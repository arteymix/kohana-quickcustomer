<?php

    /**
     *
     */
    class Model_Produit extends ORM {
        
        
        protected $_has_one = array(
            "specification" => array(),
            "image" => array(),
            
            );
        
        protected $_belongs_to = array("commande" => array());
    }
    
?>