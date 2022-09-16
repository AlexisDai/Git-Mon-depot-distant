<?php

    include 'connection_db.php';
    
    $Error="";
    $titre =$_POST['titre'];
    $artiste = $_POST['artiste'];
    $annee = $_POST['annee'];
    $genre = $_POST['genre'];
    $label = $_POST['label'];
    $prix = $_POST['prix'];
    $image = $_POST['image'];

   

////////////////////////////////////////////////////////////
//Fonction pour échapper les caracères spéciaux (<>,/,..)//
//////////////////////////////////////////////////////////

    function secure($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }



        //////////////////
        //Pour le titre//
        ////////////////




        if(empty($_POST["titre"])){//On teste si input=vide avec message d'erreur
            $Error="Ecrivez le titre du disque.<br>";
            echo $Error;
            die();
        }else{//sinon on recupere la valeur de l'input dans la variable
            $titre = secure($_POST["titre"]);

            if(!preg_match("/^[a-zA-Z ]*$/", $titre)){
                $Error ="Lettres et espaces autorisés uniquement.<br>";
                echo $Error;
                die();
            }else{
                echo $titre.'<br>';
            }
        }




        ///////////////////
        //Pour l'artsite//
        /////////////////




        if(!empty($_POST["artiste"])){
            $artiste = secure($_POST["artiste"]);
            echo $artiste.'<br>';
        }
        


        /////////////////
        //Pour l'année//
        ///////////////




       if(empty($_POST["annee"])){
           $Error="Ecrivez une année.<br>";
           echo $Error;
           die();
       }else{
           $annee = secure($_POST["annee"]);

           if(!preg_match("/^[ 0-9]{4}$/", $annee)){
               $Error = "Rentrez une année valide.<br>";
               echo $Error;
               die();
           }else{
               echo $annee.'<br>';
           }
       }




       //////////////////
       //Pour le genre//
       ////////////////


       

       if(empty($_POST["genre"])){
        $Error="Ecrivez un genre.<br>";
        echo $Error;
        die();
    }else{
        $genre = secure($_POST["genre"]);

        if(!preg_match("/^[a-zA-Z ]*$/", $genre)){
            $Error = "Rentrez un genre valide.<br>";
            echo $Error;
            die();
        }else{
            echo $genre.'<br>';
        }
    }





    //////////////////
    //Pour le label//
    ////////////////





        if(empty($_POST["label"])){
            $Error="Ecrivez un label.<br>";
            echo $Error;
            die();
    }else{
        $label = secure($_POST["label"]);

        if(!preg_match("/^[a-zA-Z ]*$/", $label)){
            $Error = "Rentrez un label valide.<br>";
            echo $Error;
            die();
        }else{
            echo $label.'<br>';
        }
    }




    /////////////////
    //Pour le prix//
    ///////////////




    if(empty($_POST["prix"])){
        $Error="Ecrivez un prix.<br>";
        echo $Error;
        die();
    }else{
        $prix = secure($_POST["prix"]);

        if(!preg_match("/^[ 0-9]*[,|.]?[0-9]*$/", $prix)){
            $Error = "Rentrez un prix valide.<br>";
            echo $Error;
            die();
        }else{
            echo $prix.'<br>';
        }
    }
    



    /////////////////
    //Pour l'image//
    ///////////////


    if(empty($_POST["image"])){
            $Error="Insérez une image.<br>";
            echo $Error;
            die();
    }else{
        $image = secure($_POST["image"]);

        if(!preg_match("/[^\s]+(\.(?i)(jpg|png|gif|bmp|jpeg))$/", $image)){
            $Error = "Rentrez une image valide(.jpeg,.png,.gif,.bmp).<br>";
            echo $Error;
            die();
        }else{
            echo $image.'<br>';
        }
    }

    

    $requete = $db->prepare("INSERT INTO disc(disc_title, disc_year,disc_picture, disc_label, disc_genre, disc_price, artist_id)
                            VALUES(:titre, :annee, :imagee, :label, :genre, :prix, :artiste)");
    
    $requete->bindParam(':titre', $titre);
    $requete->bindParam(':annee', $annee);
    $requete->bindParam(':genre', $genre);
    $requete->bindParam(':label', $label);
    $requete->bindParam(':prix', $prix);
    $requete->bindParam(':imagee', $image);
    $requete->bindParam(':artiste', $artiste);
    $requete->execute();
    
    
    header("Location:index.php");
    ?>
