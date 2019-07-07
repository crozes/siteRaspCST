<div class="jumbotron jumbotron-fluid bg-danger text-white">
    <div class="container">
        <h1 class="display-3">CST Tools</h1>
        <p class="lead">Outils pour le club de sauvetage toulousain</p>
    </div>
</div>
<?php
    if(isset($_SESSION['Auth'])){
        include 'View/accueil/accueil_log.php';
    }
    else{
        include 'View/accueil/accueil_nolog.php';
    }
?>