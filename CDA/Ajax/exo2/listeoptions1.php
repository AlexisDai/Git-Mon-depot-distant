<?php


    $db = new PDO('mysql:host=localhost;charset=utf8;dbname=ajax_regions' , 'admin' , '29janvier');
    
    $requete = $db->query("SELECT * FROM regions");
    $requete->execute();

    $resultat = $requete->fetchAll(PDO::FETCH_OBJ);    
?>

<body>
    <?php foreach($resultat as $region){ ?>
        <option value="<?= $region->reg_id; ?>"> <?= $region->reg_v_nom; ?> </option>
    <?php } ?>
</body>

</html>