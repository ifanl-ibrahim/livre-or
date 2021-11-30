<?php
session_start();

$connexion = mysqli_connect('localhost', 'root', '', 'livreor');

if (!isset($_SESSION['login'])) {
    header("Refresh: 2; url=connexion.php");
    echo "<p>connecte toi.</p><br><p>Redirection...</p>";
    exit();
}
if (!$connexion) {
    echo "Erreur connexion";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./livreor.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shorcut icon" href="./images/avatar_livre.png">
    <link href="https : //fonts.googleapis.com/css2? family= Abril+Fatface & display=swap" rel="stylesheet">
    <title>Écrit nous</title>
</head>
<body>

<header>
    <nav class="nav">
        <ul>
            <li><a><img id="logo-navbar" src="./images/avatar_livre.png"></a></li>
            <li><a href="./index.php">Home</a></li>
            <li><a href='./profil.php'>House</a></li>
            <li><a href='./commentaire.php'>Écrit nous</a></li>
            <li><a href='./livre-or.php'>Livre D’OR</a></li>
        </ul>
    </nav>

    <div class="drop">
            <!-- menu mobil  -->
            <button class="dropbutton"><img id="logo-navbar" src="./images/avatar_livre.png"></button>
            <div class="container-button">
                <a href="./index.php">Home</a>
                <a href='./profil.php'>House</a>
                <a href='./commentaire.php'>Écrit nous</a>
                <a href='./livre-or.php'>Livre D’OR</a>
            </div>
        </div>
</header>

<main>
    <?php
        if(isset($_SESSION['login'])){
            // var_dump($_SESSION['id']);
            echo "<form id= general action=# method='get'>
            <textarea id='commentaire' name='commentaire' placeholder='Entrée vore commentaire'></textarea>
            <input type='submit' value='envoyer le commentaire' name='submit'>
            </form>";
            if(isset($_GET['submit'])){

                foreach ($_GET as $key=>$value) {
                    if($key=="commentaire"){
                        $commentaire=$value;
                    }
                $idTab = $_SESSION['id'];
                $id = $idTab['id'];
                $date=date("Y/m/d H:i:s");
                $req="INSERT INTO `commentaires`(`commentaire`,`id_utilisateur`,`date`) VALUES ('$commentaire',$id,'$date')";
                // var_dump($req);
                $query=mysqli_query($connexion,$req);
                    header("location: livre-or.php");
                }
            }
        }
    ?>
</main>

<footer>
    <a href="https://github.com/ifanl-ibrahim/livre-or"><img src="./images/masterhacks_github_actualiza_politicas_eliminar_codigos_poc-removebg-preview (1).png" alt="logo"></a>
</footer>

</body>
</html>