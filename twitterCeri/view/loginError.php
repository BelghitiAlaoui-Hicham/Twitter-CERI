<?php
/**
 * Created by PhpStorm.
 * User: hicham
 * Date: 12/11/15
 * Time: 19:56
 */?>
<form class="login-form" method="POST">

    <div class="row">
        <div class="input-field col s12 center">
            <img src="images/login-logo.png" alt="" class="circle responsive-img valign profile-image-login">
            <p class="center login-form-text">Twitter CERI by Hicham</p>
        </div>
    </div>
   <?= $context->msgError;?>
    <div class="row margin">
        <div class="input-field col s12">
            <i class="mdi-social-person-outline prefix"></i>
            <input id="username" type="text" name="user">
            <label for="username" class="center-align">Username</label>
        </div>
    </div>
    <div class="row margin">
        <div class="input-field col s12">
            <i class="mdi-action-lock-outline prefix"></i>
            <input id="password" type="password" name="pass">
            <label for="password">Password</label>
        </div>
    </div>
       
    <div class="row">
        <div class="input-field col s12">
            <button href="" class="btn waves-effect waves-light col s12">Se connecter</button>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s6 m6 l6">
            <p class="margin medium-small"><a href="?action=register">Inscription</a></p>
        </div>
        
    </div>

</form>
