<?php
session_start();

$connexion = mysqli_connect('localhost', 'root', '', 'livreor');

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
    <title>Livre D’OR</title>
</head>
<body>

<header>
    <nav class="nav">
        <ul>
            <li><a><img id="logo-navbar" src="./images/avatar_livre.png"></a></li>
            <li><a href="./index.php">Home</a></li>
            <?php
                if (isset($_SESSION['login'])) {
                    echo "<li><a href='./profil.php'>House</a></li>";
                    echo "<li><a href='./commentaire.php'>Écrit nous</a></li>";
                }
                else {
                    echo "<li><a href='inscription.php'>Inscription</a></li>";
                    echo "<li><a href='connexion.php'>Connexion</a></li>";
                }
            ?>
            <li><a href='./livre-or.php'>Livre D’OR</a></li>
        </ul>
    </nav>

    <div class="drop">
            <!-- menu mobil  -->
            <button class="dropbutton"><img id="logo-navbar" src="./images/avatar_livre.png"></button>
            <div class="container-button">
                <a href="./index.php">Home</a>
                <?php
                    if (isset($_SESSION['login'])) {
                        echo "<a href='./profil.php'>House</a>";
                        echo "<a href='./commentaire.php'>Écrit nous</a>";
                    }
                    else {
                        echo "<a href='inscription.php'>Inscription</a>";
                        echo "<a href='connexion.php'>Connexion</a>";
                    }
                ?>
                <a href='./livre-or.php'>Livre D’OR</a>
            </div>
        </div>
</header>

<main>
    <?php

            $req="SELECT utilisateurs.login,`commentaire`,`date` FROM commentaires INNER JOIN utilisateurs ON utilisateurs.id= commentaires.id_utilisateur";
            $query=mysqli_query($connexion,$req);
            $results=mysqli_fetch_all($query);
            foreach($results as $key=>$values){
                foreach($values as $key=>$value){
                    if($key==0){
                        echo "<h5>Posté par: ".$value."</h5>";
                    }
                    if($key==1){
                        echo "<h6>Commentaire: ".$value."</h6>";
                    }
                    if($key==2){
                        echo "<h7>Posté le : ".$value."</h7>"."</br>";
                        echo "<hr>";
                    }
                }
            }
        
    ?>
</main>

</body>
</html>