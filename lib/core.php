<?php
require_once 'core/context.class.php' ;
//-------------Ajouter par Belghiti-Alaoui Hicham-------------//
require_once 'core/dbconnection.class.php';
//-------------Fin Ajouter par Belghiti-Alaoui Hicham-------------//

// Chargement automatique de toutes les classes en lien avec le modèle de données
function autoloadClassModel($class){
    global $nameApp;
    require_once $nameApp . '/model/' . $class . '.class.php';
}
spl_autoload_register('autoloadClassModel');
?>