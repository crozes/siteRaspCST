<?php
    include '../all/log_db.php';
    try{
        $PDO = new PDO('dblib:host='.$DB_serveur.';dbname='.$DB_base.';charset=UTF-8', $DB_utilisateur, $DB_motdepasse);
        $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); 
        $PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); 
        echo 'Connected';
    }catch(PDOEception $e){
        echo $e;
        echo "Echec";
    }

?>