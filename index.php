<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./livreor.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil</title>
    <link rel="shorcut icon" href="./images/avatar_livre.png">
    <link href="https : //fonts.googleapis.com/css2? family= Abril+Fatface & display=swap" rel="stylesheet">
</head>
<body>
<header>
    <nav class="nav">
        <!-- menu pc -->
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
            <li><a href="./livre-or.php">Livre D’OR</a></li>
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
                <a href="./livre-or.php">Livre D’OR</a>
            </div>
        </div>
</header>
<main class="index">
    <img src="./images/avatar_livre.png" alt="logo">
</main>

<footer>
    <a href="https://github.com/ifanl-ibrahim/livre-or"><img src="./images/masterhacks_github_actualiza_politicas_eliminar_codigos_poc-removebg-preview (1).png" alt="logo"></a>
</footer>

</body>
</html>