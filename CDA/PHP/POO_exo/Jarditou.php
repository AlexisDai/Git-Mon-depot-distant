<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jarditou</title>
</head>

<body>

<?php 

    spl_autoload_register(function($class){
        include "classes/".$class.".class.php";
    });

    $mag1 = new Magasins('Jarditou', '21 rue des chevaliers', '80539', 'Amiens', true);
    $mag2 = new Magasins('Toujardi', '45 avenue du maréchal', '75896', 'Arras', false);
    $mag3 = new Magasins('Jourdati', '98 boulevard Volataire', '45871', 'Lille', true);


    $JeanD = new Employe('Dupont', 'Jean', '2022-04-1', 'développeur', 2, 'informatique', $mag1,3, array(6,12,17));
    $JeanD->infoEmp();
    $JeanD->getAncienneté();
    $JeanD->getMagasin()->getNomMag();
    echo 'L\'employé '.$JeanD->getNom(). ' '.$JeanD->getPrenom().', est dans l\'entreprise depuis : '.$JeanD->getAncienneté().'<br>';
    echo $JeanD->getMagasin()->modeResto().'<br>';
    echo $JeanD->getCheques().'<br>';
    echo 'L\'employé a '.$JeanD->getNbEnfants().' enfant(s)';
    echo '<br>'.$JeanD->Autorisation().'<br>';
    echo $JeanD->Distribution().'<br><br>';
    
    $Pat = new Employe('Durand', 'Patrick', '2002-01-25', 'conseiller', 1.2, 'commercial', $mag2, 1, array(20));
    $Pat->infoEmp();
    $Pat->getAncienneté();
    $Pat->getMagasin()->getNomMag();
    echo 'L\'employé '.$Pat->getNom(). ' '.$Pat->getPrenom().', est dans l\'entreprise depuis : '.$Pat->getAncienneté().'<br>';
    echo $Pat->getMagasin()->modeResto().'<br>';
    echo $Pat->getCheques().'<br>';
    echo 'L\'employé a '.$Pat->getNbEnfants().' enfant(s)';
    echo '<br>'.$Pat->Autorisation().'<br><br>';
    echo $Pat->Distribution().'<br><br>';

    $Mat = new Employe('Lafitte', 'Matthieu', '2000-08-12', 'technicien', 2.2, 'informatique', $mag3, 4 , array(15,19,21,3));
    $Mat->infoEmp();
    $Mat->getAncienneté();
    $Mat->getMagasin()->getNomMag();
    echo 'L\'employé '.$Mat->getNom(). ' '.$Mat->getPrenom().', est dans l\'entreprise depuis : '.$Mat->getAncienneté().'<br>';
    echo $Mat->getMagasin()->modeResto().'<br>';
    echo $Mat->getCheques().'<br>';
    echo 'L\'employé a '.$Mat->getNbEnfants().' enfant(s) <br>';
    echo $Mat->Autorisation().'<br>';
    echo $Mat->Distribution().'<br><br>';

    $Fra = new Employe('Martin', 'Francine', '1995-07-21', 'hôtesse de caisse', 1.6, 'commercial', $mag1, 1, array(10));
    $Fra->infoEmp();
    $Fra->getAncienneté();
    $Fra->getMagasin()->getNomMag();
    echo 'L\'employé '.$Fra->getNom(). ' '.$Fra->getPrenom().', est dans l\'entreprise depuis : '.$Fra->getAncienneté().'<br>';
    echo $Fra->getMagasin()->modeResto().'<br>';
    echo $Fra->getCheques().'<br>';
    echo 'L\'employé a '.$Fra->getNbEnfants().' enfant(s) <br>';
    echo $Fra->Autorisation().'<br>';
    echo $Fra->Distribution().'<br><br>';


    $Hub = new Employe('Maupin', 'Hubert', '1997-05-30', 'comptable', 2.5, 'comptabilité', $mag2, 2, array(5,16));
    $Hub->infoEmp();
    $Hub->getAncienneté();
    $Hub->getMagasin()->getNomMag();
    echo 'L\'employé '.$Hub->getNom(). ' '.$Hub->getPrenom().', est dans l\'entreprise depuis : '.$Hub->getAncienneté().'<br>';
    echo $Hub->getMagasin()->modeResto().'<br>';
    echo $Hub->getCheques().'<br>';
    echo 'L\'employé a '.$Hub->getNbEnfants().' enfant(s) <br>';
    echo $Hub->Autorisation().'<br>';
    echo $Hub->Distribution().'<br><br>';







?>

</body>
</html>