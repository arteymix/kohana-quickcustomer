<?php

class Kohana_Controller_QuickCustomer_Admin extends Controller_QuickCustomer {

    public function before() {

        parent::before();

        if (!Auth::instance()->logged_in("admin")) {
            throw new HTTP_Exception_401("Only admins can access this page.");
        }
    }

    /**
     * Manage individual event.
     */
    public function action_event() {
        
    }

    /**
     * Manage individual order.
     */
    public function action_order() {
        
    }

    public function action_product() {
        
    }

    /**
     * Manage events.
     */
    public function action_events() {
        
    }

    /**
     * Manage orders.
     */
    public function action_orders() {
        
    }

    public function action_products() {
        
    }

    /**
     * Manage preferences such as specifications and disponibilities.
     */
    public function action_preferences() {
        
    }

}

?>
