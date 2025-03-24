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

    <label for="titre">Modifier Abonnement User:</label>
    <form method="get">
        <select name="abonnementUserUpdate" id="">
            <option value="">Sélectionner votre abonnement</option>
                <option value="1">VIP</option>
                <option value="2">GOLD</option>
                <option value="3">Classic</option>
                <option value="4">Pass Day</option>
        </select>
        <input type="search" name="abonnementUserUpdate2" placeholder="update User...">
        <input type="submit" value="valide">
    </form>


<?php require_once 'includes/connect.php';?>


<?php if(isset($_GET['abonnementUserUpdate']) and !empty($_GET['abonnementUserUpdate']) and isset($_GET['abonnementUserUpdate2']) and !empty($_GET['abonnementUserUpdate2'])){

$query = htmlspecialchars_decode($_GET['abonnementUserUpdate']);
$query2 = htmlspecialchars_decode($_GET['abonnementUserUpdate2']);
$sql = "UPDATE cinema.membership SET id_subscription = '$query' WHERE id_user = '$query2'";
$requete = $db->query($sql);
if($requete){
    echo "Mise à jour reussit !";
    $sql2 = "SELECT membership.id, user.id, user.firstname ,user.lastname ,subscription.name, subscription.price FROM cinema.user JOIN cinema.membership ON user.id = membership.id_user JOIN cinema.subscription ON membership.id_subscription = subscription.id WHERE user.id = '$query2'";
    $requete2 = $db->query($sql2);

}

?>

<table id ="colonne">
    
<thead>
    <tr>
        <th scope="col">Id Membre</th>
        <th scope="col">Id</th>
        <th scope="col">Firstname</th>
        <th scope="col">Lastname</th>
        <th scope="col">Name Subscription</th>
        <th scope="col">Price Subscription</th>
    </tr>
</thead>
<?php while($a = $requete2->fetch()) { ?>
<tbody>
<tr>
    <td><?php echo $a["id"]?></td>
    <td><?php echo $a["id"]?></td>
    <td><?php echo $a["firstname"]?></td>
    <td><?php echo $a["lastname"]?></td>
    <td><?php echo $a["name"]?></td>
    <td><?php echo $a["price"]?></td>
</tr>
</tbody>
<?php } ?>
</table>
<?php } ?>

    <label for="titre">Supprimer Abonnement User:</label>
    <form method="get">
    <input type="search" name="abonnementUserDelete" placeholder="update User...">
    <input type="submit" value="valide">
    </form>

<?php if(isset($_GET['abonnementUserDelete']) and !empty($_GET['abonnementUserDelete'])){
    $query = htmlspecialchars_decode($_GET['abonnementUserDelete']);
    $sql = "DELETE from cinema.membership_log where id_membership = '$query'";
    $requete = $db->query($sql);
    
    if($requete){
        $sql2 = "DELETE FROM cinema.membership WHERE id ='$query'";
        $requete2 = $db->query($sql2);
        echo "Supression reussit !<br><br>";
    }
} 


?>

    <label for="titre">Ajouter Abonnement User:</label>
    <form method="get">
    <input type="search" name="abonnementUserDelete" placeholder="update User...">
    </form>

<?php if(isset($_GET['abonnementUserDelete']) and !empty($_GET['abonnementUserDelete'])){
    $query = htmlspecialchars_decode($_GET['abonnementUserDelete']);
    $sql = "UPDATE cinema.membership SET id_subscription = '$query' WHERE id_user = '$query2'";
    $requete = $db->query($sql);
}
?>
