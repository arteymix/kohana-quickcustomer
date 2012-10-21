<?php

class Kohana_Controller_QuickCustomer extends Controller_Template {

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

    public function action_login() {
        
    }

    public function action_logout() {
        
    }
    
    /**
     * Créer un événement
     */
    public function action_creer() {
        
        
    }

    /**
     * Modifier les données de l'utilisateur
     */
    public function action_modifier() {
        $this->content = new View("utilisateur/modifier");

        if ($this->request->method() === HTTP_Request::POST) {
            // On modifie l'utilisateur.

            $this->utilisateur->values($this->request->post());


            try {
                $this->utilisateur->save();
            } catch (ORM_Validation_Exception $ove) {


                $this->errors = array_merge($this->errors, $ove->errors(":model"));
            }



            $this->content->errors = $this->errors;
        }
    }

    /**
     * Affiche les éléments que l'utilisateur peut commander
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
