 <form class="login-form" enctype="multipart/form-data" method="POST">
        <div class="row">
          <div class="input-field col s12 center">
            <h4>Register</h4>
            <p class="center">Bienvenu à notre communauté</p>
          </div>
        </div>
        

        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input id="nom" name="nom" type="text" required="required">
            <label for="nom" class="center-align">Nom</label>
          </div>
        </div>

        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input id="prenom" name="prenom" type="text" required="required">
            <label for="prenom" class="center-align">Prénom</label>
          </div>
        </div>

        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input id="username" name="username" type="text" required="required">
            <label for="username" class="center-align">Identifiant</label>
          </div>
        </div>
         


        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input id="password" name="password" type="password" required="required">
            <label for="password">Mot de passe</label>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input id="password-again" name="password-again" type="password" required="required">
            <label for="password-again">Confirmer votre mot de passe</label>
          </div>
        </div>

        <div class="row margin">
            <div class="input-field col s12">
              <div class="file-field input-field">
                <input class="file-path validate valid" type="text" style="margin-left: 126px;width: calc(100% - 123px);">
                    <div class="btn">
                      <span>image</span>
                      <input name="file" type="file">
                    </div>
              </div>
            </div>
          </div>

        <div class="row">
          <div class="input-field col s12">
		
            <button type="submit" class="btn waves-effect waves-light col s12">S'enregistrer</a>
          </div>
          <div class="input-field col s12">
           	
		 <p class="margin center medium-small sign-up">Déja un compte? <a href="?action=login">Se connecter</a></p>
          </div>
        </div>
      </form>
