<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Formulaire de suppression</title>
</head>
 
<?php include'connection_db.php';

session_start();

if (!isset($_SESSION['auth'])) {
    header('location:login_form.php');
}?>          

    
<body>
    <div class="container">
        <header>

            <h1>Le formulaire de suppression</h1>
            <hr>

        </header>

        <section>

        <?php 
            
            $requete = $db->prepare("SELECT * FROM disc INNER JOIN artist ON disc.artist_id=artist.artist_id WHERE disc.disc_id=?");
            $requete->execute(array($_GET["disc_id"]));
            $tableau = $requete->fetch(PDO::FETCH_OBJ);?>
            

            <h2>Supprimer un vinyle</h2>
            <br>

            <form action="delete_script.php?disc_id=<?= $tableau->disc_id; ?>" method="POST">
                <label for="title"class="form-label" >Title</label><br>
                <input type="text" id="title" name="title" class="form-control" value="<?= $tableau->disc_title; ?>" readonly ><br>
                
                <label for="artist" class="form-label">Artist</label><br>
                <input type="text" id="artist" name="artist" class="form-control" value="<?= $tableau->artist_name; ?>" readonly ><br>
                
                <label for="year" class="form-label">Year</label><br>
                <input type="number" id="year" name="year" class="form-control" value="<?= $tableau->disc_year; ?>" readonly ><br>

                <label for="genre" class="form-label">Genre</label><br>
                <input type="text" id="genre" name="genre" class="form-control" value="<?= $tableau->disc_genre; ?>" readonly ><br>

                <label for="label" class="form-label">Label</label><br>
                <input type="text" id="label" name="label" class="form-control" value="<?= $tableau->disc_label; ?>" readonly ><br>

                <label for="price" class="form-label">Price</label><br>
                <input type="number" id="price" name="price" class="form-control" value="<?= $tableau->disc_price; ?>" readonly ><br>

                <label for="picture" class="form-label">Picture</label><br>
                <img src="IMG/<?= $tableau->disc_picture ?>" alt="<?= $tableau->disc_title; ?>" title="<?= $tableau->disc_title ?>" class="img-fluid"><br><br>
                            
               
                <input type="submit" value="Supprimer" Onclick="return confirm('Voulez-vous supprimer le disque ?')" class="btn btn-primary">
               

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
