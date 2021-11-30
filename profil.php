<?php
session_start();

$connexion = mysqli_connect('localhost', 'root', '', 'livreor');

if (isset($_POST['deco'])) {
    session_unset ();
    header("Location: connexion.php"); 
}

$login = $_SESSION['login'];
$req = mysqli_query($connexion, "SELECT * FROM utilisateurs WHERE login='$login'");
$res = mysqli_fetch_assoc($req);
$password = $res['password'];

$modification="";
$formNewLogin="";
$formNewPass="";
$same="";
$existe="";
$valide="";
$vide="";
$wrong="";
$delete="";
$oui="";
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
    <article class="titre_profil">
        <h1 class="titre_user">My House</h1>
    </article>

    <article class="info">
        <section id="bienvenue">
            <?php
                if (!isset($_SESSION['login'])) {
                    header("Refresh: 2; url=connexion.php");
                    echo "<p>connecte toi.</p><br><p>Redirection...</p>";
                    exit();
                }
                if (!$connexion) {
                    echo "Erreur connexion";
                    exit();
                }
                else echo "<h3>Bienvenue sur ton profil $login</h3>";
            ?>
        </section>
        <form class="profil" action="#" method="POST">
            <p>Info</p>

                <!-- UPDATE -->

            <?php

                //zone de modif//

                if (isset($_POST['modifier'])) {
                    $modification =    "<p id= modif>Modifier le Login <input type=\"submit\" name=\"modifierlogin\" value=\"ici\"><br>
                                        Modifier le Mot de passe <input type=\"submit\" name=\"modifierpass\" value=\"ici\"></p><br>";
                }

                //modif login//
            
                if (isset($_POST['modifierlogin'])) {
                    $formNewLogin =  
                        "<form method=\"post\">
                            <input type=\"text\" name=\"newlogin\" id=\"login\" placeholder=\"nouveau login\">
                            <input type=\"submit\" name=\"submitnewlogin\" value=\"valider\">
                        </form>";
                }
            
                if (isset($_POST['submitnewlogin'])) {
                    $newLogin = $_POST['newlogin'];
                    $checklogin = mysqli_query($connexion, "SELECT login FROM utilisateurs WHERE login='$login'");
                    
                    if (!empty(trim($newLogin))) {
                        $query = "UPDATE utilisateurs SET login='" . htmlentities(trim($newLogin)) . "' WHERE login='$login'";
            
                        if ($login == $newLogin) {
                            $same = "<p style= 'color: red'>utiliser un autre que $login<br></p>";
                        }
                        
                        elseif (mysqli_num_rows($checklogin) == 0) {
                            $existe = "<p style= 'color: red'>Le login est déjà utilisé par un autre utilisateur<br></p>";
                        }
                        
                        elseif (mysqli_query($connexion, $query)) {
                            $valide = "<p style= 'color: green'>vous modifié '$login' à '$newLogin' <br></p>";
                            header("Refresh:2");
                            $_SESSION['login'] = $newLogin;
                        }
                        
                    }else {
                        $vide = "<p style= 'color: red'>Remplissez le formulaire.<br></p>";
                    }
                }
                
                //modif password//
            
                if (isset($_POST['modifierpass'])) { 
                    $formNewPass = 
                        "<form method=\"post\">
                            <input type=\"text\" name=\"pass\" id=\"nom\" placeholder=\"Entrer l'ancien Password\"><br>
                            <input type=\"text\" name=\"newpass\" id=\"nom\" placeholder=\"Entrer un nouveau Password\"><br>
                            <input type=\"text\" name=\"confirmnewpass\" id=\"nom\" placeholder=\"Confirmer le nouveau Password\"><br>
                            <input type=\"submit\" name=\"submitnewpass\" value=\"valider\">
                        </form>
                    ";
                }
            
                if (isset($_POST['submitnewpass'])) {
                    $newpassword = trim($_POST['newpass']);
                    $confirm_password = trim($_POST['confirmnewpass']);
                    
                    if (!empty($_POST['pass']) && !empty($newpassword) && !empty($confirm_password)) {
                        $query = "UPDATE utilisateurs SET password='" . htmlentities($newpassword) . "' WHERE login='$login'";
                if ($_POST['pass'] == $password) {
                    if ($newpassword != $confirm_password) {
                        $same = "<p style= 'color: red'>le mot de passe n'est pas identique.<br></p>";
                    }
                    
                    elseif (mysqli_query($connexion, $query)) {
                        echo "<p style= 'color: green'>Le mot de passe a bien été changé</p>";
                        header("Refresh:2"); 
                    }
                }else {
                    $wrong = "<p style= 'color: red'>Le mot de passe n'est pas correct.</p>";
                    }
                        
                
                    } else {
                        $vide = "<p style= 'color: red'>Remplissez le formulaire.<br></p>";
                    }
                
                }

                //zone de suppression//
            
                if (isset($_POST['supprimer'])) {
                    $delete =  'supprimer votre compte ?<br>
                                <form method="post">
                                <input type="submit" name="oui" value="oui">
                                <input type="submit" name="non" value="non">
                                </form>';
                                }
            
                if (isset($_POST['oui'])) {
                     
                    (mysqli_query($connexion, "DELETE FROM utilisateurs WHERE login = '$login'"));
                    session_unset ( );
                    $oui = "<p style= 'color: green'>compte supprimé.</p>";
                    header("Refresh:2"); 
                    }
            ?>
            <input type="submit" name="modifier" value="Modifier vos information">
            <p><?php echo $modification ?></p>
            <p><?php echo $formNewLogin ?></p>
            <p><?php echo $formNewPass ?></p>
            <p><?php echo $same ?></p>
            <p><?php echo $existe ?></p>
            <p><?php echo $valide ?></p>
            <p><?php echo $vide ?></p>
            <p><?php echo $wrong ?></p>
            <input type="submit" name="supprimer" value="Supprimer votre compte">
            <p><?php  echo $delete   ?></p>
            <p><?php  echo $oui   ?></p>
            <input type="submit" name="deco" value="Déconnexion">
        </form>
    </article>
</main>

<footer>
    <a href="https://github.com/ifanl-ibrahim/livre-or"><img src="./images/masterhacks_github_actualiza_politicas_eliminar_codigos_poc-removebg-preview (1).png" alt="logo"></a>
</footer>

</body>
</html>