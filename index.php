<?php
//nom de l'application
$nameApp = "twitterCeri";

//action par défaut
$action = "login";

if(key_exists("action", $_REQUEST))
$action =  $_REQUEST['action'];

require_once 'lib/core.php';
//-------------Ajouter par Belghiti-Alaoui Hicham-------------//
require_once 'twitterCeri/model/basemodel.class.php';
require_once 'twitterCeri/model/utilisateur.class.php';
require_once 'twitterCeri/model/utilisateurTable.class.php';
require_once 'twitterCeri/model/post.class.php';
require_once 'twitterCeri/model/postTable.class.php';
require_once 'twitterCeri/model/tweet.class.php';
require_once 'twitterCeri/model/tweetTable.class.php';

//-------------Fin Ajouter par Belghiti-Alaoui Hicham-------------//
require_once $nameApp.'/controller/mainController.php';
session_start();

$context = context::getInstance();
$context->init($nameApp);

$view=$context->executeAction($action, $_REQUEST);

//traitement des erreurs de bases, reste a traiter les erreurs d'inclusion
if($view===false)
{
	context::redirect("?action=page404");
}
//inclusion du layout qui va lui meme inclure le template view
elseif($view!=context::NONE)
{
	$template_view=$nameApp."/view/".$action.$view.".php";
	include($nameApp."/layout/".$context->getLayout().".php");
}else{
	include($nameApp."/view/".$action.$view.".php");
}
?>
