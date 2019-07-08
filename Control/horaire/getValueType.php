<?php
    session_start();
    header('Content-type: application/json');

    if(isset($_GET)){
        $month = $_GET["month"];
        $year = $_GET["year"];
    }

    include '../all/log_db.php';
    try{
        $PDO = new PDO('mysql:host='.$DB_serveur.';dbname='.$DB_base.'',$DB_utilisateur,$DB_motdepasse);
        $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); 
        //$PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); 
        $PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }catch(Exception $e){
        die('Erreur  : ' . $e->getMessage());
    }

    $sql="  SELECT ti.idTypeInter, ti.nomTypeInter
            FROM TypeInter ti";

    $req = $PDO->prepare($sql);
    $req->execute();
    $data = $req->fetchAll();

    $json  = json_encode($data);

    echo $json;
?>