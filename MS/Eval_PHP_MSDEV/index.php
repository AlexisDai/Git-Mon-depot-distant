<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Liste</title>
</head>

<?php include'connection_db.php';?>

<body>
    <div class="container">
        <div class="row col-12">
            <header class="d-flex justify-content-between">
                <h1>Liste des disques (15)</h1> 
                <a href="add_form.php">
                    <input type="button" value="Ajouter" class="btn btn-primary">
                </a>
                <hr>
            </header>
        </div>

        <section>
            <div class="card-deck d-flex flex-wrap">
                <?php 
                    $requete = $db->prepare("SELECT * FROM disc INNER JOIN artist ON disc.artist_id = artist.artist_id");
                    $requete->execute();
                    $tableau = $requete->fetchAll(PDO::FETCH_OBJ);

                    
                    
                    foreach($tableau as $disc){?>
                    
                    <div class="card mb-3 border-0" style="max-width: 450px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="IMG/<?= $disc->disc_picture; ?>" alt="<?= $disc->disc_title; ?>" title="<?= $disc->disc_title; ?>" class="card-img-top" >
                            </div>
                            
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $disc->disc_title; ?></h5>
                                    <p class="card-text">
                                        <h6><?= $disc->artist_name; ?></h6>
                                        Label : <?= $disc->disc_label; ?> <br>
                                        Year : <?= $disc->disc_year; ?> <br>
                                        Genre : <?= $disc->disc_genre; ?> <br>
                                    </p>
                                    <a href="details.php?disc_id=<?= $disc->disc_id; ?>" class="btn btn-primary">Details</a>
                                </div>
                            </div>
                        </div>
                    </div><br>
                                              
                    <?php } ?>
               
            </div>
            
        </section>




        <footer>
        </footer>    

    </div>



</body>
</html>