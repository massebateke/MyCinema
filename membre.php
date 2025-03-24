<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://api.fontshare.com/v2/css?f[]=tanker@400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

 <?php include 'puzzle/header.php'; ?>

<label for="titre">Recherche d'un membre:</label>
    <form method="get">
        <input type="search" name="barreRechercheMembre" placeholder="recherche...">
        <input type="submit" value="valide">
    </form>

<?php 

require_once 'includes/connect.php';

if(isset($_GET['barreRechercheMembre']) and !empty($_GET['barreRechercheMembre'])){

$query = $_GET['barreRechercheMembre'];//proteger données
$sql = "SELECT firstname, lastname FROM cinema.user WHERE firstname LIKE '%$query%' OR lastname LIKE '%$query%'";
$requete = $db->query($sql);
?>
<table id ="colonne">
    
<thead>
        <tr>
            <th scope="col">Prenom:</th>
            <th scope="col">Nom:</th>
        </tr>
</thead>
<?php while($a = $requete->fetch()) { ?>
<tbody>
<tr>
    <td><?php echo $a["firstname"]?></td>
    <td><?php echo $a["lastname"]?></td>
</tr>
</tbody>
<?php } ?>
</table>
<?php } ?>


