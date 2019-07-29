<?php
    require('../tfpdf/tfpdf.php');
    session_start();
    $nom = $_SESSION['Auth'][0]->nomPersonne;
    $prenom = $_SESSION['Auth'][0]->prenomPersonne;

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

    $sql="  SELECT h.idHoraire, h.dateHoraire, h.timeHoraire, h.comHoraire, li.nomLieuInter, ti.nomTypeInter 
            FROM Horaire h 
            INNER JOIN LieuInter li ON h.idLieuInter = li.idLieuInter 
            INNER JOIN TypeInter ti ON h.idTypeInter = ti.idTypeInter 
            WHERE `dateHoraire` >= '".$year."-".$month."-00 00:00:00' 
            AND `dateHoraire` <='".$year."-".$month."-31 23:59:59' 
            AND `idPersonne` = ".$_SESSION['Auth'][0]->idPersonne." ORDER BY dateHoraire;";

    $req = $PDO->prepare($sql);
    $req->execute();
    $data = $req->fetchAll();

    //print_r($data);

    //$json  = json_encode($data);

    class PDF extends tFPDF
    {
        // En-tête
        function Header()
        {
            // Logo
            $this->Image('../../img/logotrans.png',10,6,30);
            // Police Arial gras 15
            $this->SetFont('RobotoTitre','',24);
            // Décalage à droite
            $this->Cell(30);
            // Titre
            $this->Cell(0,20,'Club de Sauvetage Toulousain',0,1,'C');
            // Saut de ligne
            $this->Ln(10);
        }

        // Pied de page
        function Footer()
        {
            // Positionnement à 1,5 cm du bas
            $this->SetY(-25);
            // Police Arial italique 8
            // Numéro de page
            $this->SetFont('RobotoReg','',8);
            $this->Cell(0,10,'Généré le : ',0,1);
            $this->SetFont('RobotoItal','',12);
            $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
        }

        //Table
        function FancyTable($header, $data)
        {
            // Couleurs, épaisseur du trait et police grasse
            $this->SetFillColor(210,26,40);
            $this->SetTextColor(255);
            $this->SetDrawColor(128,0,0);
            $this->SetLineWidth(.3);
            $this->SetFont('','');
            // En-tête
            $w = array(25, 38, 25, 40, 64);
            for($i=0;$i<count($header);$i++)
                $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
            $this->Ln();
            // Restauration des couleurs et de la police
            $this->SetFillColor(224,235,255);
            $this->SetTextColor(0);
            $this->SetFont('');
            // Données
            $fill = false;
            foreach($data as $row)
            {
                $this->Cell($w[0],6,date("d/m/Y", strtotime($row['dateHoraire'])),'LR',0,'C',$fill);
                $this->SetFont('RobotoReg','',8);
                $this->Cell($w[1],6,$row['nomLieuInter'],'LR',0,'C',$fill);
                $this->SetFont('RobotoReg','',12);
                $this->Cell($w[2],6,substr($row['timeHoraire'],0,5),'LR',0,'C',$fill);
                $this->SetFont('RobotoReg','',8);
                $this->Cell($w[3],6,$row['nomTypeInter'],'LR',0,'C',$fill);
                $this->Cell($w[4],6,$row['comHoraire'],'LR',0,'L',$fill);
                $this->SetFont('RobotoReg','',12);
                $this->Ln();
                $fill = !$fill;
            }
            // Trait de terminaison
            $this->Cell(array_sum($w),0,'','T');
        }
    }

    // Instanciation de la classe dérivée
    $pdf = new PDF();
    $pdf->AddFont('RobotoReg','','Roboto-Light.ttf',true);
    $pdf->AddFont('Roboto-Black','','Roboto-BoldItalic.ttf',true);
    $pdf->AddFont('RobotoTitre','','Roboto-Bold.ttf',true);
    $pdf->AddFont('RobotoItal','','Roboto-LightItalic.ttf',true);
    $pdf->AliasNbPages(); 
    $pdf->AddPage();
    $pdf->SetFont('RobotoReg','',18);
    setlocale(LC_TIME, "fr_FR");
    $pdf->Cell(0,0,'Déclaration Horaire de ',0,1,'C');
    $pdf->Ln(8);
    $pdf->SetFont('Roboto-Black','',20);
    $pdf->Cell(0,0,strftime("%B", strtotime($month."/".$month."/".$year)).' '.$year,0,1,'C');
    $pdf->Ln(8);
    $pdf->SetFont('RobotoReg','',12);
    $pdf->Cell(20,0,'Nom : ',0,0);
    $pdf->SetFont('RobotoTitre','',14);
    $pdf->Cell(100,0,$nom,0,1);
    $pdf->Ln(6);
    $pdf->SetFont('RobotoReg','',12);
    $pdf->Cell(20,0,'Prenom : ',0,0);
    $pdf->SetFont('RobotoTitre','',14);
    $pdf->Cell(20,0,$prenom,0,1);
    $pdf->SetFont('RobotoReg','',12);
    $pdf->Ln(10);
    $header = array('Date', 'Lieu d\'intervention', 'Horaires', 'Type d\'intervention','Commentaires');
    $pdf->FancyTable($header,$data);
    $pdf->Output();
?>