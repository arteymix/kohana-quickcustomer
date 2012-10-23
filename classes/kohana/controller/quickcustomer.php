<?php

class Kohana_Controller_QuickCustomer extends Controller_Template {

    const TPS = 1.075, TVQ = 1.095;
    
    protected $template = "quickcustomer/template";

    protected $utilisateur;

    public function before() {
        parent::before();


        $this->utilisateur = Auth::instance()->get_user();
    }

    public function after() {
        $this->content->utilisateur = $this->utilisateur;

        parent::after();
    }

}

?>
