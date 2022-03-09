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




/////////////////////////////////////////////////
//On récupère les inputs traités avec secure()//
///////////////////////////////////////////////

    $Error="";
    $titre =secure($_POST['title']);
    $artiste = secure($_POST['artist']);
    $annee = secure($_POST['year']);
    $genre = secure($_POST['genre']);
    $label = secure($_POST['label']);
    $prix = secure($_POST['price']);
    




////////////////////////////
//On traite chaque champs//
//////////////////////////


        //////////////////
        //Pour le titre//
        ////////////////



if(empty($titre)){
    $Error="Veuillez indiquer un titre";
    echo $Error."<br>";
    die();
}else{
    if(!preg_match("/^[a-zA-Z ]*$/", $titre)){
        $Error="Rentrez un titre valide";
        echo $Error."<br>";
        die();
    }else{
        echo $titre."<br>";
    }
}


        ///////////////////
        //Pour l'artsite//
        /////////////////




        if(!empty($artiste)){
            echo $artiste.'<br>';
        }
        


        /////////////////
        //Pour l'année//
        ///////////////




       if(empty($annee)){
           $Error="Ecrivez une année.";
           echo $Error."<br>";
           die();
       }else{

           if(!preg_match("/^[ 0-9]{4}$/", $annee)){
               $Error = "Rentrez une année valide.";
               echo $Error."<br>";
               die();
           }else{
               echo $annee.'<br>';
           }
       }




       //////////////////
       //Pour le genre//
       ////////////////


       

       if(empty($genre)){
        $Error="Ecrivez un genre.";
        echo $Error."<br>";
        die();
    }else{
        if(!preg_match("/^[a-zA-Z ]*$/", $genre)){
            $Error = "Rentrez un genre valide.";
            echo $Error."<br>";
            die();
        }else{
            echo $genre.'<br>';
        }
    }





    //////////////////
    //Pour le label//
    ////////////////





        if(empty($label)){
            $Error="Ecrivez un label.";
            echo $Error."<br>";
            die();
    }else{
        if(!preg_match("/^[a-zA-Z ]*$/", $label)){
            $Error = "Rentrez un label valide.";
            echo $Error."<br>";
            die();
        }else{
            echo $label.'<br>';
        }
    }




    /////////////////
    //Pour le prix//
    ///////////////




    if(empty($prix)){
        $Error="Ecrivez un prix.";
        echo $Error."<br>";
        die();
    }else{
       if(!preg_match("/^[ 0-9]*[,|.]?[0-9]*$/", $prix)){
        $Error = "Rentrez un prix valide.";
        echo $Error."<br>";
        die();
    }else{
            echo $prix.'<br>';
        }
    }
    



    /////////////////
    //Pour l'image//
    ///////////////


    // if(empty($image)){
    //         $Error="Insérez une image.";
    //         echo $Error."<br>";
    //         die();
    // }else{
    //     if(!preg_match("/[^\s]+(\.(?i)(jpg|png|gif|bmp|jpeg))$/", $image)){
    //         $Error = "Rentrez une image valide(.jpeg,.png,.gif,.bmp).";
    //         echo $Error."<br>";
    //         die();
    //     }else{
    //         echo $image.'<br>';
    //     }
    // }




    /////////////////////////////
    //Formulation des requêtes//
    ///////////////////////////




    $requete = $db->prepare("UPDATE disc SET disc_title = :titre, disc_year = :annee, disc_label = :label, disc_genre = :genre, disc_price = :prix WHERE disc_id = :id");
    $requete1 = $db->prepare("UPDATE artist SET artist_name = :artiste WHERE artist_id = :id");

    $requete->bindParam(':titre', $titre);
    $requete->bindParam(':annee', $annee);
    $requete->bindParam(':label', $label);
    $requete->bindParam(':genre', $genre);
    $requete->bindParam(':prix', $prix);
    $requete->bindParam(':id',$_GET['disc_id'], PDO::PARAM_INT);
    $requete1->bindParam(':id', $_GET['artist_id'], PDO::PARAM_INT);
    $requete1->bindParam(':artiste', $artiste);

    $requete->execute();
    $requete1->execute();


    //////////////////////////////////
    //Traitement image avec $_FILES//
    ////////////////////////////////

    
    $id = $_GET['disc_id'];

    if(isset($_FILES['picture'])){
        $tmpName = $_FILES['picture']['tmp_name'];
        $name = $_FILES['picture']['name'];
        $size = $_FILES['picture']['size'];
        $error = $_FILES['picture']['error'];

        //Extension//
        $tabExtension = explode('.', $name);
        $extension = strtolower(end($tabExtension));
        $extensions = ['jpg', 'png', 'jpeg', 'gif'];

        //Taille max acceptée//
        $maxSize = 400000;
        if(in_array($extension, $extensions) && $size <= $maxSize && $error == 0){

            //On genere un id unique//
            $uniqueName = uniqid('', true);
            $file = $uniqueName.".".$extension;

            move_uploaded_file($tmpName, './IMG/'.$file);

            $requete = $db->prepare('UPDATE disc SET disc_picture = ? WHERE disc_id = ? ');
            $requete->execute([$file, $id]);
            header("Location:index.php");
        }else{
            header("Location:index.php");;
        }
    }

    

   

    

    
    
    
    
