<?php

require 'classes/Personnage.class.php';

$p = new Personnage();
    $p->setNom("Lebowski");
    $p->setPrenom("Jeff");
    $p->setAge(18);
    $p->setSexe("Homme");

    echo ($p);


?>
