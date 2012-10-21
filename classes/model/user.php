<?php

class Model_User extends Model_Auth_User {

    protected $_has_many = array(
        'user_tokens' => array('model' => 'user_token'),
        'roles' => array('model' => 'role', 'through' => 'roles_users'),
        'produits' => array(),
        "commandes" => array(),
    );
    protected $_belongs_to = array("evenement" => array());

    public function nom_complet() {
        return $this->prenom . " " . $this->nom;
    }

    public function est_inscrit() {
        return $this->adresse &&
                $this->ville &&
                $this->email &&
                $this->code_postal;
    }

    public function rules() {
        return array_merge(parent::rules(), array(
                    'nom' => array(
                        array('max_length', array(':value', 40)),
                    ),
                    'prenom' => array(
                        array('max_length', array(':value', 40)),
                    ),
                    'code_postal' => array(),
                    'etat' => array(
                        array('max_length', array(':value', 3)),
                    ),
                    'adresse' => array(
                        array('max_length', array(':value', 40)),
                    ),
                    'adresse2' => array(
                        array('max_length', array(':value', 40)),
                    ),
                        )
        );
    }

}

?>