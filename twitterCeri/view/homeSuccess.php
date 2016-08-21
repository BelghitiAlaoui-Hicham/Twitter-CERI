
<div id="profile-page" class="section">
            <!-- profile-page-header -->
            <div id="profile-page-header" class="card">
                <div class="card-image waves-effect waves-block waves-light">
                    <img class="activator" src="images/user-profile-bg.jpg" alt="user background">                    
                </div>
                <figure class="card-profile-image">
                    <img src="<?=$context->user->avatar?>" alt="profile image" class="circle z-depth-2 responsive-img activator">
                   
                </figure>
                <div class="card-content">
                  <div class="row">                    
                    <div class="col s8 offset-s2">                        
                        <h4 class="card-title grey-text text-darken-4"><?=$context->user->prenom." ".$context->user->nom?></h4>
                        <p id="status" class="medium-small grey-text"><?=$context->user->statut?></p>  

                    </div>
                                       
                    
                  </div>
                </div>
            </div>
            <!--/ profile-page-header -->

            <!-- profile-page-content -->
            <div id="profile-page-content" class="row">
             
	
              <!-- profile-page-wall -->
              <div id="profile-page-wall" class="col s12 m12">
                <!-- profile-page-wall-share -->
                
		<div id="profile-page-wall-share" class="row">
                  <div class="col s12">
                    <ul class="tabs tab-profile z-depth-1 light-blue">
                      <li class="tab col s3"><a class="white-text waves-effect waves-light active" href="#UpdateStatus"><i class="mdi-editor-border-color"></i> Modifier le status</a>
                      </li>
                      <li class="tab col s3"><a class="white-text waves-effect waves-light" href="#AddPhotos"><i class="mdi-image-camera-alt"></i> Ajouter un tweets</a>
                      </li>
                                          
                    </ul>
                    <!-- UpdateStatus-->
                    <form id="updateStatu">
                    <div id="UpdateStatus" class="tab-content col s12  grey lighten-4">
                      <div class="row">
                        <div class="col s2">
                          
                        </div>
                        <div class="input-field col s10">
                          <input id="id" type="text" hidden value="<?=$context->user->id?>">
                          <textarea id="textarea" name="status" row="2" class="materialize-textarea"></textarea>
                          <label for="textarea" class="">Modifier votre status !</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col s12 m6 share-icons">
                          <!--<a href="#"><i class="mdi-image-camera-alt"></i></a>
                          <a href="#"><i class="mdi-action-account-circle"></i></a>
                          <a href="#"><i class="mdi-hardware-keyboard-alt"></i></a>
                          <a href="#"><i class="mdi-communication-location-on"></i></a>-->
                        </div>
                        <div class="col s12 m6 right-align">
                           <!-- Dropdown Trigger 
                            <a class='dropdown-button btn' href='#' data-activates='profliePost'><i class="mdi-action-language"></i> Public</a>

                            
                            <ul id='profliePost' class='dropdown-content'>
                              <li><a href="#!"><i class="mdi-action-language"></i> Public</a></li>
                              <li><a href="#!"><i class="mdi-action-face-unlock"></i> Friends</a></li>                              
                              <li><a href="#!"><i class="mdi-action-lock-outline"></i> Only Me</a></li>
                            </ul>-->

                           
                              <button type="submit" class="waves-effect waves-light btn">Statut</button>
                          
                        </div>
                      </div>
                    </div>
                  </form>
                    <!-- AddPhotos -->
                    <div id="AddPhotos" class="tab-content col s12  grey lighten-4">
                      <form id="tweet" enctype="multipart/form-data">
                      <div class="row">
                        <div class="col s2">
                          
                        </div>
                        <div class="input-field col s10">
                          <input id="id" type="text" hidden value="<?=$context->user->id?>">
                          <textarea id="textarea2" name ="textarea" row="2" class="materialize-textarea"></textarea>
                          <label for="textarea" class="">Ajouter un nouveau tweets</label>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col s12 m6 share-icons">
                         <div class="input-field col s12">
              <div class="file-field input-field">
              <input class="file-path validate valid" style="margin-left: 126px;width: calc(100% - 123px);" type="text">
                <div class="btn">
                  <span>image</span>
                  <input id="file" name="file" type="file">
                </div>
              </div>
            </div>
                          <!--<a href="#"><i class="mdi-action-account-circle"></i></a>
                          <a href="#"><i class="mdi-hardware-keyboard-alt"></i></a>
                          <a href="#"><i class="mdi-communication-location-on"></i></a>-->
                        </div>
                        <div class="col s12 m6 right-align">
                           <!--
                            <a class='dropdown-button btn' href='#' data-activates='profliePost2'><i class="mdi-action-language"></i> Public</a>

                            
                            <ul id='profliePost2' class='dropdown-content'>
                              <li><a href="#!"><i class="mdi-action-language"></i> Public</a></li>
                              <li><a href="#!"><i class="mdi-action-face-unlock"></i> Friends</a></li>                              
                              <li><a href="#!"><i class="mdi-action-lock-outline"></i> Only Me</a></li>
                            </ul>-->
                           <button type="submit" class="waves-effect waves-light btn">Tweet</button>
                          </form>
                        </div>
                      </div>
                    </div>
                   
                  </div>
                </div>
                <!--/ profile-page-wall-share -->

                <!-- profile-page-wall-posts -->
                <div id="profile-page-wall-posts articles" class="rowTweet">
                  <input id="user" value="<?=$context->user->id?>" hidden = "hidden">
                  <?php if(sizeof($context->tweets) > 0){?>
                    <?php foreach ($context->tweets as $tweet) {?>
                 
                  <div class="col s12" >
                    <input class="nouveauPost" type="text" value="<?=$tweet->id?>" hidden>
                    <!-- small -->
                      <div id="profile-page-wall-post" class="card">
                        <div class="card-profile-title">
                          <div class="row">
                            <?php if($tweet->getParent() == $tweet->getEmetteur()){?>
                              <div class="col s1">
                                <img src="<?=$tweet->getParent()->avatar?>" alt="" class="circle responsive-img valign profile-post-uer-image">                        
                              </div>
                              <div class="col s10">
                                <p class="grey-text text-darken-4 margin"><?=$tweet->getParent()->prenom." ".$tweet->getParent()->nom?></p>
                                <span class="grey-text text-darken-1 ultra-small">Publier le   -  <?=date("d/m/Y à H:m",strtotime($tweet->getPost()->date));?></span>
                              </div>
                              <?php }else{?>
                                   <div class="col s1">
                                <img src="<?=$tweet->getEmetteur()->avatar?>" alt="" class="circle responsive-img valign profile-post-uer-image">                        
                              </div>
                              <div class="col s10">
                                <p class="grey-text text-darken-4 margin"><?=$tweet->getEmetteur()->prenom." ".$tweet->getEmetteur()->nom?></p>
                                <a href="?action=userProfile&id=<?=$tweet->getParent()->id?>" class="blue-text text-darken-1 ultra-small">Posteur originel : <?=$tweet->getParent()->prenom." ".$tweet->getParent()->nom?></a>
                                <span class="grey-text text-darken-1 ultra-small"></br>Publier le   -  <?=date("d/m/Y à H:m",strtotime($tweet->getPost()->date));?></span>
                              </div>
                              <?php }?>
                            <div class="col s1 right-align">
                              <i class="mdi-navigation-expand-more"></i>
                            </div>
                          </div>
                         
                        </div>
                        
			               <?php if($tweet->getPost()->image != ""){?>
				                <img src="<?=$tweet->getPost()->image?>"  class="responsive-img profile-post-image">                        
              		<?php }?>
	             		<div class="card-content">
                          <p><?=$tweet->getPost()->texte?></p>
                        </div>
                        <div class="card-action row">
                          <div class="col s4 card-action-share" id="<?=$tweet->getPost()->id?>">
                            <a class="voter" href="#">
                              <i class="mdi-action-face-unlock"></i> 
                                <span class="nbrVote"><?=sizeof($tweet->getLikes())?>
                                </span>
                            </a>
                            
                              <a id="<?=$tweet->id?>" class="partager" href="#">Partager </a>                          
                            
                          </div>
                          
                          <!--<div class="input-field col s8 margin">
                            <input id="profile-comments" type="text" class="validate">
                            <label for="profile-comments" class="">Comments</label>
                          </div> -->                       
                        </div>                        
                      </div>
                    </div><!-- Fin post-->
                   <?php }?>
                    <?php }else {
                      echo "Pas de post à afficher";
                    }?>                
                </div>
                <!--/ profile-page-wall-posts -->

              </div>
              <!--/ profile-page-wall -->

            </div>
          </div>
