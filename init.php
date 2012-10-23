<?php

Route::set('quickcustomer-user', '<controller>(/<action>)', array(
    'controller' => 'quickcustomer',
    'action' => 'login|logout|commande|commander|modifier'
        ,
));

Route::set('quickcustomer-admin', '<controller>(/<action>)', array(
    'controller' => 'admin',
    'action' => 'creer'
        ,
));


?>
