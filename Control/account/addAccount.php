<?php
    include_once 'Control/all/log_db.php';

    function createAccount($nom,$prenom,$mail,$password){
        global $DB_serveur;
        global $DB_base;
        global $DB_utilisateur;
        global $DB_motdepasse;

        try{
            $PDO = new PDO('mysql:host='.$DB_serveur.';dbname='.$DB_base.';charset=utf8',$DB_utilisateur,$DB_motdepasse);
            $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING); 
            //$PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ); 
            $PDO->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }catch(Exception $e){
            die('Erreur  : ' . $e->getMessage());
        }

        $sql_select = ' SELECT * 
                        FROM Personne p
                        WHERE p.nomPersonne = '.$nom.'
                        AND p.mailPersonne = '.$mail ;
        
        $req = $PDO->prepare($sql_select);
        $req->execute();
        $data = $req->fetchAll();

        if(count($data)<=0){
            $sql_insert = '    INSERT INTO `Personne` (`idPersonne`, `nomPersonne`, `prenomPersonne`, `mailPersonne`, `mdpPersonne`, `idRole`) 
                    VALUES (NULL, \''.$nom.'\', \''.$prenom.'\', \''.$mail.'\', \''.$password.'\', \'1\');';

            $req = $PDO->prepare($sql_insert);
            $req->execute();
            //$data = $req->fetchAll();

            if($req>0){
                return 'OK';
            }
            else{
                return 'Error';
            }
        }
        else{
            return 'Exist';
        }
    }
?>