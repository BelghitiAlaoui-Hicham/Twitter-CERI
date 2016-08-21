<?php
/*
 * Controler 
 */

class mainController
{

	
	/*
	 * Login
	 */
	public static function login($request,$context)
	{
		$context->setLayout('loginLayout');
		if(!empty(context::getSessionAttribute("login"))){
			context::redirect("?action=home");
		}
			if($_SERVER['REQUEST_METHOD'] == "POST") {
				if (isset($request['user']) && isset($request['pass']) && !empty($request['pass']) && !empty($request['user'])) {
					if (!utilisateurTable::getUserByLoginAndPass($request['user'], $request['pass'])) {
						$context->msgError = "Votre utilisateur ou mot de passe est incorrect";
						return context::ERROR;
					}else{
						$user = utilisateurTable::getUserByLoginAndPass($request['user'], $request['pass']);
						
						context::setSessionAttribute('login',$user);
						context::redirect("?action=home");
					}
				}else{
					$context->msgError = "Veuillez saisir tous vos champs vide";
					return context::ERROR;
				}
			}
		return context::SUCCESS;
	}

   /*
	* Paramétre
	*/
	public static function parametre($request,$context){
		$context->setLayout('mainLayout');
		if($_SERVER['REQUEST_METHOD'] == "POST") {
			if(isset($request['nom']) && isset($request['prenom'])){
				$dossier = 'images/avatar';
				if(!is_dir($dossier))
					mkdir($dossier);
				if($_FILES['file']['name'] != ""){
					$resultat = move_uploaded_file($_FILES["file"]["tmp_name"], $dossier."/".$_REQUEST['identifiant'].".jpg");
					$user = utilisateurTable::getUserById($request['id']);
					$user->avatar = "https://pedago02a.univ-avignon.fr/~uapv1600543/TP7/".$dossier."/".$request['identifiant'].".jpg";
					$user->nom = $request['nom'];
					$user->prenom = $request['prenom'];
					$user->save();
					context::redirect("?action=home");
				}else{
					$user = utilisateurTable::getUserById($request['id']);
					$user->nom = $request['nom'];
					$user->prenom = $request['prenom'];
					$user->save();
					context::redirect("?action=home");
				}
			}
		}else{
			$user = utilisateurTable::getUserById(context::getSessionAttribute('login')[0]['id']);
			$context->user = $user;
		}

		return context::SUCCESS;
	}


	/*
	 * Logout
	 */
	public static function logout($request,$context)
	{
		$context->setLayout('loginLayout');
		context::unsetSession('login');
		context::redirect("?action=login");
	}

	/*
	 * Inscription
	 */
	public static function register($request,$context)
	{

		$context->setLayout('loginLayout');
		if($_SERVER['REQUEST_METHOD'] == "POST") {
			if(isset($request['username']) && 
			   isset($request['password']) && 
		           isset($request['password-again']) && 
		           isset($request['nom']) && 
		           isset($request['prenom']) && 
			   !empty($request['username']) && 
			   !empty($request['password']) && 
		           !empty($request['password-again']) && 
		           !empty($request['nom']) && 
		           !empty($request['prenom'])
			){
			$dossier = 'images/avatar';
				if(!is_dir($dossier))
					mkdir($dossier);		   
				
			   if($request['password'] == $request['password-again']){
				
				$utilisateur = new utilisateur();
				if($_FILES['file']['name'] != ""){
					$resultat = move_uploaded_file($_FILES["file"]["tmp_name"], $dossier."/".$_REQUEST['username'].".jpg");
					$utilisateur->identifiant = $request['username'];
					$utilisateur->pass = sha1($request['password']);
					$utilisateur->nom = $request['nom'];
					$utilisateur->prenom = $request['prenom'];
					$utilisateur->statut = "";
					$utilisateur->avatar = "https://pedago02a.univ-avignon.fr/~uapv1600543/TP7/".$dossier."/".$request['username'].".jpg";
				}else{
					
					$utilisateur->identifiant = $request['username'];
					$utilisateur->pass = sha1($request['password']);
					$utilisateur->nom = $request['nom'];
					$utilisateur->prenom = $request['prenom'];
					$utilisateur->statut = "";
					$utilisateur->avatar = "https://pedago02a.univ-avignon.fr/~uapv1600543/TP7/".$dossier."/avatar.jpg";
				}	
				
				$utilisateur->save();
				return context::SUCCESS;
			   }else{
				return context::ERROR;
			  }
			 }
		
			 
		}
		return context::SUCCESS;
	}

	/*
	 * Utilisateur profile
	 */

	public static function home($request,$context)
	{
		if(context::getSessionAttribute('login')){
			$context->setLayout('mainLayout');
			$context->tweets = tweetTable::getTweets();
			$id = context::getSessionAttribute('login')[0]['id'];
			$context->user= utilisateurTable::getUserById($id);

			return context::SUCCESS;
		}else{
			$context->setLayout('notificationLayout');
			return context::ERROR;
		}
	}

	/*
	 * Liste des utilisateurs
	 */

	public static function usersList($request,$context){
		
	if(context::getSessionAttribute('login')){
			$context->setLayout('mainLayout');
		$context->users = utilisateurTable::getUsers();
		return context::SUCCESS;
		}else{
			$context->setLayout('notificationLayout');
			return context::ERROR;
		}
	}

	/*
	 * Liste des utilisateurs
	 */

	public static function userProfile($request,$context){
		if(context::getSessionAttribute('login')){
			if($_SERVER['REQUEST_METHOD'] == "GET") {
					if(isset($_GET['id'])){
						$id = $request['id'];
						if(!empty($id)){
							$context->setLayout('mainLayout');
							$context->user = utilisateurTable::getUserById($id);
							$context->tweets = tweetTable::getTweetsByEmmeteurId($id);
							return context::SUCCESS;	
						}else{
							context::redirect("?action=page404");
						}
					}else{
							context::redirect("?action=page404");
					}
				}else{
					context::redirect("?action=page404");
				}
		}else{
			context::redirect("?action=page404");
		}
		
		
	}

	public static function page404($request,$context){
		$context->setLayout('notificationLayout');
		return context::SUCCESS;
	}


	//*--------------------------Ajax--------------------------->
	public static function status($request,$context){
		$utilisateur = utilisateurTable::getUserById($request['id']);
		$context->statut = $utilisateur->statut;
		return context::NONE;
	}
	public static function updateStatus($request,$context){
		$utilisateur = utilisateurTable::getUserById($request['id']);
		$utilisateur->statut = $request['status'];
		$utilisateur->save();
		return context::NONE;
	}
	public static function nouveauTweets($request,$context){		
		$id = $request['id'];
		$tweets = $request['tweet'];
		if ( 0 < $_FILES['file']['error'] ) {
        	$avatar = '';
    	}
    	else if($_FILES['file']['name'] != "") {
    		move_uploaded_file($_FILES['file']['tmp_name'], 'images/'.$id.'-'.$_FILES['file']['name']);
    		$avatar = 'https://pedago02a.univ-avignon.fr/~uapv1600543/TP7/images/'.$id.'-'.$_FILES['file']['name'];
    	}else{
    		$avatar = '';
    	}
    	$post = new post();
    	$tweet = new tweet();
    	
    	$post->texte = $request["tweet"];
    	$post->image = $avatar;
    	$post->date = date('Y-m-d H:i:s');
    	$idPost = $post->save();
    	
    	$tweet->emetteur = $id;
    	$tweet->parent = $id;
    	$tweet->post = $idPost;
    	$idd = $tweet->save();
    	return context::NONE;
	}

	public static function visualiserTweet($request,$context){		
		$context->tweet = tweetTable::getLastTweet();
    	return context::NONE;
	}

	public static function updateMur($request,$context){		
		$context->tweets = tweetTable::getNewTweets($request['idTweet']);
    	return context::NONE;
	}

	public static function voter($request,$context){
			$vote = new  vote();
			$vote->utilisateur = $request['utilisateur'];
			$vote->message = $request['message'];
			$vote->save();
			die();
		return context::NONE;
	}
	public static function visualiserVote($request,$context){
			$context->vote = tweetTable::getLikeByMessage($request['idPost']);
		return context::NONE;
	}

	public static function partager($request,$context){
		
		$tweet = tweetTable::getTweetsPostedById($request['idTweet']);
		
		$newTweet = new tweet();
		$newTweet->emetteur = $request['emetteur'];
		$newTweet->parent = $tweet->parent;
		$newTweet->post = $tweet->post;
		$newTweet->save();
		
		
	}

}
