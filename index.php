<?php
    include 'View/header/header.php';
    include 'View/header/menu.php';
    
    if(isset($_GET[page])){
        if($_GET[page]=='login'){
            include 'View/login/login.php';
        }
        else if($_GET[page]=='licence'){
            include 'View/licence/Autolicenciement.php';
        }
        else if($_GET[page]=='horaire'){
            include 'View/horaires/horaire.php';
        }
        else if($_GET[page]=='accueil'){
            include 'View/accueil/accueil.php';
        }
    }
    else{
        include 'View/accueil/accueil.php';
    }
    
    include 'View/header/footer.php';
?>
