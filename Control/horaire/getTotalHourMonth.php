<?php 

session_start();
    //header('Content-Type: text/html; charset=utf-8');
    header('Content-type: application/json');

    if(isset($_GET)){
        $month = $_GET["month"];
        $year = $_GET["year"];
    }

    include '../all/log_db.php';
    try{
        $PDO = new PDO('mysql:host='.$DB_serveur.';dbname='.$DB_base.';charset=utf8',$DB_utilisateur,$DB_motdepasse);
        $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); 
        //$PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); 
        $PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }catch(Exception $e){
        die('Erreur  : ' . $e->getMessage());
    }

    $sql = "    SELECT  SEC_TO_TIME( SUM( TIME_TO_SEC( `timeHoraire` ) ) ) AS timeSum  
                FROM Horaire 
                WHERE idPersonne = ".$_SESSION['Auth'][0]->idPersonne." 
                AND `dateHoraire` >= '".$year."-".$month."-00 00:00:00'  
                AND `dateHoraire` <='".$year."-".$month."-31 23:59:59'";

    $req = $PDO->prepare($sql);
    $req->execute();
    $data = $req->fetchAll();

    $json  = json_encode($data);

    //error_log (json_last_error_msg());

    echo $json;
?>