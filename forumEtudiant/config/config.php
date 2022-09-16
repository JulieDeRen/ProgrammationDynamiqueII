<?php
define('MODEL_DIR', 'models');
define('VIEW_DIR', 'views');
define('CONNEX_DIR', 'lib/connex.php');

// page d'accueil est l'index du forum pour respecter demande du TP
$config = array(
    'default_module' => 'forum',
    'default_action' => 'index', 
);
  
// module = controlleur

//action = fonction dedans le controlleur
?>