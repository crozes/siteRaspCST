<?php
    if(isset($_POST)){
        
    }
?>

<div class="jumbotron jumbotron-fluid bg-danger text-white">
    <div class="container">
        <h1 class="display-3">Signin</h1>
        <p class="lead">Permet de creer son compte pour les prochaines connexion et acceder aux outils</p>
    </div>
</div>
<main class="signin-form">
    <div class="container">
        <div class="card bg-light">
        <article class="card-body mx-auto" style="max-width: 1000px;">
            <h4 class="card-title mt-3 mb-3 text-center">Création de compte</h4>
            <form id="formCreate" action="?page=signin" method="POST">
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                </div>
                <input name="nom" class="form-control" placeholder="Nom" type="text">
            </div>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                </div>
                <input name="prenom" class="form-control" placeholder="Prénom" type="text">
            </div>
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                </div>
                <input name="mail" class="form-control" placeholder="Adresse mail" type="email">
            </div> <!-- form-group// -->
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                </div>
                <input id="password" name="password" class="form-control" placeholder="Mot de passe" type="password">
            </div> <!-- form-group// -->
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                </div>
                <input id="password_again" name="password_again" class="form-control" placeholder="Répéter le mot de passe" type="password">
            </div> <!-- form-group// -->                                      
            <div class="form-group">
                <button type="submit" class="btn btn-danger btn-block"> Je créé mon compte </button>
            </div> <!-- form-group// -->      
            <p class="text-center">J'ai deja un compte ? <a href="?page=login">Je me connect</a> </p>                                                                 
            </form>
        </article>
    </div> 
    </div>
</main>

<script>
$( "#formCreate" ).validate({
  rules: {
    password: "required",
    password_again: {
      equalTo: "#pass2"
    }
  }
});
</script>