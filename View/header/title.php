<?php
if(isset($_GET['page'])){
    $page = $_GET['page'];
    if($page == "login"){
        echo "<title>Authentification</title>";
    }
    else if ($page == "licence"){
        echo "<title>Auto-Licenciement</title>";
    }
    else if ($page == "horaire"){
        echo "<title>Déclaration horaires</title>";
    }
    else if ($page == "accueil"){
        echo "<title>Accueil</title>";
    }
    else{
        echo "<title>CST Tools Box</title>";
    }
}
?>

