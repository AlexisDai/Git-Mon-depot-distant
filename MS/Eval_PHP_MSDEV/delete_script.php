<?php 

//////////////////
//Connexion BDD//
////////////////


include 'connection_db.php';



////////////////////////
//Formulation requête//
//////////////////////


//On récupère l'id du disque, et on le met dans la clause WHERE//

$requete = $db->prepare("DELETE FROM disc WHERE disc_id = :id");


//On indique que :id=disc_id pour supprimer uniquement les données du disque choisi, puis on execute.
$requete->bindParam(':id',$_GET['disc_id']);
$requete->execute();


////////////////////////////////
//Redirection vers page index//
//////////////////////////////
header("Location:index.php");



?>