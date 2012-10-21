<?php

    /**
     * Événement photo
     */
    class Model_Evenement extends ORM {        
               
        protected $_has_many = array(
            'users' => array(),
            'images'=> array(),
        ); 
        
    }
    
?>