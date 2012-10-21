<?php

Route::set('utilisateur', '<controller>(/<action>)', array(
    'controller' => 'quickcustomer',
    'action' => 'login|logout|commande|commander|modifier'
        ,
));


?>
