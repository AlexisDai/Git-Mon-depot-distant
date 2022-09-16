<?php 

    include 'classes/Employe.class.php';

    $Rob = new Employe('Bilou','Robert' ,'05/05/2012', 'Technicien', '1.2', 'Informatique');

    echo 'L\'employé '.$Rob->getNom().' '.$Rob->getPrenom().', est dans l\'entreprise depuis : '.$Rob->getAnciennete().'<br>'.'Montant du salaire : '.$Rob->getPrime();









?>