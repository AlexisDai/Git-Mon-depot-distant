<?php
    $servname ='localhost';
    $dbname ='record';
    $user ='admin';
    $pass ='29janvier';
               
    try{
        $db=new PDO("mysql:host=$servname;dbname=$dbname", $user, $pass);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
                            
    catch(Exception $e){
       $db->rollback();
       echo "Erreur : ".$e->getMessage()."<br>";
       die();
    }
                            
    ?>