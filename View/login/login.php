<?php
    $alert = "";
    if(!empty($_POST)){
        $_POST['password'] = strtoupper(hash('sha256', $_POST['password']));
        if($Auth->login($_POST)){
            header('Location:index.php?page=accueil');
        }
        else{
            $alert = '  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <h4 class="alert-heading">Veuillez corriger les erreurs suivantes avant de continuer :</h4>
                            <p>L\'adresse e-mail ou le mot de passe ne correspond à aucun compte.</p>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>';
        }
    }
?>

<div class="jumbotron jumbotron-fluid bg-danger text-white">
    <div class="container">
        <h1 class="display-3">Connexion</h1>
        <p class="lead">Permet de garder vos donnés lors des prochaines connexions</p>
    </div>
</div>
<main class="login-form">
    <div class="cotainer mb-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <?php echo $alert;?>
                <div class="card bg-light">
                    <div class="card-header">Connexion</div>
                    <div class="card-body">
                        <form action="?page=login" method="POST">
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">Adresse-mail</label>
                                <div class="col-md-6">
                                    <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="password" required>
                                </div>
                            </div>
                            
                            <!--<div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember"> Remember Me
                                        </label>
                                    </div>
                                </div>
                            </div>-->

                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-danger">
                                    Je me connect !
                                </button>
                                <!--<a href="#" class="btn btn-link">
                                    Forgot Your Password?
                                </a>-->
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>