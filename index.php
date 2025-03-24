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

    <label for="genre">Genre:</label>
    <form method="get">
    <select name="barreRechercheGenre" id="">
            <option value="">Sélectionner votre abonnement</option>
                <option value="Action">Action</option>
                <option value="Adventure">Adventure</option>
                <option value="Animation">Animation</option>
                <option value="Biography">Biography</option>
                <option value="Comedy">Comedy</option>
                <option value="Drama">Drama</option>
                <option value="Family">Family</option>
                <option value="Fantasy">Fantasy</option>
                <option value="Horror">Horror</option>
                <option value="Mystery">Mystery</option>
                <option value="Romance">Romance</option>
                <option value="Sci-Fi">Sci-Fi</option>
                <option value="Thriller">Thriller</option>
        </select>
        <input type="submit" value="valide">
    </form>

    <label for="titre">Film:</label>
    <form method="get">
        <input type="search" name="barreRechercheTitre" placeholder="recherche...">
        <input type="submit" value="valide">
    </form>

    <label for="titre">Distributeur:</label>
    <form method="get">
        <input type="search" name="barreRechercheDistributeur" placeholder="recherche...">
        <input type="submit" value="valide">
    </form>
    <!-- <label for="titre">Ecrivez le membre:</label>
    <form method="get">
        <input type="search" name="barreRechercheMembre" placeholder="recherche...">
        <input type="submit" value="valide">
    </form> -->
    
<!-- 
    <label for="titre">Affichez l'historique d'un membre:</label>
    <form method="get">
        <input type="search" name="barreRechercheMembreHistorique" placeholder="recherche...">
        <input type="submit" value="valide">
    </form> -->


<?php 
require_once 'includes/connect.php';

//<!--1-->

 if(isset($_GET['barreRechercheGenre']) and !empty($_GET['barreRechercheGenre'])){

    $query = htmlspecialchars_decode($_GET['barreRechercheGenre']);//proteger données
    $sql = "SELECT genre.name , movie.title FROM cinema.movie JOIN cinema.movie_genre ON movie.id = movie_genre.id_movie JOIN cinema.genre ON movie_genre.id_genre = genre.id WHERE genre.name  LIKE '%$query%' ORDER BY movie.title ASC";
    $requete = $db->query($sql);
    ?>
    <table id ="colonne">
    
        <thead>
                <tr>
                    <th scope="col">Genre</th>
                    <th scope="col">Films</th>
                </tr>
        </thead>
    <?php while($a = $requete->fetch()) { ?>
        <tbody>
        <tr>
            <td><?php echo $a["name"]?></td>
            <td><?php echo $a["title"]?></td>
        </tr>
        </tbody>
        <?php } ?>
    </table>
<?php } ?>

<!--2-->

<?php if(isset($_GET['barreRechercheTitre']) and !empty($_GET['barreRechercheTitre'])){

$query = htmlspecialchars_decode($_GET['barreRechercheTitre']);//proteger données
$sql = "SELECT title FROM cinema.movie WHERE title LIKE '%$query%' ORDER BY title ASC";
$requete = $db->query($sql);
?>
    <table id ="colonne">
    
        <thead>
                <tr>
                    <th scope="col">Films</th>
                </tr>
        </thead>
        <?php while($a = $requete->fetch()) { ?>
            <tbody>
        <tr>
            <td><?php echo $a["title"]?></td>
        </tr>
        </tbody>
        <?php } ?>
    </table>
<?php } ?>

<!--3-->

<?php if(isset($_GET['barreRechercheDistributeur']) and !empty($_GET['barreRechercheDistributeur'])){

$query = htmlspecialchars_decode($_GET['barreRechercheDistributeur']);//proteger données
$sql = "SELECT distributor.name, movie.title FROM cinema.movie JOIN cinema.distributor ON movie.id = distributor.id WHERE name LIKE '%$query%' ORDER BY distributor.name ASC";
$requete = $db->query($sql);
?>
    <table id ="colonne">
    
        <thead>
                <tr>
                    <th scope="col">Distributeurs</th>
                    <th scope="col">Films</th>
                </tr>
        </thead>
        <?php while($a = $requete->fetch()) { ?>
            <tbody>
        <tr>
            <td><?php echo $a["name"]?></td>
            <td><?php echo $a["title"]?></td>
        </tr>
        </tbody>
        <?php } ?>
    </table>
<?php } ?>



<!--5-->

<?php //if(isset($_GET['barreRechercheMembreHistorique']) and !empty($_GET['barreRechercheMembreHistorique'])){

// $query = htmlspecialchars_decode($_GET['barreRechercheMembreHistorique']);//proteger données
// $sql = "SELECT firstname, lastname FROM cinema.user WHERE firstname LIKE '%$query%' OR lastname LIKE '%$query%'";
// $sql = "SELECT user.firstname, user.lastname FROM cinema.user JOIN cinema.membership ON membership.id = user.id WHERE user.firstname LIKE '%$query%' OR  user.lastname like '%$query%'";
// $requete = $db->query($sql);
//  while($a = $requete->fetch()) {
//     echo "<p>" . $a["firstname"] . "  ". $a["lastname"] . "</p>";
//  }
//}
?>

</body>
</html>