<?php foreach ($context->tweets as $tweet) {?>
                  <div class="col s12" >
                    <input class="nouveauPost" type="text" value="<?=$tweet->id?>" hidden>
                    <!-- small -->
                      <div id="profile-page-wall-post" class="card">
                        <div class="card-profile-title">
                          <div class="row">
                            <div class="col s1">
                              <img src="<?=$tweet->getPost()->image?>" alt="" class="circle responsive-img valign profile-post-uer-image">                        
                            </div>
                            <div class="col s10">
                              <p class="grey-text text-darken-4 margin"><?=$tweet->getParent()->prenom." ".$tweet->getParent()->nom?></p>
                              <span class="grey-text text-darken-1 ultra-small">Publier le   -  <?=date("d/m/Y à H:m",strtotime($tweet->getPost()->date));?></span>
                            </div>
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
                          <div class="col s4 card-action-share">
                            <a id="voter" href="#"><i class="mdi-action-face-unlock"></i> <span><?=sizeof($tweet->getLikes())?></span></a>
                            <a href="#">Partager <span>0</span></a>                          
                            <!--<a href="#">Share</a>-->
                          </div>
                          
                          <!--<div class="input-field col s8 margin">
                            <input id="profile-comments" type="text" class="validate">
                            <label for="profile-comments" class="">Comments</label>
                          </div> -->                       
                        </div>                        
                      </div>
                    </div><!-- Fin post-->
                   <?php }?>