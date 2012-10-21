<?php

class Kohana_Controller_QuickCustomer_Client extends Controller_Template {

    const TPS = 1.075, TVQ = 1.095;

    public $title = "Mon compte";
    private $utilisateur;

    public function before() {
        parent::before();
        if (!Auth::instance()->logged_in()) {
            throw new HTTP_Exception_401("You have to be logged to access this page.");
        }

        $this->utilisateur = Auth::instance()->get_user();
    }

    public function after() {
        $this->content->utilisateur = $this->utilisateur;

        parent::after();
    }

   

    /**
     * Administrer Quickcustomer.
     */
    public function action_admin() {
        
    }

    /**
     * Altérer la commande de l'utilisateur
     */
    public function action_commande() {
        $this->content = new View("utilisateur/commande");
    }

    /**
     * Effectue la commande en cours.
     */
    public function action_commander() {

        $this->content = new View("utilisateur/commander");


        if ($this->request->method() !== HTTP_Request::POST) {
            return;
        }


        // Calcul du coût total


        $sous_total = 0.0;

        foreach ($this->utilisateur->produits as $produit) {
            $sous_total += $produit->specification->prix;
        }

        if ($sous_total === 0) {
            throw new Kohana_Exception("Le montant total de la commande est 0.");
        }

        $total = ($sous_total * TVQ) * TPS;


        $param = array(
            "AMT" => $total,
            'ReturnURL' => $this->request->url("http"),
        );

        $response = PayPal::factory("SetExpressCheckout", $param)->execute();

        var_dump($response);
    }

}

?>
