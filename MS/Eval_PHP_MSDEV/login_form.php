<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Connexion</title>
</head>


<body>
    <div class="container">
        <div class="text-center">
            <header>
                <div clas="row">
                    <h1>Formulaire de connexion</h1>
                    <hr>
                </div>
            </header>
            
            <section>
                <div class="row">
                    <form action="login_script.php" method="POST">
                        
                        <label for="email" class="form-label">Adresse email</label><br>
                        <input type="email" id="email" name="email" class="form-control"><br>

                        <label for="password" class="form-label">Mot de passe</label><br>
                        <input type="password" id="password" name="password" class="form-control"><br>

                        <input type="submit" value="Envoyer" class="btn btn-primary">
                        <input type="reset" value="Annuler"class="btn btn-primary">

                        <a href="register_form.php">
                            <input type="button" value="S'inscrire" class="btn btn-primary">
                        </a>

                    </form>
                </div>
            </section>

            <footer>

            </footer>
        </div>
    </div>
</body>


</html>