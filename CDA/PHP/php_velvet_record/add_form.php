<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Formulaire d'ajout</title>
</head>
 
<?php include'connection_db.php';

session_start();

if (!isset($_SESSION['auth'])) {
    header('location:login_form.php');
}?>          

    
<body>
    <div class="container">
        <header>

            <h1>Le formulaire d'ajout</h1>
            <hr>

        </header>

        <section>

            <h2>Ajouter un vinyle</h2>
            <br>

            <form action="add_script.php" method="POST">
                <label class="form-label" for="name">Title</label><br>
                <input type="text" name="titre" placeholder="Enter title" class="form-control" id="name"><br>
                <small id="titreErreur"></small>

                <label class="form-label" for="artiste">Artist</label><br>
                <select name="artiste" id="artiste" class="form-control"><br>
                    
                    <?php 

                    $requete = $db->prepare("SELECT artist_name, artist_id FROM artist");
                    $requete->execute();
                    $tableau = $requete->fetchAll(PDO::FETCH_OBJ);

                    foreach($tableau as $artiste) { ?>
                        <option value="<?= $artiste-> artist_id; ?>"><?= $artiste->artist_name; ?></option>
                    <?php }  ?>
                </select>
                
                <br><br>

                <label class="form-label" for="annee">Year</label><br>
                <input type="number" name="annee" placeholder="Enter year" class="form-control" id="annee"><br>

                <label class="form-label" for="genre">Genre</label><br>
                <input type="text" name="genre" placeholder="Enter genre (Rock, Pop, Prog...)" class="form-control" id="genre"><br>

                <label class="form-label" for="label">Label</label><br>
                <input type="text" name="label" placeholder="Enter label (EMI, Warner, PolyGram, Univers sale...)" class="form-control" id="label"><br>

                <label class="form-label" for="prix">Price</label><br>
                <input type="number" name="prix" class="form-control" id="prix" step="0.01"><br>

                <label class="form-label" for="image">Picture</label><br>
                <input type="file" name="image" id="image" accept="image/*"><br><br>
                
                
                <input type="submit" value="Ajouter" class="btn btn-primary"> 
                

                <a href="index.php">
                    <input type="button" value="Retour" class="btn btn-primary">
                </a>
            </form>

        </section>

        <footer>

        </footer>
    </div>
</body>


</html>
