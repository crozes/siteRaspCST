<?php
if(isset($_GET['page'])){
    $page = $_GET['page'];
    if($page == "login"){
        echo "<title>Authentification</title>";
    }
    elseif ($page == "licence"){
        echo "<title>Auto-Licenciement</title>";
    }
    elseif ($page == "horaire"){
        echo "<title>Déclaration horaires</title>";
    }
    elseif ($page == "accueil"){
        echo "<title>Accueil</title>";
    }
    else{
        echo "<title>CST Tools Box</title>";
    }
}
?>

