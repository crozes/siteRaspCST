<?php class Auth{
    function login($d){
        global $PDO;
        $req = $PDO->prepare("SELECT p.idPersonne, p.nomPersonne, p.prenomPersonne, p.mailPersonne, p.mdpPersonne, r.valueRole, r.nomRole FROM Personne p LEFT JOIN Role r ON p.idRole=r.idRole WHERE mailPersonne=:login AND mdpPersonne=:password");
        $req->execute($d);
        $data = $req->fetchAll();
        
        if(count($data)>0){
            $_SESSION['Auth'] = $data;
            return true;
        }
        else{
            return false;
        }
    }
}
$Auth = new Auth();
?>