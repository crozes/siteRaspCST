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

    $sql="  SELECT h.idHoraire, h.dateHoraire, h.timeHoraire, h.comHoraire, li.nomLieuInter, ti.nomTypeInter FROM Horaire h INNER JOIN LieuInter li ON h.idLieuInter = li.idLieuInter INNER JOIN TypeInter ti ON h.idTypeInter = ti.idTypeInter WHERE `dateHoraire` >= '".$year."-".$month."-00 00:00:00' AND `dateHoraire` <='".$year."-".$month."-31 23:59:59' AND `idPersonne` = ".$_SESSION['Auth'][0]->idPersonne." ORDER BY dateHoraire;";

    error_log ($sql);

    $req = $PDO->prepare($sql);
    $req->execute();
    $data = $req->fetchAll();

    error_log ($data);

    $json  = json_encode($data);

    error_log ($json);

    echo $json;

    /*foreach($data as $val){
        //print_r($val);
        //echo $val['dateHoraire'];
    }*/

?>