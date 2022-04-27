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
    
    //On controle si les champs sont vides ou non//
    if(!empty($_POST['email']) && !empty($_POST['password'])){

        $email = $_POST['email'];
        $pass = $_POST['password'];

        $requete = $db->prepare('SELECT password FROM user WHERE email = :email');
        $requete->execute(array(':email' => $email));
        $res = $requete->fetch();//On cherche les correspondances email dans la bdd//

        if($res){
            session_start();
            if (password_verify($pass, $res['password']) == true){//Si le mdp hashé correspond au mdp en clair on demarre une session et on redirige sur index.php//
                

                $_SESSION['auth'] = "ok";
                header('Location:index.php');

            }else{//Sinon on détruit la session//

                unset($_SESSION['auth']);
                echo'Identifiants incorrects. Corrigez ou inscivez-vous.';
            }
        }else{
            header('Location:login_form.php');
        }
        
    }else{//Si pas de correrspondances on redirige sur le formulaire de connexion//
        header('Location:login_form.php');
    }
  
?>