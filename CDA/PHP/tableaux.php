<?php
echo"Exercice mois et jours <br><br>";
    $annee = array(
        "Janvier" => "31",
        "Février" => "28",
        "Mars" => "31",
        "Avril" => "30",
        "Mai" => "31",
        "Juin" => "30",
        "Juillet" => "31",
        "Août" => "31",
        "Septembre" => "30",
        "Octobre" => "31",
        "Novembre" => "30",
        "Décembre" => "31"
    );

    echo "<table>";
        echo"<thead>";
            echo"<tr>";
                echo"<th>Mois</th>";
                echo"<th>Jours</th>";
            echo"</tr>";
        echo"<thead>";

    foreach ($annee as $mois => $jours){
        
        echo"<tbody>";
            echo"<tr>";
                echo "<td>".$mois."</td><td> ".$jours."</td>";
            echo"</tr>";
        echo"</tbody>";    
}

echo"</table><br><br>";

echo"Exercie tri par nombre de jours<br><br>";

arsort($annee);

echo "<table>";
echo"<thead>";
    echo"<tr>";
        echo"<th>Mois</th>";
        echo"<th>Jours</th>";
    echo"</tr>";
echo"<thead>";

foreach ($annee as $mois => $jours){

echo"<tbody>";
    echo"<tr>";
        echo "<td>".$mois."</td><td> ".$jours."</td>";
    echo"</tr>";
echo"</tbody>";    
}

echo"</table><br><br><hr>";

echo"Exercice capitale/ville<br><br>";

$capitales = array(
    "Bucarest" => "Roumanie",
    "Bruxelles" => "Belgique",
    "Oslo" => "Norvège",
    "Ottawa" => "Canada",
    "Paris" => "France",
    "Port-au-Prince" => "Haïti",
    "Port-d'Espagne" => "Trinité-et-Tobago",
    "Prague" => "République tchèque",
    "Rabat" => "Maroc",
    "Riga" => "Lettonie",
    "Rome" => "Italie",
    "San José" => "Costa Rica",
    "Santiago" => "Chili",
    "Sofia" => "Bulgarie",
    "Alger" => "Algérie",
    "Amsterdam" => "Pays-Bas",
    "Andorre-la-Vieille" => "Andorre",
    "Asuncion" => "Paraguay",
    "Athènes" => "Grèce",
    "Bagdad" => "Irak",
    "Bamako" => "Mali",
    "Berlin" => "Allemagne",
    "Bogota" => "Colombie",
    "Brasilia" => "Brésil",
    "Bratislava" => "Slovaquie",
    "Varsovie" => "Pologne",
    "Budapest" => "Hongrie",
    "Le Caire" => "Egypte",
    "Canberra" => "Australie",
    "Caracas" => "Venezuela",
    "Jakarta" => "Indonésie",
    "Kiev" => "Ukraine",
    "Kigali" => "Rwanda",
    "Kingston" => "Jamaïque",
    "Lima" => "Pérou",
    "Londres" => "Royaume-Uni",
    "Madrid" => "Espagne",
    "Malé" => "Maldives",
    "Mexico" => "Mexique",
    "Minsk" => "Biélorussie",
    "Moscou" => "Russie",
    "Nairobi" => "Kenya",
    "New Delhi" => "Inde",
    "Stockholm" => "Suède",
    "Téhéran" => "Iran",
    "Tokyo" => "Japon",
    "Tunis" => "Tunisie",
    "Copenhague" => "Danemark",
    "Dakar" => "Sénégal",
    "Damas" => "Syrie",
    "Dublin" => "Irlande",
    "Erevan" => "Arménie",
    "La Havane" => "Cuba",
    "Helsinki" => "Finlande",
    "Islamabad" => "Pakistan",
    "Vienne" => "Autriche",
    "Vilnius" => "Lituanie",
    "Zagreb" => "Croatie"
);
echo"Tri alphabétique ville/pays<br><br>";
ksort($capitales);

foreach($capitales as $ville => $pays){
    echo $ville." capitale de ".$pays."<br>";
}
echo"<br><br><hr>";


echo"Tri alphabétique pays/ville<br><br>";
asort($capitales);

foreach($capitales as $ville => $pays){
    echo $pays." a pour capitale : ".$ville."<br>";
}
echo"<br><br>";

echo"Nombre pays dans le tableau<br>";

echo"Le tableau contient ".count($capitales)." pays";

echo"<br><br><hr>";

echo"Affichage du tableau sans les capitales commencant par B<br><br>";

ksort($capitales);

    foreach($capitales as $ville => $pays){
        $villesavecb = substr($ville,0,1);
       if ($villesavecb == "B"){
           unset($villesavecb);
       }else{
           echo $ville." capitale de ".$pays."<br>";
       }
    }

echo"<br><br><hr>";


echo"Exercice département <br><br>";

$departements = array(
    "Hauts-de-france" => array("Aisne", "Nord", "Oise", "Pas-de-Calais", "Somme"),
    "Bretagne" => array("Côtes d'Armor", "Finistère", "Ille-et-Vilaine", "Morbihan"),
    "Grand-Est" => array("Ardennes", "Aube", "Marne", "Haute-Marne", "Meurthe-et-Moselle", "Meuse", "Moselle", "Bas-Rhin", "Haut-Rhin", "Vosges"),
    "Normandie" => array("Calvados", "Eure", "Manche", "Orne", "Seine-Maritime")
);

echo"Liste regions par ordre alphabétique avec leurs départements<br><br>";

ksort($departements);
foreach($departements as $regions =>$depart){
    echo $regions." : <br>";
    foreach ($depart as $dep){
        echo " -> ".$dep."<br>";
    }
    
}
echo"<br><br>";

echo "Liste des régions + nombre de départements : <br>";

ksort($departements);
foreach($departements as $regions =>$depart){
    echo $regions." : <br>".count($depart)." départements<br><br>"; 
}