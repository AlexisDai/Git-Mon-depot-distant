<?php 

include 'connection_db.php';

////////////////////////////////////////////////////////////
//Fonction pour échapper les caracères spéciaux (<>,/,..)//
//////////////////////////////////////////////////////////

function secure($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

    $nom = secure($_POST['nom']);
    $prenom = secure($_POST['prenom']);
    $email = secure($_POST['email']);
    $pass = password_hash(secure($_POST['password']),PASSWORD_DEFAULT);
    $Error="";




    /////////////////
    //Controle nom//
    ///////////////




    if (empty($_POST['nom'])){

        $Error="Entrez un nom";
        echo $Error.'<br>';
        die();
    }else{
        if(!preg_match("/^[a-zA-Z ]*$/", $nom)){
            $Error="Entrez un nom valide";
            echo $Error.'<br>';
            die();
    }else{
        echo $nom.'<br>';
    }
    }




    ////////////////////
    //Controle prénom//
    //////////////////





    if (empty($_POST['prenom'])){

        $Error="Entrez un prénom";
        echo $Error.'<br>';
        die();
    }else{
        if(!preg_match("/^[a-zA-Z ]*$/", $prenom)){
            $Error="Entrez un prénom valide";
            echo $Error.'<br>';
            die();
    }else{
        echo $prenom.'<br>';
    }
    }




    //////////////////
    //Controle mail//
    ////////////////




    if (empty($_POST['email'])){

        $Error="Entrez un email";
        echo $Error.'<br>';
        die();
    }else{
        if(!preg_match("/^[\w\.]+@([\w-]+\.)+[\w-]{2,4}$/", $email)){
            $Error="Entrez un email valide";
            echo $Error.'<br>';
            die();
    }else{
        echo $email.'<br>';
    }
    }

    $requete = $db->prepare("INSERT INTO user (nom, prenom, email, password)
                                    VALUES (:nom, :prenom, :email ,:password)");
    $requete->bindParam(":nom", $nom);
    $requete->bindParam(":prenom", $prenom);
    $requete->bindParam(":email", $email);
    $requete->bindParam(":password", $pass);
    $requete->execute();



    header("Location:login_form.php");



?>