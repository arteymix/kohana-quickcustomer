<?php

/**
 * 
 */
class Model_QuickCustomer_User extends Model_Auth_User {

    protected $_has_many = array(
        // From Model_Auth_User
        'user_tokens' => array('model' => 'user_token'),
        'roles' => array('model' => 'role', 'through' => 'roles_users'),
        "orders" => array(),
    );
    protected $_belongs_to = array(
        "evenement" => array(),
        // Offre en cours
        "order" => array(),
    );

    // Utility functions (for readability)

    /**
     * Empty the user's order.
     * Alias of $this->remove("order")
     * @return \Model_QuickCustomer_User
     */
    public function empty_order() {
        return $this->remove("order");
    }

}

?>