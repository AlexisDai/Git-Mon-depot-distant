<?php
include 'classes/Personnage.class.php';

$p = new Personnage();
    $p->setNom("Lebowski");
    $p->setPrenom("Jeff");
    $p->setAge("35");
    $p->setSexe("Homme");

    echo $p->getNom().'<br>'.$p->getPrenom().'<br>'.$p->getAge().'<br>'.$p->getSexe();

?>