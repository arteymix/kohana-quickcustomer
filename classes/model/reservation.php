<?php

class Model_Reservation extends ORM {

    
    protected $_belongs_to = array(
        "forfait" => array(),
        
        
    );
    
    protected $_has_many = array(
        
      "disponibilites" => array("model" => "Disponibilite", "through" => "disponibilites_reservations")  
    );

}

?>
