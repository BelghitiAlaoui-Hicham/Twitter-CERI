<?php $user = context::getSessionAttribute('login')[0]?>
<div class="row">
                <div class="col s12 m12 l12">
                  <div class="card-panel">
                    <h4 class="header2">Modification du profil</h4>
                    <div class="row">
                      <form class="col s12" method="post" enctype="multipart/form-data">
                        <div class="row">
                          <div class="input-field col s12">
                            <input type="text" name="id" value="<?=$user['id']?>" hidden="hidden">
                            <input id="name" type="text" name="nom" value="<?=$context->user->nom?>">
                            <label for="first_name">nom</label>
                          </div>
                        </div>

                         <div class="row">
                          <div class="input-field col s12">
                            <input id="name" type="text" name="prenom" value="<?=$context->user->prenom?>">
                            <label for="last_name">prenom</label>
                          </div>
                        </div>
                        
                       <div class="row">
                            <div class="file-field input-field">
                              <input class="file-path validate valid" style="margin-left: 126px;width: calc(100% - 123px);" type="text">
                                <div class="btn">
                                  <span>image</span>
                                  <input id="file" name="file" type="file">
                                </div>
                              </div>
                          </div>
                          <div class="row">
                            <div class="input-field col s12">
                              <button class="btn cyan waves-effect waves-light right" type="submit">changer
                                <i class="mdi-content-send right"></i>
                              </button>
                            </div>
                          </div>


                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <!-- Form with placeholder -->
              
                </div>
              </div>