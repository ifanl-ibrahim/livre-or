<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="./livreor.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="shorcut icon" href="./images/avatar_livre.png">
    <link href="https : //fonts.googleapis.com/css2? family= Abril+Fatface & display=swap" rel="stylesheet">
</head>
<body>

<header>
    <nav class="nav">
        <ul>
            <li><a><img id="logo-navbar" src="./images/avatar_livre.png"></a></li>
            <li><a href="./index.php">Home</a></li>
            <li><a href="./inscription.php">Inscription</a></li>
            <li><a href="./connexion.php">Connexion</a></li>
            <li><a href="./livre-or.php">Livre D’OR</a></li>
        </ul>
    </nav>

    <div class="drop">
            <!-- menu mobil  -->
            <button class="dropbutton"><img id="logo-navbar" src="./images/avatar_livre.png"></button>
            <div class="container-button">
                <a href="./index.php">Home</a>
                <a href="./inscription.php">Inscription</a>
                <a href="./connexion.php">Connexion</a>
                <a href="./livre-or.php">Livre D’OR</a>
            </div>
        </div>
</header>

<main>
    <form method="post">
    <h1>Inscription</h1>
    <input type="text" placeholder="Login" name="login" required><br/>
    <input type="password" placeholder="Mot de passe" name="password" required><br/>
    <input type="password" placeholder="Confirmation du mot de passe" name="confirm_password" required><br/>
    <input type="submit" name="submit"/>
    </form>

    <section class="erreur">
        <?php
        session_start();
        if (isset($_SESSION['login'])) {
            $login_session = $_SESSION['login'];
            header ("location:index.php");}

        $connexion = mysqli_connect('localhost', 'root', '', 'livreor');

        if(isset($_POST['submit'])){
            $login = trim($_POST['login']);
            $password = trim($_POST['password']);
            $confirm = trim($_POST['confirm_password']);
            $verif = "SELECT login FROM utilisateurs WHERE login = '$login'";
            $verif_suite = mysqli_query($connexion, $verif);
        
        
            if(!empty($login) && !empty($password) && !empty($confirm)) {
                if(mysqli_num_rows($verif_suite) == 0){  //calcule et verifie dans la base de donnée 
                    if($password == $confirm) { 
                        $query = "INSERT INTO utilisateurs (login, password) VALUES ('$login', '$password')"; //ajoute les info dans la base de donnée
                        mysqli_query($connexion, $query);
                        header("Location:connexion.php"); //redigire vers la page connexion
                    }
                    else echo $erreur = '<p id="erreur">Les mots de passe ne sont pas identiques.</p>';
                } 
                else echo $erreur = '<p id="erreur">Ce login existe déja</p>';
            }
        }
        ?>
    </section>

</main>

</body>
</html>