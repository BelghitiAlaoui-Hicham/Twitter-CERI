<div class="section">

            <p class="caption">Liste des utilisateurs</p>
            <div class="divider"></div>
       
    
    <div id="card-widgets">

          <div class="row">
	<?php foreach($context->users as $user){?> 
		<a href="?action=userProfile&id=<?=$user->id?>">
		             <div class="col s12 m6 l4">
		                  <div id="profile-card" class="card">
		                      <div class="card-image waves-effect waves-block waves-light">
		                           <img class="activator" src="<?=$user->avatar?>" alt="user background">
		                      </div>
		                      <div class="card-content">
		                          <img src="" alt="" class="circle responsive-img activator card-profile-image">
		                          <a class="btn-floating activator btn-move-up waves-effect waves-light darken-2 right">
		                          	<i class="mdi-action-account-circle"></i>
		                          </a>
	    			         <span class="card-title activator grey-text text-darken-4"><?=$user->prenom." ".$user->nom?></span>
		                         <p><i class="mdi-action-perm-identity cyan-text text-darken-2"></i> Etudiant CERI</p>
		                       </div>
	    			   </div>
		                  </div>
		  </a>
        <?php } ?> 

                            
	    </div>

       </div>

</div>
