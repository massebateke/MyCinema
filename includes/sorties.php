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

    
<label for="titre">Date de sortie (format AAAA-MM-JJ):</label>
    <form method="get">
        <input type="search" name="barreRechercheFilmsSortie" placeholder="recherche...">
        <input type="submit" value="valide">
    </form>


<?php require_once 'includes/connect.php';

if(isset($_GET['barreRechercheFilmsSortie']) and !empty($_GET['barreRechercheFilmsSortie'])){

$query = htmlspecialchars_decode($_GET['barreRechercheFilmsSortie']);
$sql = "SELECT movie.title, movie_schedule.date_begin FROM cinema.movie JOIN cinema.movie_schedule ON movie_schedule.id = movie.id WHERE movie_schedule.date_begin LIKE '$query%'";
$requete = $db->query($sql);
?>
    <table id ="colonne">
    
        <thead>
                <tr>
                    <th scope="col">Film</th>
                    <th scope="col">Date de sortie</th>
                </tr>
        </thead>
    <?php while($a = $requete->fetch()) { ?>
        <tbody>
        <tr>
            <td><?php echo $a["title"]?></td>
            <td><?php echo date("d-m-Y",strtotime($a["date_begin"]))?></td>
        </tr>
        </tbody>
        <?php }  }?>
    </table>

   



</body>
</html>