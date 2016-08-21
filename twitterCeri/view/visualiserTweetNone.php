<div class="col s12" >
                 <input class="nouveauPost" type="text" value="<?=$context->tweet->id?>" hidden>
                    <!-- small -->
                      <div id="profile-page-wall-post" class="card">
                        <div class="card-profile-title">
                          <div class="row">
                            <?php if($context->tweet->getParent() == $context->tweet->getEmetteur()){?>
                              <div class="col s1">
                                <img src="<?=$context->tweet->getParent()->avatar?>" alt="" class="circle responsive-img valign profile-post-uer-image">                        
                              </div>
                              <div class="col s10">
                                <p class="grey-text text-darken-4 margin"><?=$context->tweet->getParent()->prenom." ".$context->tweet->getParent()->nom?></p>
                                <span class="grey-text text-darken-1 ultra-small">Publier le   -  <?=date("d/m/Y à H:m",strtotime($context->tweet->getPost()->date));?></span>
                              </div>
                              <?php }else{?>
                                   <div class="col s1">
                                <img src="<?=$context->tweet->getEmetteur()->avatar?>" alt="" class="circle responsive-img valign profile-post-uer-image">                        
                              </div>
                              <div class="col s10">
                                <p class="grey-text text-darken-4 margin"><?=$context->tweet->getEmetteur()->prenom." ".$context->tweet->getEmetteur()->nom?></p>
                                <a href="?action=userProfile&id=<?=$context->tweet->getParent()->id?>" class="blue-text text-darken-1 ultra-small">Posteur originel : <?=$context->tweet->getParent()->prenom." ".$context->tweet->getParent()->nom?></a>
                                <span class="grey-text text-darken-1 ultra-small"></br>Publier le   -  <?=date("d/m/Y à H:m",strtotime($context->tweet->getPost()->date));?></span>
                              </div>
                              <?php }?>
                            <div class="col s1 right-align">
                              <i class="mdi-navigation-expand-more"></i>
                            </div>
                          </div>
                         
                        </div>
                        
                     <?php if($context->tweet->getPost()->image != ""){?>
                        <img src="<?=$context->tweet->getPost()->image?>"  class="responsive-img profile-post-image">                        
                  <?php }?>
                  <div class="card-content">
                          <p><?=$context->tweet->getPost()->texte?></p>
                        </div>
                        <div class="card-action row">
                          <div class="col s4 card-action-share" id="<?=$context->tweet->getPost()->id?>">
                            <a class="voter" href="#">
                              <i class="mdi-action-face-unlock"></i> 
                                <span class="nbrVote"><?=sizeof($context->tweet->getLikes())?>
                                </span>
                            </a>
                            
                              <a id="<?=$context->tweet->id?>" class="partager" href="#">Partager </a>                          
                            
                          </div>
                          
                          <!--<div class="input-field col s8 margin">
                            <input id="profile-comments" type="text" class="validate">
                            <label for="profile-comments" class="">Comments</label>
                          </div> -->                       
                        </div>                        
                      </div>
                    </div><!-- Fin post-->