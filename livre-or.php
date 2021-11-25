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
    <title>MyProfil</title>
</head>
<body>

<header>
    <nav class="nav">
        <ul>
            <li><a><img id="logo-navbar" src="./images/avatar_livre.png"></a></li>
            <li><a href="./index.php">Home</a></li>
            <li><a href='./profil.php'>House</a></li>
        </ul>
    </nav>

    <div class="drop">
            <!-- menu mobil  -->
            <button class="dropbutton"><img id="logo-navbar" src="./images/avatar_livre.png"></button>
            <div class="container-button">
                <a href="./index.php">Home</a>
                <a href='./profil.php'>House</a>
            </div>
        </div>
</header>

<main>


</main>

</body>
</html>