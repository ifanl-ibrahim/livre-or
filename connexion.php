<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./livreor.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shorcut icon" href="./images/avatar_livre.png">
    <link href="https : //fonts.googleapis.com/css2? family= Abril+Fatface & display=swap" rel="stylesheet">
    <title>Login</title>
</head>
<body>

<header>
    <nav class="nav">
        <ul>
            <li><a><img id="logo-navbar" src="./images/avatar_livre.png"></a></li>
            <li><a href="./index.php">Home</a></li>
            <li><a href="./inscription.php">Inscription</a></li>
            <li><a href="./connexion.php">Connexion</a></li>
            <li><a href='./livre-or.php'>Livre D’OR</a></li>
        </ul>
    </nav>

    <div class="drop">
            <!-- menu mobil  -->
            <button class="dropbutton"><img id="logo-navbar" src="./images/avatar_livre.png"></button>
            <div class="container-button">
                <a href="./index.php">Home</a>
                <a href="./inscription.php">Inscription</a>
                <a href="./connexion.php">Connexion</a>
                <a href='./livre-or.php'>Livre D’OR</a>
            </div>
        </div>
</header>

<main>
    <!-- zone de connexion -->
            
    <form action="#" method="POST">
        <h1>Connexion</h1>
        <input type="text" placeholder="Entrer le nom d'utilisateur" name="login" required>
        <input type="password" placeholder="Entrer le mot de passe" name="password" required>
        <input type="submit" id='submit' name='submit' value='LOGIN'>
    </form>
    <?php
        session_start();

        $connexion = mysqli_connect('localhost', 'root', '', 'livreor');

        if (isset($_POST['submit'])) {
            $login = trim($_POST['login']); 
            $password = trim($_POST['password']);

            if($login !== "" && $password !== "") {
                $req = "SELECT count(*) FROM utilisateurs WHERE login = '$login' AND password='$password'";
                $req2 = mysqli_query($connexion,$req);
                $res = mysqli_fetch_array($req2);
                $count = $res['count(*)'];
            
                if($count!=0) {  
                    $_SESSION['login'] = $login;
                    header("location: profil.php");
                }
                else  echo $erreur = "<p id='erreur'>Le login ou le mot de passe n'est pas correct !</p>";
            }
        }

        if (isset($_SESSION['login'])) {
            $login_session = $_SESSION['login'];
            header ("location:index.php");
        }
    ?>

</main>

</body>
</html>