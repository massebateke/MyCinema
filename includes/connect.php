<?php
   
$user = 'massebtk';
$pass = 'azerty';

    try{
        $db = new PDO('mysql:host=localhost;port:5500;dbname=cinema',$user,$pass);
    }
    catch(PDOException $e){
        print "Erreur: ".$e->getMessage()."<br/>";
    }

?>